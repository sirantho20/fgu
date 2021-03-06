<p><?= yii\helpers\Html::a(' Edit Dimensions', Yii::$app->urlManager->createUrl(['sitedetails/update','id'=>$model->site_id]),['class'=>'btn btn-success btn-sm fa fa-link','style'=>'margin-top:10px;']); ?></p>   

<?php



//die($record);
$provider = new \yii\data\ActiveDataProvider([
    'query' => \backend\models\Sitedetails::find()->where(['site_id'=>$model->site_id])
]);

?>

    <?=yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'summaryOptions' => ['class'=>'hidden'],
        'columns' => [
            'tank_width',
            'tank_height',
            'tank_bredth',
            ['class' => 'yii\grid\ActionColumn',
                    'buttons' =>[
                        'delete' => function($url, $model)
                                       {
                                           return '';//yii\helpers\Html::a('<i class="fa fa-edit"></i> Edit','#' /*Yii::$app->urlManager->createUrl(['siteactions/detachmeterfromsite','meter'=>$model->site_id])*/,['title'=>'Detach Genset','class'=>'meterDetachButton btn btn-warning btn-sm']);
                                       },
                         'view' => function($url,$model){return '';},
                         'update' => function($url,$model){return '';}

                    ]
            ],
            ]
        

    ]); 
    

        
    ?>

