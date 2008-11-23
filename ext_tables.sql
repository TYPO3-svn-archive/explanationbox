#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_explanationbox_section_uid int(11) DEFAULT '0' NOT NULL,
	tx_explanationbox_column_uid int(11) DEFAULT '0' NOT NULL,
	tx_explanationbox_sections tinytext,
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
	content_uid int(11) DEFAULT '0' NOT NULL,
	title tinytext,
	columns tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY container (content_uid)
);

#
# Table structure for table 'tx_explanationbox_columns'
#
CREATE TABLE tx_explanationbox_columns (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	section_uid int(11) DEFAULT '0' NOT NULL,
	content_elements tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY container (section_uid)
);