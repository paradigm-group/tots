<section class="services">
	<div class='container'>
		<div class='row'>
			<div class='col-xs-12'>
				<h2 class="mt-lg"><?php the_sub_field('title'); ?></h2>
				<hr class="hr--emphasise mt-lg">
			</div>
		</div>
		<div class='row mt-lg'>
			<div class="col-xs-12">
			<?php
			if(have_rows('features'))
			{
				$output = '';
				while (have_rows('features'))
				{
					the_row();
					$image = get_sub_field('background_image');
					$text  = get_sub_field('text');

					$output .= "
						<div class='services__feature'>
							<div class='services__icon hidden-xs' style='background-image: url({$image});'></div>
							<p>{$text}</p>
						</div>
					";
				}

				echo $output;
			}
			?>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 bdr-t mt-lg mb-lg text-center'>
				<p class="mt-lg"><a class="more" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_text'); ?></a></p>
			</div>
		</div>
	</div>
</section>
