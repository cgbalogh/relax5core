<?php
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['company'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.company',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_company',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['person'] = [
    'exclude' => true,
    'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.person',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'tx_relax5core_domain_model_person',
        'minitems' => 0,
        'maxitems' => 1,
    ],
];

/**
 * adjust select values for appointment types
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['appointment_type']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.4', 4),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.5', 5),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.6', 6),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.7', 7),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.8', 8),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.9', 9),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.10', 10),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.11', 11),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.12', 12),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.13', 13),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.14', 14),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.15', 15),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.16', 16),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.17', 17),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.18', 18),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.type.19', 19),
);

/**
 * 1 Anruf                  => 1
 * 2 Fax                    => 2
 * 3 Brief                  => 3
 * 4 Besprechung            => 4
 * 5 E-Mail                 => 5
 * 6 Dokument               => 6
 * 11 Anruf ->              => 7
 * 12 Fax ->                => 9
 * 13 Brief ->              => 11
 * 14 Besprechung ->        => 13
 * 15 E-Mail ->             => 15
 * 21 Anruf <-              => 8
 * 22 Fax <-                => 10
 * 23 Brief <-              => 12
 * 24 Besprechung <-        => 14
 * 25 E-Mail <-             => 16
 * 34 Übergabe              => 19
 */

/**
 * adjust select values for appointment types
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['duration']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.1800', 1800),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.3600', 3600),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.5400', 5400),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.7200', 7200),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.9000', 9000),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.10800', 10800),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.duration.14400', 14400),
);

/**
 * adjust select values for appointment status
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['appointment_status']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_general.select_from_list', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.status.1', 1),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.status.2', 2),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.status.3', 3),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.status.4', 4),
);

/**
 * adjust select values for appointment priority
 */
$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['priority']['config']['items'] = array(
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.priority.0', 0),
    array('LLL:EXT:relax5core/Resources/Private/Language/locallang.xlf:tx_relax5core_domain_model_appointment.priority.1', 1),
);

$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['crdate'] = [
    'label' => 'Creation Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_appointment']['columns']['tstamp'] = [
    'label' => 'Modification Date',
    'config' => [
        'type' => 'input',
        'readOnly' => 1,
        'eval' => 'date',
        'size' => 10,
    ],
];
