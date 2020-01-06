<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=football_live',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'i18n' => array(
            'translations' => array(
                'app' => array('class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@common/messages'),
                'cms' => array('class' => 'yii\i18n\PhpMessageSource','basePath' => '@common/messages'),
                'frontend' => array('class' => 'yii\i18n\PhpMessageSource','basePath' => '@common/messages'),
            )
        )
    ],
];
