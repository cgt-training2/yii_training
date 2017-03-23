<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/material-dashboard.css',
        'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons',
        'css/site.css',
    ];
    public $js = [
        //'js/jquery-3.1.0.min.js',
        'js/bootstrap.min.js',
        'js/material.min.js',
        //'js/chartist.min.js',
        'js/bootstrap-notify.js',
        //'https://maps.googleapis.com/maps/api/js',
        'js/material-dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
