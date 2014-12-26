<?php
/**
 * Simple Life functions and definitions
 * Child theme definition for theme: Logopedie Den Bosch Zuid - Miriam de Bekker
 * @package Simple Life
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

?>