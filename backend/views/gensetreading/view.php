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
        ],
    ]) ?>

</div>
