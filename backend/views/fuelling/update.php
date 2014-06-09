<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 */

$this->title = 'Update Fuelling: ' . ' ' . $model->delivery_date;
$this->params['breadcrumbs'][] = ['label' => 'Fuellings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_date, 'url' => ['view', 'delivery_date' => $model->delivery_date, 'access_code' => $model->access_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuelling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
