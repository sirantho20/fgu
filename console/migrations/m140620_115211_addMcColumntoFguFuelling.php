<?php

use yii\db\Schema;

class m140620_115211_addMcColumntoFguFuelling extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('fgu_fuelling', 'mc', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('fgu_fuelling', 'mc');
    }
}
