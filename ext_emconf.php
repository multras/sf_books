<?php

########################################################################
# Extension Manager/Repository config file for ext "sf_books".
#
# Auto generated 22-11-2012 11:42
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Book Library',
	'description' => 'Managing lots of books is not easy without a great tool. The book library tries to help you keeping an overview your books and to search easily information about each book.',
	'category' => 'Sebastian Fischer',
	'shy' => 0,
	'version' => '2.4.0',
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Sebastian Fischer',
	'author_email' => 'typo3@evoweb.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-0.0.0',
			'php' => '5.0.0-0.0.0',
			'cms' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:82:{s:20:"_books_template.html";s:4:"d463";s:16:"ext_autoload.php";s:4:"71f1";s:12:"ext_icon.gif";s:4:"c675";s:17:"ext_localconf.php";s:4:"0ffd";s:14:"ext_tables.php";s:4:"2068";s:14:"ext_tables.sql";s:4:"31fd";s:25:"icon_tx_sfbooks_books.gif";s:4:"35ce";s:28:"icon_tx_sfbooks_category.gif";s:4:"55ac";s:26:"icon_tx_sfbooks_extras.gif";s:4:"475a";s:33:"icon_tx_sfbooks_extras_labels.gif";s:4:"475a";s:26:"icon_tx_sfbooks_series.gif";s:4:"674d";s:13:"locallang.xml";s:4:"8c59";s:16:"locallang_db.xml";s:4:"f16b";s:7:"tca.php";s:4:"eab8";s:41:"Classes/Controller/AbstractController.php";s:4:"d171";s:39:"Classes/Controller/AuthorController.php";s:4:"4209";s:37:"Classes/Controller/BookController.php";s:4:"30d3";s:41:"Classes/Controller/CategoryController.php";s:4:"6713";s:39:"Classes/Controller/SearchController.php";s:4:"abd7";s:39:"Classes/Controller/SeriesController.php";s:4:"caab";s:31:"Classes/Domain/Model/Author.php";s:4:"49b9";s:29:"Classes/Domain/Model/Book.php";s:4:"1422";s:33:"Classes/Domain/Model/Category.php";s:4:"2a15";s:31:"Classes/Domain/Model/Extras.php";s:4:"8e6d";s:37:"Classes/Domain/Model/ExtrasLabels.php";s:4:"fbc8";s:31:"Classes/Domain/Model/Series.php";s:4:"8e42";s:46:"Classes/Domain/Repository/AuthorRepository.php";s:4:"27e6";s:44:"Classes/Domain/Repository/BookRepository.php";s:4:"b1c4";s:48:"Classes/Domain/Repository/CategoryRepository.php";s:4:"e617";s:46:"Classes/Domain/Repository/SeriesRepository.php";s:4:"8ef2";s:49:"Classes/ViewHelpers/Widget/PaginateViewHelper.php";s:4:"10f0";s:60:"Classes/ViewHelpers/Widget/Controller/PaginateController.php";s:4:"2b33";s:37:"Configuration/DefaultStyles/setup.txt";s:4:"ed8f";s:34:"Configuration/FlexForms/author.xml";s:4:"d144";s:32:"Configuration/FlexForms/book.xml";s:4:"34f9";s:36:"Configuration/FlexForms/category.xml";s:4:"34f9";s:32:"Configuration/FlexForms/form.xml";s:4:"34f9";s:34:"Configuration/FlexForms/search.xml";s:4:"d144";s:34:"Configuration/FlexForms/series.xml";s:4:"d144";s:52:"Configuration/TCA/tx_sfbooks_domain_model_author.php";s:4:"40c4";s:50:"Configuration/TCA/tx_sfbooks_domain_model_book.php";s:4:"9b47";s:54:"Configuration/TCA/tx_sfbooks_domain_model_category.php";s:4:"d0dc";s:52:"Configuration/TCA/tx_sfbooks_domain_model_extras.php";s:4:"8a7a";s:59:"Configuration/TCA/tx_sfbooks_domain_model_extras_labels.php";s:4:"fc5c";s:58:"Configuration/TCA/tx_sfbooks_domain_model_extraslabels.php";s:4:"001c";s:52:"Configuration/TCA/tx_sfbooks_domain_model_series.php";s:4:"fba7";s:34:"Configuration/TypoScript/setup.txt";s:4:"c303";s:40:"Resources/Private/Language/locallang.xml";s:4:"7741";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"9fbb";s:39:"Resources/Private/Templates/author.html";s:4:"d41d";s:37:"Resources/Private/Templates/book.html";s:4:"2acf";s:44:"Resources/Private/Templates/Author/List.html";s:4:"6592";s:46:"Resources/Private/Templates/Author/Search.html";s:4:"6ee3";s:44:"Resources/Private/Templates/Author/Show.html";s:4:"7fd8";s:42:"Resources/Private/Templates/Book/List.html";s:4:"dcb5";s:44:"Resources/Private/Templates/Book/Search.html";s:4:"926d";s:42:"Resources/Private/Templates/Book/Show.html";s:4:"1ad0";s:46:"Resources/Private/Templates/Category/List.html";s:4:"9447";s:46:"Resources/Private/Templates/Category/Show.html";s:4:"2672";s:46:"Resources/Private/Templates/Search/Search.html";s:4:"74fe";s:44:"Resources/Private/Templates/Series/List.html";s:4:"6ea1";s:44:"Resources/Private/Templates/Series/Show.html";s:4:"3e9a";s:66:"Resources/Private/Templates/ViewHelpers/Widget/Paginate/Index.html";s:4:"4536";s:57:"Resources/Public/Icons/tx_sfbooks_domain_model_author.png";s:4:"de5b";s:55:"Resources/Public/Icons/tx_sfbooks_domain_model_book.png";s:4:"7441";s:59:"Resources/Public/Icons/tx_sfbooks_domain_model_category.png";s:4:"5847";s:57:"Resources/Public/Icons/tx_sfbooks_domain_model_extras.png";s:4:"7e2e";s:64:"Resources/Public/Icons/tx_sfbooks_domain_model_extras_labels.png";s:4:"bbd7";s:63:"Resources/Public/Icons/tx_sfbooks_domain_model_extraslabels.png";s:4:"bbd7";s:57:"Resources/Public/Icons/tx_sfbooks_domain_model_series.png";s:4:"8cbc";s:45:"Resources/Public/Javascript/jquery-1.7.min.js";s:4:"2572";s:39:"Resources/Public/Javascript/sf_books.js";s:4:"074a";s:41:"Resources/Public/Stylesheets/sf_books.css";s:4:"c710";s:14:"doc/manual.sxw";s:4:"0c11";s:14:"pi1/ce_wiz.gif";s:4:"02b6";s:28:"pi1/class.tx_sfbooks_pi1.php";s:4:"fb58";s:13:"pi1/clear.gif";s:4:"cc11";s:12:"pi1/form.xml";s:4:"01b0";s:17:"pi1/locallang.xml";s:4:"18e3";s:20:"pi1/static/setup.txt";s:4:"89b9";s:24:"pi1/static_css/setup.txt";s:4:"7e74";s:33:"tests/tx_sfbooks_pi1_testcase.php";s:4:"7e62";}',
	'suggests' => array(
	),
);

?>