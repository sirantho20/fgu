<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\PrepaidReloadSearch $searchModel
 */

$this->title = 'Prepaid Reloads';
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Prepaid Reload', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">

       <header><span class="widget-icon"> <i class="fa fa-table"></i> </span><h2>Prepaid</h2></header>
        <!-- widget div-->
        <div style="box-shadow: 5px 5px 5px lightgray;">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
    <div class="widget-body no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class'=>'table table-striped table-hover table-bordered smart-form'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'site_id',
            'meter_id',
            'reload_amount',
            'reload_date',
            'balance_before_reload',
            // 'kwh_readings',
            // 'kwh_consumed',
            // 'amount_consumed',
            // 'entry_date',
            // 'entry_by',
            // 'mc',
            // 'date_modified',
            // 'modified_by',
            // 'days_since_last_reload',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
        </div>
</div>
</article>
</div>
