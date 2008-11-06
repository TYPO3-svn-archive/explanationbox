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
	 * Creates the explanation box HTML.
	 *
	 * @param string (unused)
	 * @param array TypoScript configuration for the plugin
	 *
	 * @return string HTML for the plugin
	 */
	public function main($content, $configuration) {
		$this->init($configuration);

		$content = '
			<strong>This is a few paragraphs:</strong><br />
			<p>This is line 1</p>
			<p>This is line 2</p>

			<h3>This is a form:</h3>
			<form action="'.$this->pi_getPageLink($GLOBALS['TSFE']->id).'" method="POST">
				<input type="text" name="'.$this->prefixId.'[input_field]" value="'.htmlspecialchars($this->piVars['input_field']).'">
				<input type="submit" name="'.$this->prefixId.'[submit_button]" value="'.htmlspecialchars($this->pi_getLL('submit_button_label')).'">
			</form>
			<br />
			<p>You can click here to '.$this->pi_linkToPage('get to this page again',$GLOBALS['TSFE']->id).'</p>
		';

		return $this->pi_wrapInBaseClass($content);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1.php']);
}
?>