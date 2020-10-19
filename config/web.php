<?php

Yii::setAlias('@themes', dirname(__DIR__) . '/themes');

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'th_TH',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vTQwyX2PLhdy2D0WcdsNlHyKR0scjqhI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            // 'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'assetManager' => [
            'bundles' => [
                'yidas\yii\fontawesome\FontawesomeAsset' => [
                    'cdn' => true,
                    // 'cdnVersion' => '4.7.0',
                ],
            ],
        ],
        // 'urlManager' => [
        //     'class' => 'yii\web\UrlManager',
        //     // Disable index.php
        //     'showScriptName' => false,
        //     // Disable r= routes
        //     'enablePrettyUrl' => true,
        //     'rules' => [
        //         '<controller:\w+>/<id:\d+>' => '<controller>/view',
        //         '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        //         '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        //         ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'except' => ['delete', 'GET', 'HEAD', 'POST', 'OPTIONS'], 'pluralize' => false],
        //         '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
        //     ],
        // ],

        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => [
        'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework
        $params,
      ]
    // 'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
