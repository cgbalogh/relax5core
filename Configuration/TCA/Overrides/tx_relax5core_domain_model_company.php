<?php

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/**
 * general note:
 * 
 * The language file for the FE translations will be used here. 
 */

/**
 * adjust select values for legal_form
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['legal_form']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.6', 6),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.7', 7),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.8', 8),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.9', 9),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.10', 10),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.11', 11),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.12', 12),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.13', 13),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.14', 14),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.15', 15),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.legal_form.16', 16),
);

/**
 * adjust select values for industry
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['industry']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.6', 6),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_company.industry.7', 7),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['tstamp'] = [
    'label' => 'Modification Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

/**
 * adjust select values for source
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['sourcedetail']['config']['foreign_table_where'] = 'AND ###REC_FIELD_source### = source';

/**
 * adjust field for srting of links
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['links']['config']['foreign_sortby'] = 'company_sorting';


$GLOBALS['TCA']['tx_relax5core_domain_model_company']['ctrl']['label'] = 'name';
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['ctrl']['label_alt'] = 'short_name, uid';
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['ctrl']['label_alt_force'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['ctrl']['iconfile'] = 'EXT:core/Resources/Public/Icons/T3Icons/content/content-briefcase.svg';

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['interface']['showRecordFieldList'] = 
        'sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, name, short_name, legal_form, industry, employees, reg_id, reg_authority, vat_id, comments, allow_mail, address_label, permissions, status, owner, usergroup, source_category, source, categories, relations, addresses, documents, contacts';

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['types']['1']['showitem'] = 
        'owner, usergroup, permissions, status, source_category, source, sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, --div--;Core Data, name, short_name, legal_form, industry, employees, reg_id, reg_authority, vat_id, comments, allow_mail, address_label, --div--;Relations, addresses, contacts, documents, --div--;Categories, categories';

/**
 * adjust select values for status
 */
// $GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['status']['config']['items'] = array(
//     array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
// );

/**
 * allow empty value for owner 
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['owner']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for usergroup
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['usergroup']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for source_category
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['source']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for source
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['sourcedetail']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['addresses']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['contacts']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['documents']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['appointments']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['addresses']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['contacts']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['documents']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['appointments']['config']['appearance']['expandSingle'] = 1;

$GLOBALS['TCA']['tx_relax5core_domain_model_company']['columns']['categories']['config']['foreign_table_where'] = 'ORDER BY category';