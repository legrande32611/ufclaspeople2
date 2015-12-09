<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package UF CLAS People 2
 */


if( is_home() || is_front_page() ){
	$sidebar = 'home_right';
}
elseif( is_page() && !is_page_template('page-templates/full-width.php') ){
	$sidebar = 'page_right';
}
elseif( is_singular('post') ){
	$sidebar = 'post_sidebar';
}
else {
	$sidebar = false;
}

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}
?>
<div id="secondary" class="widget-area col-sm-3" role="complementary">
	<?php dynamic_sidebar( $sidebar ); ?>
</div><!-- #secondary -->
