<?php
if (!defined('TYPO3_MODE')) {
 	die('Access denied.');
}

t3lib_extMgm::addPItoST43(
	$_EXTKEY, 'pi1/class.tx_explanationbox_pi1.php', '_pi1', 'CType', 1
);

t3lib_extMgm::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:explanationbox/configuration/tsconfig_page.txt">'
);

// Adds our custom function to a hook in t3lib/class.t3lib_tcemain.php
// Used for post-validation of fields in back-end forms.
$GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][]
	= 'EXT:explanationbox/class.tx_explanationbox_tca.php:tx_explanationbox_tca';
?>