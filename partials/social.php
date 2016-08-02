<section class="<?php if ($post->post_parent != 0): ?>bg-lightest-grey <?php endif; ?>pt-lg pb-lg">
	<div class='container'>
		<div class='row'>

			<div class='col-sm-4 social-col'>
				<h4>Twitter</h4>
				<p class="mt-lg">US created less jobs than expected in August. September rate rise likely now, but god only knows how markets decide to take it!</p>
				<p><a class="more" href="<?php the_field('social_twitter', 'option'); ?>">More Twitter</a></p>
			</div>

			<div class='col-sm-4 social-col'>
				<h4>Recent News</h4>
				<?php
					$cat_id = getCategory($sector);

					$args = array(
					    'post_type' => 'post',
					    'cat' => $cat_id,
					    'post_status' => 'publish',
					    'posts_per_page' => 1,
					);

					$the_query = new WP_Query($args);

					// The Loop
					if ($the_query->have_posts()): while ($the_query->have_posts()):

						$the_query->the_post();

				?>
				<h5 class="mt-lg mb-sm"><?php the_title(); ?></h5>
				<?php the_excerpt(); ?>
				<p><a class="more" href="<?php the_permalink(); ?>">Read More</a></p>
				<?php
						wp_reset_postdata();
					endwhile; endif;
				 ?>
			</div>

			<div class='col-sm-4 social-col'>
				<h4>Latest Video</h4>
				<div class="video-wrap mt-lg">
					<?php
						$cat_id = getCategory($sector);

						$args = array(
						    'post_type' => 'videos',
						    'cat' => $cat_id,
						    'post_status' => 'publish',
						    'posts_per_page' => 1,
						);

						$the_query = new WP_Query($args);

						// The Loop
						if ($the_query->have_posts()): while ($the_query->have_posts()):

							$the_query->the_post();

							the_field('video_embed');

							wp_reset_postdata();
						endwhile; endif;
					 ?>
				</div>
				<p><a class="more" href="<?php the_field('social_youtube', 'option'); ?>">More on Youtube</a></p>
			</div>
		</div>
	</div>
</section>
