<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation',
        'label' => 'relation_id',
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
        'searchFields' => 'relation_id,type,direction,description,print,share,target_person,target_company',
        'iconfile' => 'EXT:relax5core/Resources/Public/Icons/tx_relax5core_domain_model_relation.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, relation_id, type, direction, description, print, share, target_person, target_company',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, relation_id, type, direction, description, print, share, target_person, target_company'],
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
                'foreign_table' => 'tx_relax5core_domain_model_relation',
                'foreign_table_where' => 'AND tx_relax5core_domain_model_relation.pid=###CURRENT_PID### AND tx_relax5core_domain_model_relation.sys_language_uid IN (-1,0)',
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

        'relation_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.relation_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.type',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'direction' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.direction',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'print' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.print',
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
        'share' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.share',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'target_person' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.target_person',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5core_domain_model_person',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'target_company' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_relation.target_company',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_relax5core_domain_model_company',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
    ],
];
