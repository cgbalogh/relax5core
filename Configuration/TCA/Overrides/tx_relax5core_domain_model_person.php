<?php

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

/**
 * general note:
 * 
 * The language file for the FE translations will be used here. 
 */


/**
 * adjust select values for gender
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['gender']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.gender.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.gender.2', 2),
);

/**
 * adjust select values for marital_state
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['marital_state']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_person.marital_state.6', 6),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['tstamp'] = [
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
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['sourcedetail']['config']['foreign_table_where'] = 'AND ###REC_FIELD_source### = source';

/**
 * adjust field for sorting of links
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['links']['config']['foreign_sortby'] = 'person_sorting';

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['ctrl']['label'] = 'last_name';
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['ctrl']['label_alt'] = 'first_name, uid';
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['ctrl']['label_alt_force'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['ctrl']['iconfile'] = 'EXT:core/Resources/Public/Icons/T3Icons/status/status-user-frontend.svg';
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['ctrl']['searchFields'] = 'last_name,middle_name,first_name,title,gender,date_of_birth,marital_state,image,salutation,comments,allow_mail,address_label,permissions,status,owner,usergroup,source_category,source,relations,addresses,documents,contacts,categories';

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['interface']['showRecordFieldList'] = 
        'sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, last_name, middle_name, first_name, title, gender, date_of_birth, marital_state, image, salutation, comments, allow_mail, address_label, permissions, status, owner, usergroup, source_category, source, relations, addresses, documents, contacts, links, categories';

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['types']['1']['showitem'] = 
        'owner, usergroup, permissions, status, source, sourcedetail, sys_language_uid, l10n_parent, l10n_diffsource, crdate, tstamp, --div--;Core Data, last_name, middle_name, first_name, title, gender, date_of_birth, marital_state, image, salutation, comments, allow_mail, address_label, --div--;Relations, addresses, contacts, links, documents, --div--;Categories, categories';

// $GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['addresses']['config']['type'] = 'select';
// $GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['contacts']['config']['type'] = 'select';

// , relations, addresses, documents, contacts


/**
 * adjust select values for status
 */
// $GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['status']['config']['items'] = array(
//     array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
// );

/**
 * allow empty value for owner 
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['owner']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for usergroup
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['usergroup']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for source
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['source']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

/**
 * allow empty value for sourcedetail
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['sourcedetail']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['addresses']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['contacts']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['documents']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['appointments']['config']['appearance']['collapseAll'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['links']['config']['appearance']['collapseAll'] = 1;

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['addresses']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['contacts']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['documents']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['appointments']['config']['appearance']['expandSingle'] = 1;
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['links']['config']['appearance']['expandSingle'] = 1;

/*
$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['categories'] = 
    [
        'exclude' => true,
        'config' => [
            'type' => 'select',
            'foreign_table' => 'sys_category',
            'foreign_sortby' => 'title',
            'multiple' => 1,
            'MM' => 'sys_category_record_mm',
            'MM_table_where' => 'ORDER BY title ASC',
            'size' => 10,
            'autoSizeMax' => 30,
            'maxitems' => 9999,
            'multiple' => 0,
        ],

    ];
*/

$GLOBALS['TCA']['tx_relax5core_domain_model_person']['columns']['categories']['config']['foreign_table_where'] = 'ORDER BY category';
