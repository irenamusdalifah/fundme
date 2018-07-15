<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class NowuiAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'nowuikit/css/now-ui-kit.css',
        'nowuikit/css/now-ui-kit.min.css',
        'nowuikit/css/demo.css',
        // 'materialkitassets/demo/demo.css',
        // 'template/css/material-dashboard.css',
        // 'template/css/material-dashboard.min.css',
        // 'materialkitassets/css/bootstrap.css',
        // 'css/site.css'

    ];
    public $js = [
        //'nowuikit/js/material-kit.min.js',
        'nowuikit/js/now-ui-kit.js',
        'nowuikit/js/core/bootstrap-nowui.min.js',
        // 'materialkitassets/js/core/jquery.min.js',
        'nowuikit/js/core/popper.min.js',
        //'nowuikit/js/plugins/moment.min.js',
        // 'materialkitassets/js/plugins/bootstrap-datetimepicker.js',
        
        // 'materialkitassets/js/plugins/nouislider.min.js',
        // 'assets/b287541c/js/material.min.js',
        // 'assets/b287541c/js/chartist.min.js',
        // 'assets/b287541c/js/bootstrap-notify.js',
        // 'assets/b287541c/js/material-dashboard.js',
        // 'assets/b287541c/js/superfish.js'
    ];

    public $scss = [
        'nowuikit/sass/now-ui-kit.scss'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
