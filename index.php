<?php
/**
 *
 * Default page template
 *
 */
get_header();

while (have_posts())
{
	the_post();


}

get_footer();
?>
