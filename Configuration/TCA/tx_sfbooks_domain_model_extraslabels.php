<?php

$languageFile = 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_extraslabels');

return [
    'ctrl' => [
        'title' => $languageFile . 'tx_sfbooks_domain_model_extraslabels',
        'label' => 'label',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:sf_books/Resources/Public/Icons/tx_sfbooks_domain_model_extraslabels.png',
    ],

    'interface' => [
        'showRecordFieldList' => 'hidden,label',
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
        'label' => [
            'exclude' => 1,
            'label' => $languageFile . 'tx_sfbooks_domain_model_extraslabels.label',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'eval' => 'required',
            ],
        ],
    ],

    'types' => [
        '0' => [
            'showitem' => 'hidden, label'
        ],
    ],
];
