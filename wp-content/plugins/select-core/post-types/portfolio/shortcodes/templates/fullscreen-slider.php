
<article class="qodef-portfolio-item  <?php echo esc_attr($categories)?>">
	<div class="qodef-portfolio-slider-content">
		<span class="qodef-control qodef-close"></span>
		<span class="qodef-control qodef-open fa fa-expand"></span>
		<div class="qodef-description">
			<div class="qodef-table">
				<div class="qodef-table-cell">
					<?php if(kloe_qodef_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>
						<h6 class="qodef-portfolio-date"><?php the_time(get_option('date_format')); ?></h6>
					<?php endif; ?>
					<h3><?php echo esc_attr(get_the_title()); ?></h3>
				</div>
			</div>
		</div>
		<div class="qodef-portfolio-slider-content-info">
			<div class="qodef-hidden-info">
				<?php if(kloe_qodef_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>
					<h6  class="qodef-portfolio-date"><?php the_time(get_option('date_format')); ?></h6>
				<?php endif; ?>
				<div class="qodef-portfolio-title">
					<h3>
						<a href="<?php echo esc_url($item_link); ?>">
							<?php echo esc_attr(get_the_title()); ?>
						</a>
					</h3>
				</div>
				<div class="qodef-portfolio-content-holder">
					<div class="qodef-portfolio-info-item">
						<div class="qodef-portfolio-content">
							<?php the_content(); ?>
						</div>
					</div>
					<?php if(kloe_qodef_options()->getOptionValue('enable_social_share') == 'yes'
							&& kloe_qodef_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
						<div class="qodef-portfolio-social">
							<?php
								$social_share_params = array(
									'icon_type' => 'circle'
								);
							?>
							<?php echo kloe_qodef_get_social_share_html($social_share_params) ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	<div class = "qodef-item-image-holder">
			<span class="qodef-portfolio-slide-image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>');"></span>
	</div>
</article>
