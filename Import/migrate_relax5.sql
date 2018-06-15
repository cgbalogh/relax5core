#
# append tx_crmrelax5_domain_model_category
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_category`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_category`
    (
    `uid`, `pid`, `category`, `description`,`crdate`, `tstamp`,
    `deleted`, `hidden`
    )
SELECT 
    `uid`, '56' AS `pid`, `name` AS `category`, `description`, `crdate`, `tstamp`, 
    `deleted`, `hidden`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_category`;


#
# append tx_crmrelax5_person_category_mm
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_person_category_mm`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_person_category_mm`
    (
    `uid_local`, `uid_foreign`, `sorting`, `sorting_foreign`
    )
SELECT 
    `uid_local`, `uid_foreign`, `sorting`, `sorting_foreign`
FROM `t3_relax5_old`.`tx_crmrelax5_person_category_mm`
GROUP BY 1,2;


#
# append fe_users
#
#TRUNCATE `t3_rlx5_dev`.`fe_users`;
#INSERT INTO `t3_rlx5_dev`.`fe_users` 
#    (
#    `uid`, `pid`, `tstamp`, `username`, `password`, `usergroup`, `disable`, `starttime`, 
#    endtime, name, first_name, middle_name, last_name, address, telephone, fax, 
#    email, crdate, cruser_id, lockToDomain, deleted, uc, title, zip, 
#    city, country, www, company, image, TSconfig, lastlogin, is_online, 
#    felogin_redirectPid, felogin_forgotHash, tx_extbase_type, pwd_change_date
#    )
#SELECT 
#    uid, '56' AS pid, tstamp, username, password, usergroup, disable, starttime, 
#    endtime, name, first_name, middle_name, last_name, address, telephone, fax, 
#    email, crdate, cruser_id, lockToDomain, deleted, uc, title, zip, 
#    city, country, www, company, image, TSconfig, lastlogin, is_online, 
#    felogin_redirectPid, felogin_forgotHash, 'Tx_Relax5core_Owner', pwd_change_date
#FROM t3_relax5_old.fe_users;


#
# append fe_groups
#
#TRUNCATE t3_rlx5_dev.fe_groups;
#INSERT INTO t3_rlx5_dev.fe_groups 
#    (
#    uid, pid, tstamp, crdate, cruser_id, title, hidden, 
#    lockToDomain, deleted, description, subgroup,
#    TSconfig, felogin_redirectPid, tx_extbase_type
#    )
#SELECT 
#    uid, '56' AS pid, tstamp, crdate, cruser_id, title, hidden, 
#    lockToDomain, deleted, description, subgroup,
#    TSconfig, felogin_redirectPid, 'Tx_Relax5core_Usergroup'
#FROM t3_relax5_old.fe_groups;


#
# append tx_crmrelax5_domain_model_person
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_person`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_person`
    (
    `uid`, `pid`, `last_name`, `first_name`, `title`, `gender`, `date_of_birth`, `marital_state`, `comments`,
    `image`, `salutation`, `allow_mail`, `address_label`, `owner`, `usergroup`, `status`, `tstamp`, `crdate`,
    `deleted`, `permissions`, `appointments`,`documents`,`source`,
    `sourcedetail`, `addresses`, `contacts`, `relations`
    )
SELECT 
    `uid`, '56' AS pid, `last_name`, `first_name`, `title`, `gender`, `date_of_birth`, `marital_state`, `comments`,
    `picture`, `salutation`, `allow_mail`, `address_label`, `owner`, `usergroup`, 1 + `status`, `tstamp`, `crdate`,
    `deleted`, `permissions`, `appointments`,`documents`,`source_category` AS `source`,
    `source` AS `sourcedetail`, `addresses`, `contacts`, `relations`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_person`;


#
# append tx_crmrelax5_domain_model_company
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_company`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_company`
    (
    `uid`, `pid`, `name`, `short_name`, `legal_form`, `industry`, `employees`, `reg_id`, `reg_authority`, 
    `vat_id`, `comments`, `allow_mail`, `address_label`, `status`, `owner`, `usergroup`, `tstamp`, `crdate`,
    `deleted`, `permissions`, `appointments`,`documents`,`source`,
    `sourcedetail`, `addresses`, `contacts`, `relations`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `short_name`, `legal_form`, `industry`, `employees`, `reg_id`, `reg_authority`, 
    `vat_id`, `comments`, `allow_mail`, `address_label`, 1 + `status`, `owner`, `usergroup`, `tstamp`, `crdate`,
    `deleted`, `permissions`, 0 AS `appointments`,`documents`,`source_category` AS `source`,
    `source` AS `sourcedetail`, `addresses`, `contacts`, `relations`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_company`;


#
# append tx_crmrelax5_domain_model_link
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_link`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_link`
    (
    `uid`, `pid`, `person`, `company`, `owner`, `usergroup`, `tstamp`, `crdate`,
    `deleted`, `permissions`, `division`,`role`,`role_title`,
    `salutation`, `allow_mail`, `address_label`, `person_sorting`, `company_sorting`, `person_priority`, `company_priority`,
    `description`, `addresses`, `contacts`, `categories`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, `company`,`owner`, `usergroup`, `tstamp`, `crdate`,
    `deleted`, `permissions`, `division`,`role`,`role_title`,
    `salutation`, ! `no_mail` AS `allow_mail`, `address_label`, `person_sorting`, `company_sorting`, `person_priority`, `company_priority`,
    `description`, `addresses`, `contacts`, `categories`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_link`;


#
# append tx_crmrelax5_domain_model_address
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_address`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_address`
    (
    `uid`, `pid`, `person`, `company`, `link`, `tstamp`, `crdate`,
    `deleted`, `address`,`number`,`number_additions`,
    `zip`, `city`, `state`, `country`, `lat`, `lon`, `geo_only`,
    `description`, `allow_mail`, `permissions`, `additional_info`, `sorting`, `categories`, `type`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, `company`, `link`, `tstamp`, `crdate`,
    `deleted`, `address`,`number`,`number_additions`,
    `zip`, `city`, `state`, `country`, `lat`, `lon`, `geo_only`,
    `description`, `allow_mail`, `permissions`, `additional_info`, `sorting`, `categories`, IF(`person`, `priority` + 1, IF(`company`, `priority` + 5, IF(`link`, `priority` + 10, 0))) AS `type`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_address`;


#
# append tx_crmrelax5_domain_model_contact
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_contact`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_contact`
    (
    `uid`, `pid`, `person`, `company`, `link`, `tstamp`, `crdate`,
    `deleted`, `contact`, `type`, `description`, `priority`, `permissions`, `sorting`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, `company`, `link`, `tstamp`, `crdate`,
    `deleted`, `contact`, IF(`person`, `type` + 11, IF(`company`, `type` + 15, IF(`link` AND `type` > 10, `type` + 9, IF(`link` AND `type` = 3, 22, 0)  ))) AS `type`, `description`, `priority`, `permissions`, `sort_order` AS `sorting`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_contact`;


#
# append tx_crmrelax5_domain_model_appointment
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_appointment`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_appointment`
    (
    `uid`, `pid`, `person`, `company`, `tstamp`, `crdate`,
    `deleted`, `date`, `duration`, `subject`, `details`, `appointment_type`, `appointment_status`, `priority`, `msolid`, `permissions`,
    `name`, `address`, `contact`, `result`, `contact_state`, `task`, `tx_extbase_type`, `owner`,
    `state`, `project`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, `company`, `tstamp`, `crdate`,
    `deleted`, `date`, `duration`, `subject`, `details`, IF(`type`=34,19,IF(`type`>=21,`type`-8,IF(`type`>=11,`type`-4,`type`))) AS `appointment_type`, 1 + IF(`status`>=1 AND `status`<=2, 3-`status`, `status`), 
    `priority`, `msolid`, `permissions`,
    `person_field`AS `name`, `address`, `contact`, `result`, `contact_state`, `task`, 'Tx_Relax5project_Appointment', `owner`,
    `state`, `project`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_appointment`;

UPDATE `t3_rlx5_dev`.`tx_relax5core_domain_model_appointment` SET `tx_extbase_type` = 'Tx_Relax5core_Appointment' WHERE `state` = 0;


#
# append tx_crmrelax5_domain_model_status
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_status`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_status` (`uid`, `pid`, `name`) VALUES (1, '56', 'default');
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_status` (`uid`, `pid`, `name`) VALUES (2, '56', 'Partner');
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_status` (`uid`, `pid`, `name`) VALUES (3, '56', 'Multiplier');
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_status` (`uid`, `pid`, `name`) VALUES (4, '56', 'Media');
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_status` (`uid`, `pid`, `name`) VALUES (5, '56', 'Contact');




#
# append addresscatalogue
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_addresscatalogue`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_addresscatalogue`
    (
    `pid`, `country_code`, `address`, `zip`, `state`, `verified`, `street_code`, `community_code`, `community_name`
    )
SELECT 
    '56' AS `pid`, 'A' AS `country_code`, `STROFFI` AS `address`, `PLZNR` AS `zip`, '' AS `state`, 1 AS `verified`, `SKZ` AS `street_code`, `GEMNR` AS `community_code`, `GEMNAM38` AS `community_name` 
FROM `t3_rlx5_dev`.`_gemplzstr`;


#
# append tx_crmrelax5_domain_model_sourcecategory
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_source`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_source`
    (
    `uid`, `pid`, `name`, `description`,`crdate`, `tstamp`,
    `deleted`, `hidden`, `sourcedetails`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `description`, `crdate`, `tstamp`, 
    `deleted`, `hidden`, `sources` AS `sourcedatils`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_sourcecategory`;


#
# append tx_crmrelax5_domain_model_source
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_sourcedetail`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_sourcedetail`
    (
    `uid`, `pid`, `name`, `description`,`crdate`, `tstamp`,
    `deleted`, `hidden`, `source`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `description`, `crdate`, `tstamp`, 
    `deleted`, `hidden`, `sourcecategory` AS `source`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_source`;


#
# append tx_crmrelax5_domain_model_namecatalogue
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_namecatalogue`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_namecatalogue`
    (
    `uid`, `pid`, `name`, `gender`, `verified`, `crdate`, `tstamp`,
    `deleted`, `hidden`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `gender`, `verified`, `crdate`, `tstamp`, 
    `deleted`, `hidden`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_namecatalogue`;


#
# append tx_crmrelax5_domain_model_relation
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_relation`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_relation`
    (
    `uid`, `pid`, `person`, `relation_id`, `type`, `direction`, `target_person`, `description`, `print`, `crdate`, `tstamp`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, CONCAT('P', `relation_id`) AS `relation_id`, ELT(`type`, 2, 1, 3, 1, 5, 4, 6), `direction`, `target` AS `target_person`, `description`, `print`, `crdate`, `tstamp`, `deleted`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_relation`;

INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_relation`
    (
    `uid`, `pid`, `company`, `relation_id`, `type`, `direction`, `target_company`, `description`, `crdate`, `tstamp`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `company`, CONCAT('C', `relation_id`) AS `relation_id`, `type`, `direction`, `target` AS `target_company`, `description`, `crdate`, `tstamp`, `deleted`
FROM `t3_relax5_old`.`tx_crmrelax5_domain_model_companyrelation`;

#
# populate address types default lang = en
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5core_domain_model_type`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5core_domain_model_type`
    (`uid`, `pid`, `sys_language_uid`, `l10n_parent`, `eval`, `name`, `scope`, `crdate`, `tstamp` )
VALUES 
    ( 1, '56', 0,  0, 4, 'Principal Residence', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 2, '56', 0,  0, 4, 'Second Residence', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 3, '56', 0,  0, 4, 'Leisure Residence', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 4, '56', 0,  0, 4, 'Building Area', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 5, '56', 0,  0, 4, 'Head Office', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 6, '56', 0,  0, 4, 'Branch Office', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 7, '56', 0,  0, 4, 'Store', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 8, '56', 0,  0, 4, 'Manufacture', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    ( 9, '56', 0,  0, 4, 'Building Area', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (10, '56', 0,  0, 4, 'Office', 3, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (11, '56', 0,  0, 4, 'Branch Office', 3, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (12, '56', 0,  0, 1, 'Private Phone', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (13, '56', 0,  0, 1, 'Private Fax', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (14, '56', 0,  0, 2, 'Private Email', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (15, '56', 0,  0, 3, 'Private Website', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (16, '56', 0,  0, 1, 'Company Phone', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (17, '56', 0,  0, 1, 'Company Fax', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (18, '56', 0,  0, 2, 'Company Email', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (19, '56', 0,  0, 3, 'Company Website', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (20, '56', 0,  0, 4, 'personal Phone Ext', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (21, '56', 0,  0, 4, 'personal Fax Ext', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (22, '56', 0,  0, 2, 'personal Email', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),

    (23, '56', 1,  1, 4, 'Hauptwohnsitz', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (24, '56', 1,  2, 4, 'Zweitwohnsitz', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (25, '56', 1,  3, 4, 'Ferienwohnsitz', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (26, '56', 1,  4, 4, 'Baugrund', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (27, '56', 1,  5, 4, 'Firmensitz', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (28, '56', 1,  6, 4, 'Filiale', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (29, '56', 1,  7, 4, 'Lager', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (30, '56', 1,  8, 4, 'Produktion', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (31, '56', 1,  9, 4, 'Baugrund', 2, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (32, '56', 1, 10, 4, 'Niederlassung', 3, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (33, '56', 1, 11, 4, 'Filiale', 3, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (34, '56', 1, 12, 1, 'Telefon privat', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (35, '56', 1, 13, 1, 'Fax privat', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (36, '56', 1, 14, 2, 'E-Mail privat', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (37, '56', 1, 15, 3, 'Website privat', 4, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (38, '56', 1, 16, 1, 'Telefon Firma', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (39, '56', 1, 17, 1, 'Fax Firma', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (40, '56', 1, 18, 2, 'E-Mail Firma', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (41, '56', 1, 19, 3, 'Website Firma', 5, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (42, '56', 1, 20, 4, 'persönliche Telefon DW', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (43, '56', 1, 21, 4, 'persönliche Fax DW', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()),
    (44, '56', 1, 22, 2, 'persönliche E-Mail', 6, UNIX_TIMESTAMP(), UNIX_TIMESTAMP());

#
# correct the relation x references
#
UPDATE `t3_rlx5_dev`.`tx_relax5core_domain_model_relation` a
  JOIN `t3_rlx5_dev`.`tx_relax5core_domain_model_relation` b ON a.person = b.target_person SET a.x_link = b.uid, b.x_link = a.uid, b.direction = -a.direction;

UPDATE `t3_rlx5_dev`.`tx_relax5core_domain_model_relation` SET `type` = -`type` WHERE `direction` < 0;

UPDATE `t3_rlx5_dev`.`fe_users` SET `password` = '$pbkdf2-sha256$25000$5ReHab9SWDK5ty5r6U8jrA$CHdrMn7au/vfgFXqjjLp3kIJvdFzQMTtIdHZkjgx8hk' WHERE `uid` > 1;

#INSERT INTO `t3_rlx5_dev`.`fe_users`
#    ( `pid`, `username`, `last_name`, `first_name`, `password`, `tx_extbase_type` )
#VALUES 
#    ( '56', 'kuetta', 'Küttner', 'Tanja', 'RelaxNeu', 'Tx_Relax5core_Owner');



###################################################################################################################

#
# append tx_crmrelax5dfa_domain_model_productgroup
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_productgroup`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_productgroup`
    (
    `uid`, `pid`, `name`, `description`, `products`, `productoptions`, `sorting`, `tstamp`, `crdate`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `description`, `products`, `productoptions`, `sorting`, `tstamp`, `crdate`, `deleted`

FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_productgroup`;


#
# append tx_crmrelax5dfa_domain_model_product
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_product`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_product`
    (
    `uid`, `pid`, `name`, `description`, `productoptions`, `tstamp`, `crdate`, `deleted`, `category`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `description`, `productoptions`, `tstamp`, `crdate`, `deleted`, `category`

FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_product`;


#
# append tx_crmrelax5dfa_domain_model_productoptions
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_productoption`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_productoption`
    (
    `uid`, `pid`, `name`, `description`, 
    `optiongroup`,`optionlist`,`labeltext`,`exclusive`,`dropdown`,`display_condition`,`new_mapping`,`input_type`,`input_values`,`global_option`,`enable`,
    `tstamp`, `crdate`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `name`, `description`, 
    `optiongroup`,`optionlist`,`label`,`exclusive`,`dropdown`,`required_for`,`new_mapping`,`input_type`,`input_values`,`global_option`,`enable`,
    `tstamp`, `crdate`, `deleted`

FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_productoption`;


#
# append tx_crmrelax5dfa_domain_model_project
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_project`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_project`
    (
    `uid`, `pid`, `person`, `company`, `tstamp`, `crdate`, `deleted`,
    `name`, `time_horizon`, `target`, `actual`, `owner`, `productgroup`,`address`,
    `description`
    )
SELECT 
    `uid`, '56' AS `pid`, `person`, `company`, `tstamp`, `crdate`, `deleted`,
    `name`, `time_horizon`, `target`, `actual`, `owner`, `productgroup`,`address`,
    `description`
FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_project`;


#
# append tx_crmrelax5dfa_domain_model_mapping
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_mapping`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_mapping`
    (
    `uid`, `pid`, `value`, `project`, `productoption`
    )
SELECT 
    `uid`, '56' AS `pid`, `value`, `project`, `productoption`
FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_mapping`;


#
# append tx_crmrelax5dfa_domain_model_state
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_state`
    (
    `uid`, `pid`, `project`, `state_name`, `state_group`, `crdate`, `deleted`,
    `due`, `done`, `due_orig`, `forward`, `notify`, `owner`,
    `sorting`
    )
SELECT 
    `uid`, '56' AS `pid`, `project`, `state`, `state_group`, `crdate`, `deleted`,
    `due`, `done`, `due_orig`, `forward`, `notify`, `owner`,
    `sorting`+ 1
FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_state`;


#
# append tx_crmrelax5dfa_domain_model_role
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_role`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_role`
    (
    `uid`, `pid`, `project`, `internal`, `external`, `role`, `tstamp`, `crdate`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `project`, `internal`, `external`, `role`, `tstamp`, `crdate`, `deleted`
FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_role`;


#
# append tx_crmrelax5dfa_domain_model_responsibility
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_responsibility`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5project_domain_model_responsibility`
    (
    `uid`, `pid`, `state`, `due`, `done`, `owner`, `id`, `comments`, `tstamp`, `crdate`, `deleted`
    )
SELECT 
    `uid`, '56' AS `pid`, `state`, `due`, `done`, `owner`, `id`, `comments`, `tstamp`, `crdate`, `deleted`
FROM `t3_relax5_old`.`tx_crmrelax5dfa_domain_model_responsibility`;


UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  1 WHERE `state_name` = 'akquisition';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  2 WHERE `state_name` = 'ersttermin';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  4 WHERE `state_name` = 'interesse';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'planung';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'vp1';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'planungL';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'planung1';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'planung2';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  5 WHERE `state_name` = 'planung1R';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  6 WHERE `state_name` = 'planFertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  6 WHERE `state_name` = 'vp1-fertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  6 WHERE `state_name` = 'planung2R';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  7 WHERE `state_name` = 'kalkulation';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  7 WHERE `state_name` = 'kalkulationL';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  7 WHERE `state_name` = 'kalkulation1';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  7 WHERE `state_name` = 'vp1-kalkulation';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  7 WHERE `state_name` = 'kalkulation1R';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  8 WHERE `state_name` = 'angebot';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  8 WHERE `state_name` = 'vp1-angebot';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` =  9 WHERE `state_name` = 'aenderung';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 10 WHERE `state_name` = 'auftrag';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 11 WHERE `state_name` = 'vorpruefung';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 11 WHERE `state_name` = 'vorpruefplanung';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 12 WHERE `state_name` = 'vorpruefplanFertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 13 WHERE `state_name` = 'einreichplanung';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 13 WHERE `state_name` = 'einreichung1';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 13 WHERE `state_name` = 'einreichungL';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 14 WHERE `state_name` = 'einreichplanFertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 14 WHERE `state_name` = 'einreichung2';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 15 WHERE `state_name` = 'nachtrag';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 16 WHERE `state_name` = 'nachtragFertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 17 WHERE `state_name` = 'eingereicht';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 18 WHERE `state_name` = 'beendet';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 18 WHERE `state_name` = 'fertig';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 21 WHERE `state_name` = 'absage';
UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_state` SET `state` = 22 WHERE `state_name` = 'finanzcheck';


UPDATE `t3_rlx5_dev`.`tx_relax5core_domain_model_appointment` a 
    LEFT JOIN `t3_rlx5_dev`.`tx_relax5project_domain_model_state` s ON a.state = s.uid SET a.project = s.project 
    WHERE a.state > 0 AND a.project != s.project;


UPDATE `t3_rlx5_dev`.`tx_relax5project_domain_model_project` p
LEFT JOIN `t3_rlx5_dev`.`tx_relax5project_domain_model_state` s1 ON s1.project = p.uid 
    AND s1.sorting = (SELECT MAX(sorting) FROM `t3_rlx5_dev`.`tx_relax5project_domain_model_state` s2 WHERE s2.project = p.uid)
SET `current_state` = s1.uid;

#
# truncate additional attributes
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5addinfo_domain_model_addattribute`;

#
# truncate cost
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5project_domain_model_cost`;
