<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Simple Life
 */
?>
    </div> <!-- .row -->
	</div><!-- #content -->

  <?php
  $args = array(
    'container_class' => 'container',
    'container_id'    => 'footer_widgets_wrap',
    );
  simple_life_footer_widgets($args);
  ?>


	<footer id="colophon" class="site-footer container" role="contentinfo">

  <?php
      wp_nav_menu( array(
          'theme_location'    => 'footer',
          'depth'             => 1,
          'container'         => 'div',
          'container_class'   => 'footer-nav-wrapper',
          'menu_class'        => 'footer-nav',
          'fallback_cb'       => '',
          'link_after'        => '',
          )
      );
  ?>

  <?php
    $copyright_text = simple_life_get_option( 'copyright_text' );
   ?>
   <?php if ( ! empty( $copyright_text )): ?>

    <div id="copyright-wrap">
      <div class="copyright-text"><?php echo esc_html( $copyright_text ); ?></div>
    </div>

   <?php endif ?>

  <?php
    $powered_by = simple_life_get_option( 'powered_by' );
   ?>

   <?php if ( 1 == $powered_by ): ?>

  		<div class="site-info" id="powered-by-wrap">
  			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simple-life' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'simple-life' ), 'WordPress' ); ?></a>
  			<span class="sep"> | </span>
  			<?php printf( __( 'Theme: %1$s by %2$s.', 'simple-life' ), 'Simple Life', '<a href="http://www.nilambar.net/" rel="designer">Nilambar</a>' ); ?>
  		</div><!-- .site-info -->

   <?php endif ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
