<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\FuellingSearch $searchModel
 */

$this->title = 'Fuellings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuelling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Fuelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
