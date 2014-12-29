<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sfbooks_domain_model_extras_labels'] = Array(
	'ctrl' => $GLOBALS['TCA']['tx_sfbooks_domain_model_extras_labels']['ctrl'],
	'interface' => Array(
		'showRecordFieldList' => 'hidden,label'
	),
	'feInterface' => $GLOBALS['TCA']['tx_sfbooks_domain_model_extras_labels']['feInterface'],
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
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extras_labels.label',
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