<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$tempColumns = array(
	'tx_explanationbox_sections' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tt_content.tx_explanationbox_sections',
		'config' => array (
			'type' => 'inline',
			'foreign_table' => 'tx_explanationbox_sections',
			'foreign_field' => 'content_uid',
			'foreign_sortby' => 'sorting',
			'size' => 6,
			'minitems' => 1,
			'maxitems' => 6,
			'appearance' => array(
				'collapseAll' => 0,
				'expandSingle' => 1,
				'newRecordLinkPosition' => 'bottom',
			),
		),
	),
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
t3lib_extMgm::allowTableOnStandardPages('tx_explanationbox_sections');

// Creates a new colPos value 255 for all inline content elements.
$TCA['tt_content']['columns']['colPos']['config']['items']['255']['0']
	= 'LLL:EXT:explanationbox/locallang_db.xml:tt_content.colPos.255';
$TCA['tt_content']['columns']['colPos']['config']['items']['255']['1'] = '255';

$TCA['tt_content']['types'][$_EXTKEY . '_pi1']['showitem']
	= 'CType, header, tx_explanationbox_sections';

$TCA['tx_explanationbox_sections'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) .
			'icon_tx_explanationbox_sections.gif',
	),
);

t3lib_extMgm::addPlugin(
	array(
		'LLL:EXT:explanationbox/locallang_db.xml:tt_content.CType_pi1',
		$_EXTKEY . '_pi1',
		t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
	),
	'CType'
);

if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_explanationbox_pi1_wizicon']
		= t3lib_extMgm::extPath($_EXTKEY) .
			'pi1/class.tx_explanationbox_pi1_wizicon.php';
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'configuration/', 'Explanation box');
?>