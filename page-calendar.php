<?php
/**
 * Template Name: Calendar Page
 * Displays Calendar page
 *
 * @package WordPress
 * @subpackage Tatton
 */

$sector = getSector();

get_header();

if (is_user_logged_in()): ?>

<section>
    <div class="hero" style="background-image: url(http://www.tattoninvestments.com/tim-assets/uploads/Tree02.jpg);">
        <div class="hero__overlay"></div>
        <div class="hero__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 hero__text pt-lg pb-lg">
                        <h2 class="hero__title">Events</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
	<div class="row mt-lg">
		<div class="col-xs-12 content mt-lg mb-lg">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; else : ?>

            <?php endif; ?>
		</div>
	</div>
</div>

<?php else:
?>
<section>
    <div class="hero" style="background-image: url(http://www.tattoninvestments.com/tim-assets/uploads/Tree02.jpg);">
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
            <p>To find out more about gaining access to our IFA resources visit our <a href="/contact">contact</a> page.</p>
        </div>
	</div>
</div>

<?php
endif;

get_footer();
