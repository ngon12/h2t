
<div class="qodef-column">
    <div class="qodef-column-inner">
        <div class="qodef-process-item">
            <div class="qodef-process-info-holder">
                <div class="qodef-process-number-holder">
                    <div class="qodef-process-number-holder-inner">
                        <span class="qodef-process-number">
                            <?php echo esc_attr($number); ?>
                        </span>
                         <span class="qodef-process-number-clone">
                            <?php echo esc_attr($number); ?>
                        </span>
                    </div>
                </div>
                <div class="qodef-process-title-holder">
                    <?php if($enable_small_title == 'yes'){?>
                    <div class="qodef-proces-small-title">
                        <?php echo esc_attr($small_title); ?>
                    </div>
                    <?php } ?>
                    <div class="qodef-proces-title">
                        <<?php echo esc_attr($title_tag); ?>>
                            <?php echo esc_attr($title); ?>
                        </<?php echo esc_attr($title_tag); ?>>
                    </div>
                </div>
            </div>
            <div class="qodef-process-text-holder">
                <p>
                    <?php echo esc_attr($text); ?>
                </p>
            </div>
        </div>
    </div>
</div>