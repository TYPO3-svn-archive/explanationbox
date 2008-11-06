<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array (
	'tx_explanationbox_section_uid' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tt_content.tx_explanationbox_section_uid',		
		'config' => array (
			'type' => 'select',	
			'foreign_table' => 'tx_explanationbox_sections',	
			'foreign_table_where' => 'AND tx_explanationbox_sections.pid=###CURRENT_PID### ORDER BY tx_explanationbox_sections.uid',	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tt_content','tx_explanationbox_section_uid;;;;1-1-1');

$TCA['tx_explanationbox_sections'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections',		
		'label'     => 'title',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_explanationbox_sections.gif',
	),
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:explanationbox/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_explanationbox_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_explanationbox_pi1_wizicon.php';
}
?>