<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomato
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card">
	<header class="entry-header card-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php tomato_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><div>Page: </div>' . __( '', 'tomato' ),
			'after'       => '</div>',
			'link_before' => '<div class="page-number">',
			'link_after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="card-footer">
			<ul class="meta list-inline">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'tomato' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link"><i class="genericons-neue genericons-neue-edit"></i>',
					'</span>'
				);
				?>
			</ul>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
