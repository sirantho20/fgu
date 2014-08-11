<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html
?>
Hello <?= $user['first_name']?>,
<p>
Please note you have an account on the new Helios Towers FGU software. Find your login details below: <br />
Login Url: <?= Yii::$app->urlManager->createAbsoluteUrl('/') ?> <br />
Username: <?= $user['username']?> <br />
Password; P@ssword <br />
</p>
Note that you will be required to change this default password after first login. <br />

<p>Best Regards</p>

