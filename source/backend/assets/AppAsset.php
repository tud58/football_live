<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/jquery-confirm.min.css',
        'css/jquery.toast.css',
    ];
    public $js = [
        'js/main.js',
        'js/I18N/vi.js',
        'js/jquery-confirm.min.js',
        'js/jquery.toast.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
