<?php

use yii\db\Schema;

class m140612_091507_gensetTankDimensionsNotRequired extends \yii\db\Migration
{
    public function up()
    {
        $this->alterColumn('gensets', 'fuel_tank_height', 'string');
        $this->alterColumn('gensets', 'fuel_tank_breadth', 'string');
        $this->alterColumn('gensets', 'fuel_tank_width', 'string');
    }

    public function down()
    {
        echo "m140612_091507_gensetTankDimensionsNotRequired cannot be reverted.\n";

        return false;
    }
}
