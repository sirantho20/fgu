<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\GensetSearch $searchModel
 */

$this->title = 'Manage Gensets';
$this->params['breadcrumbs'][] = $this->title;
backend\assets\smartIndexBundle::register($this);
?>
<div class="genset-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Genset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
       <header><span class="widget-icon"> <i class="fa fa-table"></i> </span><h2>Gensets</h2></header>
        <!-- widget div-->
        <div style="box-shadow: 5px 5px 5px lightgray;">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
    <div class="widget-body no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class'=>'table table-striped table-hover table-bordered smart-form'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'genset_id',
            'supplier',
            'kva',
            'engine_used',
            'fuel_tank_width',
            // 'purchase_date',
            // 'fuel_tank_height',
            // 'fuel_tank_breadth',
            // 'start_run_hours',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
        </div>
</div>
</article>
</div>
</div>
