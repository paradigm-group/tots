<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Custom post type related functions
 *
 * @package Jordan Halstead
 */

/**
 * Register custom post types
 *
 * @author Jonny Frodsham
 **/
function ttRegisterCustomPostTypes()
{
    register_post_type('videos',
        array(
            'labels' => array(
                'name' => __('Videos'),
                'singular_name' => __('Video')
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('category', 'post_tag'),
            'supports' => array(
                'title',
            )
        )
    );

    register_post_type('resources',
        array(
            'labels' => array(
                'name' => __('Resources'),
                'singular_name' => __('Resource')
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('category', 'post_tag'),
            'supports' => array(
                'title',
            )
        )
    );

    register_post_type('people',
        array(
            'labels' => array(
                'name' => __('People'),
                'singular_name' => __('Person')
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor'
            )
        )
    );

}
