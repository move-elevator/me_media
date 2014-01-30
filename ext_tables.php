<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('extbase')) {
	$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

	// List Plugin
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'List', 'm:e Media Center Liste');
	$pluginSignatureList = strtolower($extensionName) . '_list';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureList] = 'layout,select_key,pages,recursive';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignatureList, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Media/List.xml');

	// Show Plugin
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Show', 'm:e Media Center Detail');
	$pluginSignatureShow = strtolower($extensionName) . '_show';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureShow] = 'layout,select_key,pages,recursive';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureShow] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignatureShow, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Media/Show.xml');

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_memedia_domain_model_media','EXT:me_media/Resources/Private/Language/locallang_csh_tx_memedia.xml');

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_memedia_domain_model_media');
$TCA['tx_memedia_domain_model_media'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media',
		'type' => 'tx_extbase_type',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			'fe_group' => 'fe_group',
		),
		'thumbnail' => 'image',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Media.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_memedia_domain_model_media.png'
	),
);

?>