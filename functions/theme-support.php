<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Theme support additions
 *
 * @package WordPress
 * @subpackage Tatton
 */

/**
 * Remove wordpress version name in case version has security issues
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove the link to the Really Simple Discovery service endpoint, EditURI link
 */
remove_action('wp_head', 'rsd_link');

/**
 * Remove the link to the Windows Live Writer manifest file.
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Remove the admin bar from front end
 */
if ( ! current_user_can( 'manage_options' ) ) {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Create a constant for the template directory
 */
define('THEME_DIRECTORY', get_stylesheet_directory_uri());

/**
 * Add theme support post thumbnails
 */
add_theme_support('post-thumbnails');


/**
 * Limit excerpt length to 22 words
 */
function ttExcerptLength($length)
{
  return 32;
}
add_filter('excerpt_length', 'ttExcerptLength', 999);


/**
 * Remove square brackets from end of excerpt
 */
function ttExcerptEllipses($more)
{
  return '...';
}
add_filter('excerpt_more', 'ttExcerptEllipses');


/**
 * Add mime types to uploads list
 */
function ttMimeTypes($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'ttMimeTypes');


function ttOptionsPage()
{
	if (function_exists('acf_add_options_page'))
	{
	    acf_add_options_page(
			array(
				'page_title' => 'Global Custom Fields',
				'menu_title' => 'Global Fields',
				'menu_slug'  => 'global-fields',
				'icon_url'   => 'dashicons-admin-site',
				'capability' => 'edit_posts',
				'redirect'   => false,
			)
	    );
	}
}

// Add options page
add_action('init', 'ttOptionsPage');

/**
 * Get the sector we are currently in (i.e investor or financial advisors)
 */
function getSector()
{
	$url = $_SERVER["REQUEST_URI"];
	$url = trim($url, '/');
    $segments = explode('/', $url);
    return $segments[0];
}

function getCategory($slug)
{
	$cat_obj = get_category_by_slug($slug);
  	return $cat_obj->term_id;
}

/**
 * Print a message to debug.log
 *
 * @param string $message message to print to the debug.log file
 *
 * @author Jonny Frodsham
 */
function debug($message)
{
	if(WP_DEBUG === true)
	{
		error_log(print_r($message, true));
	}
}

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(http://www.tattoninvestments.com/tim-assets/themes/tim/assets/img/logo.svg);
            background-size: 211px;
            width:211px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
