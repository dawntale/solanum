<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

		<?php if ( have_posts() ) : ?>
			<main id="main" class="site-main grid">
				<div class="grid-sizer col-sm-6 col-lg-4 col-xl-3"></div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

		<?php the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => __( '&#8249; Prev', 'textdomain' ),
			'next_text' => __( 'Next &#8250;', 'textdomain' ),
		) ); ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
