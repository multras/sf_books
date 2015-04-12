<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_extraslabels');
return Array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extraslabels',
		'label' => 'label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sf_books') .
			'Resources/Public/Icons/tx_sfbooks_domain_model_extraslabels.png',
	),

	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, label',
	),

	'interface' => Array(
		'showRecordFieldList' => 'hidden,label'
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
		'label' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extraslabels.label',
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
