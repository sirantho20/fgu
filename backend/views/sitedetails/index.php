<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\SitedetailsSearch $searchModel
 */

$this->title = 'Sitedetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitedetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sitedetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'site_id',
            'x3_site_id',
            'ownership',
            'site_accepted_for_closing',
            'shareable',
            // 'tigo_site_class',
            // 'tigo_site_type',
            // 'htg_site_type',
            // 'number_of_dependent_tigo_sites',
            // 'tank_width',
            // 'tank_height',
            // 'tank_bredth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
