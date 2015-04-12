<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_series');
return Array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_series',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sf_books') .
			'Resources/Public/Icons/tx_sfbooks_domain_model_series.png',
	),

	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, title, infos, description',
	),

	'interface' => Array(
		'showRecordFieldList' => 'hidden,title,infos,description'
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
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, info;;;;3-3-3,
			description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], books')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);
