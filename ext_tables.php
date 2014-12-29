<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}



t3lib_div::loadTCA('tt_content');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sfbooks_book'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sfbooks_book'] = 'layout,select_key';
t3lib_extMgm::addPiFlexFormValue('sfbooks_book', 'FILE:EXT:sf_books/Configuration/FlexForms/book.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Book',
	'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_book'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sfbooks_author'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sfbooks_author'] = 'layout,select_key';
t3lib_extMgm::addPiFlexFormValue('sfbooks_author', 'FILE:EXT:sf_books/Configuration/FlexForms/author.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Author',
	'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_author'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sfbooks_category'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sfbooks_category'] = 'layout,select_key';
t3lib_extMgm::addPiFlexFormValue('sfbooks_category', 'FILE:EXT:sf_books/Configuration/FlexForms/category.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Category',
	'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_category'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sfbooks_series'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sfbooks_series'] = 'layout,select_key';
t3lib_extMgm::addPiFlexFormValue('sfbooks_series', 'FILE:EXT:sf_books/Configuration/FlexForms/series.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Series',
	'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_series'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sfbooks_search'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sfbooks_search'] = 'layout,select_key';
t3lib_extMgm::addPiFlexFormValue('sfbooks_search', 'FILE:EXT:sf_books/Configuration/FlexForms/search.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Search',
	'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tt_content.list_type_search'
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_book');
$GLOBALS['TCA']['tx_sfbooks_domain_model_book'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_book.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_book.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, serie, category, number, title, author, isbn, description, extras, cover',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_author');
$GLOBALS['TCA']['tx_sfbooks_domain_model_author'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_author',
		'label' => 'lastname',
		'label_alt' => 'firstname',
		'label_alt_force' => '1',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY lastname, firstname',
		'delete'			=> 'deleted',
		'enablecolumns'		=> array(
			'disabled'		=> 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_author.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_author.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, name, books',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_category');
$GLOBALS['TCA']['tx_sfbooks_domain_model_category'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:sf_books/Resources/Private/Language/locallang_db.xml:tx_sfbooks_domain_model_category',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		//'default_sortby' => 'ORDER BY title',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_category.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_category.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, type',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_extras');
$GLOBALS['TCA']['tx_sfbooks_domain_model_extras'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_extras.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_extras.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, label, content',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_extraslabels');
$GLOBALS['TCA']['tx_sfbooks_domain_model_extraslabels'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_extraslabels.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_extraslabels.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, label',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_domain_model_series');
$GLOBALS['TCA']['tx_sfbooks_domain_model_series'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_sfbooks_domain_model_series.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sfbooks_domain_model_series.png',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, title, infos, description',
	)
);



t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Book Library');

?>