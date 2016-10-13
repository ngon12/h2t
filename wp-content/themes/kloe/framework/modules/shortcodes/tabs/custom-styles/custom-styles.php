<?php
if(!function_exists('kloe_qodef_tabs_typography_styles')){
	function kloe_qodef_tabs_typography_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = kloe_qodef_options()->getOptionValue('tabs_font_family');
		
		if(kloe_qodef_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = kloe_qodef_is_font_option_valid($font_family);
		}
		
		$text_transform = kloe_qodef_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = kloe_qodef_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = kloe_qodef_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = kloe_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = kloe_qodef_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo kloe_qodef_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_tabs_typography_styles');
}

if(!function_exists('kloe_qodef_tabs_inital_color_styles')){
	function kloe_qodef_tabs_inital_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('tabs_color')) {
            $styles['color'] = kloe_qodef_options()->getOptionValue('tabs_color');
        }
		if(kloe_qodef_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = kloe_qodef_options()->getOptionValue('tabs_back_color');
        }
		if(kloe_qodef_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = kloe_qodef_options()->getOptionValue('tabs_border_color');
        }
		
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_tabs_inital_color_styles');
}
if(!function_exists('kloe_qodef_tabs_active_color_styles')){
	function kloe_qodef_tabs_active_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li.ui-state-active a, .qodef-tabs .qodef-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = kloe_qodef_options()->getOptionValue('tabs_color_active');
        }
		if(kloe_qodef_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = kloe_qodef_options()->getOptionValue('tabs_back_color_active');
        }
		if(kloe_qodef_options()->getOptionValue('tabs_border_color_active')) {
            $styles['border-color'] = kloe_qodef_options()->getOptionValue('tabs_border_color_active');
        }
		
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_tabs_active_color_styles');
}