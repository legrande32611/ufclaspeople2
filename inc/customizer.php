<?php
/**
 * UF CLAS People 2 Theme Customizer
 *
 * @package UF CLAS People 2
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ufclaspeople2_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'ufclaspeople2_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ufclaspeople2_customize_preview_js() {
	wp_enqueue_script( 'ufclaspeople2_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'ufclaspeople2_customize_preview_js' );
