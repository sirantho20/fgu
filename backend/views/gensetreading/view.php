<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\GensetReading $model
 */

$this->title = $model->reading_date;
$this->params['breadcrumbs'][] = ['label' => 'Genset Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genset-reading-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'reading_date' => $model->reading_date, 'access_code' => $model->access_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'reading_date' => $model->reading_date, 'access_code' => $model->access_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
                                            <h2>Genset Readings</h2>

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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'genset_id',
            'site_id',
            'reading_date',
            'fuel_level_cm',
            'fuel_quantity_lts',
            'genset_run_hours',
            'entry_date',
            'reading_by',
            'entry_by',
            'source_of_reading',
            'date_modified',
            'modified_by',
            'days_from_last_reading',
            'access_code',
            'fuel_consumed',
            'power_consumed'
        ],
    ]) ?>

                                            </div>
                                    </div>
                            </div>
            </div>
    </section>
        </div>
</div>
