<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Javascript related functions
 *
 * @package WordPress
 * @subpackage Tatton
 */


/**
 * Enqueue custom javascript
 *
 * @author Jonny Frodsham
 **/
function ttEnqueueJs()
{
	if (!is_admin())
    {
    	wp_register_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js' );
   		wp_enqueue_script( 'modernizr-js' );

    	wp_register_script('main-js', get_template_directory_uri() . '/assets/js/tatton.min.js', array('jquery'), '', filemtime(get_stylesheet_directory() . '/assets/js/tatton.min.js'), true);
    	wp_enqueue_script('main-js');
	}
}
