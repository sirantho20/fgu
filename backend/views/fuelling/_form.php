<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-8 col-lg-8" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
        <!-- widget options:
        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

        data-widget-colorbutton="false"
        data-widget-editbutton="false"
        data-widget-togglebutton="false"
        data-widget-deletebutton="false"
        data-widget-fullscreenbutton="false"
        data-widget-custombutton="false"
        data-widget-collapsed="true"
        data-widget-sortable="false"

        -->
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Fueling</h2></header>
        <!-- widget div-->
        <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'smart-form'],
        'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]
    ]); ?>
    <fieldset>
    <?= $form->field($model, 'site_id')->dropdownlist(\yii\helpers\ArrayHelper::map(\backend\models\Site::getMCSites(Yii::$app->user->identity->company), 'site_id', 'site_name'),['id'=>'site-id','prompt'=>'Select Site ID']) ?>
    
    <?= $form->field($model, 'genset_id')->widget(\kartik\widgets\DepDrop::className(), [
         'options' => ['id'=>'genset-id'],
         'pluginOptions'=>[
             'depends'=>['site-id'],
             'placeholder' => 'Select genset...',
             'url' => yii\helpers\Url::to(['siteactions/gensetlist'])
         ]
     ]) ?>
    
    <?php //$form->field($model, 'delivery_date')->widget(\yii\jui\DatePicker::className(),['clientOptions'=>['dateFormat'=>'yy-mm-dd','nextText'=>'>','prevText'=>'<'],'options'=>['class'=>'form-control']]) ?>
    
    <?= $form->field($model, 'quantity_before_delivery_cm')->textInput() ?>
        
    <?= $form->field($model, 'quantity_delivered_cm')->textInput() ?>
        
    <?= $form->field($model, 'fuel_supplier')->dropDownList(['ai'=>'AI','champion'=>'Champion'], ['prompt'=>'Select supplier']) ?> 
        
    <?= $form->field($model, 'emergency_fuelling')->dropDownList(['yes'=>'Yes','no'=>'No']) ?>

    <?= $form->field($model, 'access_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'htg_fs_present')->dropDownList(['no'=>'No','yes'=>'Yes']) ?>
    </fieldset>
    <footer>
            <button type="submit" class="btn btn-primary">
                    Submit
            </button>
            <button type="button" class="btn btn-default" onclick="window.history.back();">
                    Back
            </button>
    </footer>

    <?php ActiveForm::end(); ?>

</div>
        </div>
</div>
</article>
</div>
