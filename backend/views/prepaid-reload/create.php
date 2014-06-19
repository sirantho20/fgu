<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\PrepaidReload $model
 */

$this->title = 'New Prepaid Reload';
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Reloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepaid-reload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
