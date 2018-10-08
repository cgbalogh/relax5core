<?php
namespace CGB\Relax5core\Controller;

/***
 *
 * This file is part of the "relax5core" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * ContactController
 */
class ContactController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * contactRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * typeRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\TypeRepository
     * @inject
     */
    protected $typeRepository = null;

    /**
     * personRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * companyRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\CompanyRepository
     * @inject
     */
    protected $companyRepository = null;

    /**
     * linkRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\LinkRepository
     * @inject
     */
    protected $linkRepository = null;

    /**
     * addInfoServiceService
     *
     * @var \CGB\Relax5addinfo\Service\AddInfoService
     * @inject
     */
    protected $addInfoService = null;

    /**
     * @api
     * @return string
     */
    protected function getErrorFlashMessage()
    {
        $key = 'controllererror_' . strtolower($this->extensionName) . '_' . (new \ReflectionClass($this))->getShortName() . '_' . $this->actionMethodName;
        if ($error = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($key, strtolower($this->extensionName))) {
            return $error;
        } else {
            return 'Error in Action: ' . $key;
        }
    }

    /**
     * action new
     *
     * @param int $item
     * @param string $itemtype
     * @return void
     */
    public function newAction($item = 0, $itemtype = '')
    {
        $parentScope = ['person' => 4, 'company' => 5, 'link' => 6];
        $this->view->assignMultiple([
            $itemtype => $item,
            'typeSelect' => array_merge([0 => ''], $this->typeRepository->findByScope($parentScope[$itemtype])->toArray())
        ]);
    }

    /**
     * action initializeCreate
     * remove "virtual" properties
     */
    public function initializeCreateAction()
    {
        $propertyMappingConfiguration = $this->arguments->getArgument('newContact')->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->skipProperties('countrycode', 'areacode', 'number', 'extension');
    }

    /**
     * action create
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $newContact
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @validate $newContact \CGB\Relax5validator\Domain\Validator\GenericValidator(context=CreateContact)
     * @return void
     */
    public function createAction(
        \CGB\Relax5core\Domain\Model\Contact $newContact,
        \CGB\Relax5core\Domain\Model\Person $person = null,
        \CGB\Relax5core\Domain\Model\Link $link = null,
        \CGB\Relax5core\Domain\Model\Company $company = null)
    {
        $rawArgs = $this->request->getArgument('newContact');
        if ($rawArgs['number']) {
            $extDelimiter = $rawArgs['extension'] ? '-' : '';
            $newContact->setContact("+{$rawArgs['countrycode']}({$rawArgs['areacode']}){$rawArgs['number']}{$extDelimiter}{$rawArgs['extension']}");
        }
        if ($person) {
            $person->addContact($newContact);
            $this->personRepository->update($person);
        } elseif ($company) {
            $company->addContact($newContact);
            $this->companyRepository->update($company);
        } elseif ($link) {
            $link->addContact($newContact);
            $this->linkRepository->update($link);
        }
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $contact
     * @ignorevalidation $contact
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Contact $contact)
    {
        $this->view->assignMultiple([
            'typeSelect' => array_merge([0 => ''], $this->typeRepository->findByScope($contact->getParentScope())->toArray()),
            'contact' => $contact,
            'addInfo' => $this->addInfoService->loadAddInfo($contact)
        ]);
    }

    /**
     * action initializeUpdate
     * remove "virtual" properties
     */
    public function initializeUpdateAction()
    {
        $propertyMappingConfiguration = $this->arguments->getArgument('contact')->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->skipProperties('countrycode', 'areacode', 'number', 'extension');
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $contact
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Contact $contact)
    {
        $rawArgs = $this->request->getArgument('contact');
        if ($rawArgs['number']) {
            $extDelimiter = $rawArgs['extension'] ? '-' : '';
            $contact->setContact("+{$rawArgs['countrycode']}({$rawArgs['areacode']}){$rawArgs['number']}{$extDelimiter}{$rawArgs['extension']}");
        }
        $this->contactRepository->update($contact);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($contact, 'contact,description', "contact_{$contact->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Contact $contact
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Contact $contact)
    {
        if ($person = $contact->getPerson()) {
            $person->removeContact($contact);
            $this->personRepository->update($person);
        } elseif ($company = $contact->getCompany()) {
            $company->removeContact($contact);
            $this->companyRepository->update($company);
        } elseif ($link = $contact->getLink()) {
            $link->removeContact($contact);
            $this->linkRepository->update($link);
        }
        $result['actions']['fadeOut'] = '#contact_' . $contact->getUid();
        return json_encode($result);
    }

    /**
     * action resort
     *
     * @param string $uidlist
     * @return void
     */
    public function resortAction($uidlist = '')
    {
        $uidListArray = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $uidlist);
        foreach ($uidListArray as $key => $uid) {
            $contact = $this->contactRepository->findByUid($uid);
            $contact->setSorting($key + 1);
            $this->contactRepository->update($contact);
        }
        return json_encode(['success' => 'ok', 'whoami' => 'contact/resort']);
    }
}
