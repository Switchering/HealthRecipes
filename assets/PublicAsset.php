<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/reset.css',
        'public/css/superfish.css',
        'public/css/font-awsome/css/font-awesome.css',
        'public/css/orbit.css',
        'public/css/style.css',
        'public/css/color/green.css',
        'public/css/zerogrid.css',
        'public/css/responsive.css'
    ];
    
    public $js = [
        'public/js/comment-reply.min.js',
        'public/js/css3-mediaqueries.js',
        'public/js/hoverIntent.js',
        'public/js/jquery.carouFredSel-6.2.1.js',
        'public/js/jquery-migrate.min.js',
        'public/js/jquery-1.10.2.min.js',
        'public/js/jquery.carouFredSel-6.2.1-packed.js',
        'public/js/jquery.js',
        'public/js/orbit.js',
        'public/js/orbit.min.js',
        'public/js/superfish.js',
        'public/js/symple_googlemap.js',
        'public/js/symple_skillbar.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
