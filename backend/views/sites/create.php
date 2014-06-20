<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Site $model
 */

$this->title = 'Create Site';
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
