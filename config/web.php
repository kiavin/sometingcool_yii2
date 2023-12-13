<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'Admin' => [
            'class' => 'app\modules\Admin\Admin',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9pTdOBknxsOoqnDZqaLu8FHhJo-tbr_6',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'site/login' => 'site/login',
                'site/signup' => 'site/signup',
                'site/logout' => 'site/logout',
                'site/contact' => 'site/contact',
                'site/about' => 'site/about',
                'site/index' => 'site/index',
                'site/request-password-reset' => 'site/request-password-reset',
                'site/reset-password' => 'site/reset-password',
                'site/verify-email' => 'site/verify-email',
                'site/signup-confirm' => 'site/signup-confirm',
                'site/captcha' => 'site/captcha',
                'site/error' => 'site/error',
                'site/<action>' => 'site/<action>',
                'site/<controller>/<action>' => 'site/<controller>/<action>',
                'site/<controller>/<action>/<id:\d+>' => 'site/<controller>/<action>/<id:\d+>',
                'site/<controller>/<action>/<id:\d+>/<slug>' => 'site/<controller>/<action>/<id:\d+>/<slug>',
                'site/<controller>/<action>/<slug>' => 'site/<controller>/<action>/<slug>',
                'site/<controller>/<action>/<slug>/<id:\d+>' => 'site/<controller>/<action>/<slug>/<id:\d+>',
                'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>' => 'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>',
                'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>' => 'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>',
                'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>/<slug4>' => 'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>/<slug4>',
                'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>/<slug4>/<slug5>' => 'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>/<slug4>/<slug5>',
                'site/<controller>/<action>/<slug>/<id:\d+>/<slug2>/<slug3>/<slug4>/<slug5>/<slug',
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
