jQuery(document).ready(function() {
    'use strict';
    let textHtml = $(document.querySelector("[data-summernote]"))

    textHtml.summernote({
        toolbar: textHtml.data('default-buttons'),
        focus: true,
        lang: 'ru-RU',
        height: 200
    })
})