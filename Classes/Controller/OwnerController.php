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
 * OwnerController
 */
class OwnerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * ownerRepository
     *
     * @var \CGB\Relax5core\Domain\Repository\OwnerRepository
     * @inject
     */
    protected $ownerRepository = null;

    /**
     * accessControlService
     *
     * @var \CGB\Accessmanager\Service\AccessControlService
     * @inject
     */
    protected $accessControlService = null;
    
    /**
     * statePoolRepository
     *
     * @var \CGB\Relax5project\Domain\Repository\StatePoolRepository
     * @inject
     */
    protected $statePoolRepository = null;

    /**
     * action edit
     *
     * @return void
     */
    public function editAction()
    {
        $owner = $this->ownerRepository->findByUid($this->accessControlService->getFrontendUserUid());
        
        if (is_object($this->statePoolRepository)) {
            $states = $this->statePoolRepository->findAll();
        }

        $this->view->assignMultiple([
            'owner' =>  $owner,
            'states' => $states,
        ]);
    }

    /**
     * action initializeUpdate
     * remove "virtual" properties
     */
    public function initializeUpdateAction()
    {
        $this->arguments['owner']->getPropertyMappingConfiguration()->forProperty('pwdChangeDate')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_relax5core_general.date_format', 'relax5core'));
    }
    
    /**
     * action update
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $owner
     * @param array $settings
     * @return void
     */
    public function updateAction(\CGB\Relax5core\Domain\Model\Owner $owner, $settings = [])
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $owner->setSettings(serialize($settings));
        $this->ownerRepository->update($owner);
        $this->redirect('edit');
    }
}
