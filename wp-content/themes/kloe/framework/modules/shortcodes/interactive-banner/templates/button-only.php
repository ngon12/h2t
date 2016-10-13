<?php
/**
 * Interactive Banner Button Only shortcode template
 */
?>

<div class="qodef-interactive-banner qodef-banner-button-only">
    <div class="qodef-interactive-banner-inner">
        <?php if ( $image !== '' ) { ?>
        <div class="qodef-banner-image">
            <?php if ($link !== '' ) { ?><a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target)?>"><?php } ?>
                <img src="<?php echo esc_url($image_src); ?>" alt="<?php esc_html_e('banner image','kloe'); ?>" />
                <?php if ($link !== '' ){ ?> </a> <?php } ?>
        </div>
        <div class="qodef-text-holder">
            <?php if ($link !== '' ) { ?><a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target)?>"><?php } ?>
                <span class="qodef-banner-overlay"></span>
            <?php if ($link !== '' ){ ?> </a> <?php } ?>

            <?php if ($show_button == 'yes') { ?>
                <?php echo kloe_qodef_get_button_html($button_parameters); ?>
            <?php } ?>
        </div>
    <?php } ?>
</div>
</div>
