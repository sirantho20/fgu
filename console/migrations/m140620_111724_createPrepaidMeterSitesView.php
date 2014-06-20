<?php

use yii\db\Schema;

class m140620_111724_createPrepaidMeterSitesView extends \yii\db\Migration
{
    public function up()
    {
        $this->execute('DROP VIEW IF EXISTS `prepaid_meter_sites`');
        $this->execute('DROP TABLE IF EXISTS `prepaid_meter_sites`');
        $this->execute('CREATE VIEW `prepaid_meter_sites` AS select `sites`.`site_id` AS `site_id`,`sites`.`site_name` AS `site_name`,`sites`.`region` AS `region`,`sites`.`city_town` AS `city_town` from ((`site` `sites` join `meter_site` `metersite` on((`sites`.`site_id` = `metersite`.`site_id`))) join `utility_meter` on((`utility_meter`.`meter_id` = `metersite`.`meter_id`))) where (`utility_meter`.`meter_type` = :prepaid)',[':prepaid'=>'prepaid']);
    }

    public function down()
    {
        $this->execute('DROP TABLE IF EXISTS `prepaid_meter_sites`');
    }
}
