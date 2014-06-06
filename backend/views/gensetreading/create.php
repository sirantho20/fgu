<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\GensetReading $model
 */

$this->title = 'Create Genset Reading';
$this->params['breadcrumbs'][] = ['label' => 'Genset Readings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genset-reading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
