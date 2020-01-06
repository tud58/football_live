<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
//    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php'
//    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '103.216.120.148'],
            'generators' => [
                'crud' => [
                    'class' => 'backend\templates\gii\crud\Generator',
                ],
                'model' => [
                    'class' => 'backend\templates\gii\model\Generator'
                ],
            ]
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '103.216.120.148'],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'StZQTI9qU017rrZUOL6ua_tqUgmC4gy4',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.io',
            'rules' => [
                ['pattern' => '<controller:\w+>/<id:\d+>', 'route' => '<controller>/view'],
                ['pattern' => '<controller:\w+>/<action:\w+>/<id:\d+>', 'route' => '<controller>/<action>'],
                ['pattern' => '<controller:\w+>/<action:\w+>', 'route' => '<controller>/<action>'],
                ['pattern' => 'module/<module:\w+>/<controller:\w+>/<action:\w+>', 'route' => '<module>/<controller>/<action>'],
                ['pattern' => 'login', 'route' => 'site/login'],
                ['pattern' => 'logout', 'route' => 'site/logout'],
                ['pattern' => 'bang-gia', 'route' => 'site/price'],
                ['pattern' => 'ho-tro', 'route' => 'support/index'],
                ['pattern' => 'blog', 'route' => 'blog/index'],
                ['pattern' => 'lien-he', 'route' => 'site/contact'],


                ['pattern' => 'resource-report/show-chart/<resourceId:\d+>', 'route' => 'resource-report/show-chart'],
                ['pattern' => 'resource-report/get-stats/<resourceId:\d+>', 'route' => 'resource-report/get-stats'],

                /** COMMON */
                ['pattern' => 'validate-permission', 'route' => 'common/validate-permission'],
            ]
        ],
    ],
    'params' => $params,
];
