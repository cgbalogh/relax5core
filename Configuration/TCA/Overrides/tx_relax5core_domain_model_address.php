<?php
$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['person'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['link'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['company'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['sorting'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['type']['config']['foreign_table_where'] = 'AND sys_language_uid=0 AND IF(###REC_FIELD_person###,scope=1,IF(###REC_FIELD_company###,scope=2,IF(###REC_FIELD_link###,scope=3,0)))';

// unset($GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['lat']['config']['eval']);
// $GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['lon']['config']['eval'] = '';

