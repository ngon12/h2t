<div class="qodef-message  <?php echo esc_attr($message_classes)?>" <?php  echo kloe_qodef_get_inline_style($message_styles)?>>
	<div class="qodef-message-inner">
		<?php		
		if($type == 'with_icon'){
			$icon_html = kloe_qodef_get_shortcode_module_template_part('templates/' . $type, 'message', '', $params);
			print $icon_html;
		}
		?>
		<a href="#" class="qodef-close" <?php  echo kloe_qodef_get_inline_style($close_icon_style)?>>
			<i class="q_font_elegant_icon icon_close"></i>
		</a>
		<div class="qodef-message-text-holder">
			<div class="qodef-message-text">
				<div class="qodef-message-text-inner">
					<?php echo do_shortcode($content)?>
				</div>
			</div>
		</div>
	</div>
</div>
