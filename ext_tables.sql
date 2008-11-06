#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_explanationbox_section_uid int(11) DEFAULT '0' NOT NULL
);


#
# Table structure for table 'tx_explanationbox_sections'
#
CREATE TABLE tx_explanationbox_sections (
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
	content_uid tinytext,
	title tinytext,
	columns text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);