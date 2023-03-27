# Yii2 Summernote widget

[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fs1lver%2Fsummernote%2Fdevelop)](https://dashboard.stryker-mutator.io/reports/github.com/s1lver/summernote/develop)
[![Static Analysis Status](https://github.com/s1lver/yii2-summernote/actions/workflows/psalm.yml/badge.svg)](https://github.com/s1lver/yii2-summernote/actions)

[https://summernote.org](https://summernote.org/)

## Install

```bash
composer require s1lver/yii2-summernote "^1.0.0"
```

or add

```json
"s1lver/yii2-summernote": "^1.0.0"
```

to the `require` section of your **composer.json** file.

## How to use
Displaying custom buttons

```php
<?= $form->field($model, 'test')->widget(SummernoteWidget::class, [
    'customToolbarButtons' => [
        [
            'type' => 'dropdown',
            'label' => 'Custom tags',
            'tooltip' => 'Custom tags',
            'values' => [
                'Tag1',
                'Tag2',
                'Tag3',
            ],
        ],
    ],
]) ?>
```