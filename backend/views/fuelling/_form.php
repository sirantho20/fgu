<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fuelling-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'site_id')->dropdownlist(\yii\helpers\ArrayHelper::map(\backend\models\Site::findBySql('select * from site where site_id in (select distinct site_id from site_genset)')->all(), 'site_id', 'site_name')) ?>
    
    <?= $form->field($model, 'delivery_date')->widget(\yii\jui\DatePicker::className(),['clientOptions'=>['dateFormat'=>'yy-mm-dd'],'options'=>['class'=>'form-control']]) ?>

    <?= $form->field($model, 'quantity_delivered_lts')->textInput() ?>

    <?= $form->field($model, 'emergency_fuelling')->dropDownList(['yes'=>'Yes','no'=>'No']) ?>

    <?= $form->field($model, 'access_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'quantity_before_delivery_cm')->textInput() ?>

    <?= $form->field($model, 'quantity_before_delivery_lts')->textInput() ?>

    <?= $form->field($model, 'quantity_after_delivery_cm')->textInput() ?>

    <?= $form->field($model, 'quantity_after_delivery_lts')->textInput() ?>

    <?= $form->field($model, 'htg_fs_present')->dropDownList(['yes'=>'Yes','no'=>'No']) ?>

    <?= $form->field($model, 'quantity_delivered_cm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
