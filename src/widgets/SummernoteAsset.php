<?php
declare(strict_types = 1);

namespace s1lver\summernote;

use yii\web\AssetBundle;

/**
 * Summernote assets
 */
class SummernoteAsset extends AssetBundle
{
    public $sourcePath = '@bower/summernote/dist';
    public $js = [
        'summernote-bs4.min.js',
    ];
    public $css = [
        'summernote-bs4.min.css',
    ];
}
