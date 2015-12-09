<?php
/**
 * The sidebar containing the home_left widget area.
 *
 * @package UF CLAS People 2
 */

if ( !is_active_sidebar( 'home_left' ) && !is_active_sidebar( 'page_sidebar' ) ) {
	return;
}
?>

<div id="home-left" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'home_left' ); ?>
    <?php dynamic_sidebar( 'page_sidebar' ); ?>
</div><!-- #page-left -->
