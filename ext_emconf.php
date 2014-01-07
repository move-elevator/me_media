<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'm:e Media Center',
    'description' => 'Media Center',
    'category' => 'fe',
    'author' => 'Jan Maennig',
    'author_email' => 'jma@move-elevator.de',
    'author_company' => 'move:elevator',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => '1',
	'createDirs' => 'uploads/tx_memedia',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '0.0.1',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.0.0-6.2.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);
?>