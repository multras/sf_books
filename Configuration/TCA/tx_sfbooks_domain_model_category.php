<?php

$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_category');

return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_category',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_category.png',
        'searchFields' => 'uid,title',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,type',
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
        'title' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_category.title',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '100',
                'eval' => 'required',
            ],
        ],
        'parent' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_category.parent',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_sfbooks_domain_model_category',
                'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_category.title',
                'size' => 7,
                'minitems' => 0,
                'maxitems' => 1,
                'items' => [
                    [
                        $languageFile . 'tx_sfbooks_domain_model_category.parent.I.0',
                        0,
                    ],
                ],
                'renderMode' => 'tree',
                'treeConfig' => [
                    'parentField' => 'parent',
                ],
            ],
        ],
        'books' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_author.books',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_sfbooks_domain_model_book',
                'foreign_table' => 'tx_sfbooks_domain_model_book',
                'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_book.title',
                'MM' => 'tx_sfbooks_domain_model_book_category_mm',
                'MM_opposite_field' => 'category',
                'size' => 7,
            ],
        ],
    ],

    'types' => [
        '0' => ['showitem' => 'hidden, title, parent, books'],
    ],
];
