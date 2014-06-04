<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var backend\models\Site $model
 */

$this->title = 'Site Details : '.$model->site_name.' - '.$model->site_id;
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>
    

    
    
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-12 col-lg-8" style="margin-bottom: 15px;">

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
       <header><span class="widget-icon"> <i class="fa fa-edit"></i> </span><h2>Utility Meter</h2></header>
        <!-- widget div-->
        <div style="box-shadow: 5px 5px 5px lightgray;">

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
            'site_name',
            'region',
            'city_town',
        ],
    ]) ?>

                    <div class="clear" style="margin: 15px;">            
<?= Tabs::widget([
    'headerOptions' => ['class'=>'warning'],
    'itemOptions' => ['class'=>'danger'],
    'options' => ['class'=>'danger'],
    'items' => [
        [
            'label' => 'Gensets',
            'content' => $this->render('_siteGensets',['model'=>$model]),
            'active' => true
        ],
        [
            'label' => 'Utility Meter',
            'content' => 'Anim pariatur cliche...',
            'headerOptions' => [],
            'options' => ['id' => 'myveryownID'],
        ],
    ],
]); 
     
?>
                    </div>         
                  
                    </div>

                </div>
                <!-- end widget content -->

        </div>
        <!-- end widget div -->

</div>
<!-- end widget -->

</article>
<!-- END COL -->

</div>