<?php

use yii\db\Schema;
use yii\db\Migration;

class m140718_174222_reportingViews extends Migration
{
    public function up()
    {
        $this->execute('DROP VIEW IF EXISTS `fgu_step_1`; CREATE  VIEW `fgu_step_1` AS select `main`.`genset_id` AS `genset_id`,`main`.`site_id` AS `site_id`,`main`.`reading_date` AS `reading_date`,`main`.`fuel_level_cm` AS `fuel_level_cm`,`main`.`genset_run_hours` AS `genset_run_hours`,`main`.`entry_date` AS `entry_date`,`main`.`reading_by` AS `reading_by`,`main`.`entry_by` AS `entry_by`,`main`.`source_of_reading` AS `source_of_reading`,`main`.`date_modified` AS `date_modified`,`main`.`modified_by` AS `modified_by`,`main`.`days_from_last_reading` AS `days_from_last_reading`,`main`.`access_code` AS `access_code`,`main`.`meter_reading` AS `meter_reading`,(select sum(`fuelling`.`quantity_delivered_lts`) from `fgu_fuelling` `fuelling` where ((`fuelling`.`site_id` = `main`.`site_id`) and (`fuelling`.`genset_id` = `main`.`genset_id`) and (`fuelling`.`delivery_date` <= `main`.`reading_date`) and (`fuelling`.`delivery_date` > (select max(`last`.`reading_date`) from `genset_reading` `last` where ((`last`.`reading_date` < `main`.`reading_date`) and (`last`.`site_id` = `main`.`site_id`) and (`last`.`genset_id` = `last`.`genset_id`)))) and (week(`fuelling`.`delivery_date`,1) = week(`main`.`reading_date`,1)))) AS `fuel_delivered`,(select `fuel`.`fuel_quantity_lts` from `genset_reading` `fuel` where ((`fuel`.`genset_id` = `main`.`genset_id`) and (`fuel`.`site_id` = `main`.`site_id`) and (`fuel`.`reading_date` < `main`.`reading_date`)) order by `fuel`.`reading_date` desc limit 1) AS `last_fuel_level`,`main`.`fuel_quantity_lts` AS `fuel_quantity_lts`,`main`.`power_consumed` AS `power_consumed`,`main`.`mc` AS `mc`,`main`.`run_hours_for_period` AS `run_hours_for_period` from `genset_reading` `main`');
        $this->execute('DROP VIEW IF EXISTS `fgu_step_2`; CREATE VIEW `fgu_step_2` AS select `fgu_step_1`.`genset_id` AS `genset_id`,`fgu_step_1`.`site_id` AS `site_id`,`fgu_step_1`.`reading_date` AS `reading_date`,`fgu_step_1`.`fuel_level_cm` AS `fuel_level_cm`,`fgu_step_1`.`genset_run_hours` AS `genset_run_hours`,`fgu_step_1`.`entry_date` AS `entry_date`,`fgu_step_1`.`reading_by` AS `reading_by`,`fgu_step_1`.`entry_by` AS `entry_by`,`fgu_step_1`.`source_of_reading` AS `source_of_reading`,`fgu_step_1`.`date_modified` AS `date_modified`,`fgu_step_1`.`modified_by` AS `modified_by`,`fgu_step_1`.`days_from_last_reading` AS `days_from_last_reading`,`fgu_step_1`.`access_code` AS `access_code`,`fgu_step_1`.`meter_reading` AS `meter_reading`,ifnull(`fgu_step_1`.`fuel_delivered`,0) AS `fuel_delivered`,((`fgu_step_1`.`last_fuel_level` + ifnull(`fgu_step_1`.`fuel_delivered`,0)) - `fgu_step_1`.`fuel_quantity_lts`) AS `fuel_consumed`,`fgu_step_1`.`last_fuel_level` AS `last_fuel_level`,`fgu_step_1`.`fuel_quantity_lts` AS `fuel_quantity_lts`,`fgu_step_1`.`power_consumed` AS `power_consumed`,`fgu_step_1`.`mc` AS `mc`,`fgu_step_1`.`run_hours_for_period` AS `run_hours_for_period` from `fgu_step_1`');
        $this->execute('DROP VIEW IF EXISTS fgu_step_3;
CREATE VIEW fgu_step_3 AS
SELECT fgu_step_2.genset_id,
       fgu_step_2.site_id,
       fgu_step_2.reading_date,
       YEAR(fgu_step_2.reading_date) AS `year`,
       CEIL(MONTH(fgu_step_2.reading_date) / 6) AS `half`,
       MONTH(fgu_step_2.reading_date) AS `month`,
       QUARTER(fgu_step_2.reading_date) as `quarter`,
       WEEK(fgu_step_2.reading_date,1) as `week`,
       fgu_step_2.fuel_level_cm,
       fgu_step_2.genset_run_hours,
       fgu_step_2.entry_date,
       fgu_step_2.reading_by,
       fgu_step_2.entry_by,
       fgu_step_2.source_of_reading,
       fgu_step_2.date_modified,
       fgu_step_2.modified_by,
       fgu_step_2.days_from_last_reading,
       fgu_step_2.access_code,
       fgu_step_2.meter_reading,
       ROUND(fgu_step_2.fuel_delivered,3) fuel_delivered,
       ROUND(fgu_step_2.fuel_consumed,3) fuel_consumed,
       ROUND((fgu_step_2.fuel_consumed / fgu_step_2.run_hours_for_period),2) AS fuel_consumption_per_hr_lts,
       fgu_step_2.last_fuel_level,
       fgu_step_2.fuel_quantity_lts,
       fgu_step_2.power_consumed,
       ROUND((fgu_step_2.power_consumed / ((fgu_step_2.days_from_last_reading * 24) - fgu_step_2.run_hours_for_period)),2) AS power_consumed_per_hr_kwh,
       ROUND(((fgu_step_2.days_from_last_reading * 24) - fgu_step_2.run_hours_for_period),2) AS grid_hours,
       ROUND((((fgu_step_2.days_from_last_reading * 24) - fgu_step_2.run_hours_for_period) / (fgu_step_2.days_from_last_reading * 24) * 100),2) AS grid_power_percent_availability,
       ROUND((fgu_step_2.run_hours_for_period / (fgu_step_2.days_from_last_reading * 24) * 100),2) AS genset_power_percent_availability,
       fgu_step_2.mc,
       gensets.kva,
       cph.cph,
       ROUND(if(fgu_step_2.fuel_consumed - (cph.cph * fgu_step_2.run_hours_for_period)>0,fgu_step_2.fuel_consumed - (cph.cph * fgu_step_2.run_hours_for_period),0),2) AS fuel_theft,
       fgu_step_2.run_hours_for_period as genset_run_hours_for_period,
       details.field_supervisor,
       details.x3_site_id,
       details.ownership,
       details.tigo_site_class,
       details.htg_site_type
  FROM fgu1.fgu_step_2 fgu_step_2
  INNER JOIN gensets as gensets
  on fgu_step_2.genset_id = gensets.genset_id
  inner join genset_cph cph
  on gensets.kva = cph.kva
  inner join site_details details
  on details.site_id = fgu_step_2.site_id
  ');
    }

    public function down()
    {
        $this->execute('DROP VIEW IF EXISTS fgu_step_3, fgu_step_2, fgu_step_1');
    }
}
