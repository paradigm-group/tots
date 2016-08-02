<?php
$text  = get_sub_field('text');
$image = get_sub_field('image');
?>
<section>
	<div class="hero" style="background-image: url(<?php echo $image; ?>);">
		<div class="hero__overlay"></div>
		<div class="hero__content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 hero__text pt-lg pb-lg">
						<h1 class="hero__title"><?php the_title(); ?></h1>
						<?php if ($text): ?>
						<p><?php echo $text; ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
