<?php

if (!defined('TYPO3_MODE'))
	die('Access denied.');

$TCA['tx_memedia_domain_model_media'] = array(
	'ctrl' => $TCA['tx_memedia_domain_model_media']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,starttime,endtime,fe_group,title,type'
	),
	'feInterface' => $TCA['tx_memedia_domain_model_media']['feInterface'],
	'columns' => array(
		't3ver_label' => array (
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'max'  => '30',
			)
		),
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
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.title',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			)
		),
		'description' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.description',
			'config' => array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'eval' => 'required,trim',
			),
		),
		'tx_extbase_type' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.type',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.type.I.video', 'MoveElevator\MeMedia\Domain\Model\Media\Movie\Video'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.type.I.stream', 'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.type.I.external_stream', 'MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.type.I.audio', 'MoveElevator\MeMedia\Domain\Model\Media\Audio'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required',
				'allowNonIdValues' => true,
				'default' => 'MoveElevator\MeMedia\Domain\Model\Media\Movie\Video',
			)
		),
		'files_video' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.files_video',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('files', array(
							'minitems' => 3,
							'maxitems' => 3
						),
						'mp4,ogv,webm'
					),
			'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video',
		),
		'file_stream' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.file_stream',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('files', array(
							'minitems' => 1,
							'maxitems' => 1
						)
					),
			'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
		),
		'external_stream_provider' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.external_stream_provider',
			'config' => Array(
				'type' => 'select',
				'items' => Array(
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.external_stream_provider.I.youtube', 'youtube'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.external_stream_provider.I.vimeo', 'vimeo'),
					Array('LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.external_stream_provider.I.myvideo', 'myvideo'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required',
			),
			'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream',
		),
		'external_stream_id' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.external_stream_id',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			),
			'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream',
		),
		'file_audio' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.file_audio',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('file_audio', array(
							'minitems' => 1,
							'maxitems' => 1
						)
					),
			'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Audio',
		),
		'image' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', array(
							'minitems' => 1,
							'maxitems' => 1,
							'uploadfolder' => 'uploads/tx_memedia',
						),
						'gif,png,jpeg,jpg'
					),
			'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
		),
		'width' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.width',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			),
			'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream,MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
		),
		'height' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf:tx_memedia_domain_model_media.height',
			'config' => Array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'trim',
			),
			'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream,MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
		),
	),
	'types' => array(
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, description, tx_extbase_type;;;;3-3-3, files_video, file_stream, external_stream_provider, external_stream_id, file_audio, image, width, height'),
	),
	'palettes' => array(
		'1' => array('showitem' => 'starttime, endtime, fe_group')
	)
);

$TCA['tx_memedia_domain_model_media']['ctrl']['requestUpdate'] .= ',type';
?>