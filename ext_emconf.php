<?php

########################################################################
# Extension Manager/Repository config file for ext "sf_books".
#
# Auto generated 17-10-2010 19:23
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Book Library',
	'description' => 'Ever tried to keep track on all your books? This library will help you to keep track of all books.',
	'category' => 'Sebastian Fischer',
	'shy' => 0,
	'version' => '1.5.2',
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'tt_content',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Sebastian Fischer',
	'author_email' => 'typo3@fischer.im',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.1.0-0.0.0',
			'php' => '5.0.0-0.0.0',
			'cms' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:21:{s:19:"books_template.html";s:4:"d463";s:12:"ext_icon.gif";s:4:"8c88";s:17:"ext_localconf.php";s:4:"3966";s:14:"ext_tables.php";s:4:"74d7";s:14:"ext_tables.sql";s:4:"9445";s:25:"icon_tx_sfbooks_books.gif";s:4:"35ce";s:28:"icon_tx_sfbooks_category.gif";s:4:"55ac";s:26:"icon_tx_sfbooks_extras.gif";s:4:"475a";s:33:"icon_tx_sfbooks_extras_labels.gif";s:4:"475a";s:26:"icon_tx_sfbooks_series.gif";s:4:"674d";s:13:"locallang.xml";s:4:"c3ab";s:16:"locallang_db.xml";s:4:"6306";s:7:"tca.php";s:4:"328f";s:14:"doc/manual.sxw";s:4:"0c11";s:14:"pi1/ce_wiz.gif";s:4:"02b6";s:28:"pi1/class.tx_sfbooks_pi1.php";s:4:"e81f";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"18e3";s:20:"pi1/static/setup.txt";s:4:"d163";s:24:"pi1/static_css/setup.txt";s:4:"7e74";s:33:"tests/tx_sfbooks_pi1_testcase.php";s:4:"7e62";}',
	'suggests' => array(
	),
);

?>