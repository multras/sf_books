<?php
$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_book');
return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_book',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY title',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'dividers2tabs' => true,
        'requestUpdate' => 'location1, location2',
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_book.png',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,serie,category,number,title,author,isbn,
        description,extras,cover,location1,location2,location3',
    ],

    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'title' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.title',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'eval' => 'required',
            ],
        ],
        'subtitle' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.subtitle',
            'config' => [
                'type' => 'input',
                'size' => '30',
            ],
        ],
        'author' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.author',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_sfbooks_domain_model_author',
                'foreign_table' => 'tx_sfbooks_domain_model_author',
                'MM' => 'tx_sfbooks_domain_model_book_author_mm',
                'wizards' => [
                    '_PADDING' => 2,
                    '_VERTICAL' => 1,
                    'add' => [
                        'type' => 'script',
                        'title' => 'Create new author',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_sfbooks_domain_model_author',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend',
                        ],
                        'script' => 'wizard_add.php',
                    ],
                ],
            ],
        ],
        'isbn' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.isbn',
            'config' => [
                'type' => 'input',
                'size' => '30',
            ],
        ],
        'series' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.series',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['', 0],
                ],
                'allowed' => 'tx_sfbooks_domain_model_series',
                'foreign_table' => 'tx_sfbooks_domain_model_series',
                'foreign_table_where' => 'AND tx_sfbooks_domain_model_series.pid = ###CURRENT_PID###
					ORDER BY tx_sfbooks_domain_model_series.uid',
                'MM' => 'tx_sfbooks_domain_model_book_series_mm',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
                'wizards' => [
                    '_PADDING' => 2,
                    '_VERTICAL' => 1,
                    'add' => [
                        'type' => 'script',
                        'title' => 'Create new series',
                        'script' => 'wizard_add.php',
                        'icon' => 'add.gif',
                        'params' => [
                            'table' => 'tx_sfbooks_domain_model_series',
                            'pid' => '###CURRENT_PID###',
                            'MM_opposite_field' => 'books',
                            'setValue' => 'prepend',
                        ],
                    ],
                    'edit' => [
                        'type' => 'popup',
                        'title' => 'Edit series',
                        'script' => 'wizard_edit.php',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ],
                ],
            ],
        ],
        'number' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.number',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'checkbox' => '0',
            ],
        ],
        'category' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.category',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_sfbooks_domain_model_category',
                'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_category.title',
                'MM' => 'tx_sfbooks_domain_model_book_category_mm',
                'minitems' => 0,
                'maxitems' => 100,
                'size' => 10,
                'autoSizeMax' => 20,
                'renderMode' => 'tree',
                'treeConfig' => [
                    'parentField' => 'parent',
                    'appearance' => [
                        'expandAll' => 1,
                        'showHeader' => 1,
                    ],
                ],
            ],
        ],
        'location1' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.location1',
            'config' => [
                'type' => 'select',
                'items' => [
                    [
                        $languageFile . 'tx_sfbooks_domain_model_book.location1.I.0',
                        0,
                    ],
                ],
            ],
        ],
        'location2' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.location2',
            'displayCond' => 'FIELD:location1:REQ:true',
            'config' => [
                'type' => 'select',
                'items' => [
                    [
                        $languageFile . 'tx_sfbooks_domain_model_book.location2.I.0',
                        0,
                    ],
                ],
            ],
        ],
        'location3' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.location3',
            'displayCond' => 'FIELD:location2:REQ:true',
            'config' => [
                'type' => 'select',
                'items' => [
                    [
                        $languageFile . 'tx_sfbooks_domain_model_book.location3.I.0',
                        0,
                    ],
                ],
            ],
        ],
        'description' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.description',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'wizards' => [
                    '_PADDING' => 2,
                    'RTE' => [
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php',
                    ],
                ],
            ],
        ],
        'extras' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.extras',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tx_sfbooks_domain_model_extras',
                'foreign_table' => 'tx_sfbooks_domain_model_extras',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 10,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showRemovedLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'showSynchronizationLink' => 1,
                    'enabledControls' => [
                        'info' => false,
                    ],
                ],
            ],
        ],
        'year' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.year',
            'config' => [
                'type' => 'input',
                'size' => '4',
            ],
        ],
        'cover' => [
            'label' => $languageFile . 'tx_sfbooks_domain_model_book.cover',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('cover', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the imageoverlayPalette instead of the basicoverlayPalette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.audioOverlayPalette;audioOverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.videoOverlayPalette;videoOverlayPalette,
                                --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                                --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                        ]
                    ],
                ],
            ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
            --div--;' . $languageFile . 'tx_sfbooks_domain_model_book.div_common,
                hidden;;;;1-1-1, title;;;;2-2-2, subtitle, author;;;;3-3-3,
            --div--;' . $languageFile . 'tx_sfbooks_domain_model_book.div_formal,
                isbn, series, number, category, location1;;1,
            --div--;' . $languageFile . 'tx_sfbooks_domain_model_book.div_content,
                year, description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], extras, cover',
        ],
    ],
    'palettes' => [
        '1' => ['showitem' => 'location2, location3'],
    ],
];
