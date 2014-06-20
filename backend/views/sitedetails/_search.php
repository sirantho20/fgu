<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SitedetailsSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sitedetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'site_id') ?>

    <?= $form->field($model, 'x3_site_id') ?>

    <?= $form->field($model, 'ownership') ?>

    <?= $form->field($model, 'site_accepted_for_closing') ?>

    <?= $form->field($model, 'shareable') ?>

    <?php // echo $form->field($model, 'tigo_site_class') ?>

    <?php // echo $form->field($model, 'tigo_site_type') ?>

    <?php // echo $form->field($model, 'htg_site_type') ?>

    <?php // echo $form->field($model, 'number_of_dependent_tigo_sites') ?>

    <?php // echo $form->field($model, 'tank_width') ?>

    <?php // echo $form->field($model, 'tank_height') ?>

    <?php // echo $form->field($model, 'tank_bredth') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
