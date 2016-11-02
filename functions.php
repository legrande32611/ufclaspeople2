<?php
/**
 * UF CLAS People 2 functions and definitions
 *
 * @package UF CLAS People 2
 */

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
require_once dirname( __FILE__ ) . '/admin/options-framework.php'; 

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 690; /* pixels */
}

if ( ! function_exists( 'ufclaspeople2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ufclaspeople2_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on UF CLAS People 2, use a find and replace
	 * to change 'ufclaspeople2' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ufclaspeople2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu' => __( 'Main Menu', 'ufclaspeople2' ),
		/*'header_menu' => __( 'Header Menu', 'ufclaspeople2' ),*/
		'footer_menu' => __( 'Footer Menu', 'ufclaspeople2' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ufclaspeople2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Add support for editor styles
	add_editor_style( 'editor-style.css' );
}
endif; // ufclaspeople2_setup
add_action( 'after_setup_theme', 'ufclaspeople2_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ufclaspeople2_widgets_init() {
	register_sidebar (array(
		'name' => 'Page Left Sidebar',
		'id' => 'page_sidebar',
		'description' => __('Widgets in this area will be shown in the left column of all pages', 'ufclaspeople2'),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	)); 
	
	register_sidebar (array(
		'name' => 'Page Right Sidebar',
		'id' => 'page_right',
		'description' => __('Widgets in this area will be shown in the right column of all pages in a third column', 'ufclaspeople2'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	)); 
		
	register_sidebar (array(
		'name' => 'Post Sidebar',
		'id' => 'post_sidebar',
		'description' => __('Widgets in this area will be shown in the right column of every post in a third column.', 'ufclaspeople2'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	)); 

	register_sidebar (array(
		'name' => 'Home Left',
		'id' => 'home_left',
		'description' => __('Widgets in this area will be shown on the left side of your home page', 'ufclaspeople2'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	)); 
		
	register_sidebar (array(
		'name' => 'Home Right',
		'id' => 'home_right',
		'description' => __('Widgets in this area will be shown on the right side of your home page', 'ufclaspeople2'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	)); 
}
add_action( 'widgets_init', 'ufclaspeople2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ufclaspeople2_scripts() {
	// Get theme version number
	$theme_data = wp_get_theme();
	$theme_version = $theme_data->get('Version');
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style( 'bootstrap-jasny', get_template_directory_uri() . '/inc/jasny-bootstrap/css/jasny-bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style( 'ufclaspeople2-style', get_stylesheet_uri(), array(), $theme_version );
	
	wp_enqueue_script( 'ufclaspeople2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $theme_version, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'bootstrap-jasny', get_template_directory_uri() . '/inc/jasny-bootstrap/js/jasny-bootstrap.min.js', array('jquery', 'bootstrap'), null, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if( of_get_option('opt_custom_css') ){
		wp_add_inline_style( 'ufclaspeople2-style', esc_html(of_get_option('opt_custom_css')) );
	}

}
add_action( 'wp_enqueue_scripts', 'ufclaspeople2_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load theme shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Last updated date for the site to display on the home page
 */
function ufl_site_last_updated($d = '') {
	$recent = new WP_Query("showposts=1&orderby=modified&post_status=publish&post_type=any");
	if ( $recent->have_posts() ) {
		while ( $recent->have_posts() ) {
			$recent->the_post();
			$last_update = get_the_modified_date($d);
		}
		echo $last_update;
	}
}

/**
 * Custom Background 
 * 
 * Remove the custom background class if there is no background set, support background colors
 */
function ufclaspeople2_custom_background_class( $wp_classes ){
	$background = get_background_image();
	$color = get_background_color();
	if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
		$color = false;
	}
	if( empty($background) ) {
		if( ! $color ){
			$bg_class = array( 'custom-background' );
			$wp_classes = array_diff( $wp_classes, $bg_class );
		}
		else {
			$wp_classes[] = 'custom-background-color';
		}
	}
	return $wp_classes;
}
add_filter( 'body_class', 'ufclaspeople2_custom_background_class', 10, 2 );


/**
 * Custom Image Sizes
 */
add_image_size( 'page-thumbnail', 200 );
add_image_size( 'page-md-thumbnail', 300 );
add_image_size( 'page-header', 680, 240, array('left', 'top') );

function ufclaspeople2_show_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'page-thumbnail' => __( 'Thumbnail (Uncropped)' ),
		'page-md-thumbnail' => __( 'Medium (Uncropped)' ),
		'page-header' => __( 'Page Header' ),
    ) );
}
add_filter( 'image_size_names_choose', 'ufclaspeople2_show_custom_sizes' );


/**
 * Content Formatting
 *
 * Allow inserting advanced html using the [raw][/raw] shortcode
 */
function ufclas_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
	
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'ufclas_formatter', 90);

/**
 * Primary content width classes for flexible layout
 * 
 * @return string Classes to add to the class attribute
 * @since 1.0.2
 */
function ufclaspeople2_get_content_class(){
	$classes_default = 'col-sm-8 col-md-9';
	$classes_3col_width = 'col-sm-6 col-md-6';
	$classes_full_width = 'col-sm-12 col-md-12';
	$is_home = (is_home() || is_front_page());
	
	if ( is_page_template('page-templates/full-width.php') ){
		return $classes_full_width;
	}
	if ( is_page_template('page-templates/right-two-columns.php') ){
		if( ($is_home && !is_active_sidebar('home_right')) || !is_active_sidebar('page_right') ){
			return $classes_full_width;
		}
		else {
			return $classes_default;			
		}
	}
	if( is_singular('post') && is_active_sidebar('post_sidebar') ) {
		return $classes_3col_width;
	}
	if( $is_home && is_active_sidebar('home_right') ){
		return $classes_3col_width;
	}
	if( is_page() && !$is_home && is_active_sidebar('page_right') ){
		return $classes_3col_width;
	}
	return $classes_default;
}
