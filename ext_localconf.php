<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Book',
	array(
		'Book' => 'list, show',
		'Category' => 'list, show',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Author',
	array(
		'Author' => 'list, show',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Category',
	array(
		'Category' => 'list, show',
		'Book' => 'list, show',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Series',
	array(
		'Series' => 'list, show',
		'Book' => 'list, show',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Search',
	array(
		'Search' => 'search, startSearch',
		'Book' => 'search',
		'Author' => 'search',
	),
	array(
		'Search' => 'search, startSearch',
	)
);

?>