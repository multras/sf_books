<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sfbooks_domain_model_category'] = Array(
	'ctrl' => $GLOBALS['TCA']['tx_sfbooks_domain_model_category']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,type'
	),
	'feInterface' => $GLOBALS['TCA']['tx_sfbooks_domain_model_category']['feInterface'],
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
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_category.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '100',
				'eval' => 'required',
			)
		),
		'parent' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_category.parent',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_domain_model_category',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_category.title',
				'size' => 7,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_category.parent.I.0', 0),
				),
				'renderMode' => 'tree',
				'treeConfig' => array(
					'parentField' => 'parent',
				),
			)
		),
		'books' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author.books',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sfbooks_domain_model_book',
				'foreign_table' => 'tx_sfbooks_domain_model_book',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_book.title',
				'MM' => 'tx_sfbooks_domain_model_book_category_mm',
				'MM_opposite_field' => 'category',
				'size' => 7,
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, title, parent, books')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);

?>