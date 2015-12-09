<?php
/**
 * Custom theme shortcodes
 *
 * @package UF CLAS People 2
 */

/**
 * Left column shortcode
 * @param  array $atts             
 * @param  string [$content = null] 
 * @return string Shortcode output
 * @since 1.0.2
 */
function ufandshands_shortcode_float_left($atts, $content = null) {
	extract(shortcode_atts(array(
                'autop' => '1',
	), $atts));

	$content = do_shortcode($content);

	$left_float = '<div class="shortcode_alignleft col-md-6">';
        if ($autop=='1')
            $left_float .= wpautop($content);
        else
            $left_float .= $content;
        
	$left_float .= "</div>";

	return $left_float;
}
add_shortcode('left', 'ufandshands_shortcode_float_left');

/**
 * Right column shortcode
 * @param  array $atts             
 * @param  string [$content = null] 
 * @return string Shortcode output
 * @since 1.0.2
 */
function ufandshands_shortcode_float_right($atts, $content = null) {
	extract(shortcode_atts(array(
                'autop' => '1',
	), $atts));
	$content = do_shortcode($content);

	$right_float = '<div class="shortcode_alignright col-md-6">';
        if ($autop=='1')
            $right_float .= wpautop($content);
        else
            $right_float .= $content;
            
	$right_float .= "</div>";
	$right_float .= "<div class='clear'>&nbsp;</div>";

	return $right_float;
}
add_shortcode('right', 'ufandshands_shortcode_float_right');