<?php
/**
 * Template Name: Hidden Page
 * Displays Hidden Page
 *
 * @package WordPress
 * @subpackage Tatton
 */

$sector = getSector();

get_header();

if (is_user_logged_in()):

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

else:
?>
<section>
    <div class="hero">
        <div class="hero__overlay"></div>
        <div class="hero__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 hero__text pt-lg pb-lg">
                        <h2 class="hero__title">Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
	<div class="row mt-lg">
		<div class="col-sm-5 mb-lg">
            <p>To view this content you must be logged in.</p>
			<?php do_action('custom_login'); ?>
		</div>
        <div class="col-sm-5 col-sm-offset-2 mb-lg">
            <p>To gain access to our IFA resources please register <a href="http://www.tattoninvestments.com/wp-login.php?action=register">here</a>.</p>
        </div>
	</div>
</div>

<?php
endif;

get_footer();
