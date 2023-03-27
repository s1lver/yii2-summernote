<?php

declare(strict_types=1);

namespace s1lver\summernote\widget\helpers;

final class SummernoteWidgetHelper
{
    /**
     * @return array|array[]
     */
    public function configureToolbarButtons(
        array $defaultToolbarButtons,
        array $customToolbarButtons = []
    ): array
    {
        if (!empty($customToolbarButtons)) {
            $customButtons = [];

            foreach ($customToolbarButtons as $item) {
                if (isset($item['type']) && $item['type'] === 'dropdown') {
                    $customButtons[] = 'customDropdownButton';
                }
            }

            return array_merge($defaultToolbarButtons, $customButtons);
        }

        return $defaultToolbarButtons;
    }
}
