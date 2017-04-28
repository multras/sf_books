<?php
defined('TYPO3_MODE') or die('Access denied.');

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >=
    \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('8.7.0')) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['migrateSfBooksCover'] =
        \Evoweb\SfBooks\Updates\ImageToFileReferenceUpdate::class;
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
        // add sf_books wizard config
        <INCLUDE_TYPOSCRIPT: source="FILE:EXT:sf_books/Configuration/PageTSconfig/NewContentElementWizard.ts">
');


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
