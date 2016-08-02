<section class='portfolio'>
	<div class='container'>
		<div class='row'>
			<div class='col-xs-12'>
				<p class="portfolios__title"><?php the_sub_field('portfolio_title'); ?></p>
				<?php
				if(have_rows('portfolio'))
				{
					$output = '';

					while (have_rows('portfolio'))
					{
						the_row();

						$title = get_sub_field('title');
						$text = get_sub_field('text');
						$info = get_sub_field('info');

						$output .= "
							<div class='portfolios__item'>
								<p class='portfolio__title cl-{$sector}'>{$title}</p>
								{$text}
								<p class='portfolio__info'>{$info}</p>
							</div>
						";
					}

					echo $output;
				}
				?>
			</div>
		</div>
	</div>
</section>
