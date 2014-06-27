<?php

use yii\db\Schema;

class m140623_180722_alterGensetpk extends \yii\db\Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `fgu1`.`gensets` DROP PRIMARY KEY,ADD PRIMARY KEY (`genset_id`, `supplier`, `kva`)");
    }

    public function down()
    {
        
    }
}
