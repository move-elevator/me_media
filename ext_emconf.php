<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'm:e Media Center',
    'description' => 'Media center to present audio and video file as well as internal streams and stream from external provider youtube, vimeo and my video.',
    'category' => 'plugin',
    'author' => 'move:elevator',
    'author_email' => 'typo3@move-elevator.de',
    'author_company' => 'move elevator GmbH',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.3.2',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-7.9.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
