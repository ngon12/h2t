<?php do_action('kloe_qodef_before_mobile_logo'); ?>

<div class="qodef-mobile-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php kloe_qodef_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('mobile logo','kloe'); ?>"/>
    </a>
</div>

<?php do_action('kloe_qodef_after_mobile_logo'); ?>