<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package solanum
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function solanum_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'solanum_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function solanum_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'solanum_pingback_header' );


/**
 * Filter the except length to 80 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function solanum_custom_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'solanum_custom_excerpt_length', 999 );

/**
 * Registers an editor stylesheet for the theme.
 */
function solanum_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'solanum_add_editor_styles' );