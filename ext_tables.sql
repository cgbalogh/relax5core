#
# Table structure for table 'tx_relax5core_domain_model_person'
#
CREATE TABLE tx_relax5core_domain_model_person (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	last_name varchar(255) DEFAULT '' NOT NULL,
	first_name varchar(255) DEFAULT '' NOT NULL,
	middle_name varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	gender int(11) DEFAULT '0' NOT NULL,
	date_of_birth int(11) DEFAULT '0' NOT NULL,
	marital_state int(11) DEFAULT '0' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	salutation varchar(255) DEFAULT '' NOT NULL,
	comments text,
	allow_mail smallint(5) unsigned DEFAULT '0' NOT NULL,
	address_label text,
	permissions int(11) DEFAULT '0' NOT NULL,
	status int(11) unsigned DEFAULT '0',
	owner int(11) unsigned DEFAULT '0',
	usergroup int(11) unsigned DEFAULT '0',
	source int(11) unsigned DEFAULT '0',
	sourcedetail int(11) unsigned DEFAULT '0',
	relations int(11) unsigned DEFAULT '0' NOT NULL,
	addresses int(11) unsigned DEFAULT '0' NOT NULL,
	contacts int(11) unsigned DEFAULT '0' NOT NULL,
	documents int(11) unsigned DEFAULT '0' NOT NULL,
	links int(11) unsigned DEFAULT '0' NOT NULL,
	appointments int(11) unsigned DEFAULT '0' NOT NULL,
	categories int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	pwd_change_date int(11) DEFAULT '0' NOT NULL,
	settings text,
	void smallint(5) unsigned DEFAULT '0' NOT NULL,
	position varchar(255) DEFAULT '' NOT NULL,
	team varchar(255) DEFAULT '' NOT NULL,
	pool int(11) unsigned DEFAULT '0' NOT NULL,

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_address'
#
CREATE TABLE tx_relax5core_domain_model_address (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,
	link int(11) unsigned DEFAULT '0' NOT NULL,

	address varchar(255) DEFAULT '' NOT NULL,
	number int(11) DEFAULT '0' NOT NULL,
	number_additions varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	state varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,
	lat double(11,2) DEFAULT '0.00' NOT NULL,
	lon double(11,2) DEFAULT '0.00' NOT NULL,
	geo_only smallint(5) unsigned DEFAULT '0' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	allow_mail smallint(5) unsigned DEFAULT '0' NOT NULL,
	additional_info varchar(255) DEFAULT '' NOT NULL,
	verified int(11) DEFAULT '0' NOT NULL,
	permissions int(11) DEFAULT '0' NOT NULL,
	zoom int(11) DEFAULT '0' NOT NULL,
	map_type varchar(255) DEFAULT '' NOT NULL,
	type int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_status'
#
CREATE TABLE tx_relax5core_domain_model_status (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_source'
#
CREATE TABLE tx_relax5core_domain_model_source (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	sourcedetails int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_sourcedetail'
#
CREATE TABLE tx_relax5core_domain_model_sourcedetail (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	source int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_contact'
#
CREATE TABLE tx_relax5core_domain_model_contact (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,
	link int(11) unsigned DEFAULT '0' NOT NULL,

	contact varchar(255) DEFAULT '' NOT NULL,
	deny varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	permissions varchar(255) DEFAULT '' NOT NULL,
	priority int(11) DEFAULT '0' NOT NULL,
	type int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_company'
#
CREATE TABLE tx_relax5core_domain_model_company (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	short_name varchar(255) DEFAULT '' NOT NULL,
	legal_form int(11) DEFAULT '0' NOT NULL,
	industry int(11) DEFAULT '0' NOT NULL,
	employees int(11) DEFAULT '0' NOT NULL,
	reg_id varchar(255) DEFAULT '' NOT NULL,
	reg_authority varchar(255) DEFAULT '' NOT NULL,
	vat_id varchar(255) DEFAULT '' NOT NULL,
	comments text,
	allow_mail smallint(5) unsigned DEFAULT '0' NOT NULL,
	address_label text,
	permissions int(11) DEFAULT '0' NOT NULL,
	status int(11) unsigned DEFAULT '0',
	owner int(11) unsigned DEFAULT '0',
	usergroup int(11) unsigned DEFAULT '0',
	source int(11) unsigned DEFAULT '0',
	sourcedetail int(11) unsigned DEFAULT '0',
	relations int(11) unsigned DEFAULT '0' NOT NULL,
	addresses int(11) unsigned DEFAULT '0' NOT NULL,
	contacts int(11) unsigned DEFAULT '0' NOT NULL,
	documents int(11) unsigned DEFAULT '0' NOT NULL,
	links int(11) unsigned DEFAULT '0' NOT NULL,
	appointments int(11) unsigned DEFAULT '0' NOT NULL,
	categories int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_link'
#
CREATE TABLE tx_relax5core_domain_model_link (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,

	division varchar(255) DEFAULT '' NOT NULL,
	role varchar(255) DEFAULT '' NOT NULL,
	role_title varchar(255) DEFAULT '' NOT NULL,
	salutation varchar(255) DEFAULT '' NOT NULL,
	allow_mail smallint(5) unsigned DEFAULT '0' NOT NULL,
	address_label text,
	person_sorting int(11) DEFAULT '0' NOT NULL,
	company_sorting int(11) DEFAULT '0' NOT NULL,
	person_priority int(11) DEFAULT '0' NOT NULL,
	company_priority int(11) DEFAULT '0' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	permissions int(11) DEFAULT '0' NOT NULL,
	owner int(11) unsigned DEFAULT '0',
	usergroup int(11) unsigned DEFAULT '0',
	addresses int(11) unsigned DEFAULT '0' NOT NULL,
	contacts int(11) unsigned DEFAULT '0' NOT NULL,
	categories int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_document'
#
CREATE TABLE tx_relax5core_domain_model_document (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	file int(11) unsigned NOT NULL default '0',
	description varchar(255) DEFAULT '' NOT NULL,
	permissions int(11) DEFAULT '0' NOT NULL,
	owner int(11) unsigned DEFAULT '0',
	usergroup int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_appointment'
#
CREATE TABLE tx_relax5core_domain_model_appointment (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,

	date int(11) DEFAULT '0' NOT NULL,
	subject varchar(255) DEFAULT '' NOT NULL,
	duration int(11) DEFAULT '0' NOT NULL,
	details text,
	appointment_type int(11) DEFAULT '0' NOT NULL,
	appointment_status int(11) DEFAULT '0' NOT NULL,
	priority int(11) DEFAULT '0' NOT NULL,
	msolid varchar(255) DEFAULT '' NOT NULL,
	permissions int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	contact varchar(255) DEFAULT '' NOT NULL,
	result int(11) DEFAULT '0' NOT NULL,
	result_text varchar(255) DEFAULT '' NOT NULL,
	next_action int(11) DEFAULT '0' NOT NULL,
	next_action_text varchar(255) DEFAULT '' NOT NULL,
	contact_state int(11) DEFAULT '0' NOT NULL,
	task int(11) DEFAULT '0' NOT NULL,
	postponed_counter int(11) DEFAULT '0' NOT NULL,
	subject_orig varchar(255) DEFAULT '' NOT NULL,
	done int(11) DEFAULT '0' NOT NULL,
	owner int(11) unsigned DEFAULT '0',
	usergroup int(11) unsigned DEFAULT '0',
	creator int(11) unsigned DEFAULT '0',
	attendees int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_type'
#
CREATE TABLE tx_relax5core_domain_model_type (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	scope int(11) DEFAULT '0' NOT NULL,
	eval int(11) DEFAULT '0' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	wrap varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_zipcatalogue'
#
CREATE TABLE tx_relax5core_domain_model_zipcatalogue (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	country_code varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	area_code varchar(255) DEFAULT '' NOT NULL,
	state varchar(255) DEFAULT '' NOT NULL,
	verified smallint(5) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_addresscatalogue'
#
CREATE TABLE tx_relax5core_domain_model_addresscatalogue (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	country_code varchar(255) DEFAULT '' NOT NULL,
	street_code varchar(255) DEFAULT '' NOT NULL,
	community_code varchar(255) DEFAULT '' NOT NULL,
	community_name varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	zip varchar(255) DEFAULT '' NOT NULL,
	state varchar(255) DEFAULT '' NOT NULL,
	verified smallint(5) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_namecatalogue'
#
CREATE TABLE tx_relax5core_domain_model_namecatalogue (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	gender int(11) DEFAULT '0' NOT NULL,
	verified smallint(5) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_titlecatalogue'
#
CREATE TABLE tx_relax5core_domain_model_titlecatalogue (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_relation'
#
CREATE TABLE tx_relax5core_domain_model_relation (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	person int(11) unsigned DEFAULT '0' NOT NULL,
	company int(11) unsigned DEFAULT '0' NOT NULL,

	relation_id varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	direction int(11) DEFAULT '0' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	print smallint(5) unsigned DEFAULT '0' NOT NULL,
	share double(11,2) DEFAULT '0.00' NOT NULL,
	target_person int(11) unsigned DEFAULT '0',
	target_company int(11) unsigned DEFAULT '0',
	x_link int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_category'
#
CREATE TABLE tx_relax5core_domain_model_category (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	category varchar(255) DEFAULT '' NOT NULL,
	description text,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state smallint(6) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_relax5core_domain_model_relation'
#
CREATE TABLE tx_relax5core_domain_model_relation (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_address'
#
CREATE TABLE tx_relax5core_domain_model_address (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_contact'
#
CREATE TABLE tx_relax5core_domain_model_contact (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_document'
#
CREATE TABLE tx_relax5core_domain_model_document (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_link'
#
CREATE TABLE tx_relax5core_domain_model_link (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_appointment'
#
CREATE TABLE tx_relax5core_domain_model_appointment (

	person int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_person_category_mm'
#
CREATE TABLE tx_relax5core_person_category_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_relax5core_owner_owner_mm'
#
CREATE TABLE tx_relax5core_owner_owner_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_relax5core_domain_model_sourcedetail'
#
CREATE TABLE tx_relax5core_domain_model_sourcedetail (

	source int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_relation'
#
CREATE TABLE tx_relax5core_domain_model_relation (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_address'
#
CREATE TABLE tx_relax5core_domain_model_address (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_contact'
#
CREATE TABLE tx_relax5core_domain_model_contact (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_document'
#
CREATE TABLE tx_relax5core_domain_model_document (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_link'
#
CREATE TABLE tx_relax5core_domain_model_link (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_appointment'
#
CREATE TABLE tx_relax5core_domain_model_appointment (

	company int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_company_category_mm'
#
CREATE TABLE tx_relax5core_company_category_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_relax5core_domain_model_address'
#
CREATE TABLE tx_relax5core_domain_model_address (

	link int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_contact'
#
CREATE TABLE tx_relax5core_domain_model_contact (

	link int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_link_category_mm'
#
CREATE TABLE tx_relax5core_link_category_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_relax5core_appointment_attendees_owner_mm'
#
CREATE TABLE tx_relax5core_appointment_attendees_owner_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

#
# Table structure for table 'tx_relax5core_domain_model_person'
#
CREATE TABLE tx_relax5core_domain_model_person (

	last_name varchar(60) DEFAULT '' NOT NULL,
	middle_name varchar(60) DEFAULT '' NOT NULL,
	first_name varchar(60) DEFAULT '' NOT NULL,
	title varchar(60) DEFAULT '' NOT NULL,
	salutation varchar(60) DEFAULT '' NOT NULL,

	KEY last_name (last_name),
	KEY first_name (first_name),

);

#
# Table structure for table 'tx_relax5core_domain_model_address'
#
CREATE TABLE tx_relax5core_domain_model_address (

	address varchar(60) DEFAULT '' NOT NULL,
	number_additions varchar(20) DEFAULT '' NOT NULL,
	zip varchar(10) DEFAULT '' NOT NULL,
	city varchar(100) DEFAULT '' NOT NULL,
	state varchar(60) DEFAULT '' NOT NULL,
	country varchar(3) DEFAULT '' NOT NULL,

	lat double(20,16) DEFAULT '0.0000000000000000' NOT NULL,
	lon double(20,16) DEFAULT '0.0000000000000000' NOT NULL,
	
    KEY person (person),
    KEY company (company),
    KEY link (link),
    KEY address (address),
    KEY sorting (sorting),

);

#
# Table structure for table 'tx_relax5core_domain_model_addresscatalogue'
#
CREATE TABLE tx_relax5core_domain_model_addresscatalogue (

	country_code varchar(3) DEFAULT '' NOT NULL,
	address varchar(100) DEFAULT '' NOT NULL,
	zip varchar(10) DEFAULT '' NOT NULL,
	state varchar(60) DEFAULT '' NOT NULL,
	verified smallint(5) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_contact'
#
CREATE TABLE tx_relax5core_domain_model_contact (

	contact varchar(100) DEFAULT '' NOT NULL,
	
    KEY contact (contact),
    KEY person (person),
    KEY company (company),
    KEY link (link),
    KEY sorting (sorting),

);

#
# Table structure for table 'tx_relax5core_domain_model_appointment'
#
CREATE TABLE tx_relax5core_domain_model_appointment (

	subject varchar(100) DEFAULT '' NOT NULL,
	name varchar(100) DEFAULT '' NOT NULL,
	address varchar(100) DEFAULT '' NOT NULL,
	contact varchar(100) DEFAULT '' NOT NULL,
	result_text varchar(30) DEFAULT '' NOT NULL,
	next_action_text varchar(30) DEFAULT '' NOT NULL,

	
    KEY contact (contact),
    KEY person (person),
    KEY company (company),
    KEY date (date),
    KEY subject (subject),
    KEY project (project),
    KEY state (state),
    KEY result (result),
    KEY result_text (result_text),
    KEY next_action (next_action),
    KEY next_action_text (next_action_text),

);

#
# Table structure for table 'tx_relax5core_domain_model_addresscatalogue'
#
CREATE TABLE tx_relax5core_domain_model_addresscatalogue (

	country_code varchar(3) DEFAULT '' NOT NULL,
	street_code varchar(5) DEFAULT '' NOT NULL,
	community_code varchar(5) DEFAULT '' NOT NULL,
	community_name varchar(50) DEFAULT '' NOT NULL,
	address varchar(60) DEFAULT '' NOT NULL,
	zip varchar(10) DEFAULT '' NOT NULL,
	state varchar(60) DEFAULT '' NOT NULL,
	verified smallint(5) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_type'
#
CREATE TABLE tx_relax5core_domain_model_type (

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_relax5core_domain_model_relation'
#
CREATE TABLE tx_relax5core_domain_model_relation (

	KEY target_person (target_person),
	KEY target_company (target_person),
	KEY person (person),
	KEY company (company),

);