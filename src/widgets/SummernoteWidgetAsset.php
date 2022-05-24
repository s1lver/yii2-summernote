<?php
declare(strict_types = 1);

namespace s1lver\summernote;

use yii\web\AssetBundle;

/**
 * Summernote widget assets
 */
class SummernoteWidgetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/s1lver/yii2-summernote/src/widgets/assets';
    public $js = [
        'js/summernote_widget.js'
    ];
    public $depends = [
        SummernoteAsset::class,
    ];
}
