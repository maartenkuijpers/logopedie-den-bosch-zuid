<?php
/**
 * @package Simple Life
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-post-format">
				<?php simple_life_post_format_icon(); ?>
			</div>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" >', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php simple_life_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
		$content_layout = simple_life_get_option( 'content_layout' );
	 ?>

	 <?php if ( 'excerpt' == $content_layout ): ?>

	 	<div class="entry-summary">

	 		<?php the_excerpt(); ?>

	 	</div>

	 	<?php else: ?>
	 			<?php if ( 'excerpt-thumb' == $content_layout ): ?>

					<div class="entry-summary entry-summary-with-thumbnail">
				 		<?php if ( has_post_thumbnail()) : ?>
				 			<div class="post-thumbnail-wrapper">
				 				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				 					<?php the_post_thumbnail(); ?>
				 				</a>
				 			</div>
				 		<?php endif; ?>
				 		<?php the_excerpt(); ?>
			 		</div>

			 	<?php else: ?>

					<div class="entry-content">
						<?php if ( has_post_thumbnail()) : ?>
							<div class="post-thumbnail-wrapper">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
									<?php the_post_thumbnail(); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php the_content( __( 'Continue reading', 'simple-life' ) . ' <span class="meta-nav">&rarr;</span>' ); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'simple-life' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

	 			<?php endif ?>


	 <?php endif ?>


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
				<?php printf( '<span>&nbsp;' . __( '%1$s', 'simple-life' )  . '</span>', $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

		<span class="comments-link"><i class="fa fa-comment"></i>&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'simple-life' ), __( '1 Comment', 'simple-life' ), __( '% Comments', 'simple-life' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'simple-life' ), '<span class="edit-link pull-right"><i class="fa fa-edit"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
