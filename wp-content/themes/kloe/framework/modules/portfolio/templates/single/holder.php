<?php

$type = kloe_qodef_get_portfolio_single_type();

if($fullwidth) : ?>
<div class="qodef-full-width">
    <div class="qodef-full-width-inner">
<?php else: ?>
<div class="qodef-container">
    <div class="qodef-container-inner clearfix">
<?php endif; ?>
        <div <?php kloe_qodef_class_attribute($holder_class); ?>>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper portfolio template
                kloe_qodef_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);


                if(kloe_qodef_options()->getOptionValue('portfolio_single_hide_related') != 'yes' && $type !== 'full-width-custom' && $type !== 'custom'){
                    //load portfolio related
                    kloe_qodef_get_module_template_part('templates/single/parts/related', 'portfolio');
                }


                //load portfolio navigation
                kloe_qodef_get_module_template_part('templates/single/parts/navigation', 'portfolio');

                //load portfolio comments
                kloe_qodef_get_module_template_part('templates/single/parts/comments', 'portfolio');

            } ?>
        </div>
    </div>
</div>