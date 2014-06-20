<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\FuellingSearch $searchModel
 */

$this->title = 'Fuellings - '.'Week '.(new DateTime())->format("W");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuelling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Fuelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <div id="content">
    <!-- widget grid -->
    <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">

                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
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
                                    <header>
                                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                            <h2>Fuel Delivery</h2>

                                    </header>

                                    <!-- widget div-->
                                    <div>

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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'site_id',
            'delivery_date',
            'quantity_delivered_cm',
            'quantity_delivered_lts',
            'emergency_fuelling',
            // 'access_code',
            // 'quantity_before_delivery_cm',
            // 'quantity_before_delivery_lts',
            // 'quantity_after_delivery_cm',
            // 'quantity_after_delivery_lts',
            // 'htg_fs_present',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
                                    </div>
                            </div>
            </div>
    </section>
        </div>
</div>
