jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.dda_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('dda_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[shortcode]'+selected+'[/shortcode]';
                    }else{
                        content =  '[shortcode]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('dda_button', {title : 'Insert shortcode', cmd : 'dda_insert_shortcode' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('dda_button', tinymce.plugins.dda_plugin);
});