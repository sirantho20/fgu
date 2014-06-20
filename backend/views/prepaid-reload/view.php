<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\PrepaidReload $model
 */

$this->title = \backend\models\Site::findOne($model->site_id)->site_name.' - '.$model->site_id.', '.(new yii\base\Formatter())->asRelativeTime($model->reload_date);
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Reloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepaid-reload-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-8 col-lg-8" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
   
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Genset</h2></header>
        <!-- widget div-->
        <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'site_id',
            'meter_id',
            'reload_amount',
            'reload_date',
            'balance_before_reload',
            'kwh_readings',
            'kwh_consumed',
            'amount_consumed',
            'entry_date',
            'entry_by',
            'mc',
            'date_modified',
            'modified_by',
            'days_since_last_reload',
        ],
    ]) ?>

</div>
        </div>
</div>
</article>
</div>
</div>
