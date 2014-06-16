<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\Sitedetails $model
 */

$this->title = $model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Sitedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitedetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->site_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->site_id], [
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
            'x3_site_id',
            'ownership',
            'site_accepted_for_closing',
            'shareable',
            'tigo_site_class',
            'tigo_site_type',
            'htg_site_type',
            'number_of_dependent_tigo_sites',
            'tank_width',
            'tank_height',
            'tank_bredth',
        ],
    ]) ?>

</div>
