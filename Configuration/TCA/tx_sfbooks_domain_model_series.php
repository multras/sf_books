<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sfbooks_domain_model_series'] = Array(
	'ctrl' => $GLOBALS['TCA']['tx_sfbooks_domain_model_series']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,title,infos,description'
	),
	'feInterface' => $GLOBALS['TCA']['tx_sfbooks_domain_model_series']['feInterface'],
	'columns' => Array(
		'hidden' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'title' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_series.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '254',
				'eval' => 'required',
			)
		),
		'info' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_series.info',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'capital_letter' => Array(
			'config' => Array(
				'type' => 'input',
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_series.description',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'books' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author.books',
			'config' => Array(
				'type' => 'select',
				'multiple' => TRUE,
				'size' => 5,
				'autoSizeMax' => 10,

				'foreign_table' => 'tx_sfbooks_domain_model_book',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_book.title',
				'MM' => 'tx_sfbooks_domain_model_book_series_mm',
				'MM_opposite_field' => 'series',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, info;;;;3-3-3, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], books')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);

?>