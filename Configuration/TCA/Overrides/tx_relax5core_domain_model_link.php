<?php

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/**
 * general note:
 * 
 * The language file for the FE translations will be used here. 
 */

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['tstamp'] = [
    'label' => 'Modification Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['ctrl']['sortby'] = 'person_sorting';

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['ctrl']['label'] = 'person';
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['ctrl']['label_alt'] = 'company';
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['ctrl']['label_alt_force'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['ctrl']['iconfile'] = 'EXT:core/Resources/Public/Icons/T3Icons/apps/apps-pagetree-page-shortcut-external.svg';

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['interface']['showRecordFieldList'] = 
        'sys_language_uid, l10n_parent, l10n_diffsource, hidden, division, crdate, tstamp, role, role_title, salutation, allow_mail, address_label, permissions, person_sorting, company_sorting, person_priority, company_priority, description, person, company, owner, usergroup, addresses, contacts, categories';

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['types']['1']['showitem'] = 
        'owner, usergroup, permissions, status, sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, --div--;Core Data, role, role_title, salutation, allow_mail, address_label, person_sorting, company_sorting, person_priority, company_priority, description, --div--;Relations, addresses, contacts, categories, --div--;Categories, categories';

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['company'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_link.company',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_company',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['person'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_link.person',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_person',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];




/**
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['person'] = [
    'config' => [
      'type' => 'none',  
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['company'] = [
    'config' => [
      'type' => 'passthrough',  
    ],
];
**/

// $GLOBALS['TCA']['tx_relax5core_domain_model_link']['types']['1']['showitem'] = 
//        'person, company, owner, usergroup, permissions, person_sorting, company_sorting, person_priority, company_priority, sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, --div--;Core Data X, description, division, role, role_title, salutation, allow_mail, address_label, --div--;Relations, addresses, contacts, --div--;Categories, categories';
        
/**
 * allow empty value for owner 
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['owner']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for usergroup
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['usergroup']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['addresses']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['contacts']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['addresses']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['contacts']['config']['appearance']['expandSingle'] = 1;

$GLOBALS['TCA']['tx_relax5core_domain_model_link']['columns']['categories']['config']['foreign_table_where'] = 'ORDER BY category';