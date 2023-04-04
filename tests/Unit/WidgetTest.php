<?php

declare(strict_types=1);

namespace S1lver\Summernote\Tests\Unit;

use S1lver\Summernote\Widget\Helpers\SummernoteWidgetHelper;
use S1lver\Summernote\Widget\SummernoteWidget;
use PHPUnit\Framework\TestCase;

class WidgetTest extends TestCase
{
    public function testConfigureToolbarButtons(): void
    {
        $customToolbar = [
            [
                'type' => 'dropdown',
                'label' => 'Теги',
                'tooltip' => 'Теги',
                'values' => [
                    'test1',
                    'test2',
                    'test3',
                ]
            ],
        ];

        $widgetHelper = new SummernoteWidgetHelper();

        $result = $widgetHelper->configureToolbarButtons(
            SummernoteWidget::DEFAULT_BUTTONS,
            $customToolbar
        );

        self::assertIsArray($result);

        foreach ($result as $item) {
            if (is_string($item)) {
                self::assertEquals('customDropdownButton', $item);
            }
        }
    }
}
