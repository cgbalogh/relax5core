#
# append tx_crmrelax5ems_domain_model_event
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5event_domain_model_event`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5event_domain_model_event`
    (
    `uid`, `pid`, `name`, `date`, `location_text`, `max_participants`, `crdate`, `tstamp`,`deleted`, `hidden`
    )
SELECT 
    `uid`, '86' AS `pid`, `name`, `date`, `location`AS `location_text`, `max_participants`, `crdate`, `tstamp`, `deleted`, `hidden`
FROM `t3_relax5_old`.`tx_crmrelax5ems_domain_model_event`;

#
# append tx_crmrelax5ems_domain_model_entry
#
TRUNCATE `t3_rlx5_dev`.`tx_relax5event_domain_model_entry`;
INSERT INTO `t3_rlx5_dev`.`tx_relax5event_domain_model_entry`
    (
    `uid`, `pid`, `registered`, `participants`, `phone`, `email`, `reminder`, `event`, `person`, `crdate`, `tstamp`,`deleted`, `hidden`
    )
SELECT 
    `uid`, '86' AS `pid`, `registered`, `participants`, `phone`, `email`, `reminder`, `event`, `person`, `crdate`, `tstamp`,`deleted`, `hidden`
FROM `t3_relax5_old`.`tx_crmrelax5ems_domain_model_entry`;



