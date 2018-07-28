<?php

namespace frontend\assets;

use yii\web\AssetBundle as BaseMaterialAsset;

/**
 * Main frontend application asset bundle.
 */
class PKAsset extends BaseMaterialAsset
{
    public $sourcePath = '@vendor/pk2-free/';
    public $css = [
        'css/paper-kit.css',
        'css/bootstrap.min.css',
        'css/demo.css',
        'css/nucleo-icons.css',
    ];
    public $js = [
        'js/paper-kit.js',
        'js/bootstrap.min.js',
        'js/popper.min.js',
        'js/bootstrap-datetimepicker.min.js',
        'js/bootstrap-switch.min.js',
        'js/jquery-3.2.1.js',
        'js/jquery-ui-1.12.1.custom.min.js',
        'js/moment.min.js',
        'js/nouislider.js',
    ];

    public $scss = [
        'sass/paper-kit.scss',
        'sass/plugins/_buttons.scss',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
