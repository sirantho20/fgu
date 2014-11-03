<p><?= yii\helpers\Html::a(' Attach Genset', Yii::$app->urlManager->createUrl(['sites/attachgenset','site'=>$model->site_id]),['class'=>'btn btn-success btn-sm fa fa-link','style'=>'margin-top:10px;']); ?></p>   

<?php

if($model->siteGenset)
{
$site_id = $model->site_id;

$query = new yii\db\Query();
$query->from('site_genset')->where(['site_id'=>$site_id])->select('genset_id')->all();

//$record = $model->siteGenset->getGenset();

$provider = new \yii\data\ArrayDataProvider([
    'allModels' => \backend\models\Genset::findAll($query)
]);

?>

    <?=yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'summaryOptions' => ['class'=>'hidden'],
        'columns' => [
            [
                'format' => 'html',
                'value' => function($data){
                    return yii\helpers\Html::a($data->genset_id, Yii::$app->urlManager->createAbsoluteUrl(['genset/update','genset_id'=>$data->genset_id,'supplier'=>$data->supplier,'kva'=>$data->kva]));
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
                                    return yii\helpers\Html::a('<i class="fa fa-chain-broken"></i> Detach Genset', Yii::$app->urlManager->createUrl(['siteactions/detachgensetfromsite','genset'=>$model->genset_id]),['title'=>'Detach Genset','class'=>'gensetDetachButton btn btn-warning btn-sm']);
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

