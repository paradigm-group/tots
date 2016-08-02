<section class="resources">
	<div class='container mt-lg mb-lg'>
		<div class='row'>
			<div class='col-xs-12'>
				<h2><?php the_sub_field('title'); ?></h2>
				<hr class="hr--emphasise mt-lg">
			</div>
		</div>
		<?php
			if(have_rows('resource'))
			{
				$output = '';

				while (have_rows('resource'))
				{
					the_row();

					$title = get_sub_field('title');
					$description = get_sub_field('description');
					$type = get_sub_field('type');

					if ($type == 'web')
					{
						$link_text = 'Go to site';
						$resource = get_sub_field('resource_link');
					}
					else
					{
						$link_text = 'Download';
						$resource = get_sub_field('resource_file');
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
								<a class='btn btn-default btn--arrow bg-{$sector} btn--resource' href='{$resource}' target='_blank'>{$link_text}</a>
							</div>
						</div>
						<hr class='mt-lg'>
					";
				}

				echo $output;
			}
		?>
	</div>
</section>
