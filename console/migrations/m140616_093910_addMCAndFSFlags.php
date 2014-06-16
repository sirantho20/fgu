<?php

use yii\db\Schema;

class m140616_093910_addMCAndFSFlags extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('site_details', 'maintenance_contractor', 'string');
        $this->addColumn('site_details', 'field_supervisor', 'string');
    }

    public function down()
    {
       $this->dropColumn('site_details', 'maintenance_contractor');
       $this->dropColumn('site_details', 'field_supervisor');
    }
}
