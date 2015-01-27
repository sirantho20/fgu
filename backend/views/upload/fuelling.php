<?php
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
            <header><span class="widget-icon"> <i class="fa fa-upload"></i> </span><h2>Mass Upload - Fuelling</h2></header>
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
                        'options'=>['class'=>'smart-form', 'enctype' => 'multipart/form-data'],
                        'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]
                    ]); ?>
<div style="padding:10px; font-size: 1.2em;">
                    Upload bulk Fuelling readings by formatting your excel according to provided template. <br />Only .CSV files are allowed. <?= \yii\helpers\Html::a('Download Sample Template',\yii\helpers\Url::to('fuellingtemplatedownload')) ?>
                       </div><hr />
                    <fieldset>
                        <?= $form->field($model, 'file')->fileInput() ?>
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i>
                            Upload
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