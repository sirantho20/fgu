<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\UtilitymeterSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="utilitymeter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'meter_id') ?>

    <?= $form->field($model, 'purchase_date') ?>

    <?= $form->field($model, 'meter_type') ?>

    <?= $form->field($model, 'utility_provider') ?>

    <?= $form->field($model, 'kwh_before_install') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
