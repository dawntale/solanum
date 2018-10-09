<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _s
 */

get_header();
?>

	<section id="primary" class="content-area">

		<header class="page-header col-lg-6 mx-auto">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php if ( have_posts() ) : ?>

		<main id="main" class="site-main grid">

			<div class="grid-sizer col-sm-6 col-lg-4 col-xl-3"></div>

		
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
		
	</section><!-- #primary -->

<?php
get_footer();