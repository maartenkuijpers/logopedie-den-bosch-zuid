<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Life
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php simple_life_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'simple-life' ) );
				if ( $categories_list && simple_life_categorized_blog() ) :
			?>
			<span class="cat-links">
				<i class="fa fa-folder-open"></i>
				<?php printf( __( '%1$s', 'simple-life' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'simple-life' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<i class="fa fa-tags"></i>
				<?php printf( '<span>&nbsp;'.__( '%1$s', 'simple-life' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comment"></i>&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'simple-life' ), __( '1 Comment', 'simple-life' ), __( '% Comments', 'simple-life' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'simple-life' ), '<span class="edit-link pull-right"><i class="fa fa-edit"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
