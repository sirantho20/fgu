<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 */

$this->title = $model->genset_id;
$this->params['breadcrumbs'][] = ['label' => 'Gensets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->genset_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->genset_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-8 col-lg-8" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
   
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Genset</h2></header>
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
            'supplier',
            'kva',
            'engine_used',
            'fuel_tank_width',
            'purchase_date',
            'fuel_tank_height',
            'fuel_tank_breadth',
            'start_run_hours',
        ],
    ]) ?>

</div>
        </div>
</div>
</article>
</div>
</div>