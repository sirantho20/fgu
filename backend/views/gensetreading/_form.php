<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/**
 * @var yii\web\View $this
 * @var backend\models\GensetReading $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="genset-reading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?PHP // $form->field($model, 'site_id')->widget(\kartik\widgets\Select2::className(),['data'=> array_merge([''=>'Select Site'],\yii\helpers\ArrayHelper::map(\backend\models\Site::find()->select(['site_id as site_id','concat(concat(site_id,", "),site_name) as site_name'])->all(), 'site_id', 'site_name'))])    ?>
    <?= $form->field($model, 'site_id')->dropdownlist(\yii\helpers\ArrayHelper::map(\backend\models\Site::findBySql('select * from site where site_id in (select distinct site_id from site_genset)')->all(), 'site_id', 'site_name')) ?>
    <?= $form->field($model, 'reading_date')->widget(\yii\jui\DatePicker::className(),['clientOptions'=>['dateFormat'=>'yy-mm-dd'],'options'=>['class'=>'form-control']]) ?>

    <?= $form->field($model, 'access_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'fuel_level_cm')->textInput() ?>

    <?= $form->field($model, 'fuel_quantity_lts')->textInput() ?>

    <?= $form->field($model, 'genset_run_hours')->textInput() ?>
    
    <?= $form->field($model, 'meter_reading')->textInput() ?>

    <?= $form->field($model, 'source_of_reading')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
