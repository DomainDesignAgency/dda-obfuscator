<?php
function dda_obfuscator_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'user'    => '',
        'domain'  => '',
    ), $atts ) );
  
    // Returns the button with a link
    return '<a href="#" data-user="' . $user . '" data-site="' . $domain . '">Enable Js</a>';
 
}
add_shortcode( 'dda_obfuscator', 'dda_obfuscator_shortcode' );