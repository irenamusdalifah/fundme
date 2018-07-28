<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MaterialAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'materialkitassets/css/material-kit.css',
        'materialkitassets/css/material-kit.min.css',
        'materialkitassets/css/bootstrap.css',
        // 'materialkitassets/demo/demo.css',
        // 'template/css/material-dashboard.css',
        // 'template/css/material-dashboard.min.css',
        // 'materialkitassets/css/bootstrap.css',
        // 'css/site.css'

    ];
    public $js = [
        'materialkitassets/js/material-kit.min.js',
        'materialkitassets/js/material-kit.js',
        'materialkitassets/js/core/bootstrap-material-design.min.js',
        // 'materialkitassets/js/core/jquery.min.js',
        'materialkitassets/js/core/popper.min.js',
        'materialkitassets/js/plugins/moment.min.js',
        // 'materialkitassets/js/plugins/bootstrap-datetimepicker.js',
        
        // 'materialkitassets/js/plugins/nouislider.min.js',
        // 'assets/b287541c/js/material.min.js',
        // 'assets/b287541c/js/chartist.min.js',
        // 'assets/b287541c/js/bootstrap-notify.js',
        // 'assets/b287541c/js/material-dashboard.js',
        // 'assets/b287541c/js/superfish.js'
    ];

    public $scss = [
        'materialkitassets/scss/material-kit.scss'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
