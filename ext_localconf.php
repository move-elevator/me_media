<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('extbase')) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'MoveElevator.' . $_EXTKEY, 'List', // name
		array('Media' => 'list, show'), // possible
		array() // non-cached
	);
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['tx_memedia_domain_model_media'][0] = array (
        'fList' => 'title',
        'icon' => TRUE
    );
?>