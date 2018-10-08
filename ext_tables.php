<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5core',
            'Core',
            'Relax5core: Core'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5core',
            'Ownerprefs',
            'Relax5core: Owner/User Prefs'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CGB.Relax5core',
            'Aux',
            'Relax5core: Relation Create Form'
        );

        $pluginSignature = str_replace('_', '', 'relax5core') . '_aux';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:relax5core/Configuration/FlexForms/flexform_aux.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('relax5core', 'Configuration/TypoScript', 'relax5core');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_person', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_person.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_person');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_address', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_address.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_address');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_status', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_status.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_status');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_source', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_source.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_source');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_sourcedetail', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_sourcedetail.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_sourcedetail');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_contact', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_contact.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_contact');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_company', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_company.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_company');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_link', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_link.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_link');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_document', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_document.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_document');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_appointment', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_appointment.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_appointment');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_type', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_type.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_type');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_zipcatalogue', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_zipcatalogue.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_zipcatalogue');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_addresscatalogue', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_addresscatalogue.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_addresscatalogue');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_namecatalogue', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_namecatalogue.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_namecatalogue');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_titlecatalogue', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_titlecatalogue.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_titlecatalogue');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_relation', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_relation.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_relation');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_relax5core_domain_model_category', 'EXT:relax5core/Resources/Private/Language/locallang_csh_tx_relax5core_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_relax5core_domain_model_category');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder