<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css'
    ];
    public $js = [
        '/js/css3-mediaqueries.js',
        '/js/html5.js',
        '/js/jquery1111.min.js',
        '/js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\FontAwesomeAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
