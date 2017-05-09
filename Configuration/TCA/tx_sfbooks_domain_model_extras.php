<?php

$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_extras');

return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_extras',
        'label' => 'content',
        'label_alt' => 'label',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'type' => 'type',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_extras.png',
        'searchFields' => 'uid,label,content',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,label,content',
    ],

    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => '0',
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => $languageFile . 'tx_sfbooks_domain_model_extras.type',
            'config' => [
                'type' => 'select',
                'items' => [
                    [
                        $languageFile . 'tx_sfbooks_domain_model_extras.type.I.0',
                        0,
                    ],
                    [
                        $languageFile . 'tx_sfbooks_domain_model_extras.type.I.1',
                        1,
                    ],
                ],
            ],
        ],
        'label' => [
            'exclude' => 0,
            'label' => $languageFile . 'tx_sfbooks_domain_model_extras.label',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_sfbooks_domain_model_extraslabels',
                'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_extraslabels.uid',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'content' => [
            'exclude' => 0,
            'label' => $languageFile . 'tx_sfbooks_domain_model_extras.content',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            ],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => 'hidden, type, label, content'
        ],
        '1' => [
            'showitem' => 'hidden, type, label, content',
            'columnsOverrides' => [
                'content' => [
                    'config' => [
                        'enableRichtext' => true,
                        'richtextConfiguration' => 'default'
                    ]
                ]
            ]
        ],
    ],
];
