<?php

use yii\db\Schema;

class m140620_102305_mcColumnAddition extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('genset_reading', 'mc', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('genset_reading', 'mc');
        //echo "m140620_102305_mcColumnAddition cannot be reverted.\n";

        //return false;
    }
}
