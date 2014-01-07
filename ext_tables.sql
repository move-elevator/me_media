#
# Table structure for table 'tx_mevideostage_teaser'
#
CREATE TABLE tx_memedia_domain_model_medium (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	fe_group int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	element_type int(11) DEFAULT '0' NOT NULL,
	image tinytext NOT NULL,

	file_mp4 tinytext NOT NULL,
	file_webm tinytext NOT NULL,
	file_ogv tinytext NOT NULL,
	file_stream tinytext NOT NULL,
	file_youtube tinytext NOT NULL,
	file_audio tinytext NOT NULL,

	width varchar(255) DEFAULT '' NOT NULL,
	height varchar(255) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);