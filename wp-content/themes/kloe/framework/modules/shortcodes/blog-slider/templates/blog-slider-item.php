<li class="qodef-blog-slider-item">
    <div class="qodef-blog-slider-item-inner">
        <div class="qodef-blog-slider-image">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            </a>
        </div>
        <div class="qodef-blog-slider-info">
            <div class="qodef-blog-slider-info-outer">
                <div class="qodef-blog-slider-info-inner">
                    <div class="qodef-blog-slider-info-top">
                        <?php kloe_qodef_post_info(array(
                            'date' => 'yes',
                            'category' => 'no',
                            'author' => 'no',
                            'comments' => 'no',
                            'like' => 'no'
                        )) ?>
                    </div>
                    <<?php echo esc_html( $title_tag)?> class="qodef-blog-slider-title">
                        <a href="<?php echo esc_url(get_permalink()) ?>" >
                            <?php echo esc_attr(get_the_title()) ?>
                        </a>
                    </<?php echo esc_html($title_tag) ?>>
                    <div class="qodef-blog-slider-info-bottom">
                        <?php kloe_qodef_post_info(array(
                            'date' => 'no',
                            'category' => 'no',
                            'author' => 'yes',
                            'comments' => 'no',
                            'like' => 'no'
                        )) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>