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
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enableRegistration' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['joshua']
        ],

        'gridview' => [
            'class' => '\kartik\grid\Module',
            
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
];
