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
