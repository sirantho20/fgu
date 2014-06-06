<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\GensetReading $model
 */

$this->title = 'Update Genset Reading: ' . ' ' . $model->reading_date;
$this->params['breadcrumbs'][] = ['label' => 'Genset Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reading_date, 'url' => ['view', 'reading_date' => $model->reading_date, 'access_code' => $model->access_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="genset-reading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
