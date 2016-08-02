<section>
	<div class='container mt-lg mb-lg'>
		<div class='row'>
			<div class='col-xs-12'>
				<h5 class="cl-<?php echo $sector; ?>">Select below to download a document or visit a resource.</h5>
				<hr class="hr--emphasise mt-lg">
			</div>
		</div>
		<?php
			$cat_id = getCategory($sector);
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array(
			    'post_type' => 'resources',
			    'cat' => $cat_id,
			    'post_status' => 'publish',
			    'posts_per_page' => 6,
			    'paged' => $paged
			);


			if (query_posts($args))
			{
				$output = '';

				if (have_posts())
				{
					while (have_posts())
					{
						the_post();

						$title = get_the_title();
						$description = get_field('description');
						$type = get_field('type');

						if ($type == 'web')
						{
							$link_text = 'Go to site';
							$resource = get_field('resource_link');
						}
						else
						{
							$link_text = 'Download';
							$resource = get_field('resource_file');
						}

						$output .= "
							<div class='row mt-lg'>
								<div class='col-xs-3 col-sm-1'>
									<div class='icon icon--{$type}'></div>
								</div>
								<div class='col-xs-9 col-sm-9'>
									<h5 class='cl-{$sector}'>{$title}</h5>
									<p class='m-0'>{$description}</p>
								</div>
								<div class='col-sm-2 text-right'>
									<a class='btn btn-default btn--arrow btn--investor btn--resource' href='{$resource}' target='_blank'>{$link_text}</a>
								</div>
							</div>
							<hr class='mt-lg'>
						";

					}
				}

				wp_reset_postdata();

				echo $output;

			}
		?>
	</div>
</section>
