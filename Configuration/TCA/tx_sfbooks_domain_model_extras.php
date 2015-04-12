<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sfbooks_domain_model_extras');
return Array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_extras',
		'label' => 'content',
		'label_alt' => 'label',
		'label_alt_force' => TRUE,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sf_books') .
			'Resources/Public/Icons/tx_sfbooks_domain_model_extras.png',
	),

	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, label, content',
	),

	'interface' => Array(
		'showRecordFieldList' => 'hidden,label,content'
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
