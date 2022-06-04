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
        'css/style-media.css',
        'css/style.css',
        // 'css/filter.css',
        'font/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css',
        'font/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
        'css/post.css',
        'css/map.css'
    ];
    public $js = [
        'js/script.js',
        'js/map.js',
        'font/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}