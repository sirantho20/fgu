<?php

if($model->siteGenset)
{
$record = $model->siteGenset->genset->genset_id;
$provider = new \yii\data\ActiveDataProvider([
    'query' => \app\models\Genset::find($record),
    'pagination' => ['pageSize' => 5]
]);

?>
    <?=yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'genset_id',
            'supplier',
            'kva',
            'engine_used',
            //'fuel_tank_width',
            // 'purchase_date',
            // 'fuel_tank_height',
            // 'fuel_tank_breadth',
            // 'start_run_hours',

            //['class' => 'yii\grid\ActionColumn'],
        ],
        

    ]); 
    
}
else 
{
   

    echo yii\helpers\Html::tag('span', 'No genset on site. Click'.yii\helpers\Html::a('here', '#', ['id'=>'attachGensetLink']).' to attach a genset', ['class'=>'warning']);

 \yii\bootstrap\Modal::begin([
'id' => 'modal',
'header' => '<h2>Attach Genset to '.$model->site_name.' </h2>',
]);

echo $this->render('//sites/_form',['model'=>$model]);

\yii\bootstrap\Modal::end();
}

    ?>

