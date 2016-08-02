<?php

	if(isset($_GET['cat']))
	{
		$tag_filter = (int) $_GET['cat'];
	}

?>
<section>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-3'>
				<?php
					$tags_array = get_tags();

					if ($tags_array)
					{
						$permalink = get_the_permalink();
						$output = "<ul class='tags mt-lg'>";
						$output .= "<li><a href='{$permalink}'>Latest Tatton Investments</a></li>";

						foreach ($tags_array as $tag)
						{
							$tag_name = ucfirst($tag->name);
							$term_id = $tag->term_id;
							$tag_link = $permalink . "?cat={$term_id}";
							$active = ($term_id == $tag_filter) ? "class='active' " : "";
							$output .= "<li><a {$active}href='{$tag_link}'>{$tag_name}</a></li>";
						}

						echo $output .= '</ul>';
					}
				?>
			</div>
			<div class='col-sm-9'>
				<?php
					$cat_id = getCategory($sector);
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
					    'post_type' => 'videos',
					    'cat' => $cat_id,
					    'post_status' => 'publish',
					    'posts_per_page' => 2,
					    'paged' => $paged
					);

					if (isset($tag_filter))
					{
						$args['tag_id'] = $tag_filter;
					}

					if (query_posts($args))
					{
						$output = '';

						if (have_posts())
						{
							while (have_posts())
							{
								the_post();

								$title = get_the_title();
								$video = get_field('video_embed');

								$output .= "
									<div class='video mt-lg'>
										<hr class='hr--emphasise'>
										<h5 class='video__title mt-lg cl-{$sector}'>{$title}</h5>
										<div class='video-wrap mt-lg'>
											{$video}
										</div>
									</div>
								";

							}
						}

						wp_reset_postdata();

						echo $output;

					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center mb-lg">
				<?php
					the_posts_pagination(array(
						'mid_size'  => 2,
						'prev_text' => __( '<', 'textdomain' ),
						'next_text' => __( '>', 'textdomain' ),
					));
				?>
			</div>
		</div>
	</div>
</section>
<?php include('twitter.php'); ?>
