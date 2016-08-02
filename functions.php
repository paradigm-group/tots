<?php

/**
 * All the themes required functions
 *
 * @package WordPress
 * @subpackage Tatton
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add theme support and helper functions
 */
require_once('functions/theme-support.php');


/**
 * Include classes needed by the theme
 */
require_once('functions/classes/bootstrap-navwalker.php');


/**
 * Include encryption class
 */
require_once('functions/classes/encryption.php');
// encryption object
$encryption = new Encryption('AES-256-CBC', '3k.~Z33WjX3', 'ywSi[qr1g=8');


/**
 * Include custom login class
 */
require_once('functions/classes/custom-login.php');
// custom login object
$custom_login = new CustomLogin;


/**
 * Register menus
 */
require_once('functions/nav-menus.php');
add_action('init', 'ttRegisterNavMenus');


/**
 * Register custom post types
 */
require_once('functions/custom-post-types.php');
add_action('init', 'ttRegisterCustomPostTypes');


/**
 * Add stylesheets
 */
require_once('functions/stylesheets.php');
add_action('wp_enqueue_scripts', 'ttEnqueueStyles');


/**
 * Add javascript
 */
require_once('functions/javascripts.php');
add_action('wp_enqueue_scripts', 'ttEnqueueJs');
