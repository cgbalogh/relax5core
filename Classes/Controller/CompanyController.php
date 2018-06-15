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
 * CompanyController
 */
class CompanyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * companyRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\CompanyRepository
     * @inject
     */
    protected $companyRepository = null;

    /**
     * relationRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\RelationRepository
     * @inject
     */
    protected $relationRepository = null;

    /**
     * sourceRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\SourceRepository
     * @inject
     */
    protected $sourceRepository = null;

    /**
     * sourcedetailRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\SourcedetailRepository
     * @inject
     */
    protected $sourcedetailRepository = null;

    /**
     * statusRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\StatusRepository
     * @inject
     */
    protected $statusRepository = null;

    /**
     * ownerRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\OwnerRepository
     * @inject
     */
    protected $ownerRepository = null;

    /**
     * usergroupRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository
     * @inject
     */
    protected $usergroupRepository = null;

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
     * initializeAction
     */
    public function initializeAction()
    {
        $this->usergroupRepository->setDefaultOrderings([
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
        ]);
    }

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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $companies = $this->companyRepository->findAll();
        $this->view->assign('companies', $companies);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $pluginName = $this->request->getPluginName();
        $this->view->assignMultiple([
            'industrySelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_company', 'industry', 'relax5core'),
            'legalFormSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_company', 'legal_form', 'relax5core'),
            'typeSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_relation', 'type', 'relax5core', 0),
            'sourceSelect' => array_merge([0 => ''], $this->sourceRepository->findAll()->toArray()),
            'sourcedetailSelect' => [0 => ''],
            'statusSelect' => $this->statusRepository->findAll(),
            'feUserUid' => $this->accessControlService->getFrontendUserUid(),
            'ownerSelect' => array_merge([0 => ''], $this->ownerRepository->findAll()->toArray()),
            'usergroupSelect' => array_merge([0 => ''], $this->usergroupRepository->findAll()->toArray()),
            'pluginName' => $pluginName,
            'createAction' => $pluginName == 'Core' ? '' : $pluginName
        ]);
    }

    /**
     * action create
     *
     * @param \CGB\Relax5core\Domain\Model\Company $newCompany
     * @return void
     */
    public function createAction(\CGB\Relax5core\Domain\Model\Company $newCompany)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Company', 'create', null, null, null)) {
            $result['success'] = 'error';
            $result['message'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager');
            $this->addFlashMessage($result['message'], '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            return json_encode($result);
        }
        $newCompany->cleanContacts();
        $this->companyRepository->add($newCompany);
        // since persisiting will be before redirecting, we need to do it the hard way here
        $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        $persistenceManager->persistAll();
        $message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_domain_model_company.record_created', 'relax5core');
        $this->addFlashMessage(sprintf($message, $newCompany->getUid()), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO);

        $pageUid = $this->settings['companyShowPid'];
        $uriBuilder = $this->uriBuilder;
        $uriBuilder->reset();
        $uriBuilder->setTargetPageUid($pageUid);
        $uriBuilder->uriFor('show', ['company' => $newCompany, 'newrecord' => true, 'addproject' => true]);
        $uriBuilder->setCreateAbsoluteUri(true);
        $uri = $uriBuilder->build();
        // invoke singleView and call new Project
        $result['success'] = 'ok';
        $result['message'] = $message;
        $result['actions'][] = [
            'jQcmd' => 'openUri',
            'jQdata' => $uri
        ];
        return json_encode($result);
    }

    /**
     * action edit
     *
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @param string $section
     * @ignorevalidation $company
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Company $company, $section = 'main')
    {
        if ($section == 'extra') {
            $categories = $this->categoryRepository->findAll();
        }

        $this->view->assignMultiple([
            'legalFormSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_company', 'legal_form', 'relax5core'),
            'industrySelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_company', 'industry', 'relax5core'),
            'sourceSelect' => array_merge([0 => ''], $this->sourceRepository->findAll()->toArray()),
            'sourcedetailSelect' => array_merge([0 => ''], $this->sourcedetailRepository->findBySource($company->getSource())->toArray()),
            'statusSelect' => $this->statusRepository->findAll(),
            'ownerSelect' => $this->ownerRepository->findAll(),
            'usergroupSelect' => $this->usergroupRepository->findAll(),
            'company' => $company,
            'section' => $section,
            'addInfo' => $this->addInfoService->loadAddInfo($company),
            'categories' => $categories,
        ]);
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @param array $categories
     * @validate $company \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdateCompany)
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Company $company, $categories = null)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Company', 'write', $company->getPermissions(), $company->getOwner(), $company->getUsergroup())) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Company', 'relax5core', $this->request->getArguments());
        }
        
        if (is_array($categories)) {
            $existingCategories = $company->getCategories(true);
            foreach($categories as $category => $chosen) {
                $categoryObject = $this->categoryRepository->findByUid($category);
                if ($chosen && ! $existingCategories->contains($categoryObject)) {
                    // category missing, add
                    $company->addCategory($categoryObject);
                } elseif (! $chosen && $existingCategories->contains($categoryObject)) {
                    // category exists but is not chosen, remove
                    $company->removeCategory($categoryObject);
                }
            }
        }
        
        $this->companyRepository->update($company);
        $this->addInfoService->storeAddInfo($company, $this->request);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($company, 'name,shortName,comments', "company_{$company->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Company $company)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->companyRepository->remove($company);
        $this->redirect('list');
    }

    /**
     * action show
     *
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @return void
     */
    public function showAction(
        \CGB\Relax5core\Domain\Model\Company $company,
        \CGB\Relax5core\Domain\Model\Link $link = null)
    {
        $this->view->assignMultiple([
            'company' => $company,
            'link' => $link,
            'settings' => $this->settings
        ]);
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Company $company
     * @param \CGB\Relax5core\Domain\Model\Company$targetCompany
     * @return void
     */
    public function addRelationAction(\CGB\Relax5core\Domain\Model\Company $company, \CGB\Relax5core\Domain\Model\Company $targetCompany)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Company', 'write', $company->getPermissions(), $company->getOwner(), $company->getUsergroup())) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Company', 'relax5core', $this->request->getArguments());
        }
        if ($company->getUid() == $targetCompany->getUid()) {
            return json_encode(['success' => '', 'whoami' => 'company/addRelation']);
        }
        // relation from company to targetCompany
        $relation1 = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Relation');
        $relation1->setTargetCompany($targetCompany);
        // relation from targetCompany to company
        $relation2 = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Relation');
        $relation2->setTargetCompany($company);
        // X-link the relations
        $relation1->setXLink($relation2);
        $relation2->setXLink($relation1);
        // add relations and update
        $company->addRelation($relation1);
        $targetCompany->addRelation($relation2);
        $this->companyRepository->update($company);
        $this->companyRepository->update($targetCompany);
        return json_encode(['success' => 'ok', 'whoami' => 'company/addRelation']);
    }

    /**
     * action removeRelation
     *
     * @return void
     */
    public function removeRelationAction()
    {

    }

    /**
     * action resortRelation
     *
     * @return void
     */
    public function resortRelationAction()
    {

    }
}
