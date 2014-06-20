<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 */

$this->title = 'New Fuelling';
$this->params['breadcrumbs'][] = ['label' => 'Fuellings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuelling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
