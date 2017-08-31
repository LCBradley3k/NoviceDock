(function() {
    tinymce.create('tinymce.plugins.Newbutton', {
        init : function(ed, url) {
            ed.addButton('code', {
                title : 'Code',
                cmd : 'code',
                image : url + '/../images/code.png'
            });

            ed.addCommand('code', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '<code>' + selected_text + '</code>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'newbutton', tinymce.plugins.Newbutton );
})();
