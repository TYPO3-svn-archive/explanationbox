<?php
if (!defined('TYPO3_MODE')) {
 	die('Access denied.');
}

$TCA['tx_explanationbox_sections'] = array(
	'ctrl' => $TCA['tx_explanationbox_sections']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,title,columns',
	),
	'feInterface' => $TCA['tx_explanationbox_sections']['feInterface'],
	'columns' => array(
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '30',
			),
		),
		'sys_language_uid' => array(
			'exclude' => 1,
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0),
				),
			),
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table'       => 'tx_explanationbox_sections',
				'foreign_table_where' => 'AND tx_explanationbox_sections.pid=###CURRENT_PID### AND tx_explanationbox_sections.sys_language_uid IN (-1,0)',
			),
		),
		'l18n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
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
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.columns',
			'config' => array(
				'type' => 'inline',
				'internal_type' => 'db',
				'foreign_table' => 'tx_explanationbox_columns',
				'foreign_field' => 'section_uid',
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
		'0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, title, columns'),
	),
);

$TCA['tx_explanationbox_columns'] = array(
	'ctrl' => $TCA['tx_explanationbox_columns']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'uid,content_elements',
	),
	'feInterface' => $TCA['tx_explanationbox_columns']['feInterface'],
	'columns' => array(
		'uid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_columns.uid',
			'config' => array(
				'type' => 'none',
				'size' => '4',
			),
		),
		'content_elements' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_columns.content_elements',
			'config' => array(
				'type' => 'inline',
				'internal_type' => 'db',
				'foreign_table' => 'tt_content',
				'foreign_field' => 'tx_explanationbox_column_uid',
				'foreign_sortby' => 'sorting',
				'minitems' => 0,
				'maxitems' => 99,
				'appearance' => array(
					'collapseAll' => 0,
					'expandSingle' => 1,
					'newRecordLinkPosition' => 'bottom',
				),
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'uid, content_elements'),
	),
);
?>