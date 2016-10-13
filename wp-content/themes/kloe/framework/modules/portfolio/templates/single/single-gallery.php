<div class="qodef-portfolio-gallery">
	<?php
	$media = kloe_qodef_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="qodef-portfolio-media">
			<?php foreach($media as $single_media) : ?>
				<div class="qodef-portfolio-single-media">
					<?php kloe_qodef_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<div class="qodef-two-columns-66-33 clearfix">
	<div class="qodef-column1">
		<div class="qodef-column-inner">
			<h2><?php the_title(); ?></h2>
		</div>
	</div>
</div>

<div class="qodef-two-columns-66-33 clearfix">
	<div class="qodef-column1">
		<div class="qodef-column-inner">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="qodef-column2">
		<div class="qodef-column-inner">
			<div class="qodef-portfolio-info-holder">
				<?php
				//get portfolio custom fields section
				kloe_qodef_portfolio_get_info_part('custom-fields');

				//get portfolio date section
				kloe_qodef_portfolio_get_info_part('date');

				//get portfolio categories section
				kloe_qodef_portfolio_get_info_part('categories');

				//get portfolio tags section
				kloe_qodef_portfolio_get_info_part('tags');

				//get portfolio share section
				kloe_qodef_portfolio_get_info_part('social');
				?>
			</div>
		</div>
	</div>
</div>