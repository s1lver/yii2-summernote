<?php
declare(strict_types = 1);

namespace s1lver\summernote\widget;

use yii\web\AssetBundle;

/**
 * Summernote widget assets
 */
class SummernoteWidgetAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets';
    public $js = [
        'js/summernote_widget.js'
    ];
    public $depends = [
        SummernoteAsset::class,
    ];
}
