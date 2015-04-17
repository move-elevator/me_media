<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'm:e Media Center',
	'description' => 'Media center to present audio and video file as well as internal streams and stream from external provider youtube, vimeo and my video.',
	'category' => 'plugin',
	'author' => 'move : elevator',
	'author_email' => 'typo3@move-elevator.de',
	'author_company' => 'move elevator GmbH',
	'state' => 'stable',
	'uploadfolder' => '1',
	'createDirs' => 'uploads/tx_memedia',
	'clearCacheOnLoad' => 0,
	'version' => '1.2.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.0.0-6.2.99',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
);