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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>FGU Readings</h2></header>
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
    <?PHP // $form->field($model, 'site_id')->widget(\kartik\widgets\Select2::className(),['data'=> array_merge([''=>'Select Site'],\yii\helpers\ArrayHelper::map(\backend\models\Site::find()->select(['site_id as site_id','concat(concat(site_id,", "),site_name) as site_name'])->all(), 'site_id', 'site_name'))])    ?>
    <?= $form->field($model, 'site_id')->dropdownlist(\yii\helpers\ArrayHelper::map(\backend\models\Site::getMCSites(Yii::$app->user->identity->company), 'site_id', 'site_name'),['id'=>'site-id','prompt'=>'Select Site ID']) ?>
    <?= $form->field($model, 'genset_id')->widget(\kartik\widgets\DepDrop::className(), [
     'options' => ['id'=>'genset-id'],
     'pluginOptions'=>[
         'depends'=>['site-id'],
         'placeholder' => 'Select genset...',
         'url' => yii\helpers\Url::to(['siteactions/gensetlist'])
            ]
        ])->hint('<div id="genProps1"></div>')
    ?>
    <?= $form->field($model, 'reading_date')->widget(\yii\jui\DatePicker::className(),[
        'clientOptions'=>[
            'dateFormat' => 'yyyy-MM-dd',
            'nextText'=>'>',
            'prevText'=>'<',
            'minDate' => -30,
            'maxDate' =>0,
            'showWeek' => true,
        /*'beforeShowDay' => new yii\web\JsExpression('function (date) {
            var sunday = new Date();
            var today = new Date();
            sunday.setHours(0,0,0,0);
            sunday.setDate(sunday.getDate() - (sunday.getDay() || 0));
            var saturday = new Date(sunday.getTime());
            saturday.setDate(sunday.getDate() - 28);
            return [(date >= saturday && date <= today), ""];
        }'),*/
        ],'options'=>['class'=>'form-control','readonly'=>'readonly', 'style'=>'cursor:text;']]) ?>

    <?= $form->field($model, 'access_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'fuel_level_cm')->textInput() ?>

    <?= $form->field($model, 'genset_run_hours')->textInput() ?>
    
    <?= $form->field($model, 'meter_reading')->textInput()->hint('<div id="meterProps"></div>')  ?>
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
