<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        //配置帮助函数类
        'helper' =>[
            'class' => 'common\components\Helper',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        "authManager" => [
            "class" => 'yii\rbac\DbManager',
        ],
    ],
];
