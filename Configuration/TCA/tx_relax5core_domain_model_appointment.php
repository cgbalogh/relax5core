<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment',
        'label' => 'date',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
        ],
        'searchFields' => 'date,subject,duration,details,appointment_type,appointment_status,priority,msolid,permissions,name,address,contact,result,next_action,contact_state,task,postponed_counter,subject_orig,done,owner,usergroup,creator,attendees',
        'iconfile' => 'EXT:relax5core/Resources/Public/Icons/tx_relax5core_domain_model_appointment.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, date, subject, duration, details, appointment_type, appointment_status, priority, msolid, permissions, name, address, contact, result, next_action, contact_state, task, postponed_counter, subject_orig, done, owner, usergroup, creator, attendees',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, date, subject, duration, details, appointment_type, appointment_status, priority, msolid, permissions, name, address, contact, result, next_action, contact_state, task, postponed_counter, subject_orig, done, owner, usergroup, creator, attendees'],
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
                'foreign_table' => 'tx_relax5core_domain_model_appointment',
                'foreign_table_where' => 'AND tx_relax5core_domain_model_appointment.pid=###CURRENT_PID### AND tx_relax5core_domain_model_appointment.sys_language_uid IN (-1,0)',
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

        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.date',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'datetime,required',
                'default' => time()
            ],
        ],
        'subject' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.subject',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'duration' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.duration',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'details' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.details',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'appointment_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.appointment_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'appointment_status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.appointment_status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'priority' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.priority',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'msolid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.msolid',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'permissions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.permissions',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'contact' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.contact',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'result' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.result',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'next_action' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.next_action',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'contact_state' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.contact_state',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'task' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.task',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'postponed_counter' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.postponed_counter',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'subject_orig' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.subject_orig',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'done' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.done',
            'config' => [
                'type' => 'input',
                'size' => 10,
                'eval' => 'datetime',
                'default' => time()
            ],
        ],
        'owner' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.owner',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'usergroup' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.usergroup',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_groups',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'creator' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.creator',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'attendees' => [
            'exclude' => true,
            'label' => 'LLL:EXT:relax5core/Resources/Private/Language/locallang_db.xlf:tx_relax5core_domain_model_appointment.attendees',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'foreign_table' => 'fe_users',
                'MM' => 'tx_relax5core_appointment_attendees_owner_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => [
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => [
                        'module' => [
                            'name' => 'wizard_edit',
                        ],
                        'type' => 'popup',
                        'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ],
                    'add' => [
                        'module' => [
                            'name' => 'wizard_add',
                        ],
                        'type' => 'script',
                        'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                        'params' => [
                            'table' => 'fe_users',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ],
                    ],
                ],
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
    ],
];
