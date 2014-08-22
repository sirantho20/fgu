<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\SiteSearch $searchModel
 */

$this->title = 'Manage Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
        <?= Html::a('New User', ['add-user'], ['class' => 'btn btn-success']) ?>
    </p>
    
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
       <header><span class="widget-icon"> <i class="fa fa-table"></i> </span><h2>Users</h2></header>
        <!-- widget div-->
        <div style="box-shadow: 5px 5px 5px lightgray;">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class'=>'table table-striped table-hover table-bordered smart-form'],
        'columns' => [

            'first_name',
            'last_name',
            'username',
            'company',
            'role',
            [
                'format' =>'html',
                'value' => function($data){
                return Html::a('<i class="fa fa-refresh"></i>', '#',['class'=>'passwordResetBtn', 'title'=>$data->username]);
                }
            ]
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

</div>         
                  
                    </div>
</article>
</div>
</div>

<?php
 Yii::$app->controller->view->registerJs("
     $('.passwordResetBtn').click(function(){
            var uname = $(this).attr('title');
            $.ajax({
                url: '".yii\helpers\Url::toRoute('super/resetpassword')."',
                data: {username: uname},
                beforeSend: function(){
                            $('.activitySpinner').removeClass('hidden');
                            },
                complete: function(){
                            $('.activitySpinner').addClass('hidden');
                            $('#notification-area').notify('password reset complete',{elementPosition:'bottom right',className:'info'});
                            },
            });
            
            
        });", yii\web\View::POS_END);
?>