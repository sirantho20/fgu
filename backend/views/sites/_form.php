<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Site $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'city_town')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'site_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
