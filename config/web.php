<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'home/index',
    'language' => 'ru',
    'name' => 'Grocery Store',
    'layout' => 'grocery',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'js/jquery-1.11.1.min.js',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hmlfn7J9B88t6hv-5vc_BUXjjyeH2j7Y',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl'        => 'admin/auth/login',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/'                                 => 'home/index',
                'category/<id:\d+>/page/<page:\d+>' => 'product/list',
                'category/<id:\d+>'                 => 'product/list',
                'product/<id:\d+>'                  => 'product/detail',
                'search'                            => 'product/search',
                'cart/add/<product_id:\d+>'         => 'cart/add',
                'cart/qty-plus/<product_id:\d+>'    => 'cart/qty-plus',
                'cart/qty-minus/<product_id:\d+>'   => 'cart/qty-minus',
                'cart/del-item/<product_id:\d+>'    => 'cart/del-item',

                // Admin & auth
                'admin'                             => 'admin/main/index',
                'login'                             => 'admin/auth/login',
                'logout'                            => 'admin/auth/logout',
                'register'                          => 'admin/auth/register',

                // Order
                'admin/order/<id:\d+>/edit'         => 'admin/order/edit',
                'admin/order/<id:\d+>/updata'       => 'admin/order/update',
                'admin/order/<id:\d+>/delete'       => 'admin/order/delete',
                'admin/order/<id:\d+>'              => 'admin/order/view',
                'admin/orders'                      => 'admin/order/index',
                
                // Category
                'admin/category/<id:\d+>/edit'    => 'admin/category/edit',
                'admin/category/<id:\d+>/delete'  => 'admin/category/delete',
                'admin/category/<id:\d+>'         => 'admin/category/view',
                'admin/category/new'              => 'admin/category/create',
                'admin/categories'                => 'admin/category/index',

                // Goods
                'admin/product/<id:\d+>/edit'    => 'admin/product/edit',
                'admin/product/<id:\d+>/delete'  => 'admin/product/delete',
                'admin/product/<id:\d+>'         => 'admin/product/view',
                'admin/product/new'              => 'admin/product/create',
                'admin/products'                 => 'admin/product/index',
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class'        => 'app\modules\admin\Module',
            'layout'       => 'admin',
            'defaultRoute' => 'main/index',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['@'],
			'root' => [
				'path' => 'uploads/files',
				'name' => 'Files'
			],
		]
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
