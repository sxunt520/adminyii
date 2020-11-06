<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'language' => 'zh-CN',
    'charset' => 'utf-8',
    'defaultRoute' => '/site/index',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
        'v2' => [
            'class' => 'api\modules\v2\Module',
        ],
	],
    'components' => [
         'user' => [ 
            'identityClass' => 'common\models\Member',
            'enableAutoLogin' => true,
            'enableSession'=>false
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,//这个为true 为验证后面是否为复数有s
            'rules' => [
                            // 'class' => 'yii\rest\UrlRule',
                            // 'controller' => ['v1/user'],
                            // 'extraPatterns' => [
                            //     'POST login' => 'login',
                            //     'POST signup' => 'signup',
                            //     'GET user-profile' => 'user-profile',
                            //   //'GET signup-test' => 'signup-test',
                            // ],
                            'POST members' => 'member/signup',
                            'POST members' => 'member/login',
                            'POST members' => 'member/user-profile',
                            'POST members' => 'member/test',
                            'POST articles' => 'article/list',
                     ],
          ],
            'response' => [
                'class' => 'yii\web\Response',
                'on beforeSend' => function ($event) {
                        $response = $event->sender;
                        $response->data = [
                            'code' => $response->getStatusCode(),
                            'data' => $response->data,
                            'message' => $response->statusText
                        ];
                        $response->format = yii\web\Response::FORMAT_JSON;
                    },
            ], 
        'errorHandler' => [
            'errorAction' => 'site/error',//site里配置actions class 
            //'class' => 'api\components\ExceptionHandler',
        ],

    ],
    'params' => $params,
];
