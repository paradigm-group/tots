<?php
$text  = get_sub_field('text');
$image = get_sub_field('image');
?>
<section>
	<div class="hero hero--large" style="background-image: url(<?php echo $image; ?>);">
		<div class="hero__overlay"></div>
		<div class="hero__content pt-xl">
			<div class="container">
				<div class="row">
					<div class="col-md-8 hero__text">
						<?php echo $text; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<?php if (is_front_page()): ?>
						<p class="hidden-xs pb-xl">How can Tatton Investment Management help you?</p>
						<ul class="nav section__nav section__nav--hero">
				            <li><a class="btn btn-default btn-lg btn--investor" href="/investors/">Investor?</a></li>
				            <li><a class="btn btn-default btn-lg btn--financial" href="/financial-advisers/">Financial Adviser?</a></li>
				        </ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
