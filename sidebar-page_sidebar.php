<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package UF CLAS People 2
 */

if ( ! is_active_sidebar( 'page_sidebar' ) || is_page_template('page-templates/full-width.php') || is_page_template('page-templates/right-two-columns.php') ) {
	return;
}
?>

<div id="page-left" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'page_sidebar' ); ?>
</div><!-- #page-left -->
