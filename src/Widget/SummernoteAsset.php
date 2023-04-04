<?php
declare(strict_types = 1);

namespace S1lver\Summernote\Widget;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Summernote assets
 */
class SummernoteAsset extends AssetBundle
{
    public $sourcePath = '@bower/summernote/dist';
    public $js = [
        'summernote.min.js',
        'lang/summernote-ru-RU.min.js',
    ];
    public $css = [
        'summernote.min.css',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
