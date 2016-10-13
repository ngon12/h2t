<div class="qodef-image-slider-inner" <?php kloe_qodef_inline_style($slider_styles); ?>>
    <ul>
        <?php foreach ($images as $image) {
            ?>
            <li>
                <div class="qodef-image-slider-holder" <?php kloe_qodef_inline_style($image[2]); ?>>
                    <?php if($image[3]){ ?>
                        <a href="<?php echo esc_attr($image[3]); ?>" target="_blank">
                    <?php } ?>
                    <img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr($image[1]); ?>" />
                    <?php if($image[3]) { ?>
                        </a>
                    <?php } ?>
                </div>
            </li>
       <?php } ?>
    </ul>
</div>