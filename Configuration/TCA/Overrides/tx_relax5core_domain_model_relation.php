<?php

/**
 * 
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_relation']['columns']['sorting'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];


$GLOBALS['TCA']['tx_relax5core_domain_model_relation']['columns']['company'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.company',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_company',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_relation']['columns']['person'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.person',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_person',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];

/**
 * adjust select values for types
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_relation']['columns']['type']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),

    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.1.1', 1, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.1.2', 1, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.1.3', 1, 3),
    
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.2.1', 2, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.2.2', 2, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.2.3', 2, 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-2.1', -2, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-2.2', -2, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-2.3', -2, 3),

    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.3.1', 3, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.3.2', 3, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.3.3', 3, 3),

    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.4.1', 4, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.4.2', 4, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.4.3', 4, 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-4.1', -4, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-4.2', -4, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.-4.3', -4, 3),
    
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.5.1', 5, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.5.2', 5, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.5.3', 5, 3),

    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.6.1', 6, 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.6.2', 6, 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_relation.type.6.3', 6, 3),
);
