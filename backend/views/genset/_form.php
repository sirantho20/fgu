<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="genset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'genset_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'supplier')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model, 'purchase_date')->textInput(); ?>

    <?= $form->field($model, 'kva')->textInput() ?>

    <?= $form->field($model, 'engine_used')->checkbox() ?>
    
    <?= $form->field($model, 'start_run_hours')->textInput()->hint('Run hours after testing and before comissioning') ?>

    <?= $form->field($model, 'fuel_tank_width')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'fuel_tank_height')->textInput(['maxlength' => 53]) ?>

    <?= $form->field($model, 'fuel_tank_breadth')->textInput(['maxlength' => 53]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
