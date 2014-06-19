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
<div class="prepaid-reload-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prepaid Reload', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
