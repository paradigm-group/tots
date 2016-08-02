<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Custon nav functions
 *
 * @package WordPress
 * @subpackage Tatton
 */


/**
 * Register custom nav menus
 *
 * @author Jonny Frodsham
 **/
function ttRegisterNavMenus()
{
    register_nav_menus(
        array(
            'investor_menu' => __('Investor menu'),
            'financial_advisor_menu' => __('Financial Advisor menu'),
            'footer_menu' => __('Footer menu')
        )
    );
}


/**
 * Create navigation menus for display
 */
function ttCreateNavigation($menu, $class) {
	wp_nav_menu(
		array(
			'theme_location' => $menu,
			'container'      => false,
			'depth'          => 2,
			'menu_class'     => $class,
			'fallback_cb'    => 'bootstrap-navwalker::fallback',
			'walker'         => new wp_bootstrap_navwalker()
		)
	);
}

add_action('display_navigation', 'ttCreateNavigation', 10, 2);
