<section>
	<div class="container people mb-lg">
		<?php
			if(have_rows('people'))
			{
				$output = '';

				while (have_rows('people'))
				{
					the_row();

					$post_object = get_sub_field('person');

					if($post_object)
					{
						$post = $post_object;
						setup_postdata($post);

						$name = get_the_title();
						$bio = get_the_content();
						$position = get_field('position');
						$linkedin = get_field('linkedin_profile');
						$image = get_field('image');

						$output .= "
							<div class='row mt-lg'>
								<div class='col-xs-12'>
									<hr class='hr--emphasise'>
								</div>
							</div>
							<div class='row mt-md'>
								<div class='col-xs-9'>
									<h2 class='people__title'>{$name}</h2>
									<p class='people__position cl-{$sector}'>{$position}</p>
								</div>
								<div class='col-xs-3 text-right pt-sm'>
									<p class='people__linkedin'><a class='linkedin social--linkedin' href='{$linkedin}' target='_blank'><span class='hidden-xs'>Linkedin Profile:</span></a></p>
								</div>
							</div>
							<div class='row'>
								<div class='col-xs-12'>
									<hr class='hr'>
								</div>
							</div>
							<div class='row mt-md'>
								<div class='col-sm-4'>
									<img class='img-responsive' src='{$image}'>
								</div>
								<div class='col-sm-8'>
									{$bio}
								</div>
							</div>
						";

						wp_reset_postdata();
					}
				}

				echo $output;
			}
		?>
	</div>
</section>
