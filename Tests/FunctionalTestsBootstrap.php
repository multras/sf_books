<?php

// add wrapper to set constant that is needed in creating isolated processes
if (!defined('PHPUNIT_COMPOSER_INSTALL')) {
    define('PHPUNIT_COMPOSER_INSTALL', $_SERVER['IDE_PHPUNIT_CUSTOM_LOADER']);
}

$file = __DIR__ . '/../../../../vendor/typo3/testing-framework/Resources/Core/Build/FunctionalTestsBootstrap.php';
/** @noinspection PhpIncludeInspection */
require_once $file;

/** @var \Composer\Autoload\ClassLoader $classLoader */
$classLoader = require ORIGINAL_ROOT . '../vendor/autoload.php';
$classLoader->addPsr4('Evoweb\\SfBooks\\', [ORIGINAL_ROOT . 'typo3conf/ext/sf_books/Classes']);
$classLoader->addPsr4('Evoweb\\SfBooks\\Tests\\', [ORIGINAL_ROOT . 'typo3conf/ext/sf_books/Tests']);
