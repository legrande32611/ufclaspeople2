<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package UF CLAS People 2
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function ufclaspeople2_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'ufclaspeople2_jetpack_setup' );
