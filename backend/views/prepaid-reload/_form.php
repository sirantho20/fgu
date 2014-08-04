<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\PrepaidReload $model
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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Prepaid Reload</h2></header>
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
    <?= $form->field($model, 'site_id')->dropDownList(yii\helpers\ArrayHelper::map(\backend\models\Site::getMCPrepaidMeterSites(Yii::$app->user->identity->company), 'site_id', 'site_name'),['id'=>'site-id','prompt'=>'Select Site ID']) ?>

    <?= $form->field($model, 'meter_id')->widget(\kartik\widgets\DepDrop::className(), [
     'options' => ['id'=>'genset-id'],
     'pluginOptions'=>[
         'depends'=>['site-id'],
         'placeholder' => 'Select meter...',
         'url' => yii\helpers\Url::to(['siteactions/meterlist'])
            ]
        ]) 
    ?>

    <?= $form->field($model, 'reload_date')->widget(\yii\jui\DatePicker::className(),['clientOptions'=>['dateFormat'=>'yy-mm-dd','nextText'=>'>','prevText'=>'<',
        'beforeShowDay' => new yii\web\JsExpression('function (date) {
            var sunday = new Date();
            var today = new Date();
            sunday.setHours(0,0,0,0);
            sunday.setDate(sunday.getDate() - (sunday.getDay() || 0));
            var saturday = new Date(sunday.getTime());
            saturday.setDate(sunday.getDate() + 6);
            return [(date >= sunday && date <= today), ""];
        }')
        ],'options'=>['class'=>'form-control','readonly'=>'readonly']]) ?>
    
    <?= $form->field($model, 'balance_before_reload')->textInput() ?>
            
    <?= $form->field($model, 'balance_after_reload')->textInput() ?>

    <?= $form->field($model, 'kwh_readings')->textInput() ?>
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
