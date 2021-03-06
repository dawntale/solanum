<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solanum
 */

get_header();
?>

	<div id="primary" class="content-area">
		
		<?php
		if ( have_posts() ) : ?>

		<main id="main" class="site-main <?php if ( is_home() ): ?> grid <?php endif; ?>">
			<div class="grid-sizer col-sm-6 col-xl-4 col-xxl-3"></div>

			<?php if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

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
			'prev_text' => __( '<i class="genericons-neue genericons-neue-expand"></i> Prev', 'solanum' ),
			'next_text' => __( 'Next <i class="genericons-neue genericons-neue-collapse"></i>', 'solanum' ),
		) ); ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
