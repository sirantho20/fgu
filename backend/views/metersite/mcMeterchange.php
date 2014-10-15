<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Fuelling $model
 */

//$this->title = 'Update Meter Details: ' . ' ' . $model->sites->site_id;

?>
<div class="fuelling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_mcupdate', [
        'model' => $model,
    ]) ?>

</div>