<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'name' => 'Fotoalbum1',
    'id' => 'app',
    'language'=>'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
         'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'calculator' => [
            'class' => 'app\modules\calculator\Module',
        ],
         'user' => [
            'class' => 'app\modules\user\Module',
        ],
    ],
    'defaultRoute' => 'main/default/index',
    
    'components' => [
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
         'user' => [
             'identityClass' => 'app\modules\user\models\User',
             'enableAutoLogin' => true,
             'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'request' => [
            'cookieValidationKey' => '123456789',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
         'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/default/index',
                'contact' => 'main/contact/index',
                '<_a:error>' => 'main/default/<_a>',
                '<_a:(login|logout|signup|email-confirm|request-password-reset|password-reset)>' => 'user/default/<_a>',
 
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                
            ],
        
        ], 
         'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'smtp-mail.outlook.com',
              'username' => 'd.zozulya@outlook.com',
              'password' => 'zdlpdlg2',
              'port' => '587',
              'encryption' => 'tls',
              
            ],
        ],
    
        'db' => require(__DIR__ . '/db.php'),
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ], 
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
