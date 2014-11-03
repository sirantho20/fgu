<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'components' => [
        'spoandb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'dblib:host=HTG-SQL-01\SPOAN;dbname=escalator;charset=utf8',
            'username' => 'htgdashboard01',
            'password' => 'NewD@shboardPassw0rd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [ 
            'class' => 'yii\swiftmailer\Mailer', 
            'transport' => [ 
                'class' => 'Swift_SmtpTransport', 
                'host' => 'smtp.gmail.com', 
                'username' => 'fgu.htg@gmail.com', 
                'password' => 'Mys3kr3t', 
                'port' => '465', 
                'encryption' => 'ssl', 
                ], 
            ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl'=>array('site/login'),
        ],
    ],
    
    'modules' => [
   'gridview' =>  [
        'class' => '\kartik\grid\Module'
    ]
    ]
];
