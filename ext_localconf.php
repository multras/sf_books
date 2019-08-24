<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {
    if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >=
        \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('8.7.0')) {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['migrateSfBooksCover'] =
            \Evoweb\SfBooks\Updates\ImageToFileReferenceUpdate::class;
    }

    $icons = [
        'book',
        'author',
        'category',
        'search',
        'series',
    ];

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconProviderClassName = \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class;
    foreach ($icons as $icon) {
        $iconRegistry->registerIcon(
            'content-plugin-sfbooks-' . $icon,
            $iconProviderClassName,
            ['source' => 'EXT:sf_books/Resources/Public/Icons/Extension.svg']
        );
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '
        // add sf_books wizard config
        <INCLUDE_TYPOSCRIPT: source="FILE:EXT:sf_books/Configuration/TSconfig/NewContentElementWizard.ts">
'
    );


    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SfBooks',
        'Book',
        [
            \Evoweb\SfBooks\Controller\BookController::class => 'list, show',
            \Evoweb\SfBooks\Controller\CategoryController::class => 'list, show',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SfBooks',
        'Author',
        [
            \Evoweb\SfBooks\Controller\AuthorController::class => 'list, show',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SfBooks',
        'Category',
        [
            \Evoweb\SfBooks\Controller\CategoryController::class => 'list, show',
            \Evoweb\SfBooks\Controller\BookController::class => 'list, show',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SfBooks',
        'Series',
        [
            \Evoweb\SfBooks\Controller\SeriesController::class => 'list, show',
            \Evoweb\SfBooks\Controller\BookController::class => 'list, show',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SfBooks',
        'Search',
        [
            \Evoweb\SfBooks\Controller\SearchController::class => 'search, startSearch',
            \Evoweb\SfBooks\Controller\BookController::class => 'search',
            \Evoweb\SfBooks\Controller\AuthorController::class => 'search',
        ],
        [
            \Evoweb\SfBooks\Controller\SearchController::class => 'search, startSearch',
        ]
    );
});
