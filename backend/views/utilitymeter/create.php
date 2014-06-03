<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Utilitymeter $model
 */

$this->title = 'Add Utility Meter';
$this->params['breadcrumbs'][] = ['label' => 'Utility Meters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'head'=>'<header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Utility Meter</h2></header>'
    ]) ?>
