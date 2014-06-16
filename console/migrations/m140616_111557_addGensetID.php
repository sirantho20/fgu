<?php

use yii\db\Schema;

class m140616_111557_addGensetID extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('fgu_fuelling', 'genset_id', 'string');
    }

    public function down()
    {
       $this->dropColumn('fgu_fuelling', 'genset_id');
    }
}
