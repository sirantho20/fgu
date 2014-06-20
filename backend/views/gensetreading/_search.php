<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\GensetReadingSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="genset-reading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'genset_id') ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'reading_date') ?>

    <?= $form->field($model, 'fuel_level_cm') ?>

    <?= $form->field($model, 'fuel_quantity_lts') ?>

    <?php // echo $form->field($model, 'genset_run_hours') ?>

    <?php // echo $form->field($model, 'entry_date') ?>

    <?php // echo $form->field($model, 'reading_by') ?>

    <?php // echo $form->field($model, 'entry_by') ?>

    <?php // echo $form->field($model, 'source_of_reading') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'days_from_last_reading') ?>

    <?php // echo $form->field($model, 'access_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
