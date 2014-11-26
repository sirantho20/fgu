<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 */

$this->title = 'Update Tank Details: - ' . ' ' . $model->site->site_name.' '.$model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Gensets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->site_id, 'url' => ['view', 'id' => $model->site_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="genset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_tank_dimensions', [
        'model' => $model,
    ]) ?>

</div>
