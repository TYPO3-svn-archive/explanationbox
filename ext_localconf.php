<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_explanationbox_pi1.php', '_pi1', 'CType', 1);

t3lib_extMgm::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:explanationbox/configuration/tsconfig_page.txt">'
);
?>