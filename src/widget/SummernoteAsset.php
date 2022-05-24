<?php
declare(strict_types = 1);

namespace s1lver\summernote\widget;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Summernote assets
 */
class SummernoteAsset extends AssetBundle
{
    public $sourcePath = '@bower/summernote/dist';
    public $js = [
        'summernote-bs4.min.js',
        'lang/summernote-ru-RU.min.js',
    ];
    public $css = [
        'summernote-bs4.min.css',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
