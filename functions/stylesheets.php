<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Stylesheet related functions
 *
 * @package WordPress
 * @subpackage Tatton
 */


/**
 * Enqueue custom stylesheets
 *
 * @author Jonny Frodsham
 **/
function ttEnqueueStyles()
{
	if (!is_admin())
    {
		wp_register_style('stylesheet', THEME_DIRECTORY . '/assets/css/tatton.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/tatton.css'), 'all');
		wp_enqueue_style('stylesheet');
	}
}
