#
# Table structure for table 'tx_mevideostage_teaser'
#
CREATE TABLE tx_memedia_domain_model_media (
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
	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,
	image tinytext NOT NULL,

	files_video tinytext NOT NULL,
	file_stream tinytext NOT NULL,
	file_audio tinytext NOT NULL,

	external_stream_provider varchar(50) DEFAULT '' NOT NULL,
	external_stream_id tinytext NOT NULL,

	width int(11) DEFAULT '0' NOT NULL,
	height int(11) DEFAULT '0' NOT NULL,

	is_dummy_record int(11) DEFAULT '0' NOT NULL

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);