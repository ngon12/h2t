<?php 

if(!function_exists('kloe_qodef_accordions_typography_styles')){
	function kloe_qodef_accordions_typography_styles(){
		$selector = '.qodef-accordion-holder .qodef-title-holder';		
		$styles = array();
		
		$font_family = kloe_qodef_options()->getOptionValue('accordions_font_family');
		if(kloe_qodef_is_font_option_valid($font_family)){
			$styles['font-family'] = kloe_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = kloe_qodef_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = kloe_qodef_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = kloe_qodef_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = kloe_qodef_filter_px($letter_spacing).'px';
       }

       $font_weight = kloe_qodef_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_accordions_typography_styles');
}

if(!function_exists('kloe_qodef_accordions_inital_title_color_styles')){
	function kloe_qodef_accordions_inital_title_color_styles(){
		$selector = '.qodef-accordion-holder.qodef-initial .qodef-title-holder';
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('accordions_title_color')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('accordions_title_color');
       }
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_accordions_inital_title_color_styles');
}

if(!function_exists('kloe_qodef_accordions_active_title_color_styles')){
	
	function kloe_qodef_accordions_active_title_color_styles(){
		$selector = array(
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-active',
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('accordions_title_color_active');
       }
		
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_accordions_active_title_color_styles');
}
if(!function_exists('kloe_qodef_accordions_inital_icon_color_styles')){
	
	function kloe_qodef_accordions_inital_icon_color_styles(){
		$selector = '.qodef-accordion-holder.qodef-initial .qodef-title-holder .qodef-accordion-mark';
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('accordions_icon_color');
       }
		if(kloe_qodef_options()->getOptionValue('accordions_icon_back_color')) {
           $styles['background-color'] = kloe_qodef_options()->getOptionValue('accordions_icon_back_color');
       }
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_accordions_inital_icon_color_styles');
}
if(!function_exists('kloe_qodef_accordions_active_icon_color_styles')){
	
	function kloe_qodef_accordions_active_icon_color_styles(){
		$selector = array(
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-active  .qodef-accordion-mark',
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-hover  .qodef-accordion-mark'
		);
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('accordions_icon_color_active')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('accordions_icon_color_active');
       }
		if(kloe_qodef_options()->getOptionValue('accordions_icon_back_color_active')) {
           $styles['background-color'] = kloe_qodef_options()->getOptionValue('accordions_icon_back_color_active');
       }
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_accordions_active_icon_color_styles');
}

if(!function_exists('kloe_qodef_boxed_accordions_inital_color_styles')){
	function kloe_qodef_boxed_accordions_inital_color_styles(){
		$selector = '.qodef-accordion-holder.qodef-boxed .qodef-title-holder';
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_color')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_color');
           echo kloe_qodef_dynamic_css('.qodef-accordion-holder.qodef-boxed .qodef-title-holder .qodef-accordion-mark', array('color' => kloe_qodef_options()->getOptionValue('boxed_accordions_color')));
       }
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_back_color')) {
           $styles['background-color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_back_color');
       }
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_border_color')) {
           $styles['border-color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_border_color');
       }
		
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_boxed_accordions_inital_color_styles');
}
if(!function_exists('kloe_qodef_boxed_accordions_active_color_styles')){

	function kloe_qodef_boxed_accordions_active_color_styles(){
		$selector = array(
			'.qodef-accordion-holder.qodef-boxed.ui-accordion .qodef-title-holder.ui-state-active',
			'.qodef-accordion-holder.qodef-boxed.ui-accordion .qodef-title-holder.ui-state-hover'
		);
		$selector_icons = array(
			'.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-active .qodef-accordion-mark',
			'.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-hover .qodef-accordion-mark'
		);
		$styles = array();
		
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_color_active')) {
           $styles['color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_color_active');
           echo kloe_qodef_dynamic_css($selector_icons, array('color' => kloe_qodef_options()->getOptionValue('boxed_accordions_color_active')));
       }
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_back_color_active')) {
           $styles['background-color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_back_color_active');
       }
		if(kloe_qodef_options()->getOptionValue('boxed_accordions_border_color_active')) {
           $styles['border-color'] = kloe_qodef_options()->getOptionValue('boxed_accordions_border_color_active');
       }
		
		echo kloe_qodef_dynamic_css($selector, $styles);
	}
	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_boxed_accordions_active_color_styles');
}