<?php
/**
 * Team info on hover shortcode template
 */

global $kloe_qodef_IconCollections;
$number_of_social_icons = 5;
?>

<div class="qodef-team <?php echo esc_attr( $team_type )?>">
	<div class="qodef-team-inner">
		<?php if ( $team_image !== '' ) { ?>
		<div class="qodef-team-image">
			<?php echo wp_get_attachment_image($team_image,'full');?>
			<div class="qodef-team-social-holder">
				<div class="qodef-team-social">
					<div class="qodef-team-social-inner">
						<div class="qodef-team-title-holder">
							<?php if ( $team_name !== '' ) { ?>
							<<?php echo esc_attr($team_name_tag); ?> class="qodef-team-name">
								<?php echo esc_attr( $team_name ); ?>
							</<?php echo esc_attr($team_name_tag); ?>>
							<?php }
							if ( $team_position !== '' ) { ?>
							<h6 class="qodef-team-position">
								<?php echo esc_attr( $team_position ); ?>
							</h6>
							<?php } ?>
						</div>
						<div class="qodef-team-social-wrapp">

							<?php foreach( $team_social_icons as $team_social_icon ) {
								print $team_social_icon;
							} ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>