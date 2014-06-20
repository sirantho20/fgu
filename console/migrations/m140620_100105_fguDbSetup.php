<?php

use yii\db\Schema;

class m140620_100105_fguDbSetup extends \yii\db\Migration
{
    public function up()
    {
        $this->execute(file_get_contents(\Yii::getAlias('@common').'/data/fgu.sql'));
    }

    public function down()
    {
        
        echo "m140620_100105_fguDbSetup cannot be reverted.\n";

        //return false;
    }
}
