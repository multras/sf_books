<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sfbooks_domain_model_extras'] = Array(
	'ctrl' => $GLOBALS['TCA']['tx_sfbooks_domain_model_extras']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,label,content'
	),
	'feInterface' => $GLOBALS['TCA']['tx_sfbooks_domain_model_extras']['feInterface'],
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
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extras.label',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tx_sfbooks_domain_model_extraslabels',
				'foreign_table_where' => 'ORDER BY tx_sfbooks_domain_model_extraslabels.uid',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'content' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extras.content',
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

?>