<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_books');
$TCA['tx_sfbooks_books'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_books',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY number',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'requestUpdate' => 'location1, location2',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_sfbooks_books.gif',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, serie, category, number, title, author, isbn, description, extras, cover',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_series');
$TCA['tx_sfbooks_series'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_series',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY title',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_sfbooks_series.gif',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, title, infos, description',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_category');
$TCA['tx_sfbooks_category'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_category',
		'label' => 'type',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY type',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_sfbooks_category.gif',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, type',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_extras');
$TCA['tx_sfbooks_extras'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_extras',
		'label' => 'content',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_sfbooks_extras.gif',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, label, content',
	)
);



t3lib_extMgm::allowTableOnStandardPages('tx_sfbooks_extras_labels');
$TCA['tx_sfbooks_extras_labels'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:sf_books/locallang_db.php:tx_sfbooks_extras_labels',
		'label' => 'label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'icon_tx_sfbooks_extras_labels.gif',
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, label',
	)
);



/*Template Selection Field*/
$tempColumns = Array (
	'tx_sfbooks_template' => Array (
		'exclude' => 1,
		'label' => 'LLL:EXT:sf_books/locallang_db.php:tt_content.tx_sfbooks_template',
		'config' => Array (
			'type' => 'group',
			'internal_type' => 'file',
			'allowed' => 'tmpl',
			'max_size' => 500,
			'uploadfolder' => 'uploads/tx_sfbooks',
			'size' => 1,
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'tx_sfbooks_template;;;;1-1-1';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key';



t3lib_extMgm::addPlugin(Array('LLL:EXT:sf_books/locallang_db.php:tt_content.list_type_pi1', $_EXTKEY . '_pi1'), 'list_type');



t3lib_extMgm::addStaticFile($_EXTKEY, 'pi1/static/', 'Book Library');
t3lib_extMgm::addStaticFile($_EXTKEY, 'pi1/static_css/', 'Book Library (default CSS)');

?>