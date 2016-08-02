<?php

/**
 * The template for displaying default pages
 *
 * @package WordPress
 * @subpackage Tatton
 */

$sector = getSector();

get_header();

while(have_posts())
{
    the_post();

    // check for acf flexible content
    if (have_rows('main_modules'))
    {
        while(have_rows('main_modules'))
        {
            the_row();

            // test for layout types and include relevant template
            switch (get_row_layout())
            {
                case 'hero_large':
                    include('partials/hero-large.php');
                    break;

                case 'hero':
                    include('partials/hero.php');
                    break;

                case 'excerpt':
                    include('partials/excerpt.php');
                    break;

                case 'page_content':
                    include('partials/content.php');
                    break;

                case 'services':
                    include('partials/services.php');
                    break;

                case 'our_people':
                    include('partials/people.php');
                    break;

                case 'portfolios':
                    include('partials/portfolios.php');
                    break;

                case 'resources':
                    include('partials/resources.php');
                    break;

                case 'template':
                    $template = get_sub_field('template_block');
                    include("partials/{$template}.php");
                    break;
            }
        }
    }
}

get_footer();
