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
	 * @var string the table name of the sections table
	 */
	const TABLE_SECTIONS = 'tx_explanationbox_sections';

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
	 * element.
	 *
	 * @return array nested array with the data of the sections in the current
	 *               content element, will usually not be empty except for
	 *               broken data in the DB
	 */
	private function getSections() {
		$result = array();

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
			$result[] = $row;
		}

		return $result;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']);
}
?>