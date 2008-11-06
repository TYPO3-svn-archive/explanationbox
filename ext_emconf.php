<?php

########################################################################
# Extension Manager/Repository config file for ext: "explanationbox"
#
# Auto generated 06-11-2008 23:06
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
	'conflicts' => '',
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
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.1.0-0.0.0',
			'typo3' => '4.1.2-0.0.0',
			'cms' => '',
			'oelib' => '0.4.3-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:13:{s:9:"ChangeLog";s:4:"f2e6";s:12:"ext_icon.gif";s:4:"d085";s:17:"ext_localconf.php";s:4:"d1c9";s:14:"ext_tables.php";s:4:"dcbf";s:14:"ext_tables.sql";s:4:"181c";s:35:"icon_tx_explanationbox_sections.gif";s:4:"475a";s:13:"locallang.xml";s:4:"d41d";s:16:"locallang_db.xml";s:4:"7a99";s:7:"tca.php";s:4:"cb1b";s:31:"configuration/tsconfig_page.txt";s:4:"1c3f";s:19:"doc/wizard_form.dat";s:4:"81c4";s:20:"doc/wizard_form.html";s:4:"9cd8";s:35:"pi1/class.tx_explanationbox_pi1.php";s:4:"d301";}',
);

?>