<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Sitedetails $model
 */

$this->title = 'Create Sitedetails';
$this->params['breadcrumbs'][] = ['label' => 'Sitedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitedetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
