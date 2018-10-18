<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solanum
 */

?>

<article id="post-<?php the_ID(); ?> single" <?php post_class(); ?>>
	<div class="card">
		<header class="entry-header card-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php solanum_posted_on(); ?> by
					<?php solanum_posted_by(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php solanum_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'solanum' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><div>Page: </div>' . __( '', 'solanum' ),
				'after'       => '</div>',
				'link_before' => '<div class="page-number">',
				'link_after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="card-footer">
				<ul class="meta list-inline">
					<?php solanum_entry_footer(); ?>
				</ul>
		</footer>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
