<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_explanationbox_sections'] = array (
	'ctrl' => $TCA['tx_explanationbox_sections']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,starttime,endtime,content_uid,title,columns'
	),
	'feInterface' => $TCA['tx_explanationbox_sections']['feInterface'],
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0',
			)
		),
		'starttime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0',
			)
		),
		'endtime' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'    => array (
					'upper' => mktime(3, 14, 7, 1, 19, 2038),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y')),
				)
			)
		),
		'content_uid' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.content_uid',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'title' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.title',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'columns' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:explanationbox/locallang_db.xml:tx_explanationbox_sections.columns',
			'config' => array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tt_content',
				'size' => 2,
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, content_uid, title;;;;2-2-2, columns;;;;3-3-3')
	),
	'palettes' => array (
		'1' => array('showitem' => 'starttime, endtime')
	)
);
?>