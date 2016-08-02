<?php

/**
 * The template for displaying default pages
 *
 * @package WordPress
 * @subpackage Tatton
 */

$sector = getSector();

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

    $title = get_the_title();
    $permalink = get_the_permalink();
    $twitter_link   = "http://twitter.com/home?status=".urlencode($title)."+".urlencode($permalink);
    $facebook_link  = "https://www.facebook.com/sharer/sharer.php?u=".urlencode($permalink);
    $linkedin_link  = "https://www.linkedin.com/shareArticle?mini=true&url=".urlencode($permalink)."&title=".urlencode($title);
?>

    <section class="news">
        <div class="news__header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 pt-lg pb-lg">
                        <h1><?php echo $title; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 mt-lg news__content">
                    <img class="hidden-xs" src="<?php echo $image[0]; ?>" alt="">
                    <div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center mt-md">
                    <h4>Share this article</h4>
                    <ul class="social social--navbar social--news">
                        <li><a href="<?php echo $facebook_link; ?>" class="facebook" target="_blank" title="facebook"></a></li>
                        <li><a href="<?php echo $twitter_link; ?>" class="twitter" target="_blank" title="Twitter"></a></li>
                        <li><a href="<?php echo $linkedin_link; ?>" class="linkedin" target="_blank" title="Linkedin"></a></li>
                    </ul>
                    <hr class="mt-lg">
                </div>
            </div>
            <div class="row mt-lg">
                <?php
                    $id = get_the_id();

                    $cat_id = getCategory($sector);

                    $args = array(
                        'post_type' => 'post',
                        'cat' => $cat_id,
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'post__not_in' => array($id)
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts())
                    {
                        $output = '';

                        while ($query->have_posts())
                        {
                            $query->the_post();

                            $title = get_the_title();
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            $permalink = get_the_permalink();

                            $output .= "
                                <div class='col-sm-3'>
                                     <div class='row'>
                                        <div class='col-xs-6 col-sm-12'>
                                            <img class='img-responsive' src='{$image[0]}'>
                                        </div>
                                        <div class='col-xs-6 col-sm-12'>
                                            <h5 class='news-snippet__title cl-{$sector} mt-sm'>{$title}</h5>
                                            <p><a class='more' href='{$permalink}'>Read More</a></p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }

                        wp_reset_postdata();

                        echo $output;

                    }
                ?>
            </div>
        </div>
    </section>

    <?php include('partials/twitter.php'); ?>

<?php
endwhile; endif;

get_footer();
