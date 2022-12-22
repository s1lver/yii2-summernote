# yii2-summernote

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

# How to use
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