<?php

/**
 * Simple Life functions and definitions
 *
 * @package Simple Life
 */

if ( ! function_exists( 'simple_life_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_life_setup() {
	global $content_width;

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 800; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simple Life, use a find and replace
	 * to change 'simple-life' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'simple-life', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'simple-life' ),
		'footer'  => __( 'Footer Menu', 'simple-life' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'audio',
		'quote',
		'status',
		'link',
		'chat',
		'gallery',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simple_life_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    global $simple_life_options;
    $simple_life_options = get_option('simple_life_options');

    global $simple_life_default_options;

    $simple_life_default_options = array(

			'site_layout'    => 'content-sidebar',
			'content_layout' => 'full',
			'read_more_text' => 'read more',
			'excerpt_length' => 40,
			'footer_widgets' => 0,
			'copyright_text' => '&copy; 2014 All rights reserved',
			'powered_by'     => 0,

    	);

}
endif; // simple_life_setup
add_action( 'after_setup_theme', 'simple_life_setup' );

/**
 * Register widget area.
 */
function simple_life_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'simple-life' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'simple_life_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simple_life_scripts() {
  wp_enqueue_style( 'simple-life-style-open-sans', '//fonts.googleapis.com/css?family=Open+Sans' );
  wp_enqueue_style( 'simple-life-style-bootstrap', get_template_directory_uri().'/css/bootstrap.css', false ,'3.2.0' );
  wp_enqueue_style( 'simple-life-style-font-awesome', get_template_directory_uri().'/third-party/font-awesome/css/font-awesome.css', false ,'4.2.0' );
  wp_enqueue_style( 'simple-life-style-meanmenu', get_template_directory_uri().'/third-party/meanmenu/meanmenu.css', false ,'2.0.6' );

	wp_enqueue_style( 'simple-life-style', get_stylesheet_uri() );
  wp_enqueue_style( 'simple-life-style-responsive', get_template_directory_uri().'/css/responsive.css', false , '1.0.1' );

	wp_enqueue_script( 'simple-life-meanmenu-script', get_template_directory_uri() . '/third-party/meanmenu/jquery.meanmenu.js', array('jquery'), '2.0.6', true );
	wp_enqueue_script( 'simple-life-custom', get_template_directory_uri() . '/js/custom.js', array('jquery','simple-life-meanmenu-script'), '1.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_life_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom theme functions.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Custom theme custom.
 */
require get_template_directory() . '/inc/theme-custom.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Third Party Compatibility.
 */
require get_template_directory() . '/support/woocommerce.php';

