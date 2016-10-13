<?php if($icon_animation_holder) : ?>
    <span class="qodef-icon-animation-holder" <?php kloe_qodef_inline_style($icon_animation_holder_styles); ?>>
<?php endif; ?>

    <span <?php kloe_qodef_class_attribute($icon_holder_classes); ?> <?php kloe_qodef_inline_style($icon_holder_styles); ?> <?php echo kloe_qodef_get_inline_attrs($icon_holder_data); ?>>
        <?php if($link !== '') : ?>
            <a class="<?php echo esc_attr($link_class) ?>" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
        <?php endif; ?>

        <?php echo kloe_qodef_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>

        <?php if($link !== '') : ?>
            </a>
        <?php endif; ?>
        <?php if($hover_effect == 'yes') { ?>
            <span class="qodef-icon-shader" <?php kloe_qodef_inline_style($icon_shader_styles); ?>></span>
        <?php } ?>
    </span>

<?php if($icon_animation_holder) : ?>
    </span>
<?php endif; ?>
