<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html
?>
Hello <?= $user->first_name ?>,
<p>
Please note you have an account password on  Helios Towers FGU has been reset. Find your login details below: <br />
Login Url: <?= Yii::$app->urlManager->createAbsoluteUrl('/') ?> <br />
Username: <?= $user->username ?> <br />
Password; <?= Html::encode($password) ?> <br />
</p>
You are free to change this password anytime. <br />

<p>Best Regards</p>

