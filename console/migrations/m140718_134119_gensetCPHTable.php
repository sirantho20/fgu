<?php

use yii\db\Schema;
use yii\db\Migration;

class m140718_134119_gensetCPHTable extends Migration
{
    public function safeUp()
    {
        $this->createTable('genset_cph', [
            'id' => Schema::TYPE_PK,
            'kva' => Schema::TYPE_DECIMAL.'(5,1) NOT NULL',
            'cph' => Schema::TYPE_DECIMAL.'(5,1) NOT NULL'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('genset_cph');
    }
}
