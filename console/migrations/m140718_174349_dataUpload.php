<?php

use yii\db\Schema;
use yii\db\Migration;

class m140718_174349_dataUpload extends Migration
{
    public function safeUp()
    {
        $this->execute('delete from site_details');
        $this->execute('delete from site_genset');
        $this->execute('delete from meter_site');
        $this->execute('delete from site');
        $this->execute('delete from gensets');
        $this->execute('delete from utility_meter');
        $this->execute('delete from genset_cph');
        $this->execute(file_get_contents(\Yii::getAlias('@common').'/data/htg/fgu_data.sql'));
    }

    public function safeDown()
    {
        $this->execute('delete from site_details');
        $this->execute('delete from site_genset');
        $this->execute('delete from meter_site');
        $this->execute('delete from site');
        $this->execute('delete from gensets');
        $this->execute('delete from utility_meter');
        $this->execute('delete from genset_cph');
    }
}
