<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Sitedetails $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-8 col-lg-8" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">

       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Site Details</h2></header>
     
        <div>
                <div class="jarviswidget-editbox">

                </div>

                <div class="widget-body no-padding">
<div class="sitedetails-form">

    <?php $form = ActiveForm::begin([
                     'options'=>['class'=>'smart-form'],
                     'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]
                    ]); ?>
    <fieldset>

    <?= $form->field($model, 'site_id')->textInput(['maxlength' => 50, 'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'x3_site_id')->textInput(['maxlength' => 50, 'readonly'=>'readonly']) ?>

    <?= $form->field($model, 'ownership')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'site_accepted_for_closing')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'shareable')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tigo_site_class')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'tigo_site_type')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'htg_site_type')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'number_of_dependent_tigo_sites')->textInput() ?>

    <?= $form->field($model, 'tank_width')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tank_height')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tank_bredth')->textInput(['maxlength' => 255]) ?>
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
</div>
</article>
</div>
