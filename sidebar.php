<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package UF CLAS People 2
 */

if ( ! is_active_sidebar( 'post_sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-sm-3" role="complementary">
	<?php dynamic_sidebar( 'post_sidebar' ); ?>
</div><!-- #secondary -->
