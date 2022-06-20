<?php
declare(strict_types = 1);

namespace s1lver\summernote\widget;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Summernote widget
 */
class SummernoteWidget extends InputWidget
{
    public const BS4 = 'bs4';
    public const BS5 = 'bs5';

    /**
     * Default toolbar buttons
     * @see https://summernote.org/deep-dive/#custom-toolbar-popover
     * @var array|array[]
     */
    public array $defaultButtons = [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['misc', ['undo', 'redo', 'codeview']],
        ['font_style', ['fontsize']]
    ];

    public string $bsVersion = self::BS4;

    /**
     * @inheritDoc
     * @throws InvalidConfigException
     */
    public function run():string
    {
        $this->assetRegister();

        $options = array_merge(
            $this->options,
            [
                'data' => [
                    'summernote' => true,
                    'default-buttons' => $this->defaultButtons,
                ]
            ]
        );
        $textarea = Html::textarea($this->name, $this->value, $options);

        if ($this->hasModel()) {
            $textarea = Html::activeTextarea($this->model, $this->attribute, $options);
        }

        return $textarea;
    }

    /**
     * @return void
     * @throws InvalidConfigException
     */
    private function assetRegister():void
    {
        $summernoteAsset = SummernoteAsset::class;
        if (self::BS4 === $this->bsVersion) {
            $summernoteAsset = SummernoteBs4Asset::class;
        }
        if (self::BS5 === $this->bsVersion) {
            $summernoteAsset = SummernoteBs5Asset::class;
        }

        $this->view->registerAssetBundle($summernoteAsset, $this->view::POS_END);

        SummernoteWidgetAsset::register($this->view);
    }
}
