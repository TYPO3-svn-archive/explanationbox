<?php

########################################################################
# Extension Manager/Repository config file for ext: "explanationbox"
#
# Auto generated 11-05-2009 22:07
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Explanation box',
	'description' => 'This extension displays content elements as tabs in the FE.',
	'category' => 'plugin',
	'author' => 'Oliver Klee',
	'author_email' => 'typo3-coding@oliverklee.de',
	'shy' => '',
	'dependencies' => 'cms,oelib',
	'conflicts' => 'date2cal,icebox',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tt_content',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => 'oliverklee.de',
	'version' => '0.4.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.1.2-0.0.0',
			'typo3' => '4.2.0-0.0.0',
			'cms' => '',
			'oelib' => '0.5.2-',
		),
		'conflicts' => array(
			'date2cal' => '',
			'icebox' => '',
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:24:{s:9:"ChangeLog";s:4:"923e";s:31:"class.tx_explanationbox_tca.php";s:4:"820c";s:12:"ext_icon.gif";s:4:"d085";s:17:"ext_localconf.php";s:4:"9c3c";s:14:"ext_tables.php";s:4:"eaf9";s:14:"ext_tables.sql";s:4:"8d53";s:34:"icon_tx_explanationbox_columns.gif";s:4:"475a";s:35:"icon_tx_explanationbox_sections.gif";s:4:"475a";s:13:"locallang.xml";s:4:"7623";s:16:"locallang_db.xml";s:4:"6474";s:7:"tca.php";s:4:"c8c2";s:27:"configuration/constants.txt";s:4:"3e5b";s:23:"configuration/setup.txt";s:4:"8100";s:14:"pi1/ce_wiz.gif";s:4:"19d0";s:35:"pi1/class.tx_explanationbox_pi1.php";s:4:"8b72";s:43:"pi1/class.tx_explanationbox_pi1_wizicon.php";s:4:"ab85";s:17:"pi1/locallang.xml";s:4:"286f";s:29:"pi1/tx_explanationbox_pi1.css";s:4:"a537";s:30:"pi1/tx_explanationbox_pi1.html";s:4:"af70";s:28:"pi1/tx_explanationbox_pi1.js";s:4:"446a";s:37:"pi1/contrib/mootools-1.2.1-core-yc.js";s:4:"cad2";s:25:"pi1/images/arrow_left.gif";s:4:"e177";s:26:"pi1/images/arrow_right.gif";s:4:"31b8";s:19:"pi1/images/pipe.gif";s:4:"ff75";}',
);

?>