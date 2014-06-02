<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Genset $model
 */

$this->title = 'Create Genset';
$this->params['breadcrumbs'][] = ['label' => 'Gensets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
