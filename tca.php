<?php
if (!defined('TYPO3_MODE')) {
 	die('Access denied.');
}

$TCA['tx_explanationbox_sections'] = array(
	'ctrl' => $TCA['tx_explanationbox_sections']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,columns'
	),
	'feInterface' => $TCA['tx_explanationbox_sections']['feInterface'],
	'columns' => array(
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.title',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			),
		),
		'columns' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.columns',
			'config' => array(
				'type' => 'inline',
				'internal_type' => 'db',
				'foreign_table' => 'tt_content',
				'foreign_field' => 'tx_explanationbox_section_uid',
				'foreign_sortby' => 'sorting',
				'minitems' => 1,
				'maxitems' => 2,
				'appearance' => array(
					'collapseAll' => 0,
					'expandSingle' => 1,
					'newRecordLinkPosition' => 'bottom',
				),
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'title, columns')
	),
);
?>