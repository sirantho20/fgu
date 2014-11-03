<p><?= yii\helpers\Html::a(' Attach Meter', Yii::$app->urlManager->createUrl(['sites/attachmeter','site'=>$model->site_id]),['class'=>'btn btn-success btn-sm fa fa-link','style'=>'margin-top:10px;']); ?></p>   

<?php

if($model->meterSite)
{
$record = $model->meterSite->meter->meter_id;
//die($record);
$provider = new \yii\data\ActiveDataProvider([
    'query' => \backend\models\UtilitymeterSearch::find()->where(['meter_id'=>$record])
]);

?>

    <?=yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'summaryOptions' => ['class'=>'hidden'],
        'columns' => [
            [
                'format' => 'html',
                'value' => function($data){
                    return yii\helpers\Html::a($data->meter_id, Yii::$app->urlManager->createAbsoluteUrl(['utilitymeter/update','id'=>$data->meter_id]));
                }
            ],
            'meter_type',
            'utility_provider',
            //'engine_used',
            //'fuel_tank_width',
            // 'purchase_date',
            // 'fuel_tank_height',
            // 'fuel_tank_breadth',
            // 'start_run_hours',

            ['class' => 'yii\grid\ActionColumn',
             'buttons' =>[
                 'delete' => function($url, $model)
                                {
                                    return yii\helpers\Html::a('<i class="fa fa-chain-broken"></i> Detach Meter', Yii::$app->urlManager->createUrl(['siteactions/detachmeterfromsite','meter'=>$model->meter_id]),['title'=>'Detach Genset','class'=>'meterDetachButton btn btn-warning btn-sm']);
                                },
                  'view' => function($url,$model){return '';},
                  'update' => function($url,$model){return '';}
                 
             ]
            ],
        ],
        

    ]); 
    
}
else 
{
   

    echo yii\helpers\Html::tag('span', 'No genset on site', ['class'=>'warning']);

}
        
    ?>

