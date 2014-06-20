<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\FuellingSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fuelling-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'delivery_date') ?>

    <?= $form->field($model, 'quantity_delivered_cm') ?>

    <?= $form->field($model, 'quantity_delivered_lts') ?>

    <?= $form->field($model, 'emergency_fuelling') ?>

    <?php // echo $form->field($model, 'access_code') ?>

    <?php // echo $form->field($model, 'quantity_before_delivery_cm') ?>

    <?php // echo $form->field($model, 'quantity_before_delivery_lts') ?>

    <?php // echo $form->field($model, 'quantity_after_delivery_cm') ?>

    <?php // echo $form->field($model, 'quantity_after_delivery_lts') ?>

    <?php // echo $form->field($model, 'htg_fs_present') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
