<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styles.css',
        'css/ionicons/css/ionicons.css',
        'css/font-awesome.min.css',
        'css/elegant-icons/style.css',
        'css/owl.theme.css',
        'css/owl.carousel.css',
        'css/nivo-lightbox.css',
        'css/nivo_themes/default/default.css',
        'css/colors/blue.css',
        'css/responsive.css',
        
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/retina-1.1.0.min.js',
        'js/smoothscroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.localScroll.min.js',
        'js/owl.carousel.min.js',
        'js/nivo-lightbox.min.js',
        'js/simple-expand.min.js',
        'js/jquery.nav.js',
        'js/jquery.fitvids.js',
        'js/jquery.ajaxchimp.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'app\assets\Html5ShivAsset',
        'app\assets\RespondAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
