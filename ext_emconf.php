<?php

########################################################################
# Extension Manager/Repository config file for ext: "sf_books"
#
# Auto generated 10-11-2009 20:40
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Book Library',
	'description' => 'Ever tried to keep track on all your books?',
	'category' => 'Sebastian Fischer',
	'shy' => 0,
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => 'tt_content',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author' => 'Sebastian Fischer',
	'author_email' => 'typo3@fischer.im',
	'author_company' => '',
	'CGLcompliance' => 'CGL430',
	'CGLcompliance_note' => '',
	'version' => '1.5.0',
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
	'_md5_values_when_last_written' => 'a:21:{s:19:"books_template.html";s:4:"7261";s:12:"ext_icon.gif";s:4:"8c88";s:17:"ext_localconf.php";s:4:"3966";s:14:"ext_tables.php";s:4:"74d7";s:14:"ext_tables.sql";s:4:"9445";s:25:"icon_tx_sfbooks_books.gif";s:4:"35ce";s:28:"icon_tx_sfbooks_category.gif";s:4:"55ac";s:26:"icon_tx_sfbooks_extras.gif";s:4:"475a";s:33:"icon_tx_sfbooks_extras_labels.gif";s:4:"475a";s:26:"icon_tx_sfbooks_series.gif";s:4:"674d";s:13:"locallang.xml";s:4:"c3ab";s:16:"locallang_db.xml";s:4:"6306";s:7:"tca.php";s:4:"328f";s:33:"tests/tx_sfbooks_pi1_testcase.php";s:4:"7e62";s:14:"doc/manual.sxw";s:4:"46f8";s:14:"pi1/ce_wiz.gif";s:4:"02b6";s:28:"pi1/class.tx_sfbooks_pi1.php";s:4:"5211";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"e80b";s:20:"pi1/static/setup.txt";s:4:"d163";s:24:"pi1/static_css/setup.txt";s:4:"ec9b";}',
	'suggests' => array(
	),
);

?>