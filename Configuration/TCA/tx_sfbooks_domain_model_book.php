<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_book');
return Array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dividers2tabs' => TRUE,
		'requestUpdate' => 'location1, location2',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sf_books') .
			'Resources/Public/Icons/tx_sfbooks_domain_model_book.png',
	),

	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, serie, category, number, title, author, isbn, description, extras, cover',
	),

	'interface' => Array(
		'showRecordFieldList' => 'hidden,serie,category,number,title,author,isbn,description,extras,cover,location1,location2,location3'
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
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'subtitle' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.subtitle',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'author' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.author',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sfbooks_domain_model_author',
				'foreign_table' => 'tx_sfbooks_domain_model_author',
				'MM' => 'tx_sfbooks_domain_model_book_author_mm',
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new author',
						'icon' => 'add.gif',
						'params' => Array(
							'table' => 'tx_sfbooks_domain_model_author',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
				),
			)
		),
		'isbn' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.isbn',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'series' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.series',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('', 0),
				),
				'allowed' => 'tx_sfbooks_domain_model_series',
				'foreign_table' => 'tx_sfbooks_domain_model_series',
				'foreign_table_where' => 'AND tx_sfbooks_domain_model_series.pid=###CURRENT_PID###
					ORDER BY tx_sfbooks_domain_model_series.uid',
				'MM' => 'tx_sfbooks_domain_model_book_series_mm',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new series',
						'script' => 'wizard_add.php',
						'icon' => 'add.gif',
						'params' => Array(
							'table' => 'tx_sfbooks_domain_model_series',
							'pid' => '###CURRENT_PID###',
							'MM_opposite_field' => 'books',
							'setValue' => 'prepend',
						),
					),
					'edit' => Array(
						'type' => 'popup',
						'title' => 'Edit series',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
		'number' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.number',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'checkbox' => '0',
			)
		),
		'category' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.category',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_domain_model_category',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_category.title',
				'MM' => 'tx_sfbooks_domain_model_book_category_mm',
				'minitems' => 0,
				'maxitems' => 100,
				'size' => 10,
				'autoSizeMax' => 20,
				'renderMode' => 'tree',
				'treeConfig' => array(
					'parentField' => 'parent',
					'appearance' => array(
						'expandAll' => 1,
						'showHeader' => 1,
					),
				),
			)
		),
		'location1' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location1',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location1.I.0', 0),
				)
			)
		),
		'location2' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location2',
			'displayCond' => 'FIELD:location1:REQ:true',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location2.I.0', 0),
				)
			)
		),
		'location3' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location3',
			'displayCond' => 'FIELD:location2:REQ:true',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.location3.I.0', 0),
				)
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.description',
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
		'extras' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' =>  'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.extras',
			'config' => array(
				'type' => 'inline',
				'allowed' => 'tx_sfbooks_domain_model_extras',
				'foreign_table' => 'tx_sfbooks_domain_model_extras',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 10,
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1,
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showRemovedLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1,
					'showSynchronizationLink' => 1,
					'enabledControls' => array(
						'info' => FALSE,
					)
				)
			)
		),
		'year' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.year',
			'config' => Array(
				'type' => 'input',
				'size' => '4',
			)
		),
		'cover' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.cover',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_sfbooks',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => '
			--div--;LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.div_common,
				hidden;;;;1-1-1, title;;;;2-2-2, subtitle, author;;;;3-3-3,
			--div--;LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.div_formal,
				isbn, series, number, category, location1;;1,
			--div--;LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_book.div_content,
				year, description;;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], extras, cover')
	),
	'palettes' => Array(
		'1' => Array('showitem' => 'location2, location3')
	)
);
