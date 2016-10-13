<div class="qodef-fixed-background-item <?php echo esc_attr($item_clasess)?>" <?php echo kloe_qodef_get_inline_style($background_style)?>>
    <div class="qodef-container-inner">
        <div class="qodef-fixed-background-table">
            <div class="qodef-fixed-background-cell">
                <div class="qodef-fixed-background-inner">
                    <div class="qodef-featured-image">
                        <?php echo wp_get_attachment_image($featured_image, 'full'); ?>
                    </div>
                    <div class="qodef-fixed-background-text">
                        <?php if($subtitle != '') { ?>
                            <<?php echo esc_attr($subtitle_tag); ?> class="qodef-fixed-background-subtitle">
                                <?php echo esc_html($subtitle); ?>
                            </<?php echo esc_attr($subtitle_tag); ?>>
                        <?php } ?>
                        <?php if($title != '') { ?>
                            <<?php echo esc_attr($title_tag); ?> class="qodef-fixed-background-title">
                                <?php echo esc_html($title); ?>
                            </<?php echo esc_attr($title_tag); ?>>
                        <?php } ?>
                        <?php if($description != '') { ?>
                        <div class="qodef-fixed-background-description">
                            <?php echo esc_html($description); ?>
                        </div>
                        <?php } ?>
                        <?php if($show_button == "yes" && $button_text !== ''){ ?>
                            <div class="qodef-fixed-background-button">
                                <?php echo kloe_qodef_get_button_html($button_parameters); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

