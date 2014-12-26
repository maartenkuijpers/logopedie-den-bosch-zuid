<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Simple Life
 */
?>
	<div id="secondary" <?php echo simple_life_sidebar_class('widget-area container clearfix'); ?> role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search clearfix">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget clearfix">
				<h3 class="widget-title"><?php _e( 'Archives', 'simple-life' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget clearfix">
				<h3 class="widget-title"><?php _e( 'Meta', 'simple-life' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
