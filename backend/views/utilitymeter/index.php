<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\UtilitymeterSearch $searchModel
 */

$this->title = 'Manage Utility Meters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilitymeter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Utility Meter', ['create'], ['class' => 'btn btn-success']) ?>
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
                                            <h2>Utility Meters</h2>

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
                                                    'options' => ['class'=>'table table-striped table-bordered smart-form',
                                                                    'id' => 'datatable_fixed_column'],
                                                    'columns' => [
                                                        //['class' => 'yii\grid\SerialColumn'],

                                                        'meter_id',
                                                        'purchase_date',
                                                        'meter_type',
                                                        'utility_provider',
                                                        'kwh_before_install',

                                                        ['class' => 'yii\grid\ActionColumn'],
                                                    ],
                                                ]); ?>

                                            </div>
                                            <!-- end widget content -->

                                    </div>
                                    <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                    </article>
                    <!-- WIDGET END -->

            </div>

            <!-- end row -->

    </section>
    <!-- end widget grid -->
    </div>

</div>
