<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\GensetSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="genset-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'genset_id') ?>

    <?= $form->field($model, 'supplier') ?>

    <?= $form->field($model, 'kva') ?>

    <?= $form->field($model, 'engine_used') ?>

    <?= $form->field($model, 'fuel_tank_width') ?>

    <?php // echo $form->field($model, 'purchase_date') ?>

    <?php // echo $form->field($model, 'fuel_tank_height') ?>

    <?php // echo $form->field($model, 'fuel_tank_breadth') ?>

    <?php // echo $form->field($model, 'start_run_hours') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
