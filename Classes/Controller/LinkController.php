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
 * LinkController
 */
class LinkController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * linkRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\LinkRepository
     * @inject
     */
    protected $linkRepository = null;

    /**
     * categoryRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = null;

    /**
     * accessControlService
     *
     * @var \CGB\Accessmanager\Service\AccessControlService
     * @inject
     */
    protected $accessControlService = null;

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
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @return void
     */
    public function createAction(\CGB\Relax5core\Domain\Model\Person $person, \CGB\Relax5core\Domain\Model\Company $company)
    {
        $newLink = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Link');
        $newLink->setPerson($person);
        $newLink->setCompany($company);
        $this->linkRepository->add($newLink);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @param string $section
     * @ignorevalidation $link
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Link $link, $section = 'main')
    {
        if ($section == 'extra') {
            $categories = $this->categoryRepository->findAll();
        }
        
        $this->view->assignMultiple([
            'link' => $link,
            'categories' => $categories,
        ]);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @param array $categories
     * @validate $link \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdateLink)
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Link $link, $categories = null)
    {
        $permissions = $link->getPerson()->getPermissions() . '|' . $link->getCompany()->getPermissions();
        $owner = 
            ($link->getPerson()->getOwner() ? $link->getPerson()->getOwner()->getUid() : 0) . '|' . 
            ($link->getCompany()->getOwner() ? $link->getCompany()->getOwner()->getUid() : 0);
        
        $usergroup = 
            ($link->getPerson()->getUsergroup() ? $link->getPerson()->getUsergroup()->getUid() : 0) . '|' . 
            ($link->getCompany()->getUsergroup() ? $link->getCompany()->getUsergroup()->getUid() : 0);
        
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Link', 'write', $permissions, $owner, $usergroup)) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Link', 'relax5core', $this->request->getArguments());
        }
        
        if (is_array($categories)) {
            $existingCategories = $link->getCategories(true);
            foreach($categories as $category => $chosen) {
                $categoryObject = $this->categoryRepository->findByUid($category);
                if ($chosen && ! $existingCategories->contains($categoryObject)) {
                    // category missing, add
                    $link->addCategory($categoryObject);
                } elseif (! $chosen && $existingCategories->contains($categoryObject)) {
                    // category exists but is not chosen, remove
                    $link->removeCategory($categoryObject);
                }
            }
        }
        
        $this->linkRepository->update($link);
        $this->addInfoService->storeAddInfo($link, $this->request);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($link, 'role,roleTitle,division', "link_{$link->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Link $link)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->linkRepository->remove($link);
        $this->redirect('list');
    }

    /**
     * action resort
     *
     * @param string $uidlist
     * @param string $itemtype
     * @return void
     */
    public function resortAction($uidlist = '', $itemtype = '')
    {
        // explode uid list
        $uidListArray = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $uidlist);
        // cycle uid list of links
        foreach ($uidListArray as $key => $uid) {
            $link = $this->linkRepository->findByUid($uid);
            if ($itemtype == 'person') {
                $link->setPersonSorting($key + 1);
                $this->linkRepository->update($link);
            } elseif ($itemtype == 'company') {
                $link->setCompanySorting($key + 1);
                $this->linkRepository->update($link);
            }
        }
        return json_encode(['success' => 'ok', 'whoami', 'whoami' => 'link/resort']);
    }
}
