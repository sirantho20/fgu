<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Sitedetails $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sitedetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'x3_site_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'ownership')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'site_accepted_for_closing')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'shareable')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tigo_site_class')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tigo_site_type')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'htg_site_type')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'number_of_dependent_tigo_sites')->textInput() ?>

    <?= $form->field($model, 'tank_width')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tank_height')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tank_bredth')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
