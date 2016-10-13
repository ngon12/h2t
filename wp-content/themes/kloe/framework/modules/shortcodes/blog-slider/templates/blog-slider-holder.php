<div class="qodef-blog-slider-holder" <?php echo kloe_qodef_get_inline_attrs($data_params); ?>>
    <ul class="qodef-blog-slider-items">
        <?php
        $html = '';
        if($query_result->have_posts()):
            while ($query_result->have_posts()) : $query_result->the_post();
                $html .= kloe_qodef_get_shortcode_module_template_part('templates/blog-slider-item', 'blog-slider', '', $params);
            endwhile;
            print $html;
        else: ?>
            <div class="qodef-blog-slider-messsage">
                <p><?php esc_html_e('No posts were found.', 'kloe'); ?></p>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </ul>
</div>
