<?php
declare(strict_types = 1);

namespace s1lver\summernote\widget;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Summernote assets for Bootstrap 5
 */
class SummernoteBs5Asset extends AssetBundle
{
    public $sourcePath = '@bower/summernote/dist';
    public $js = [
        'summernote-bs5.min.js',
        'lang/summernote-ru-RU.min.js',
    ];
    public $css = [
        'summernote-bs5.min.css',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
