<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Sitedetails $model
 */

$this->title = 'Update Sitedetails: ' . ' ' . $model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Sitedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->site_id, 'url' => ['view', 'id' => $model->site_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sitedetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
