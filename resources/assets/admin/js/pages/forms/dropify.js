$(function() {
    "use strict";
    $('.dropify').dropify({
        error: {
            'fileSize': 'اندازه عکس بیش از حد مجاز است ({{ value }} حداکثر).',
            'minWidth': 'عرض عکس کوچکتر از حد مجاز است ({{ value }}}px حداقل).',
            'maxWidth': 'عرض عکس بزرگتر از حد مجاز است ({{ value }}}px حداکثر).',
            'minHeight': 'ارتفاع عکس کوچکتر از حد مجاز است ({{ value }}}px حداقل).',
            'maxHeight': 'ارتفاع عکس بزرگتر از حد مجاز است ({{ value }}px حداکثر).',
            'imageFormat': 'فرمت عکس قابل قبول نیست ({{ value }} فقط).'
        }
    });

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
});