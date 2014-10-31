
function loadCKEditor(editorid, config) {
    var myconfig = {
        extraPlugins : 'youtube',
        toolbar: 'Descript',
        toolbar_Descript: [
            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','Subscript','Superscript','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
            { name: 'clipboard', items : [ 'Undo','Redo' ] },
            { name: 'links', items : [ 'Link','Unlink' ] },
            { name: 'insert', items: [ 'Image','Youtube',  'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] }
        ],
        resize_enabled: false,
        language: 'en',
        enterMode: CKEDITOR.ENTER_DIV

    };

    for (var property in config)
        myconfig[property] = config[property];

    CKEDITOR.replace(editorid, myconfig);
}