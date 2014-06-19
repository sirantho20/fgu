<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\PrepaidReload $model
 */

$this->title = $model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Reloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepaid-reload-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date], [
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
            'meter_id',
            'reload_amount',
            'reload_date',
            'balance_before_reload',
            'kwh_readings',
            'kwh_consumed',
            'amount_consumed',
            'entry_date',
            'entry_by',
            'mc',
            'date_modified',
            'modified_by',
            'days_since_last_reload',
        ],
    ]) ?>

</div>
