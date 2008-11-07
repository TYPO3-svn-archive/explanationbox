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
 * Shows a tab and hides all other siblings. In addition, the section counter
 * and the back/forward arrows are updated.
 *
 * @param string the ID of the parent of the tab contents
 * @param the number of the tab to show, zero-based
 */
function showTab(parentId, tabNumber) {
	activeExplanationSections[parentId] = tabNumber;

	$(parentId).getElements(".toggle").removeClass("active");
	$(parentId).getElements(".toggle").addClass("inactive");

	$(parentId).getElements(".toggle-" + tabNumber).removeClass("inactive");
	$(parentId).getElements(".toggle-" + tabNumber).addClass("active");

	var newNumber = document.createTextNode(tabNumber + 1);
	var numberDisplay = $(parentId).getElement(".section-number");
	numberDisplay.replaceChild(newNumber, numberDisplay.childNodes[0]);
}

/**
 * Switches to one tab to the left.
 *
 * @param string the ID of the parent of the tab contents
 */
function tabLeft(parentId) {
	if (activeExplanationSections[parentId]) {
		showTab(parentId, activeExplanationSections[parentId] - 1);
	}
}

/**
 * Switches to one tab to the right.
 *
 * @param string the ID of the parent of the tab contents
 * @param integer the (zero-based) number of the highest tab
 */
function tabRight(parentId, maxTab) {
	var activeTabNumber = 0;
	if (activeExplanationSections[parentId] != null) {
		activeTabNumber = activeExplanationSections[parentId];
	}
	if (activeTabNumber + 1 < maxTab) {
		showTab(parentId, activeTabNumber + 1);
	}
}

activeExplanationSections = new Object();
