<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package UF CLAS People 2
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ufclaspeople2_header_style()
 * @uses ufclaspeople2_admin_header_style()
 * @uses ufclaspeople2_admin_header_image()
 */
function ufclaspeople2_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ufclaspeople2_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 960,
		'header-text'			 => false,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'ufclaspeople2_header_style',
		'admin-head-callback'    => 'ufclaspeople2_admin_header_style',
		'admin-preview-callback' => 'ufclaspeople2_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'ufclaspeople2_custom_header_setup' );

if ( ! function_exists( 'ufclaspeople2_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see ufclaspeople2_custom_header_setup().
 */
function ufclaspeople2_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // ufclaspeople2_header_style

if ( ! function_exists( 'ufclaspeople2_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see ufclaspeople2_custom_header_setup().
 */
function ufclaspeople2_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #site-image {
			border: none;
		}
		#site-image img {
			width: 100%;
			height: auto;
			max-width: 960px;
			min-height:250px;
		}
	</style>
<?php
}
endif; // ufclaspeople2_admin_header_style

if ( ! function_exists( 'ufclaspeople2_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see ufclaspeople2_custom_header_setup().
 */
function ufclaspeople2_admin_header_image() {
	// Show the appropriate preview image or slideshow
	$header_slideshow = get_theme_mod('header_slideshow');
	if ( get_header_image() && empty($header_slideshow) ) : ?>
		<div id="site-image">
        	<img src="<?php header_image(); ?>" alt="" />
        </div>
        <?php elseif( $header_slideshow ) : ?>
        <div id="site-image">
            <?php do_action('slideshow_deploy', $header_slideshow ); ?>
        </div>
	<?php endif;
}
endif; // ufclaspeople2_admin_header_image


/**
 * Custom header slideshow field displayed on the Appearance > Header admin panel.
 *
 */
function ufclaspeople2_custom_header_options() { ?>
    <h3><?php _e( 'Header Slideshow' ); ?></h3>

    <table class="form-table">
    <tbody>
    <tr>
    <th scope="row"><label for="header-slideshow"><?php _e( 'Slideshow' ); ?></label></th>
    <td>
        <p>Replace the header image with a slideshow. Go to <strong>Slideshows</strong> in the dashboard menu to edit.</p>
        <select name="header-slideshow" id="header-slideshow">
		<?php     
		// Show a select list of published slideshows on the site
		$slideshows = new WP_Query("post_type=slideshow&post_status=publish&orderby=title&order=ASC");
		$selected = get_theme_mod( 'header_slideshow' );
		
		// Add a default for nothing selected
		echo '<option value="0">' . __('Select a Slideshow') . '</option>';
		
		// Loop through all the slideshows
		if ( $slideshows->have_posts() ) {
			while ( $slideshows->have_posts() ) {
				$slideshows->the_post(); 
				$s_title = get_the_title();
				$s_id = get_the_ID();
				echo '<option value="' . $s_id . '" ' . selected( $selected, $s_id, false ) . '>' . $s_title . '</option>';
			}
		}
        ?>
    	</select>
    </td>
    </tr>
    </tbody>
    </table>

<?php	
}
add_action( 'custom_header_options', 'ufclaspeople2_custom_header_options' );

function ufclaspeople2_save_custom_header_options() {
	if ( ! current_user_can('edit_theme_options') )
		return;

	if( isset($_POST['header-slideshow']) ){
		check_admin_referer( 'custom-header-options', '_wpnonce-custom-header-options' );
		
		// Update the theme setting only if it's a valid integer
		$s_id = $_POST['header-slideshow'];
		
		if( filter_var($s_id, FILTER_VALIDATE_INT) !== false ){
			set_theme_mod( 'header_slideshow', $s_id );
		}
	}
	
}
add_action( 'admin_head-appearance_page_custom-header', 'ufclaspeople2_save_custom_header_options' );
