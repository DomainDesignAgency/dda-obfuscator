<?php
/**
* Plugin Name: Email Obfuscator
* Plugin URI: https://github.com/waltercraig/dda-obfuscator
* Description: Hide email addresses from bots on Wordpress Sites
* Version: 0.0.01
* Author: Walter Craig
* Author URI: https://www.domaindesignagency.com/
* License: GPL12
*/

// create a way to add shortcodes through tinymice 
// adds an Email Obfuscator to anything in the shortcode 

// Add shortcode option to wordpress editor
// init process for registering our button
add_action('init', 'dda_shortcode_button_init');
function dda_shortcode_button_init() {

     //Abort early if the user will never see TinyMCE
     if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
          return;

     //Add a callback to regiser our tinymce plugin   
     add_filter("mce_external_plugins", "dda_register_tinymce_plugin"); 

     // Add a callback to add our button to the TinyMCE toolbar
     add_filter('mce_buttons', 'dda_add_tinymce_button');
}


//This callback registers our plug-in
function dda_register_tinymce_plugin($plugin_array) {
   $plugin_array['dda_button'] = plugins_url( '/js/shortcode.js', __FILE__ );
   return $plugin_array;
}

//This callback adds our button to the toolbar
function dda_add_tinymce_button($buttons) {
           //Add the button ID to the $button array
   $buttons[] = "dda_button";
   return $buttons;
}

