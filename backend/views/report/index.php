<?php
use bburim\daterangepicker\DateRangePicker;
use yii\widgets\ActiveForm;
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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>FGU Report Export</h2></header>
        <!-- widget div-->
        <div>

                <!-- widget content -->
                <div class="widget-body no-padding">
                <?php $form = ActiveForm::begin([
                     'options'=>['class'=>'smart-form'],
                     'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]
                    ]); ?>
                
                    <fieldset>

                    <?= $form->field($model, 'reportDates')->textInput(['maxlength' => 50,'id'=>'report-dates']) ?>
                     <?= $form->field($model, 'type')->dropDownList(['fgu'=>'FGU','fuelling'=>'Fuelling','prepaid'=>'Prepaid Reload'])?>

                    </fieldset>
                 <footer>
                        <button type="submit" class="btn btn-primary">
                                Extract
                        </button>
                        <button type="button" class="btn btn-default" onclick="window.history.back();">
                                Cancel
                        </button>
                </footer>

                <?php ActiveForm::end(); ?>
                   
                </div>
        </div>
</div>
</article>
</div>
