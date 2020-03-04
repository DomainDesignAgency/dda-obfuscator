// https://www.tiny.cloud/docs/advanced/creating-a-plugin/
(function() {
    tinymce.PluginManager.add('mybutton', function(editor, url) {
        editor.addButton('mybutton', {
            text: 'Hide harry',
            icon: false,
            onclick: function() {
                selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        //Things to do
                        //Add in a mailto part that uses the select or change to as we can't use the default link
                        content =  '[dda_obfuscator user="" domain=""]'+selected+'[/dda_obfuscator]';
                    }else{
                        alert('Please highlight email to hide from bots');
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
            }
        })
    })
})();