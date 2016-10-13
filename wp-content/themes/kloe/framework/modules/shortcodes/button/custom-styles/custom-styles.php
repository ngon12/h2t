<?php

if(!function_exists('kloe_qodef_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function kloe_qodef_button_typography_styles() {
        $selector = '.qodef-btn';
        $styles = array();

        $font_family = kloe_qodef_options()->getOptionValue('button_font_family');
        if(kloe_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = kloe_qodef_get_font_option_val($font_family);
        }

        $text_transform = kloe_qodef_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = kloe_qodef_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = kloe_qodef_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = kloe_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = kloe_qodef_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo kloe_qodef_dynamic_css($selector, $styles);
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_button_typography_styles');
}

if(!function_exists('kloe_qodef_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function kloe_qodef_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.qodef-btn.qodef-btn-outline';

        if(kloe_qodef_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = kloe_qodef_options()->getOptionValue('btn_outline_text_color');
        }

        if(kloe_qodef_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = kloe_qodef_options()->getOptionValue('btn_outline_border_color');
        }

        echo kloe_qodef_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(kloe_qodef_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-color):hover',
                array('color' => kloe_qodef_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(kloe_qodef_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => kloe_qodef_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(kloe_qodef_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover',
                array('border-color' => kloe_qodef_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_button_outline_styles');
}

if(!function_exists('kloe_qodef_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function kloe_qodef_button_solid_styles() {
        //solid styles
        $solid_selector = '.qodef-btn.qodef-btn-solid';
        $solid_styles = array();

        if(kloe_qodef_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = kloe_qodef_options()->getOptionValue('btn_solid_text_color');
        }

        if(kloe_qodef_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = kloe_qodef_options()->getOptionValue('btn_solid_border_color');
        }

        if(kloe_qodef_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = kloe_qodef_options()->getOptionValue('btn_solid_bg_color');
        }

        echo kloe_qodef_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(kloe_qodef_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-color):hover',
                array('color' => kloe_qodef_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(kloe_qodef_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => kloe_qodef_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(kloe_qodef_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo kloe_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('border-color' => kloe_qodef_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_button_solid_styles');
}