<?php

use yii\db\Schema;
use yii\db\Migration;

class m140718_135523_rmsDetails extends Migration
{
    public function up()
    {
        $this->createTable('site_rms', [
            'site_id' => Schema::TYPE_STRING.'(50) NOT NULL',
            'has_rms' => Schema::TYPE_BOOLEAN,
            'rms_system' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('site_rms');
    }
}
