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
    /**
     * @inheritDoc
     */
    public function run():string
    {
        SummernoteWidgetAsset::register($this->view);

        $textarea = Html::textarea($this->name, $this->value, $this->options);

        if ($this->hasModel()) {
            $textarea = Html::activeTextarea($this->model, $this->attribute, $this->options);
        }

        return $textarea;
    }
}
