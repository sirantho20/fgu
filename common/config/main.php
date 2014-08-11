<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'components' => [
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

    ],
    
    'modules' => [
   'gridview' =>  [
        'class' => '\kartik\grid\Module'
    ]
    ]
];
