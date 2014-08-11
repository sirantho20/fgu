 <?php

use yii\db\Schema;

class m140620_174757_fuelOnsite extends \yii\db\Migration
{
    public function up()
    {
        $this->execute(
                "CREATE VIEW fuel_on_site AS select week(max(fgu.reading_date),1) as 'week_number', fgu.fuel_quantity_lts,
(select sum(quantity_delivered_lts) from fgu_fuelling as fuelling 
where week(fuelling.delivery_date,1) = week(fgu.reading_date,1) and fgu.reading_date < fuelling.delivery_date) as fuel_added
,fgu.reading_date, fgu.site_id
from genset_reading as fgu group by week(reading_date,1)"
                );
    }

    public function down()
    {
        $this->execute('DROP VIEW IF EXISTS `fuel_on_site`');
    }
}
