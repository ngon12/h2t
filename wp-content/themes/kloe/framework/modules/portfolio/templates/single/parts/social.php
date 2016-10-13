<?php if(kloe_qodef_options()->getOptionValue('enable_social_share') == 'yes'
    && kloe_qodef_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="qodef-portfolio-social">
        <?php echo kloe_qodef_get_social_share_html() ?>
    </div>
<?php endif; ?>