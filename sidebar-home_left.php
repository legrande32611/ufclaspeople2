<?php
/**
 * The sidebar containing the home_left widget area.
 *
 * @package UF CLAS People 2
 */

if ( ! is_active_sidebar( 'home_left' ) ) {
	return;
}
?>

<div id="home-left" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'home_left' ); ?>
</div><!-- #page-left -->
