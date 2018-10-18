<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solanum
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item col-sm-6 col-xl-4 col-xxl-3'); ?> >

	<div class="card">
		<div class="card-img-top">
			<?php solanum_post_thumbnail(); ?>
		</div>
		
		<div class="card-body">
			<?php the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<a href="<?php echo get_permalink( $post->ID ); ?>">
						<div class="hexagon">
							<span title="<?php the_time( get_option( 'M j Y' ) ); ?>">
								<?php the_time('M j Y') ?>
							</span>
						</div>
					</a>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php the_excerpt(); ?>
			
		</div>

		<footer class="card-footer">
			<div class="avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 30, $default, $alt, array( 'class' => array( 'rounded-circle' ) ) ); ?>
				<?php solanum_posted_by(); ?>
			</div>
				<ul class="meta">
					<?php solanum_entry_footer(); ?>
				</ul>
		</footer>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->
