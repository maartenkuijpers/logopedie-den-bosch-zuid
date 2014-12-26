<?php
/**
 * Simple Life Theme Customizer
 *
 * @package Simple Life
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_life_customize_register( $wp_customize ) {

  if( !class_exists( 'Plain_Html_Customize_Control' ) ):

    class Plain_Html_Customize_Control extends WP_Customize_Control {

        public $type = 'plainhtml';

        public function render_content() {
            ?>
            <label>
            <p style="color: #555555; background-color: #f5f5f5; padding:5px 0px; text-align: center; font-weight: bold;">
              <?php echo esc_html( $this->label ); ?></p>
            </label>
            <?php
        }
    }

  endif;

  if ( ! function_exists( 'simple_life_customizer_validate_excerpt_length' ) ) {
    function simple_life_customizer_validate_excerpt_length($input){
      if ( intval( $input ) < 1 ) {
        $input = 40;
      }
      return $input;
    }
  }
  if ( ! function_exists( 'simple_life_customizer_validate_read_more_text' ) ) {
    function simple_life_customizer_validate_read_more_text($input){
      if ( empty( $input ) ) {
        $input = __( 'Read more', 'simple-life' );
      }
      return $input;
    }
  }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  // Add Section
  $wp_customize->add_section( 'simple_life_options',
     array(
        'title'       => __( 'Simple Life Options', 'simple-life' ),
        'priority'    => 100,
        'capability'  => 'edit_theme_options',
        'description' => __('Simple Life Options', 'simple-life'),
     )
  );

  // general_heading
  $wp_customize->add_setting( 'simple_life_options[general_heading]',
     array(
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control( new Plain_Html_Customize_Control( $wp_customize, 'simple_life_options[general_heading]', array(
      'label'   => __( 'General Section', 'simple-life' ),
      'section' => 'simple_life_options',
      'priority' => 100,
  ) ) );

  // site_layout
  $wp_customize->add_setting( 'simple_life_options[site_layout]',
     array(
        'default'           => 'content-sidebar',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[site_layout]', array(
          'label'    => __( 'Site Layout', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'select',
          'priority' => 105,
          'choices'  => array(
            'content-sidebar' => __( 'Content-Sidebar', 'simple-life' ),
            'sidebar-content' => __( 'Sidebar-Content', 'simple-life' ),
            'full-width'      => __( 'Full Width', 'simple-life' ),
            ),
  ));

  // content_layout
  $wp_customize->add_setting( 'simple_life_options[content_layout]',
     array(
        'default'           => 'full',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[content_layout]', array(
          'label'    => __( 'Content Layout', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'select',
          'priority' => 115,
          'choices'  => array(
            'full'          => __( 'Full Post', 'simple-life' ),
            'excerpt'       => __( 'Excerpt', 'simple-life' ),
            'excerpt-thumb' => __( 'Excerpt with thumbnail', 'simple-life' ),
            ),
  ));

  // blog_heading
  $wp_customize->add_setting( 'simple_life_options[blog_heading]',
     array(
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control( new Plain_Html_Customize_Control( $wp_customize, 'simple_life_options[blog_heading]', array(
      'label'   => __( 'Blog Section', 'simple-life' ),
      'section' => 'simple_life_options',
      'priority' => 200,
  ) ) );

  // read_more_text
  $wp_customize->add_setting( 'simple_life_options[read_more_text]',
     array(
        'default'           => 'Read more',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'simple_life_customizer_validate_read_more_text',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[read_more_text]', array(
          'label'    => __( 'Read more text', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'text',
          'priority' => 210,
  ));

  // excerpt_length
  $wp_customize->add_setting( 'simple_life_options[excerpt_length]',
     array(
        'default'           => '40',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'simple_life_customizer_validate_excerpt_length',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[excerpt_length]', array(
          'label'    => __( 'Excerpt Length', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'text',
          'priority' => 220,
  ));


  // footer_heading
  $wp_customize->add_setting( 'simple_life_options[footer_heading]',
     array(
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control( new Plain_Html_Customize_Control( $wp_customize, 'simple_life_options[footer_heading]', array(
      'label'   => __( 'Footer Section', 'simple-life' ),
      'section' => 'simple_life_options',
      'priority' => 900,
  ) ) );

  // footer_widgets
  $wp_customize->add_setting( 'simple_life_options[footer_widgets]',
     array(
        'default'           => 0,
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[footer_widgets]', array(
          'label'    => __( 'Footer Widgets', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'select',
          'priority' => 905,
          'choices'  => array(
            '0' => __( 'No Widget', 'simple-life' ),
            '1' => __( '1', 'simple-life' ) . ' ' . __( 'Widget', 'simple-life' ),
            '2' => __( '2', 'simple-life' ) . ' ' . __( 'Widgets', 'simple-life' ),
            '3' => __( '3', 'simple-life' ) . ' ' . __( 'Widgets', 'simple-life' ),
            '4' => __( '4', 'simple-life' ) . ' ' . __( 'Widgets', 'simple-life' ),
            '6' => __( '6', 'simple-life' ) . ' ' . __( 'Widgets', 'simple-life' ),
            ),
  ));

  // copyright_text
  $wp_customize->add_setting( 'simple_life_options[copyright_text]',
     array(
        'default'           => '(c) 2014 All rights reserved',
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[copyright_text]', array(
          'label'    => __( 'Copyright text', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'text',
          'priority' => 910,
  ));

  // powered_by
  $wp_customize->add_setting( 'simple_life_options[powered_by]',
     array(
        'default'           => 0,
        'type'              => 'option',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_attr',
        'sanitize_js_callback' => 'esc_attr',
     )
  );
  $wp_customize->add_control('simple_life_options[powered_by]', array(
          'label'    => __( 'Show Powered By', 'simple-life' ),
          'section'  => 'simple_life_options',
          'type'     => 'checkbox',
          'priority' => 920,
  ));



}
add_action( 'customize_register', 'simple_life_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_life_customize_preview_js() {
	wp_enqueue_script( 'simple_life_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simple_life_customize_preview_js' );

////////////////////////////////////////////////////////////////////


