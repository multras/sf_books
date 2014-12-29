<?php
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

$TCA['tx_sfbooks_books'] = Array(
	'ctrl' => $TCA['tx_sfbooks_books']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,serie,category,number,title,author,isbn,description,extras,cover,location1,location2,location3'
	),
	'feInterface' => $TCA['tx_sfbooks_books']['feInterface'],
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
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'subtitle' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.subtitle',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'author' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.author',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'isbn' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.isbn',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'serie' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.serie',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('', 0),
				),
				'foreign_table' => 'tx_sfbooks_series',
				'foreign_table_where' => 'AND tx_sfbooks_series.pid=###CURRENT_PID### ORDER BY tx_sfbooks_series.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_sfbooks_series',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
					'edit' => Array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
		'number' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.number',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'checkbox' => '0',
			)
		),
		'category' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.category',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_category',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_category.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'location1' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location1',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location1.I.0', 0),
				)
			)
		),
		'location2' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location2',
			'displayCond' => 'FIELD:location1:REQ:true',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location2.I.0', 0),
				)
			)
		),
		'location3' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location3',
			'displayCond' => 'FIELD:location2:REQ:true',
			'config' => Array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.location3.I.0', 0),
				)
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.description',
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
		'extras' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.extras',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_extras',
				'foreign_table_where' => 'AND tx_sfbooks_extras.pid=###CURRENT_PID### ORDER BY tx_sfbooks_extras.uid',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 5,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new record',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_sfbooks_extras',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
					'edit' => Array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'popup_onlyOpenIfSelected' => 1,
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				),
			)
		),
		'cover' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books.cover',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 150,
				'uploadfolder' => 'uploads/tx_sfbooks',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;;;1-1-1, title;;;;2-2-2, subtitle, author;;;;3-3-3, isbn, serie, number, category, location1;;1, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], extras, cover')
	),
	'palettes' => Array(
		'1' => Array('showitem' => 'location2, location3')
	)
);



$TCA['tx_sfbooks_series'] = Array(
	'ctrl' => $TCA['tx_sfbooks_series']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,title,infos,description'
	),
	'feInterface' => $TCA['tx_sfbooks_series']['feInterface'],
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
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_series.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '254',
				'eval' => 'required',
			)
		),
		'infos' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_series.infos',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_series.description',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, infos;;;;3-3-3, description;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts]')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_sfbooks_category'] = Array(
	'ctrl' => $TCA['tx_sfbooks_category']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,type'
	),
	'feInterface' => $TCA['tx_sfbooks_category']['feInterface'],
	'columns' => Array(
		'hidden' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'type' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_category.type',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '100',
				'eval' => 'required',
			)
		),
		'parent' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_category.parent',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'max' => '1',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, type, parent')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_sfbooks_extras'] = Array(
	'ctrl' => $TCA['tx_sfbooks_extras']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,label,content'
	),
	'feInterface' => $TCA['tx_sfbooks_extras']['feInterface'],
	'columns' => Array(
		'hidden' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'label' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_extras.label',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_extras_labels',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_extras_labels.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'content' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_extras.content',
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, label, content')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);



$TCA['tx_sfbooks_extras_labels'] = Array(
	'ctrl' => $TCA['tx_sfbooks_extras_labels']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,label'
	),
	'feInterface' => $TCA['tx_sfbooks_extras_labels']['feInterface'],
	'columns' => Array(
		'hidden' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'label' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_extras_labels.label',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
	),
	'types' => Array(
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, label')
	),
	'palettes' => Array(
		'1' => Array('showitem' => '')
	)
);

?>