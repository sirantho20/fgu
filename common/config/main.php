<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
        'enablePrettyUrl' => false,
        'showScriptName' => true,
        ],
        
            'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=fgu1',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],

    ],
    
    'modules' => [
   'gridview' =>  [
        'class' => '\kartik\grid\Module'
    ]
    ]
];
