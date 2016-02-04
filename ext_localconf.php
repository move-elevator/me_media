<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('extbase')) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'MoveElevator.' . $_EXTKEY,
        'List',
        array('Media' => 'list, show'),
        array()
    );
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('extbase')) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'MoveElevator.' . $_EXTKEY,
        'Show',
        array('Media' => 'show'),
        array()
    );
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['tx_memedia_domain_model_media'][0] = array(
    'fList' => 'title',
    'icon' => true
);
