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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
