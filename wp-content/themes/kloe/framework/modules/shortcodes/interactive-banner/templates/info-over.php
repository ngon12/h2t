<?php
/**
 * Interactive Banner Info Over shortcode template
 */
?>

<div class="qodef-interactive-banner">
	<div class="qodef-interactive-banner-inner">
		<?php if ( $image !== '' ) { ?>
			<div class="qodef-banner-image">
				<?php if ($link !== '' ) { ?><a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target)?>"><?php } ?>
					<img src="<?php echo esc_url($image_src); ?>" alt="<?php esc_html_e('banner image','kloe'); ?>" />
				<?php if ($link !== '' ){ ?> </a> <?php } ?>
			</div>
			<div class="qodef-text-holder">
				<div class="qodef-banner-table">
					<div class="qodef-banner-cell">

						<?php if ($link !== '' ) { ?><a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target)?>"><?php } ?>
							<span class="qodef-banner-overlay"></span>
						<?php if ($link !== '' ){ ?> </a> <?php } ?>

						<?php if ( $subtitle !== '' ) { ?>
							<h6 class="qodef-banner-subtitle">
								<?php echo esc_attr( $subtitle ); ?>
							</h6>
						<?php } ?>

						<?php if ( $title !== '' ) { ?>
							<<?php echo esc_attr($title_tag); ?> class="qodef-banner-title">
								<?php if ($link !== '' ) { ?><a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target)?>"><?php } ?>
									<?php echo esc_attr( $title ); ?>
								<?php if ($link !== '' ){ ?> </a> <?php } ?>
							</<?php echo esc_attr($title_tag); ?>>
						<?php } ?>



						<?php if ($show_button == 'yes') { ?>
							<?php echo kloe_qodef_get_button_html($button_parameters); ?>
						<?php } ?>

					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
