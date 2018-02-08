<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'm:e Media Center',
    'description' =>
        'Media center to present audio and video file as well as internal streams and stream from external ' .
        'provider youtube, vimeo and my video.',
    'category' => 'plugin',
    'author' => 'move:elevator',
    'author_email' => 'typo3@move-elevator.de',
    'author_company' => 'move elevator GmbH',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.4.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
