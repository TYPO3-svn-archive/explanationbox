<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Oliver Klee <typo3-coding@oliverklee.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_typo3 . 'sysext/cms/tslib/class.tslib_content.php');

require_once(t3lib_extMgm::extPath('oelib') . 'tx_oelib_commonConstants.php');
require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_db.php');
require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_templatehelper.php');

/**
 * Content type 'Explanation box' for the 'explanationbox' extension.
 *
 * @author	Oliver Klee <typo3-coding@oliverklee.de>
 *
 * @package	TYPO3
 * @subpackage	tx_explanationbox
 */
class tx_explanationbox_pi1 extends tx_oelib_templatehelper {
	/**
	 * @var string the table name of the sections table
	 */
	const TABLE_SECTIONS = 'tx_explanationbox_sections';
	/**
	 * @var string the table name of the columns table
	 */
	const TABLE_COLUMNS = 'tt_content';
	/**
	 * @var string same as class name
	 */
	public $prefixId = 'tx_explanationbox_pi1';
	/**
	 * @var string path to this script relative to the extension directory
	 */
	public $scriptRelPath = 'pi1/class.tx_explanationbox_pi1.php';
	/**
	 * @var string the extension key
	 */
	public $extKey = 'explanationbox';
	/**
	 * @var boolean whether this extension can be cashed
	 */
	public $pi_checkCHash = true;

	/**
	 * @var array the data of the sections from the DB
	 */
	private $sections = array();

	/**
	 * Creates the explanation box HTML.
	 *
	 * @param string (unused)
	 * @param array TypoScript configuration for the plugin
	 *
	 * @return string HTML for the plugin
	 */
	public function main($content, $configuration) {
		$this->init($configuration);
		$this->getTemplateCode();
		$this->includeJavaScript();

		$this->setMarker('content_id', $this->getContentUid());

		$this->retrieveSections();
		$this->renderSectionHeadings();
		$this->renderSections();

		return $this->pi_wrapInBaseClass($this->getSubpart('CONTAINER'));
	}

	/**
	 * Includes the extension's JavaScript and Prototype into the page header.	 *
	 */
	private function includeJavaScript() {
		$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId]
			= '<script type="text/javascript" ' .
			'src="' . t3lib_extMgm::extRelPath($this->extKey) .
			'pi1/tx_explanationbox_pi1.js">' .
			'</script>';

		$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId . '_prototype']
			= '<script type="text/javascript" ' .
			'src="' . t3lib_extMgm::extRelPath($this->extKey) .
			'pi1/contrib/prototype.js">' .
			'</script>';
	}

	/**
	 * Returns the UID of the current content element.
	 *
	 * @return integer UID of the current content element, will be > 0
	 */
	private function getContentUid() {
		return $this->cObj->data['uid'];
	}

	/**
	 * Gets the data of the sections that are set in the current content
	 * element and stores them in $this->sections.
	 */
	private function retrieveSections() {
		$this->sections = array();

		$dbResult = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'*',
			self::TABLE_SECTIONS,
			'content_uid  = ' . $this->getContentUid() .
				tx_oelib_db::enableFields(self::TABLE_SECTIONS),
			'',
			'sorting'
		);
		if (!$dbResult) {
			throw new Exception(DATABASE_QUERY_ERROR);
		}

		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbResult)) {
			$this->sections[] = $row;
		}
	}

	/**
	 * Renders the section headings and writes the result into the
	 * corresponding subpart.
	 */
	private function renderSectionHeadings() {
		$headings = array();
		$separator = $this->getSubpart('HEADING_SEPARATOR');

		foreach ($this->sections as $section) {
			$this->setMarker('heading', htmlspecialchars($section['title']));
			$headings[] = $this->getSubpart('SINGLE_HEADING');
		}

		$this->setMarker('number_of_sections', count($this->sections));
		$this->setSubpart('SECTION_HEADINGS', implode($separator, $headings));
	}

	/**
	 * Retrieves the columns related to the section with the UID $sectionUid.
	 *
	 * @param integer the UID of an existing section, must be > 0
	 *
	 * @return array all columns (content elements) related to that section,
	 *               may be empty
	 */
	private function retrieveColumns($sectionUid) {
		$result = array();

		$dbResult = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'uid',
			self::TABLE_COLUMNS,
			'tx_explanationbox_section_uid  = ' . $sectionUid .
				tx_oelib_db::enableFields(self::TABLE_COLUMNS),
			'',
			'sorting'
		);
		if (!$dbResult) {
			throw new Exception(DATABASE_QUERY_ERROR);
		}

		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbResult)) {
			$result[] = $row;
		}

		return $result;
	}

	/**
	 * Renders the sectionsand writes the result into the corresponding subpart.
	 */
	private function renderSections() {
		$result = '';

		foreach ($this->sections as $key => $section) {
			$columns = $this->retrieveColumns($section['uid']);

			switch (count($columns)) {
				case 0:
					$renderedColumns = '';
					break;
				case 1:
					$renderedColumns = $this->renderOneColumn($columns[0]);
					break;
				default:
					$renderedColumns = $this->renderTwoColumns($columns);
					break;
			}
			$this->setMarker('section_number', $key);
			$this->setMarker('section_columns', $renderedColumns);

			$result .= $this->getSubpart('SECTION_BODY');
		}

		$this->setSubpart('SECTION_BODY', $result);
	}

	/**
	 * Renders a single column and wraps it in some HTML.
	 *
	 * @param array the data of the single column to render
	 *
	 * @return string the rendered and wrapped column, will not be empty
	 */
	private function renderOneColumn(array $columnData) {
		$this->setMarker('column_content', $this->renderRawColumn($columnData));

		return $this->getSubpart('ONE_COLUMN');
	}

	/**
	 * Renders two columns and wraps them in some HTML.
	 *
	 * Any additional columns past the first two will be ignored.
	 *
	 * @param array the data of the boths columns to render as a nested array
	 *
	 * @return string the rendered and wrapped columns, will not be empty
	 */
	private function renderTwoColumns(array $columnData) {
		$this->setMarker(
			'column_content_1', $this->renderRawColumn($columnData[0])
		);
		$this->setMarker(
			'column_content_2', $this->renderRawColumn($columnData[1])
		);

		return $this->getSubpart('TWO_COLUMNS');
	}

	/**
	 * Renders a single column.
	 *
	 * @param array the data of the column to render, must not be empty
	 *
	 * @return the rendered column, might be empty
	 */
	private function renderRawColumn(array $columnData) {
		$configuration = array(
			'tables' => self::TABLE_COLUMNS,
			'source' => $columnData['uid'],
			'dontCheckPid' => 1,
		);

		return $this->cObj->RECORDS($configuration);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']);
}
?>