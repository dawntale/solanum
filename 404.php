<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
					<header>
						<h1 class="page-title">404</h1>
						<h2><?php esc_html_e( 'Stop! Page not found.', '_s' ); ?></h2>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', '_s' ); ?></p>

						<?php
						get_search_form();
						?>

						<?php
						/* translators: %1$s: smiley */
						$_s_archive_content = '<p>' . esc_html__( 'Try looking in the monthly archives.', '_s' ) . '</p>';
						?>

						<div class="row">
							<div class="col-lg-8 col-xxl-6" style="margin: auto;">
								<?php
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$_s_archive_content" );
								?>
							</div>
						</div>
							

					</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
