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

/**
 * This class provides some TCA preprocessing.
 *
 * @author	Oliver Klee <typo3-coding@oliverklee.de>
 * @package	TYPO3
 * @subpackage	tx_explanationbox
 */
class tx_explanationbox_tca {
	/**
	 * Ensures that a content element is moved to the "inline elements" column
	 * if it is part of a explanation box section.
	 *
	 * @param array the content element data
	 *
	 * @return array the modified content element data
	 */
	public function setInlineElementColumn(array $elementData) {
		if ($elementData['row']['tx_explanationbox_section_uid']) {
			foreach($elementData['items'] as $itemKey => $itemArray) {
				if ($itemArray[1] != 255) {
					unset($elementData['items'][$itemKey]);
				}
			}
		}

		return $elementData;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/class.tx_explanationbox_tca.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/explanationbox/class.tx_explanationbox_tca.php']);
}
?>