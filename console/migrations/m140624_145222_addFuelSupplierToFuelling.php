<?php

use yii\db\Schema;

class m140624_145222_addFuelSupplierToFuelling extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('fgu_fuelling', 'fuel_supplier', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('fgu_fuelling', 'fuel_supplier');
    }
}
