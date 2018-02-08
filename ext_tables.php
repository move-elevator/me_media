<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('extbase')) {
    $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

    // List Plugin
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $_EXTKEY,
        'List',
        'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:plugin.title.list'
    );
    $pluginSignatureList = strtolower($extensionName) . '_list';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureList] =
        'layout,select_key,pages,recursive';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignatureList,
        'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Media/List.xml'
    );

    // Show Plugin
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $_EXTKEY,
        'Show',
        'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:plugin.title.detail'
    );
    $pluginSignatureShow = strtolower($extensionName) . '_show';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureShow] =
        'layout,select_key,pages,recursive';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureShow] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignatureShow,
        'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Media/Show.xml'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_memedia_domain_model_media',
        'EXT:me_media/Resources/Private/Language/locallang_csh_tx_memedia.xlf'
    );

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    $_EXTKEY,
    'Configuration/TypoScript/jQuery',
    'm:e Media Center jQuery'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    $_EXTKEY,
    'Configuration/TypoScript/Flowplayer',
    'm:e Media Center Flowplayer'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_memedia_domain_model_media');
