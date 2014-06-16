<?php

use yii\db\Schema;

class m140612_092709_siteDetailsTankDetailsColumns extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('site_details', 'tank_width', 'string');
        $this->addColumn('site_details', 'tank_height', 'string');
        $this->addColumn('site_details', 'tank_bredth', 'string');
    }

    public function down()
    {
        $this->dropColumn('site_details', 'tank_width');
        $this->dropColumn('tank_details', 'tank_height');
        $this->dropColumn('site_details', 'tank_bredth');
    }
}
