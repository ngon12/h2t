<?php

if (!function_exists('kloe_qodef_search_covers_header_style')) {

	function kloe_qodef_search_covers_header_style()
	{

		if (kloe_qodef_options()->getOptionValue('search_height') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-header-bottom.qodef-animated .qodef-form-holder-outer, .qodef-search-slide-header-bottom .qodef-form-holder-outer, .qodef-search-slide-header-bottom', array(
				'height' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_height')) . 'px'
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_covers_header_style');

}

if (!function_exists('kloe_qodef_search_opener_icon_size')) {

	function kloe_qodef_search_opener_icon_size()
	{

		if (kloe_qodef_options()->getOptionValue('header_search_icon_size')) {
			echo kloe_qodef_dynamic_css('.qodef-search-opener', array(
				'font-size' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_opener_icon_size');

}

if (!function_exists('kloe_qodef_search_opener_icon_colors')) {

	function kloe_qodef_search_opener_icon_colors()
	{

		if (kloe_qodef_options()->getOptionValue('header_search_icon_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-opener', array(
				'color' => kloe_qodef_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (kloe_qodef_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (kloe_qodef_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-light-header .qodef-top-bar .qodef-search-opener', array(
				'color' => kloe_qodef_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (kloe_qodef_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (kloe_qodef_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener', array(
				'color' => kloe_qodef_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (kloe_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_opener_icon_colors');

}

if (!function_exists('kloe_qodef_search_opener_icon_background_colors')) {

	function kloe_qodef_search_opener_icon_background_colors()
	{

		if (kloe_qodef_options()->getOptionValue('search_icon_background_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-opener', array(
				'background-color' => kloe_qodef_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (kloe_qodef_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'background-color' => kloe_qodef_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_opener_icon_background_colors');
}

if (!function_exists('kloe_qodef_search_opener_text_styles')) {

	function kloe_qodef_search_opener_text_styles()
	{
		$text_styles = array();

		if (kloe_qodef_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = kloe_qodef_options()->getOptionValue('search_icon_text_color');
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = kloe_qodef_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = kloe_qodef_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = kloe_qodef_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo kloe_qodef_dynamic_css('.qodef-search-icon-text', $text_styles);
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => kloe_qodef_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_opener_text_styles');
}

if (!function_exists('kloe_qodef_search_opener_spacing')) {

	function kloe_qodef_search_opener_spacing()
	{
		$spacing_styles = array();

		if (kloe_qodef_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo kloe_qodef_dynamic_css('.qodef-search-opener', $spacing_styles);
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_opener_spacing');
}

if (!function_exists('kloe_qodef_search_bar_background')) {

	function kloe_qodef_search_bar_background()
	{

		if (kloe_qodef_options()->getOptionValue('search_background_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-header-bottom, .qodef-search-cover, .qodef-search-fade .qodef-fullscreen-search-holder .qodef-fullscreen-search-table, .qodef-fullscreen-search-overlay, .qodef-search-slide-window-top, .qodef-search-slide-window-top input[type="text"]', array(
				'background-color' => kloe_qodef_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_bar_background');
}

if (!function_exists('kloe_qodef_search_text_styles')) {

	function kloe_qodef_search_text_styles()
	{
		$text_styles = array();

		if (kloe_qodef_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = kloe_qodef_options()->getOptionValue('search_text_color');
		}
		if (kloe_qodef_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = kloe_qodef_options()->getOptionValue('search_text_texttransform');
		}
		if (kloe_qodef_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (kloe_qodef_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = kloe_qodef_options()->getOptionValue('search_text_fontstyle');
		}
		if (kloe_qodef_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = kloe_qodef_options()->getOptionValue('search_text_fontweight');
		}
		if (kloe_qodef_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-header-bottom input[type="text"], .qodef-search-cover input[type="text"], .qodef-fullscreen-search-holder .qodef-search-field, .qodef-search-slide-window-top input[type="text"]', $text_styles);
		}
		if (kloe_qodef_options()->getOptionValue('search_text_disabled_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-header-bottom.qodef-disabled input[type="text"]::-webkit-input-placeholder, .qodef-search-slide-header-bottom.qodef-disabled input[type="text"]::-moz-input-placeholder', array(
				'color' => kloe_qodef_options()->getOptionValue('search_text_disabled_color')
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_text_styles');
}

if (!function_exists('kloe_qodef_search_label_styles')) {

	function kloe_qodef_search_label_styles()
	{
		$text_styles = array();

		if (kloe_qodef_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = kloe_qodef_options()->getOptionValue('search_label_text_color');
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = kloe_qodef_options()->getOptionValue('search_label_text_texttransform');
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = kloe_qodef_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = kloe_qodef_options()->getOptionValue('search_label_text_fontweight');
		}
		if (kloe_qodef_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo kloe_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-label', $text_styles);
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_label_styles');
}

if (!function_exists('kloe_qodef_search_icon_styles')) {

	function kloe_qodef_search_icon_styles()
	{

		if (kloe_qodef_options()->getOptionValue('search_icon_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top > i, .qodef-search-slide-header-bottom .qodef-search-submit i, .qodef-fullscreen-search-holder .qodef-search-submit', array(
				'color' => kloe_qodef_options()->getOptionValue('search_icon_color')
			));
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top > i:hover, .qodef-search-slide-header-bottom .qodef-search-submit i:hover, .qodef-fullscreen-search-holder .qodef-search-submit:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_disabled_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-header-bottom.qodef-disabled .qodef-search-submit i, .qodef-search-slide-header-bottom.qodef-disabled .qodef-search-submit i:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('search_icon_disabled_color')
			));
		}
		if (kloe_qodef_options()->getOptionValue('search_icon_size') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top > i, .qodef-search-slide-header-bottom .qodef-search-submit i, .qodef-fullscreen-search-holder .qodef-search-submit', array(
				'font-size' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_icon_styles');
}

if (!function_exists('kloe_qodef_search_close_icon_styles')) {

	function kloe_qodef_search_close_icon_styles()
	{

		if (kloe_qodef_options()->getOptionValue('search_close_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i, .qodef-search-cover .qodef-search-close i, .qodef-fullscreen-search-close i', array(
				'color' => kloe_qodef_options()->getOptionValue('search_close_color')
			));
		}
		if (kloe_qodef_options()->getOptionValue('search_close_hover_color') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i:hover, .qodef-search-cover .qodef-search-close i:hover, .qodef-fullscreen-search-close i:hover', array(
				'color' => kloe_qodef_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (kloe_qodef_options()->getOptionValue('search_close_size') !== '') {
			echo kloe_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i, .qodef-search-cover .qodef-search-close i, .qodef-fullscreen-search-close i', array(
				'font-size' => kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('kloe_qodef_style_dynamic', 'kloe_qodef_search_close_icon_styles');
}

?>
