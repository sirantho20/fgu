<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 */

$this->title = 'Update Genset: ' . ' ' . $model->genset_id;
$this->params['breadcrumbs'][] = ['label' => 'Gensets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->genset_id, 'url' => ['view', 'id' => $model->genset_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="genset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_ro', [
        'model' => $model,
    ]) ?>
</div>
