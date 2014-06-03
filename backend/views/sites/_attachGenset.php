<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id'=>'attachGensetForm',
    'action' => Yii::$app->urlManager->createUrl(['sites/attachgenset']),
    'method' => 'POST',
    ]);

