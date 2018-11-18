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
    ];
    public $depends = [
        'app\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
