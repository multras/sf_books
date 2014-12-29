<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sfbooks_domain_model_author'] = Array(
	'ctrl' => $GLOBALS['TCA']['tx_sfbooks_domain_model_author']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,name,books'
	),
	'feInterface' => $GLOBALS['TCA']['tx_sfbooks_domain_model_author']['feInterface'],
	'columns' => Array(
		'hidden' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'lastname' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author.lastname',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '254',
				'eval' => 'trim, required',
			)
		),
		'firstname' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author.firstname',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '254',
				'eval' => 'trim',
			)
		),
		'capital_letter' => Array(
			'config' => Array(
				'type' => 'input',
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author.description',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => Array(
					'_PADDING' => 2,
					'RTE' => Array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php',
					),
				),
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
				'MM' => 'tx_sfbooks_domain_model_book_author_mm',
				'MM_opposite_field' => 'author',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;;;1-1-1, lastname, firstname, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], books'),
	),
);

?>