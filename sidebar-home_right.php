<?php
/**
 * The sidebar containing the home_left widget area.
 *
 * @package UF CLAS People 2
 */

if ( ! is_active_sidebar( 'home_right' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area home-right col-sm-3" role="complementary">
	<?php dynamic_sidebar( 'home_right' ); ?>
</div><!-- #page-left -->
