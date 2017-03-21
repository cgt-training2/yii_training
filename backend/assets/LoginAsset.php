<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/material-dashboard.css',
        'css/site.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/material.min.js',
        'js/material-dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
