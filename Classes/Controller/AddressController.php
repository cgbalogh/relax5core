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
 * AddressController
 */
class AddressController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * addressRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\AddressRepository
     * @inject
     */
    protected $addressRepository = null;

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
        $scopes = ['person' => 1, 'company' => 2, 'link' => 3];
        $this->view->assignMultiple([
            'typeSelect' => array_merge([0 => ''], $this->typeRepository->findByScope($scopes[$itemtype])->toArray()),
            $itemtype => $item
        ]);
    }

    /**
     * action create
     *
     * @param \CGB\Relax5core\Domain\Model\Address $newAddress
     * @param \CGB\Relax5core\Domain\Model\Person|null $person
     * @param \CGB\Relax5core\Domain\Model\Link|null $link
     * @param \CGB\Relax5core\Domain\Model\Company|null $company
     * @validate $newAddress \CGB\Relax5validator\Domain\Validator\GenericValidator(context=CreateAddress)
     * @return void
     */
    public function createAction(
        \CGB\Relax5core\Domain\Model\Address $newAddress,
        \CGB\Relax5core\Domain\Model\Person $person = null,
        \CGB\Relax5core\Domain\Model\Link $link = null,
        \CGB\Relax5core\Domain\Model\Company $company = null)
    {
        if ($person) {
            $person->addAddress($newAddress);
            $this->personRepository->update($person);
        } elseif ($company) {
            $company->addAddress($newAddress);
            $this->companyRepository->update($company);
        } elseif ($link) {
            $link->addAddress($newAddress);
            $this->linkRepository->update($link);
        }
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @ignorevalidation $address
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Address $address)
    {
        $this->view->assignMultiple([
            'typeSelect' => array_merge([0 => ''], $this->typeRepository->findByScope($address->getParentScope())->toArray()),
            'address' => $address,
            'addInfo' => $this->addInfoService->loadAddInfo($address)
        ]);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @validate $address \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdateAddress)
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Address $address)
    {
        $this->addressRepository->update($address);
        $this->addInfoService->storeAddInfo($address, $this->request);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($address, '', "address_{$address->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Address $address)
    {
        if ($person = $address->getPerson()) {
            $person->removeAddress($address);
            $this->personRepository->update($person);
        } elseif ($company = $address->getCompany()) {
            $company->removeAddress($address);
            $this->companyRepository->update($company);
        } elseif ($link = $address->getLink()) {
            $link->removeAddress($address);
            $this->linkRepository->update($link);
        }
        $result['actions']['fadeOut'] = '#address_' . $address->getUid();
        return json_encode($result);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $addresses = $this->addressRepository->findAll();
        $this->view->assign('addresses', $addresses);
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
            $address = $this->addressRepository->findByUid($uid);
            $address->setSorting($key + 1);
            $this->addressRepository->update($address);
        }
        return json_encode(['success' => 'ok', 'whoami' => 'address/resort']);
    }

    /**
     * action autocomplete
     *
     * @param string $repository
     * @param string $findmethod
     * @param string $term
     * @param array $condition
     * @return void
     */
    public function autocompleteAction($repository = '', $findmethod = '', $term = '', $condition = [])
    {
        $allowedRepositories = [
            'CGB\\Relax5core\\Domain\\Repository\\AddressCatalogueRepository',
            'CGB\\Relax5core\\Domain\\Repository\\NameCatalogueRepository',
            'CGB\\Relax5core\\Domain\\Repository\\ZipCatalogueRepository'
        ];
        if (array_search($repository, $allowedRepositories) === false) {
            return json_encode([]);
        }
        $repositoryObject = $this->objectManager->get($repository);
        if (method_exists($repositoryObject, $findmethod)) {
            $result = $repositoryObject->{$findmethod}($condition, $term);
        }
        return json_encode($result);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5core\Domain\Model\Address $address
     * @return void
     */
    public function showAction(\CGB\Relax5core\Domain\Model\Address $address)
    {
        $this->view->assign('address', $address);
    }
}
