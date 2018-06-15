<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue',
        'label' => 'country_code',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'country_code,zip,city,area_code,state,verified',
        'iconfile' => 'EXT:relax5core/Resources/Public/Icons/tx_relax5core_domain_model_zipcatalogue.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, zip, city, area_code, state, verified',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, zip, city, area_code, state, verified'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_relax5core_domain_model_zipcatalogue',
                'foreign_table_where' => 'AND tx_relax5core_domain_model_zipcatalogue.pid=###CURRENT_PID### AND tx_relax5core_domain_model_zipcatalogue.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],

        'country_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.country_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'area_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.area_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'state' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.state',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'verified' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_zipcatalogue.verified',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
    
    ],
];
