<?php

if (!defined('TYPO3_MODE'))
	die('Access denied.');

$TCA['tx_memedia_domain_model_medium'] = array(
	'ctrl' => $TCA['tx_memedia_domain_model_medium']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,fe_group,title,element_type'
	),
	'feInterface' => $TCA['tx_memedia_domain_model_medium']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'default' => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'checkbox' => '0',
				'default' => '0',
				'range' => array(
					'upper' => mktime(0, 0, 0, 12, 31, 2020),
					'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
				),
			)
		),
		'fe_group' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
					array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups'
			)
		),
		'title' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.description',
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'eval' => 'required,trim',
			),
		),
		'element_type' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.element_type',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.element_type.I.video', '0'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.element_type.I.stream', '1'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.element_type.I.youtube', '2'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.element_type.I.audio', '3'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required',
			)
		),
		'file_mp4' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_mp4',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:0',
		),
		'file_webm' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_webm',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:0',
		),
		'file_ogv' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_ogv',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:0',
		),
		'file_stream' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_stream',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:1',
		),
		'file_youtube' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_youtube',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:2',
		),
		'file_audio' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.file_audio',
			'config' => Array(
				'type' => 'input',
				'size' => '15',
				'max' => '255',
				'checkbox' => '',
				'eval' => 'trim',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				),
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:=:3',
		),
		'image' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.image',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',
				'max_size' => 900,
				'uploadfolder' => 'uploads/tx_memedia',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:element_type:<:3',
		),
		'width' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.width',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			),
			'displayCond' => 'FIELD:element_type:<:3',
		),
		'height' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_medium.height',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			),
			'displayCond' => 'FIELD:element_type:<:3',
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, description, element_type;;;;3-3-3, file_mp4, file_ogv, file_webm, file_stream, file_youtube, file_audio, image, width, height'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime, fe_group')
	)
);

$TCA['tx_memedia_domain_model_medium']['ctrl']['requestUpdate'] .= ',element_type';
?>