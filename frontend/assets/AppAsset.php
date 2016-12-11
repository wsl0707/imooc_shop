<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $css = [
        'statics/css/font-awesome.min.css',
        'statics/css/bootstrap.min.css',
        'statics/css/main.css',
        'statics/css/green.css',
        'statics/css/owl.carousel.css',
        'statics/css/owl.transitions.css',
        'statics/css/animate.min.css',
        'statics/css/config.css',
        'statics/css/green.css',
        'statics/css/blue.css',
        'statics/css/red.css',
        'statics/css/orange.css',
        'statics/css/navy.css',
        'statics/css/dark-green.css',
    ];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'statics/js/jquery-1.10.2.min.js',
        'statics/js/jquery-migrate-1.2.1.js',
        'statics/js/bootstrap.min.js',
        'statics/js/html5shiv.js',
        'statics/js/respond.min.js',
//        'http://maps.google.com/maps/api/js?sensor=false&amp;language=en',
        'statics/js/gmap3.min.js',
        'statics/js/bootstrap-hover-dropdown.min.js',
        'statics/js/owl.carousel.min.js',
        'statics/js/css_browser_selector.min.js',
        'statics/js/echo.min.js',
        'statics/js/jquery.easing-1.3.min.js',
        'statics/js/bootstrap-slider.min.js',
        'statics/js/jquery.raty.min.js',
        'statics/js/jquery.prettyPhoto.min.js',
        'statics/js/jquery.customSelect.min.js',
        'statics/js/wow.min.js',
        'statics/js/scripts.js',
        'http://w.sharethis.com/button/buttons.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',

    ];
}
