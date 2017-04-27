<?php
$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_author');
return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_author',
        'label' => 'lastname',
        'label_alt' => 'firstname',
        'label_alt_force' => '1',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY lastname, firstname',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_author.png',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,name,books',
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
        'lastname' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_author.lastname',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '254',
                'eval' => 'trim, required',
            ],
        ],
        'firstname' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_author.firstname',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '254',
                'eval' => 'trim',
            ],
        ],
        'capital_letter' => [
            'config' => [
                'type' => 'input',
            ],
        ],
        'description' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_author.description',
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
                'MM' => 'tx_sfbooks_domain_model_book_author_mm',
                'MM_opposite_field' => 'author',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'hidden;;;;1-1-1, lastname, firstname,
            description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], books',
        ],
    ],
];
