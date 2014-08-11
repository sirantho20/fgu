<?php

use yii\db\Schema;

class m140629_165301_alterrunHrsforPeriodColumnType extends \yii\db\Migration
{
    public function up()
    {
        $this->alterColumn('genset_reading', 'run_hours_for_period', Schema::TYPE_INTEGER);
    }

    public function down()
    {
    }
}
