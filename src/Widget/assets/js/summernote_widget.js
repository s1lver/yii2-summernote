jQuery(document).ready(function() {
    'use strict';
    let textHtml = $(document.querySelector("[data-summernote]"))
    let customButtons = textHtml.data('custom-buttons');

    let customDropdownButtonTemplate = function() {
        let buttonContents = '';
        let buttonLabel = '';
        let buttonTooltip = '';

        customButtons.forEach(function(item) {
            buttonLabel = item.label;
            buttonTooltip = item.tooltip;
            item.values.forEach(function(text) {
                buttonContents += '<li role="listitem"><a href="#">' + text + '</a></li>';
            })
        })

        const ui = $.summernote.ui;
        return ui.buttonGroup([
            ui.button({
                className: 'dropdown-toggle',
                contents: buttonLabel + ' <span class="caret"></span>',
                tooltip: buttonTooltip,
                data: {
                    toggle: 'dropdown'
                }
            }),
            ui.dropdown({
                className: 'dropdown-style',
                contents: buttonContents,
                callback: function(dropdown) {
                    dropdown.find('li a').each(function() {
                        $(this).click(function() {
                            const editor = $(this).closest('.note-editor').prev();
                            editor.summernote('editor.saveRange');
                            editor.summernote('editor.restoreRange');
                            editor.summernote('editor.focus');
                            editor.summernote('editor.insertText', $(this).text());
                        })
                    })
                }
            })
        ]).render();
    }

    textHtml.summernote({
        toolbar: textHtml.data('default-buttons'),
        focus: true,
        lang: 'ru-RU',
        height: 200,
        buttons: {
            customDropdownButton: customDropdownButtonTemplate
        }
    })
})