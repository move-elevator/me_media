<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

const LANGUAGE_FILE = 'LLL:EXT:me_media/Resources/Private/Language/locallang_db.xlf';

$TCA['tx_memedia_domain_model_media'] = array(
    'ctrl' => $TCA['tx_memedia_domain_model_media']['ctrl'],
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,fe_group' .
            ',title,type'
    ),
    'feInterface' => $TCA['tx_memedia_domain_model_media']['feInterface'],
    'columns' => array(
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'max' => '30',
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
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:cms/locallang_ttc.xlf:sys_language_uid_formlabel',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                )
            )
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(array('', 0)),
                'foreign_table' => 'tx_memedia_domain_model_media',
                'foreign_table_where' => 'AND tx_memedia_domain_model_media.pid=###CURRENT_PID###' .
                    ' AND tx_memedia_domain_model_media.sys_language_uid IN (-1,0)',
            )
        ),
        'l10n_diffsource' => array(
            'config' => array('type' => 'passthrough')
        ),
        'title' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.title',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'required,trim',
            )
        ),
        'description' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.description',
            'config' => array(
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'eval' => 'required,trim',
            ),
        ),
        'tx_extbase_type' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.type',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.type.I.video',
                        'MoveElevator\MeMedia\Domain\Model\Media\Movie\Video'
                    ),
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.type.I.stream',
                        'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream'
                    ),
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.type.I.external_stream',
                        'MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream'
                    ),
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.type.I.audio',
                        'MoveElevator\MeMedia\Domain\Model\Media\Audio'
                    ),
                ),
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required',
                'allowNonIdValues' => true,
                'default' => 'MoveElevator\MeMedia\Domain\Model\Media\Movie\Video',
            )
        ),
        'files_video' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.files_video',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                array('minitems' => 3, 'maxitems' => 3),
                'mp4,ogv,webm'
            ),
            'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video',
        ),
        'file_stream' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.file_stream',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'files',
                array('minitems' => 1, 'maxitems' => 1)
            ),
            'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
        ),
        'external_stream_provider' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.external_stream_provider',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.external_stream_provider.I.youtube',
                        'youtube'
                    ),
                    array(LANGUAGE_FILE . ':tx_memedia_domain_model_media.external_stream_provider.I.vimeo', 'vimeo'),
                    array(
                        LANGUAGE_FILE . ':tx_memedia_domain_model_media.external_stream_provider.I.myvideo',
                        'myvideo'
                    ),
                ),
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required',
            ),
            'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream',
        ),
        'external_stream_id' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.external_stream_id',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'required,trim',
            ),
            'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream',
        ),
        'file_audio' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.file_audio',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'file_audio',
                array('minitems' => 1, 'maxitems' => 1)
            ),
            'displayCond' => 'FIELD:tx_extbase_type:=:MoveElevator\MeMedia\Domain\Model\Media\Audio',
        ),
        'image' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                array('minitems' => 1, 'maxitems' => 1, 'uploadfolder' => 'uploads/tx_memedia'),
                'gif,png,jpeg,jpg'
            ),
            'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,' .
                'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
        ),
        'width' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.width',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'trim',
            ),
            'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,' .
                'MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream,' .
                'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
        ),
        'height' => array(
            'exclude' => 1,
            'label' => LANGUAGE_FILE . ':tx_memedia_domain_model_media.height',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'eval' => 'trim',
            ),
            'displayCond' => 'FIELD:tx_extbase_type:IN:MoveElevator\MeMedia\Domain\Model\Media\Movie\Video,' .
                'MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream,' .
                'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
        ),
    ),
    'types' => array(
        '0' => array(
            'showitem' => 'hidden,sys_language_uid;;1;;1-1-1, title;;;;2-2-2, description, tx_extbase_type;;;;3-3-3, ' .
                'files_video, file_stream, external_stream_provider, external_stream_id, file_audio, image, width, ' .
                'height'
        ),
    ),
    'palettes' => array(
        '1' => array('showitem' => 'starttime, endtime, fe_group')
    )
);

$TCA['tx_memedia_domain_model_media']['ctrl']['requestUpdate'] .= ',type';
