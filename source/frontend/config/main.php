<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
//    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php'
//    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'nlemGvmcyNkHGwj1hF8nwsMKSv_L3sUY',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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


                ['pattern' => 'truc-tiep/<code:.*?>', 'route' => 'site/live'],
                ['pattern' => 'resource-report/get-stats/<resourceId:\d+>', 'route' => 'resource-report/get-stats'],

                /** COMMON */
                ['pattern' => 'validate-permission', 'route' => 'common/validate-permission'],
            ]
        ],
    ],
    'params' => $params,
];
