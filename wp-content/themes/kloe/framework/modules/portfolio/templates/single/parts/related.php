<div class="qodef-portfolio-related-holder">
    <h5><?php esc_html_e('Related projects', 'kloe'); ?></h5>

    <div class="qodef-portfolio-related-list-holder clearfix">
        <?php
        $query = kloe_qodef_get_related_post_type(get_the_ID(), array('posts_per_page' => '6'));
        if (is_object($query)) {
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    $id = get_the_ID();
                    $item_link = get_permalink($id);
                    if (get_post_meta($id, 'portfolio_external_link', true) !== '') {
                        $item_link = get_post_meta($id, 'portfolio_external_link', true);
                    }

                    $categories = wp_get_post_terms($id, 'portfolio-category');
                    $category_html = '<div class="qodef-ptf-category-holder">';
                    $k = 1;
                    foreach ($categories as $cat) {
                        $category_html .= '<span>' . $cat->name . '</span>';
                        if (count($categories) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }
                    $category_html .= '</div>';
                    ?>

                    <article class="qodef-related-portfolio-item">
                        <div class="qodef-item-image-holder">
                            <a href="<?php echo esc_url($item_link); ?>">
                                <?php
                                the_post_thumbnail('kloe_qodef_landscape');
                                ?>
                                <span class="qodef-related-overlay"></span>
                            </a>
                        </div>
                    </article>
                <?php } ?>
                <?php
            endwhile;
                ?>
                <?php
            endif;
            wp_reset_postdata();
        } else { ?>
            <p><?php esc_html_e('No related portfolios were found.', 'kloe'); ?></p>
        <?php }
        ?>
    </div>
</div>

