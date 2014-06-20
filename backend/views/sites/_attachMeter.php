<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Genset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\Site;

$this->title = 'Attach Meter to '.Yii::$app->request->get('site');
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-6 col-md-6 col-lg-6 " style="margin-bottom: 15px;">

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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Site Meters</h2></header>
        <!-- widget div-->
        <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
<?php
    $form = ActiveForm::begin(['id'=>'attachMeterForm',
    'action' => Yii::$app->urlManager->createUrl(['sites/attachmeter']),
    'method' => 'POST',
    'options'=>['class'=>'smart-form'],
    'fieldConfig'=>['labelOptions'=>['class'=>'label', 'style'=>'font-weight:bold;'],'options'=>['tag'=>'section']]
    ]);

    $query = \backend\models\UtilityMeter::findBySql('select * from utility_meter where meter_id not in (select distinct meter_id from meter_site)')->all();
    if(count($query)<1)
    {
        $data = [''=>'No Gensets available'];
    }
    else 
    {
        $data = ArrayHelper::map($query, 'meter_id', 'meter_id');
    }


?>
<fieldset>
<?= $form->field($model, 'site_id')->textInput(['value' => Yii::$app->request->get('site'),'readonly'=>'readonly']) ?>
<?= $form->field($model, 'meter_id')->widget(Select2::className(),['data'=>$data]); ?>
</fieldset>
                <footer>
                    <?= Html::submitButton('Attach', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </footer>
<?php ActiveForm::end(); ?>

                              
                    </div>

                </div>
                <!-- end widget content -->

        </div>
        <!-- end widget div -->
</article>
</div>

