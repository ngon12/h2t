<?php

if(!function_exists('kloe_qodef_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function kloe_qodef_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(kloe_qodef_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(kloe_qodef_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = kloe_qodef_options()->getOptionValue('mobile_header_background_color');
        }

        echo kloe_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-header-inner', $mobile_header_styles);
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_mobile_header_general_styles');
}

if(!function_exists('kloe_qodef_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function kloe_qodef_mobile_navigation_styles() {
        $mobile_nav_styles = array();
        if(kloe_qodef_options()->getOptionValue('mobile_menu_background_color')) {
            $mobile_nav_styles['background-color'] = kloe_qodef_options()->getOptionValue('mobile_menu_background_color');
        }

        echo kloe_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-nav', $mobile_nav_styles);

        $mobile_nav_item_styles = array();
        if(kloe_qodef_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_item_styles['border-bottom-color'] = kloe_qodef_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(kloe_qodef_options()->getOptionValue('mobile_text_color') !== '') {
            $mobile_nav_item_styles['color'] = kloe_qodef_options()->getOptionValue('mobile_text_color');
        }

        if(kloe_qodef_is_font_option_valid(kloe_qodef_options()->getOptionValue('mobile_font_family'))) {
            $mobile_nav_item_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('mobile_font_family'));
        }

        if(kloe_qodef_options()->getOptionValue('mobile_font_size') !== '') {
            $mobile_nav_item_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_font_size')).'px';
        }

        if(kloe_qodef_options()->getOptionValue('mobile_line_height') !== '') {
            $mobile_nav_item_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_line_height')).'px';
        }

        if(kloe_qodef_options()->getOptionValue('mobile_text_transform') !== '') {
            $mobile_nav_item_styles['text-transform'] = kloe_qodef_options()->getOptionValue('mobile_text_transform');
        }

        if(kloe_qodef_options()->getOptionValue('mobile_font_style') !== '') {
            $mobile_nav_item_styles['font-style'] = kloe_qodef_options()->getOptionValue('mobile_font_style');
        }

        if(kloe_qodef_options()->getOptionValue('mobile_font_weight') !== '') {
            $mobile_nav_item_styles['font-weight'] = kloe_qodef_options()->getOptionValue('mobile_font_weight');
        }

        $mobile_nav_item_selector = array(
            '.qodef-mobile-header .qodef-mobile-nav a',
            '.qodef-mobile-header .qodef-mobile-nav h4'
        );

        echo kloe_qodef_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

        $mobile_nav_item_hover_styles = array();
        if(kloe_qodef_options()->getOptionValue('mobile_text_hover_color') !== '') {
            $mobile_nav_item_hover_styles['color'] = kloe_qodef_options()->getOptionValue('mobile_text_hover_color');
        }

        $mobile_nav_item_selector_hover = array(
            '.qodef-mobile-header .qodef-mobile-nav a:hover',
            '.qodef-mobile-header .qodef-mobile-nav h4:hover'
        );

        echo kloe_qodef_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_mobile_navigation_styles');
}

if(!function_exists('kloe_qodef_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function kloe_qodef_mobile_logo_styles() {
        if(kloe_qodef_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo kloe_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-logo-wrapper a',
                array('height' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(kloe_qodef_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo kloe_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-logo-wrapper a',
                array('height' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }

        if(kloe_qodef_options()->getOptionValue('mobile_header_height') !== '') {
            $max_height = intval(kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
            echo kloe_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-logo-wrapper a', array('max-height' => $max_height));
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_mobile_logo_styles');
}

if(!function_exists('kloe_qodef_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function kloe_qodef_mobile_icon_styles() {
        $mobile_icon_styles = array();
        if(kloe_qodef_options()->getOptionValue('mobile_icon_color') !== '') {
            $mobile_icon_styles['color'] = kloe_qodef_options()->getOptionValue('mobile_icon_color');
        }

        if(kloe_qodef_options()->getOptionValue('mobile_icon_size') !== '') {
            $mobile_icon_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('mobile_icon_size')).'px';
        }

        echo kloe_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-menu-opener a', $mobile_icon_styles);

        if(kloe_qodef_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo kloe_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
                array('color' => kloe_qodef_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_mobile_icon_styles');
}