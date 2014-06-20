<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\models\Utilitymeter $model
 */

$this->title = $model->meter_id;
$this->params['breadcrumbs'][] = ['label' => 'Utilitymeters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px;">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
        <!-- widget options:
        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

        data-widget-colorbutton="false"
        data-widget-editbutton="false"
        data-widget-togglebutton="false"
        data-widget-deletebutton="false"
        data-widget-fullscreenbutton="false"
        data-widget-custombutton="false"
        data-widget-collapsed="true"
        data-widget-sortable="false"

        -->
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->meter_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->meter_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Meter Details - <?= $model->meter_id; ?></h2></header>
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
                            'meter_id',
                            'purchase_date',
                            'meter_type',
                            'utility_provider',
                            'kwh_before_install',
                        ],
                    ]) ?>


                </div>
                <!-- end widget content -->

        </div>
        <!-- end widget div -->

</div>
<!-- end widget -->

</article>
<!-- END COL -->

</div>

