<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package solanum
 */

if ( ! is_home() ){
	
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	} ?>

	<aside id="secondary" class="widget-area col-lg-4
		<?php if( get_theme_mod( 'solanum_theme_layouts_settings' ) == 'left_sidebar' ) : ?>
			order-last order-lg-first
		<?php endif ?>
	">
	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>

<?php } ?>