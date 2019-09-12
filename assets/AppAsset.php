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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/css/bootstrap.min.css',
        'assets/css/main.css',
        'assets/css/blue.css',
        'assets/css/owl.carousel.css',
        'assets/css/owl.transitions.css',
        'assets/css/animate.min.css',
        'assets/css/rateit.css',
        'assets/css/bootstrap-select.min.css',
        'assets/css/font-awesome.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
    ];
    public $js = [
        //'assets/js/jquery-1.11.1.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/bootstrap-hover-dropdown.min.js',
        'assets/js/owl.carousel.min.js',
        'assets/js/echo.min.js',
        'assets/js/jquery.easing-1.3.min.js',
        'assets/js/bootstrap-slider.min.js',
        'assets/js/jquery.rateit.min.js',
        'assets/js/lightbox.min.js',
        'assets/js/bootstrap-select.min.js',
        'assets/js/wow.min.js',
        'assets/js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
