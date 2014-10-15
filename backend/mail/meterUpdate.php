<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

Hello, 
Please note that meter type at <?= $site_name.' '.$site_id ?> has been changed from <?= $old; ?> to <?= $new ?> by <strong><?= Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name ?></strong>.<br />
