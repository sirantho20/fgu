<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\PrepaidReload $model
 */

$this->title = 'Update Prepaid Reload: ' . ' ' . $model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Reloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->site_id, 'url' => ['view', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prepaid-reload-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
