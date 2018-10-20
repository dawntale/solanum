<?php
/**
 * Solanum Theme Customizer
 *
 * @package solanum
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function solanum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'solanum_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'solanum_customize_partial_blogdescription',
		) );
	}
	
	/**
	 * Solanum Theme Layouts.
	 *
	 */
	$wp_customize->add_section( 'solanum_theme_layouts_section' , array(
        'title'    => __( 'Solanum Layouts', 'solanum' ),
    ) );   

    $wp_customize->add_setting( 'solanum_theme_layouts_settings' , array(
		'default'   => 'right_sidebar',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'solanum_layout', array(
        'label'          => __( 'Sidebar', 'solanum' ),
		'section'        => 'solanum_theme_layouts_section',
		'settings'       => 'solanum_theme_layouts_settings',
		'type'           => 'radio',
		'choices'        => array(
			'right_sidebar' => __( 'Right Sidebar' ),
			'left_sidebar' => __( 'Left Sidebar' ),
		)
	) ) );
}
add_action( 'customize_register', 'solanum_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function solanum_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function solanum_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function solanum_customize_preview_js() {
	wp_enqueue_script( 'solanum-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'solanum_customize_preview_js' );
