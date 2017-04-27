<?php
$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_series');
return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_series',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY title',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_series.png',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,title,infos,description',
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
            'label' => $languageFile . 'tx_sfbooks_domain_model_series.title',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '254',
                'eval' => 'required',
            ],
        ],
        'info' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_series.info',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            ],
        ],
        'capital_letter' => [
            'config' => [
                'type' => 'input',
            ],
        ],
        'description' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_series.description',
            'config' => [
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
            ],
        ],
        'books' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_author.books',
            'config' => [
                'type' => 'select',
                'multiple' => true,
                'size' => 5,
                'autoSizeMax' => 10,

                'foreign_table' => 'tx_sfbooks_domain_model_book',
                'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_book.title',
                'MM' => 'tx_sfbooks_domain_model_book_series_mm',
                'MM_opposite_field' => 'series',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, info;;;;3-3-3,
            description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], books',
        ],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
];
