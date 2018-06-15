<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5core',
            'Core',
            [
                'Person' => 'list, show, edit, update, new, create, delete, addRelation, removeRelation, resortRelation',
                'Company' => 'list, show, edit, update, new, create, delete, addRelation, removeRelation, resortRelation',
                'Link' => 'list, show, edit, update, new, create, delete, resort',
                'Address' => 'edit, update, new, create, delete, resort, autocomplete',
                'Contact' => 'edit, update, new, create, delete, resort',
                'Source' => 'loadDetails, edit, update, new, create',
                'Relation' => 'list, edit, update',
                'Appointment' => 'list, edit, update, new, create, delete, show'
            ],
            // non-cacheable actions
            [
                'Person' => 'list, show, edit, update, new, create, delete, addRelation, removeRelation, resortRelation',
                'Company' => 'list, show, edit, update, new, create, delete, addRelation, removeRelation, resortRelation',
                'Link' => 'edit, update, new, create, delete, resort',
                'Address' => 'list, show, edit, update, new, create, delete, resort, autocomplete',
                'Contact' => 'edit, update, new, create, delete, resort',
                'Source' => 'loadDetails, edit, update, new, create',
                'Relation' => 'list, edit, update',
                'Appointment' => 'list, edit, update, new, create, delete, show'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5core',
            'Ownerprefs',
            [
                'Owner' => 'edit, update'
            ],
            // non-cacheable actions
            [
                'Owner' => 'edit, update'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CGB.Relax5core',
            'Aux',
            [
                'Person' => 'new, create',
                'Company' => 'new, create'
            ],
            // non-cacheable actions
            [
                'Person' => 'new, create',
                'Company' => 'new, create'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    core {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5core') . 'Resources/Public/Icons/user_plugin_core.svg
                        title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_core
                        description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_core.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5core_core
                        }
                    }
                    ownerprefs {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5core') . 'Resources/Public/Icons/user_plugin_ownerprefs.svg
                        title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_ownerprefs
                        description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_ownerprefs.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5core_ownerprefs
                        }
                    }
                    aux {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('relax5core') . 'Resources/Public/Icons/user_plugin_aux.svg
                        title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_aux
                        description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_aux.description
                        tt_content_defValues {
                            CType = list
                            list_type = relax5core_aux
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
  'relax5-icon-core',
  \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
  ['source' => 'EXT:relax5core/Resources/Public/Images/relax-icon-core.png']
);

$iconRegistry->registerIcon(
  'relax5-icon-owner',
  \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
  ['source' => 'EXT:relax5core/Resources/Public/Images/relax-icon-owner.png']
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                core >
                ownerprefs >
                aux >
            }
        }
        wizards.newContentElement.wizardItems.relax5 {
            header = Relax5 Plugins
            elements {
                core {
                    icon >
                    iconIdentifier = relax5-icon-core
                    title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_core
                    description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_core.description
                    tt_content_defValues {
                        CType = list
                        list_type = relax5core_core
                    }
                }
                aux {
                    icon >
                    iconIdentifier = relax5-icon-core
                    title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_aux
                    description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_aux.description
                    tt_content_defValues {
                        CType = list
                        list_type = relax5core_aux
                    }
                }
                ownerprefs {
                    icon >
                    iconIdentifier = relax5-icon-owner
                    title = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_ownerprefs
                    description = LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_ownerprefs.description
                    tt_content_defValues {
                        CType = list
                        list_type = relax5core_ownerprefs
                    }
                }
            }
            show = *
        }
   }'
);