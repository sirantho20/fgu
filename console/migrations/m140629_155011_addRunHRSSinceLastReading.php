<?php

use yii\db\Schema;

class m140629_155011_addRunHRSSinceLastReading extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('genset_reading', 'run_hours_for_period', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('genset_reading', 'run_hours_for_period');
    }
}
