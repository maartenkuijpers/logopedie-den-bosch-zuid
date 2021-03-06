<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Simple Life
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
 		<?php if ( has_post_thumbnail()) : ?>
 			<div class="post-thumbnail-wrapper">
				<?php the_post_thumbnail(); ?>
 			</div>
 		<?php endif; ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simple-life' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'simple-life' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
