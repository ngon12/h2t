<div <?php kloe_qodef_class_attribute($service_table_classes)?> <?php  echo kloe_qodef_get_inline_style($table_styles)?>>
    <div class="qodef-service-table-inner">
        <div class="qodef-service-table-image">
            <?php if($type == 'with_image'){ ?>
                <?php echo wp_get_attachment_image($custom_image, 'full'); ?>
            <?php } else { ?>
                <?php echo kloe_qodef_execute_shortcode('qodef_icon', $icon_parameters); ?>
            <?php } ?>
        </div>
        <div class="qodef-service-table-text">
            <?php if($title != '') { ?>
            <div class="qodef-service-table-title">
                <<?php echo esc_attr($title_tag); ?>>
                    <?php echo esc_html($title); ?>
                </<?php echo esc_attr($title_tag); ?>>
            </div>
            <?php } ?>
            <?php if($description != '') { ?>
            <div class="qodef-service-table-description">
                <?php echo esc_html($description); ?>
            </div>
            <?php } ?>
        </div>
        <?php if($show_button == "yes" && $button_text !== ''){ ?>
            <div class="qodef-service-table-button">
                <?php echo kloe_qodef_get_button_html(array(
                    'link' => $link,
                    'text' => $button_text,
                    'size' => 'small',
                )); ?>
            </div>
        <?php } ?>
    </div>
</div>
