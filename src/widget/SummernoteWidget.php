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
    public const DEFAULT_BUTTONS = [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['misc', ['undo', 'redo', 'codeview']],
        ['font_style', ['fontsize']]
    ];

    /**
     * Default toolbar buttons
     * @see https://summernote.org/deep-dive/#custom-toolbar-popover
     * @var array|array[]
     */
    public array $defaultToolbarButtons = self::DEFAULT_BUTTONS;
    /**
     * Custom toolbar buttons setting
     * @var array
     */
    public array $customToolbarButtons = [];

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
                    'default-buttons' => $this->configureToolbarButtons(),
                    'custom-buttons' => $this->customToolbarButtons,
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
     * @return array|array[]
     */
    private function configureToolbarButtons():array
    {
        if (!empty($this->customToolbarButtons)) {
            $customButtons = [];

            foreach ($this->customToolbarButtons as $item) {
                if (isset($item['type']) && $item['type'] === 'dropdown') {
                    $customButtons[] = 'customDropdownButton';
                }
            }

            return array_merge($this->defaultToolbarButtons, $customButtons);
        }

        return $this->defaultToolbarButtons;
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
