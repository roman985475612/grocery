<?php

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'adminlte/icheck-bootstrap/icheck-bootstrap.min.css',
        'adminlte/css/adminlte.min.css',
    ];
    public $js = [
        'adminlte/bootstrap/js/bootstrap.bundle.min.js',
        'adminlte/js/adminlte.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}