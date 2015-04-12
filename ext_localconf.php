<?php
defined('TYPO3_MODE') or die('Access denied.');


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.sf_books',
	'Book',
	array(
		'Book' => 'list, show',
		'Category' => 'list, show',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.sf_books',
	'Author',
	array(
		'Author' => 'list, show',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.sf_books',
	'Category',
	array(
		'Category' => 'list, show',
		'Book' => 'list, show',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.sf_books',
	'Series',
	array(
		'Series' => 'list, show',
		'Book' => 'list, show',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.sf_books',
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
