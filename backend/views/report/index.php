<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use kartik\grid\GridView;
use yii\helpers\Html;
 
// Generate a bootstrap responsive striped table with row highlighted on hover

echo GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
   // 'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
            ],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    'toolbar' =>  Html::button('<i class="glyphicon glyphicon-plus"> ' . 
        Yii::t('kvgrid', 'Add Book'), ['type'=>'button', 'class'=>'btn btn-success']) . ' ' .
        Html::a('<i class="glyphicon glyphicon-repeat"> ' . 
        Yii::t('kvgrid', 'Reset Grid'), ['grid-demo'], ['class' => 'btn btn-info']),
        
    // parameters from the demo form
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => 10],
    'showPageSummary' => true,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'showFooter'=>false
    ],
    'exportConfig' => [ GridView::CSV => [
        'label' => Yii::t('kvgrid', 'CSV'),
        'icon' => 'floppy-open',
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'colDelimiter' => ",",
        'rowDelimiter' => "\r\n",
        'filename' => Yii::t('kvgrid', 'grid-export'),
        'alertMsg' => Yii::t('kvgrid', 'The CSV export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Save as CSV')]
    ]],
]);