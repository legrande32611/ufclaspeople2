<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package UF CLAS People 2
 */

if ( ! is_active_sidebar( 'page_right' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area page-right col-sm-3" role="complementary">
	<?php dynamic_sidebar( 'page_right' ); ?>
</div><!-- #secondary -->
