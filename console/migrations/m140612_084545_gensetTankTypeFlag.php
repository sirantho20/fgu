<?php

use yii\db\Schema;

class m140612_084545_gensetTankTypeFlag extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('gensets', 'has_base_tank', 'string');
    }

    public function down()
    {
        $this->dropColumn('gensets', 'has_base_tank');
        //echo "m140612_084545_gensetTankTypeFlag cannot be reverted.\n";

        return false;
    }
}
