<?php
/**
 * Simple Life functions and definitions
 * Child theme definition for theme: Logopedie Den Bosch Zuid - Miriam de Bekker
 * @package Simple Life
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_register_script( 'jScript', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' );
    wp_register_script('bootstrapjs',get_stylesheet_directory_uri() .'/js/bootstrap.min.js', array(), '3.3.7', true);
    wp_enqueue_script( 'jScript' );
    wp_enqueue_script( 'bootstrapjs' );

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

?>