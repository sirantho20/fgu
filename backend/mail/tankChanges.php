<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\Site;
?>

Hello, 
<p>
    Please note that changes have been done to tank dimensions at <?= $old['site_name'].' ('.$old['site_id'].')' ?> by <strong><?= Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name; ?></strong>.<br />Find details below change details: <br /><br />
<h4 style="color: green;">Values Before</h4>
<table class="table table-bordered">
    <tr>
        <th>Site ID</th>
        <th>Site Name</th>
        <th>Has Base Tank</th>
        <th>tank width</th>
        <th>tank breadth</th>
        <th>tank height</th>
    </tr>

    <tr>
        <td><?= $old['site_id'] ?></td>
        <td><?= $old['site_name'] ?></td>
        <td><?= $old['has_base_tank'] ?></td>
        <td><?= $old['fuel_tank_width'] ?></td>
        <td><?= $old['fuel_tank_breadth'] ?></td>
        <td><?= $old['fuel_tank_height'] ?></td>
    </tr>
   
</table>
<br />
<h4 style="color: red;">Values After</h4>

<table class="table table-bordered">
    <tr>
        <th>Site ID</th>
        <th>Site Name</th>
        <th>Has Base Tank</th>
        <th>tank width</th>
        <th>tank breadth</th>
        <th>tank height</th>
    </tr>
   
    <tr>
        <td><?= $new['site_id'] ?></td>
        <td><?= $new['site_name'] ?></td>
        <td><?= $new['has_base_tank'] ?></td>
        <td><?= $new['fuel_tank_width'] ?></td>
        <td><?= $new['fuel_tank_breadth'] ?></td>
        <td><?= $new['fuel_tank_height'] ?></td>
    </tr>
  
</table>

</p>

