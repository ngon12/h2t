<?php
$icon_html = kloe_qodef_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="qodef-icon-list-item">
	<span class="qodef-icon-list-icon-holder">
        <span class="qodef-icon-list-icon-holder-inner clearfix">
			<?php 
			print $icon_html;
			?>
		</span>
	</span>
	<?php if($link_item == 'yes') { ?>
	<a <?php kloe_qodef_class_attribute($link_class); ?> href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php echo kloe_qodef_get_inline_attrs($text_data); ?> <?php echo kloe_qodef_get_inline_style($title_style)?>>
		<span> <?php echo esc_attr($title)?></span>
	</a>
	<?php } else { ?>
		<span <?php kloe_qodef_class_attribute($link_class); ?> <?php echo kloe_qodef_get_inline_style($title_style)?>> <?php echo esc_attr($title)?></span>
	<?php } ?>

</div>
