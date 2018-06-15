<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address',
        'label' => 'address',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
        ],
        'searchFields' => 'address,number,number_additions,zip,city,state,country,lat,lon,geo_only,description,allow_mail,additional_info,verified,permissions,zoom,map_type,type',
        'iconfile' => 'EXT:relax5core/Resources/Public/Icons/tx_relax5core_domain_model_address.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, address, number, number_additions, zip, city, state, country, lat, lon, geo_only, description, allow_mail, additional_info, verified, permissions, zoom, map_type, type',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, address, number, number_additions, zip, city, state, country, lat, lon, geo_only, description, allow_mail, additional_info, verified, permissions, zoom, map_type, type'],
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
                'foreign_table' => 'tx_relax5core_domain_model_address',
                'foreign_table_where' => 'AND tx_relax5core_domain_model_address.pid=###CURRENT_PID### AND tx_relax5core_domain_model_address.sys_language_uid IN (-1,0)',
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

        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.number',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'number_additions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.number_additions',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'state' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.state',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'country' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.country',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'lat' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.lat',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'lon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.lon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'geo_only' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.geo_only',
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
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'allow_mail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.allow_mail',
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
        'additional_info' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.additional_info',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'verified' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.verified',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'datetime',
                'default' => time()
            ],
        ],
        'permissions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.permissions',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'zoom' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.zoom',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'map_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.map_type',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_address.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5core_domain_model_type',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
        'person' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'company' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'link' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
