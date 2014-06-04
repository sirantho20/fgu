<p><?= yii\helpers\Html::a(' Attach Genset', Yii::$app->urlManager->createUrl(['sites/attachgenset','site'=>$model->site_id]),['class'=>'btn btn-success btn-sm fa fa-link','style'=>'margin-top:10px;']); ?></p>   

<?php

if($model->siteGenset)
{
$record = $model->siteGenset->genset->genset_id;
//die($record);
$provider = new \yii\data\ActiveDataProvider([
    'query' => \app\models\Genset::find()->where(['genset_id'=>$record])
]);

?>

    <?=yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'summaryOptions' => ['class'=>'hidden'],
        'columns' => [
            [
                'format' => 'html',
                'value' => function($data){
                    return yii\helpers\Html::a($data->genset_id, Yii::$app->urlManager->createAbsoluteUrl(['genset/view','id'=>$data->genset_id]));
                }
            ],
            'supplier',
            'kva',
            'engine_used',
            //'fuel_tank_width',
            // 'purchase_date',
            // 'fuel_tank_height',
            // 'fuel_tank_breadth',
            // 'start_run_hours',

            ['class' => 'yii\grid\ActionColumn',
             'buttons' =>[
                 'delete' => function($url, $model)
                                {
                                    return yii\helpers\Html::a('<i class="fa fa-chain-broken"></i> Detach Genset', Yii::$app->urlManager->createUrl(['siteactions/detachgensetfromsite','genset'=>$model->genset_id]),['title'=>'Detach Genset','class'=>'btn btn-warning btn-sm']);
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

