<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\PrepaidReloadSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="prepaid-reload-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'meter_id') ?>

    <?= $form->field($model, 'reload_amount') ?>

    <?= $form->field($model, 'reload_date') ?>

    <?= $form->field($model, 'balance_before_reload') ?>

    <?php // echo $form->field($model, 'kwh_readings') ?>

    <?php // echo $form->field($model, 'kwh_consumed') ?>

    <?php // echo $form->field($model, 'amount_consumed') ?>

    <?php // echo $form->field($model, 'entry_date') ?>

    <?php // echo $form->field($model, 'entry_by') ?>

    <?php // echo $form->field($model, 'mc') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'days_since_last_reload') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
