<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['tx_memedia_domain_model_media'][0] = array (
        'fList' => 'title',
        'icon' => TRUE
    );
?>