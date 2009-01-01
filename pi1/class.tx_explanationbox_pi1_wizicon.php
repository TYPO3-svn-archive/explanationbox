<?php
/***************************************************************
* Copyright notice
*
* (c) 2008-2009 Oliver Klee <typo3-coding@oliverklee.de>
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class that adds the wizard icon.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 *
 * @package TYPO3
 * @subpackage tx_explanationbox
 */
class tx_explanationbox_pi1_wizicon {
	/**
	 * Processes the wizard items array.
	 *
	 * @param array the wizard items, may be empty
	 *
	 * @return array modified array with wizard items
	 */
	public function proc(array $wizardItems) {
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_explanationbox_pi1'] = array(
			'icon' => t3lib_extMgm::extRelPath('explanationbox') .
				'pi1/ce_wiz.gif',
			'title' => $LANG->getLLL('tt_content.CType_pi1', $LL),
			'description' => '',
			'params' => '&defVals[tt_content][CType]=explanationbox_pi1',
		);

		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the labels found in that
	 * file as an array.
	 *
	 * @return array the found language labels
	 */
	private function includeLocalLang() {
		return t3lib_div::readLLXMLfile(
			t3lib_extMgm::extPath('explanationbox') . 'locallang_db.xml',
			$GLOBALS['LANG']->lang
		);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1_wizicon.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/pi1/class.tx_explanationbox_pi1_wizicon.php']);
}
?>