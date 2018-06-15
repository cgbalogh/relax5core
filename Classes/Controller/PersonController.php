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
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * personRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

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
     * appointmentRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $appointmentRepository = null;

    /**
     * pappointmentRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\AppointmentRepository
     * @inject
     */
    protected $pappointmentRepository = null;

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
        $persons = $this->personRepository->findByLastName('Muller');
        $this->view->assign('persons', $persons);
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
            'maritalStateSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_person', 'marital_state', 'relax5core'),
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
     * @param \CGB\Relax5core\Domain\Model\Person $newPerson
     * @validate $newPerson \CGB\Relax5validator\Domain\Validator\GenericValidator(context=CreatePerson)
     * @return void
     */
    public function createAction(\CGB\Relax5core\Domain\Model\Person $newPerson)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Person', 'create', null, null, null)) {
            $result['success'] = 'error';
            $result['message'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager');
            $this->addFlashMessage($result['message'], '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            return json_encode($result);
        }
        $newPerson->cleanContacts();
        if ($newPerson->getRelations()->toArray()[0]->getTargetPerson()->getLastName() || $newPerson->getRelations()->toArray()[0]->getTargetPerson()->getFirstName()) {
            // if relation is set clean up contacts for targetPerson record
            $newPerson->getRelations()->toArray()[0]->getTargetPerson()->cleanContacts();
        } else {
            // if relation is not set, remove from newPerson, otherwise an empty record will be created
            $newPerson->removeRelation($newPerson->getRelations()->toArray()[0]);
        }
        $this->personRepository->add($newPerson);
        // since persisiting will be before redirecting, we need to do it the hard way here
        $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        $persistenceManager->persistAll();
        $message = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_domain_model_person.record_created', 'relax5core');
        $this->addFlashMessage(sprintf($message, $newPerson->getUid()), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO);
        // maybe, there is a better way. For the moment the new relation will be duplicated and x-linked manually
        // new relation wiill be on first position
        $newPerson->getRelations()->rewind();
        $relationToTargetPerson = $newPerson->getRelations()->current();
        if (get_class($relationToTargetPerson) == 'CGB\\Relax5core\\Domain\\Model\\Relation') {
            // relation from targetPerson to person
            $relationFromTargetPerson = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Relation');
            $relationFromTargetPerson->setTargetPerson($newPerson);
            $relationFromTargetPerson->setType($relationToTargetPerson->invertType());
            // X-link the relations
            $relationToTargetPerson->setXLink($relationFromTargetPerson);
            $relationFromTargetPerson->setXLink($relationToTargetPerson);
            $targetPerson = $relationToTargetPerson->getTargetPerson();
            // add relations and update
            $targetPerson->addRelation($relationFromTargetPerson);
            $this->personRepository->update($newPerson);
            $this->personRepository->update($targetPerson);
        }
        $pageUid = $this->settings['personShowPid'];
        $uriBuilder = $this->uriBuilder;
        $uriBuilder->reset();
        $uriBuilder->setTargetPageUid($pageUid);
        $uriBuilder->uriFor('show', ['person' => $newPerson, 'newrecord' => true, 'addproject' => true]);
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
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param string $section
     * @ignorevalidation $person
     * @return void
     */
    public function editAction(\CGB\Relax5core\Domain\Model\Person $person, $section = 'main')
    {
        if ($section == 'extra') {
            $categories = $this->categoryRepository->findAll();
        }
        $this->view->assignMultiple([
            'maritalStateSelect' => \CGB\Relax5core\Service\DivService::makeSelectFromTCA('tx_relax5core_domain_model_person', 'marital_state', 'relax5core'),
            'sourceSelect' => array_merge([0 => ''], $this->sourceRepository->findAll()->toArray()),
            'sourcedetailSelect' => array_merge([0 => ''], $this->sourcedetailRepository->findBySource($person->getSource())->toArray()),
            'statusSelect' => $this->statusRepository->findAll(),
            'ownerSelect' => $this->ownerRepository->findAll(),
            'usergroupSelect' => $this->usergroupRepository->findAll(),
            'person' => $person,
            'section' => $section,
            'addInfo' => $this->addInfoService->loadAddInfo($person),
            'categories' => $categories
        ]);
    }

    /**
     * action initializeUpdate
     * reset default date format
     */
    public function initializeUpdateAction()
    {
        $this->arguments['person']->getPropertyMappingConfiguration()->forProperty('dateOfBirth')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.date_format', 'relax5core'));
    }

    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param array $categories
     * @validate $person \CGB\Relax5validator\Domain\Validator\GenericValidator(context=UpdatePerson)
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Person $person, $categories = null)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Person', 'write', $person->getPermissions(), $person->getOwner(), $person->getUsergroup())) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Person', 'relax5core', $this->request->getArguments());
        }
        if (is_array($categories)) {
            $existingCategories = $person->getCategories(true);
            foreach ($categories as $category => $chosen) {
                $categoryObject = $this->categoryRepository->findByUid($category);
                if ($chosen && !$existingCategories->contains($categoryObject)) {
                    // category missing, add
                    $person->addCategory($categoryObject);
                } elseif (!$chosen && $existingCategories->contains($categoryObject)) {
                    // category exists but is not chosen, remove
                    $person->removeCategory($categoryObject);
                }
            }
        }
        $this->personRepository->update($person);
        $this->addInfoService->storeAddInfo($person, $this->request);
        $result = \CGB\Relax5core\Service\DivService::objectToArray($person, 'lastName,middleName,firstName,title,gender,dateOfBirth,comments', "person_{$person->getUid()}_");
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action delete
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @return void
     */
    public function deleteAction(\CGB\Relax5core\Domain\Model\Person $person)
    {
        $this->personRepository->remove($person);
        $result['success'] = 'ok';
        return json_encode($result);
    }

    /**
     * action show
     *
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Link $link
     * @ignorevalidation $person
     * @return void
     */
    public function showAction(
        \CGB\Relax5core\Domain\Model\Person $person,
        \CGB\Relax5core\Domain\Model\Link $link = null)
    {
        $args = $this->request->getArguments();
        $this->view->assignMultiple([
            'person' => $person,
            'link' => $link,
            'settings' => $this->settings,
            'newrecord' => $args['newrecord'],
            'addproject' => $args['addproject']
        ]);
    }

    /**
     * action newAddress
     *
     * @return void
     */
    public function newAddressAction()
    {

    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Person $person
     * @param \CGB\Relax5core\Domain\Model\Person $targetPerson
     * @return void
     */
    public function addRelationAction(\CGB\Relax5core\Domain\Model\Person $person, \CGB\Relax5core\Domain\Model\Person $targetPerson)
    {
        if (!$this->accessControlService->checkPermission('CGB\\Relax5core\\Domain\\Model\\Person', 'write', $person->getPermissions(), $person->getOwner(), $person->getUsergroup())) {
            $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_accessmanager_domain_model_policy.access_violation', 'accessmanager'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->forward('edit', 'Person', 'relax5core', $this->request->getArguments());
        }
        if ($person->getUid() == $targetPerson->getUid()) {
            return json_encode(['success' => '', 'whoami' => 'person/addRelation']);
        }
        // relation from person to targetPerson
        $relationToTargetPerson = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Relation');
        $relationToTargetPerson->setTargetPerson($targetPerson);
        // relation from targetPerson to person
        $relationFromTargetPerson = $this->objectManager->get('CGB\\Relax5core\\Domain\\Model\\Relation');
        $relationFromTargetPerson->setTargetPerson($person);
        $relationFromTargetPerson->setType($relationToTargetPerson->invertType());
        // X-link the relations
        $relationToTargetPerson->setXLink($relationFromTargetPerson);
        $relationFromTargetPerson->setXLink($relationToTargetPerson);
        // add relations and update
        $person->addRelation($relationToTargetPerson);
        $targetPerson->addRelation($relationFromTargetPerson);
        $this->personRepository->update($person);
        $this->personRepository->update($targetPerson);
        return json_encode(['success' => 'ok', 'whoami' => 'person/addRelation']);
    }

    /**
     * action removeRelation
     *
     * @param \CGB\Relax5core\Domain\Model\Person $parent
     * @param \CGB\Relax5core\Domain\Model\Relation $relation
     * @return void
     */
    public function removeRelationAction(\CGB\Relax5core\Domain\Model\Person $parent, \CGB\Relax5core\Domain\Model\Relation $relation)
    {
        // get the targets of the relation
        $targetRelation = $relation->getXLink();
        $targetPerson = $targetRelation->getPerson();
        // remove relation on source side and update
        $parent->removeRelation($relation);
        $this->personRepository->update($parent);
        // remove relation on target side and update, real instance must be loaded
        \CGB\Relax5core\Service\DivService::load($targetRelation);
        if ($targetPerson) {
            $targetPerson->removeRelation($targetRelation);
            $this->personRepository->update($targetPerson);
        }
        $result['actions']['fadeOut'] = '#relation_' . $relation->getUid();
        return json_encode($result);
    }

    /**
     * action resortRelation
     *
     * @param string $uidlist
     * @return void
     */
    public function resortRelationAction($uidlist = '')
    {
        $uidListArray = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $uidlist);
        foreach ($uidListArray as $key => $uid) {
            $relation = $this->relationRepository->findByUid($uid);
            $relation->setSorting($key + 1);
            $this->relationRepository->update($relation);
        }
        $persistenceManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
        $persistenceManager->persistAll();
        return json_encode(['success' => 'ok', 'whoami' => 'person/resortRelation']);
    }

    /**
     * action createAux
     *
     * @param \CGB\Relax5core\Domain\Model\Person $newPerson
     * @param \CGB\Relax5core\Domain\Model\Person $target
     * @validate $newPerson \CGB\Relax5validator\Domain\Validator\GenericValidator(context=CreatePersonAux)
     * @return void
     */
    public function createAuxAction(\CGB\Relax5core\Domain\Model\Person $newPerson, \CGB\Relax5core\Domain\Model\Person $target)
    {
        $status = $this->statusRepository->findByUid(2);
        $newPerson->setStatus($status);
        $newPerson->setOwner($target->getOwner());
        $newPerson->setUsergroup($target->getUsergroup());
        $newPerson->setPermissions($target->getPermissions());
        $this->personRepository->add($newPerson);
        $this->addRelationAction($target, $newPerson);
    }
}
