<?php
use yii\widgets\ActiveForm;
?>
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
    <h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-user"></i> <?=                Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name; ?> <span>>
        Profile </span></h1>
</div>
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
        <header><span class="widget-icon"> <i class="fa fa-key"></i> </span><h2>Change Password</h2></header>
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
    
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'confirm')->passwordInput() ?>
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