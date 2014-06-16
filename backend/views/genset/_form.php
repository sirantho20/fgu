<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px;">

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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Genset</h2></header>
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

                    <?= $form->field($model, 'genset_id')->textInput(['maxlength' => 50]) ?>

                    <?= $form->field($model, 'supplier')->textInput(['maxlength' => 50]) ?>

                    <?= $form->field($model, 'purchase_date')->widget(DatePicker::className(), [
                            'options'=>['class'=>'form-control'],
                            'clientOptions' => [
                                'dateFormat' => 'yy-mm-dd',
                                'nextText'=>'>',
                                'prevText'=>'<'
                                ]
                            ]) ?>

                    <?= $form->field($model, 'kva')->textInput() ?>

                    <?= $form->field($model, 'engine_used')->dropDownList(['y'=>'Yes','n'=>'No']) ?>

                    <?= $form->field($model, 'start_run_hours')->textInput()->hint('Run hours after testing and before comissioning') ?>
                        
                    <?= $form->field($model, 'has_base_tank')->dropDownList(['no'=>'No','yes'=>'Yes']); ?>
                        
                    <?= $form->field($model, 'fuel_tank_width')->textInput(['maxlength' => 10]) ?>

                    <?= $form->field($model, 'fuel_tank_height')->textInput(['maxlength' => 53]) ?>

                    <?= $form->field($model, 'fuel_tank_breadth')->textInput(['maxlength' => 53]) ?>

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
                <!-- end widget content -->

        </div>
        <!-- end widget div -->

</div>
<!-- end widget -->
</article>
</div>

