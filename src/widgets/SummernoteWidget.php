<?php
declare(strict_types = 1);

namespace s1lver\summernote\widgets;

use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Summernote widget
 */
class SummernoteWidget extends InputWidget
{
    public array $defaultButtons = [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['misc', ['undo', 'redo']],
        ['font_style', ['fontsize']]
    ];

    /**
     * @inheritDoc
     */
    public function run():string
    {
        SummernoteWidgetAsset::register($this->view);

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
}
