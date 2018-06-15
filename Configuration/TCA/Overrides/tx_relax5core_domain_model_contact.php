<?php

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_relax5core_domain_model_contact']['columns']['person'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_contact']['columns']['link'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_contact']['columns']['company'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

$GLOBALS['TCA']['tx_relax5core_domain_model_contact']['columns']['sorting'] = [
    'config' => [
        'type' => 'passthrough',
    ],
];

/**
 * general note:
 * 
 * The language file for the FE translations will be used here. 
 */

$GLOBALS['TCA']['tx_relax5core_domain_model_address']['columns']['type']['config']['foreign_table_where'] = 'AND sys_language_uid=0 AND IF(###REC_FIELD_person###,scope=4,IF(###REC_FIELD_company###,scope=5,IF(###REC_FIELD_link###,scope=6,0)))';
