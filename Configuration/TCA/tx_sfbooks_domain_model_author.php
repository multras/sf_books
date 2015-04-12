<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_author');
return Array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author',
		'label' => 'lastname',
		'label_alt' => 'firstname',
		'label_alt_force' => '1',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY lastname, firstname',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sf_books') .
			'Resources/Public/Icons/tx_sfbooks_domain_model_author.png',
	),

	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, name, books',
	),

	'interface' => Array(
		'showRecordFieldList' => 'hidden,name,books'
	),

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
		'0' => Array('showitem' => 'hidden;;;;1-1-1, lastname, firstname,
			description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], books'
		),
	),
);
