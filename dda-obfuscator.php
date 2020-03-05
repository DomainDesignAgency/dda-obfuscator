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

// Add shortcode option to wordpress editor
// init process for registering our button
add_action( 'after_setup_theme', 'dda_theme_setup' );

if ( ! function_exists( 'dda_theme_setup' ) ) {
    function dda_theme_setup() {

        add_action( 'init', 'dda_buttons' );

    }
}

/********* TinyMCE Buttons ***********/
if ( ! function_exists( 'dda_buttons' ) ) {
    function dda_buttons() {
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
            return;
        }

        add_filter( 'mce_external_plugins', 'dda_add_buttons' );
        add_filter( 'mce_buttons', 'dda_register_buttons' );
    }
}

if ( ! function_exists( 'dda_add_buttons' ) ) {
    function dda_add_buttons( $plugin_array ) {
        $plugin_array['mybutton'] = plugins_url( '/assets/js/admin.js', __FILE__ );
        return $plugin_array;
    }
}

if ( ! function_exists( 'dda_register_buttons' ) ) {
    function dda_register_buttons( $buttons ) {
        array_push( $buttons, 'mybutton' );
        return $buttons;
    }
}

// Add Shortcode 
require_once __DIR__ . '/includes/shortcode.php';

// JS 
function dda_obfuscator_shortcode_js() {   
    wp_enqueue_script( 'dda_obfuscator_js', plugin_dir_url( __FILE__ ) . 'assets/js/frontend.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'dda_obfuscator_shortcode_js');