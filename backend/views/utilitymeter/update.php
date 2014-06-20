<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Utilitymeter $model
 */

$this->title = 'Update Utility Meter: ' . ' ' . $model->meter_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilitymeters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meter_id, 'url' => ['view', 'id' => $model->meter_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilitymeter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
