<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 */

$this->title = $model->delivery_date;
$this->params['breadcrumbs'][] = ['label' => 'Fuellings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuelling-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'delivery_date' => $model->delivery_date, 'access_code' => $model->access_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'delivery_date' => $model->delivery_date, 'access_code' => $model->access_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'site_id',
            'delivery_date',
            'quantity_delivered_cm',
            'quantity_delivered_lts',
            'emergency_fuelling',
            'access_code',
            'quantity_before_delivery_cm',
            'quantity_before_delivery_lts',
            'quantity_after_delivery_cm',
            'quantity_after_delivery_lts',
            'htg_fs_present',
        ],
    ]) ?>

</div>
