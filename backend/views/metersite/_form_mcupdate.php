<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UtilityMeter */
/* @var $form ActiveForm */
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

    <?php $form = ActiveForm::begin([ 'options'=>['class'=>'smart-form'],
        'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]]); ?>
                    <fieldset>
        <?= $form->field($model, 'meter_id')->textInput(['readonly' => 'readonly']) ?>
        <?= $form->field($model, 'meter_type')->dropDownList(['Prepaid' => 'Prepaid', 'Postpaid' => 'Postpaid'],['options' => ["$model->meter_type" => ['selected' =>true]]]) ?>
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

