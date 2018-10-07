<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item col-sm-6 col-lg-4 col-xl-3'); ?> >

	<div class="card">
		<div class="card-img-top">
			<?php _s_post_thumbnail(); ?>
		</div>
		
		<div class="card-body">
			<?php the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<div class="hexagon">
						<span>
							<?php the_time('M j Y') ?>
						</span>
					</div>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php the_excerpt(); ?>
			
		</div>

		<footer class="card-footer text-muted text-center">
			<div class="avatar d-inline-flex">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 30, $default, $alt, array( 'class' => array( 'rounded-circle' ) ) ); ?>
				<?php _s_posted_by(); ?>
			</div>
				<ul class="meta list-inline small">
					<?php _s_entry_footer(); ?>
				</ul>
		</footer>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->
