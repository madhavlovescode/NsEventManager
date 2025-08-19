<?php
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Resource\Tca\FileFieldTcaConfig;
use \TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\TcaConfigurationUtility;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event',
        'label' => 'title',
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
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,description,organizer_name,mode',
        'iconfile' => 'EXT:ns_event_manager/Resources/Public/Icons/tx_nseventmanager_domain_model_event.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, organizer_name, mode, image, checkbox, location, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nseventmanager_domain_model_event',
                'foreign_table_where' => 'AND {#tx_nseventmanager_domain_model_event}.{#pid}=###CURRENT_PID### AND {#tx_nseventmanager_domain_model_event}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.title',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.description',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.description.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'organizer_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.organizer_name',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.organizer_name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'mode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'mode22' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode22',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode22.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'location' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.location',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.location.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_nseventmanager_domain_model_location',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],

        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image',
            'config' => [
                'type' => 'file',
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
                ],
                'allowed' => 'common-media-types',
                'maxitems' => 1,
            ],
        ],

        'checkbox' => [
        'exclude' => 1,
        'label' => 'checkbox_2 one checkbox with label',
        'config' => [
            'type' => 'check',
            'items' => [
                // label, value
                ['enable', '1'],
            ],
        ]
        ],

// 'image' => [
//     'exclude' => true,
//     'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image',
//     'config' => FileFieldTcaConfig::get(
//         'image',
//         [
//             'appearance' => [
//                 'createNewRelationLinkTitle' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:sys_file_reference.addFileReference',
//                 'fileUploadAllowed' => true,
//                 'enabledControls' => [
//                     'info' => true,
//                     'new' => false,
//                     'dragdrop' => true,
//                     'sort' => true,
//                     'hide' => true,
//                     'delete' => true,
//                 ],
//             ],
//             'behaviour' => [
//                 'allowLanguageSynchronization' => true,
//             ],
//             'filter' => [
//                 [
//                     'userFunc' => \TYPO3\CMS\Core\Resource\Filter\FileExtensionFilter::class . '->filterInlineChildren',
//                     'parameters' => [
//                         'allowedFileExtensions' => 'jpg,jpeg,png,gif,svg',
//                     ],
//                 ],
//             ],
//             'maxitems' => 1,
//         ],
//         'jpg,jpeg,png,gif,svg'
//     ),
// ],

//  'image' => [
//             'exclude' => true,
//             'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.location',
//             'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image.description',
            
//             'config' => [
//             'type' => 'file',
//         'maxitems' => 1,
//         'allowed' => 'common-image-types',
//                 [
//                     'appearance' => [
//                         'createNewRelationLin   kTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
//                     ],
//                     'overrideChildTca' => [
//                         'types' => [
//                             '0' => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
//                                 'showitem' => '
//                                 --palette--;;imageoverlayPalette,
//                                 --palette--;;filePalette',
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
//                                  'showitem' => '
//                                  --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                  --palette--;;filePalette'
//                              ],
//                              \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
//                                  'showitem' => '
//                                  --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                  --palette--;;filePalette'
//                              ],
//                              \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
//                                  'showitem' => '
//                                  --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                  --palette--;;filePalette'
//                              ]
//                          ],
//                      ],
//                      'foreign_match_fields' => [
//                          'fieldname' => 'image',
//                          'tablenames' => 'tx_nseventmanager_domain_model_event',
//                          'table_local' => 'sys_file'
//                      ],
//                      'maxitems' => 1
//                  ],
                 
            
            
//          ],
//     ],
    
        //   'image' => [
        //     'exclude' => true,
        //     'label' => 'LLL:EXT:ns_t3dev/Resources/Private/Language/locallang_db.xlf:tx_nst3dev_domain_model_productarea.image',
        //     'config' => \TYPO3\CMS\Core\Utility\TcaConfigurationUtility::getFileFieldTcaConfiguration(
        //         'image',
        //         [
        //             'appearance' => [
        //                 'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
        //             ],
        //             'foreign_types' => [
        //                 '0' => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ],
        //                 \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ],
        //                 \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ],
        //                 \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ],
        //                 \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ],
        //                 \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
        //                     'showitem' => '
        //                     --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
        //                     --palette--;;filePalette'
        //                 ]
        //             ],
        //             'foreign_match_fields' => [
        //                 'fieldname' => 'image',
        //                 'tablenames' => 'tx_nseventmanager_domain_model_event',
        //                 'table_local' => 'sys_file',
        //             ],
        //             'maxitems' => 1
        //         ],
        //         $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        //     ),

        // ],

//         'image' => [
//     'exclude' => true,
//     'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image',
//     'config' => [
//         'type' => 'inline',
//         'foreign_table' => 'sys_file_reference',
//         'foreign_field' => 'uid_foreign',
//         'foreign_table_field' => 'tablenames',
//         'foreign_match_fields' => [
//             'fieldname' => 'image',
//         ],
//         'foreign_label' => 'uid_local',
//         'foreign_sortby' => 'sorting_foreign',
//         'appearance' => [
//             'createNewRelationLinkTitle' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:sys_file_reference.addFileReference',
//             'fileUploadAllowed' => true,
//             'enabledControls' => [
//                 'info' => true,
//                 'new' => false,
//                 'dragdrop' => true,
//                 'sort' => true,
//                 'hide' => true,
//                 'delete' => true,
//             ],
//         ],
//         'behaviour' => [
//             'allowLanguageSynchronization' => true
//         ],
//         'filter' => [
//             [
//                 'userFunc' => \TYPO3\CMS\Core\Resource\Filter\FileExtensionFilter::class . '->filterInlineChildren',
//                 'parameters' => [
//                     'allowedFileExtensions' => 'jpg,jpeg,png,gif,svg'
//                 ],
//             ],
//         ],
//         'maxitems' => 1,
//     ],
// ],

//    'file' => [
//     'exclude' => true,
//     'label' => '',
//     'description' => '',
//     'config' => [
//         'type' => 'inline',
//         'foreign_table' => 'sys_file_reference',
//         'foreign_field' => 'uid_foreign',
//         'foreign_sortby' => 'sorting_foreign',
//         'foreign_table_field' => 'tablenames',
//         'foreign_match_fields' => [
//             'fieldname' => 'file',
//         ],
//         'foreign_label' => 'uid_local',
//         'foreign_selector' => 'uid_local',
//         'foreign_selector_fieldTcaOverride' => [
//             'config' => [
//                 'appearance' => [
//                     'elementBrowserAllowed' => 'pdf',
//                     'elementBrowserType' => 'file'
//                 ],
//             ],
//         ],
//         'overrideChildTca' => [
//             'types' => [
//                 '0' => [
//                     'showitem' => '
//                         --palette--;;imageoverlayPalette,
//                         --palette--;;filePalette'
//                 ],
//             ],
//         ],
//         'appearance' => [
//             'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference',
//             'fileUploadAllowed' => true,
//         ],
//         'filter' => [
//             'allowedFileExtensions' => 'image'
//         ],
//         'maxitems' => 1,
//     ],
// ],

//  'image' => [
//             'exclude' => true,
//             'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image',
//             'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image.description',
//             'config' =>
            
//                 'image',    
//                 [
//                     'overrideChildTca' => [
//                         'types' => [
//                             '0' => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
//                                 'showitem' => '
//                                 --palette--;;imageoverlayPalette,
//                                 --palette--;;filePalette',
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ],
//                             \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
//                                 'showitem' => '
//                                 --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                                 --palette--;;filePalette'
//                             ]
//                         ],
//                     ],
//                     'foreign_match_fields' => [
//                         'fieldname' => 'image',
//                         'tablenames' => 'tx_nseventmanager_domain_model_event',
//                         'table_local' => 'sys_file',
//                     ],
//                     'maxitems' => 1
//                 ]
    
            
//         ],





],
];
