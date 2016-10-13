<?php
if(!function_exists('kloe_qodef_design_styles')) {
    /**
     * Generates general custom styles
     */
    function kloe_qodef_design_styles() {

        $preload_background_styles = array();

        if(kloe_qodef_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.kloe_qodef_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(QODE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo kloe_qodef_dynamic_css('.qodef-preload-background', $preload_background_styles);

		if (kloe_qodef_options()->getOptionValue('google_fonts')){
			$font_family = kloe_qodef_options()->getOptionValue('google_fonts');
			if(kloe_qodef_is_font_option_valid($font_family)) {
				echo kloe_qodef_dynamic_css('body', array('font-family' => kloe_qodef_get_font_option_val($font_family)));
			}
		}

		if(kloe_qodef_options()->getOptionValue('sticky_header_height') !== "") {
			echo kloe_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-sticky-holder .qodef-logo-wrapper a ', array('max-height' => kloe_qodef_options()->getOptionValue('sticky_header_height')."px"));
		}

        if(kloe_qodef_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'a:hover',
                'p a:hover',
                '.qodef-main-menu ul li:hover a, .qodef-main-menu ul li.qodef-active-item a',
                'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu > ul > li:hover > a, .qodef-main-menu > ul > li.qodef-active-item > a',
                '.qodef-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
                '.qodef-drop-down .wide .second ul li .flexslider ul li a:hover',
                '.qodef-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle .second .inner ul li a:hover',
                '.qodef-mobile-header .qodef-mobile-nav a:hover, .qodef-mobile-header .qodef-mobile-nav h4:hover',
                '.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
                '.qodef-side-menu-button-opener:hover',
                'nav.qodef-fullscreen-menu ul li a:hover',
                'nav.qodef-fullscreen-menu ul li ul li a',
                '.qodef-search-slide-header-bottom .qodef-search-submit:hover',
                '.qodef-search-cover .qodef-search-close a:hover',
                '.qodef-ordered-list ol > li:before',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder .qodef-icon-list-icon-holder-inner i',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder .qodef-icon-list-icon-holder-inner .font_elegant',
                '.qodef-price-table .qodef-price-table-inner ul li.qodef-table-prices .qodef-value',
                '.qodef-price-table .qodef-price-table-inner ul li.qodef-table-prices .qodef-price',
                '.qodef-price-table .qodef-price-table-inner ul li.qodef-table-prices .qodef-mark',
                '.post-password-form input[type="submit"]:hover',
				'.qodef-icon-list-item .qodef-icon-list-icon-holder-inner i',
				'.qodef-icon-list-item .qodef-icon-list-icon-holder-inner .font_elegant',
				'.qodef-ordered-list ol>li:before',
				'.qodef-portfolio-filter-holder .qodef-portfolio-filter-holder-inner ul li.active span',
				'.qodef-portfolio-filter-holder .qodef-portfolio-filter-holder-inner ul li.current span',
				'.qodef-portfolio-list-holder article .qodef-item-icons-holder a',
				'.qodef-portfolio-list-holder.qodef-ptf-standard article .qodef-item-icons-holder a:hover',
				'.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.owl-carousel .owl-buttons .qodef-prev-icon i',
				'.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.owl-carousel .owl-buttons .qodef-next-icon i',
                '.qodef-single-product-summary .product_meta > span > a:hover',
                '.qodef-single-product-summary .qodef-social-share-holder li a:hover',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon i',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon span',
                '.qodef-woocommerce-page .select2-container .select2-choice .select2-arrow b:after',
                '.qodef-woocommerce-page .woocommerce-checkout-review-order-table .order-total',
                '.qodef-side-menu a.qodef-close-side-menu:hover span',
                '.qodef-side-menu h5 a:hover',
                '.qodef-menu-area .qodef-featured-icon',
                '.qodef-sticky-nav .qodef-featured-icon',
                '.qodef-top-bar a:hover',
                '.qodef-shopping-cart-outer .qodef-shopping-cart-header .qodef-header-cart:hover i',
                'aside.qodef-sidebar .widget.qodef-latest-posts-widget .qodef-blog-list-holder.qodef-minimal .qodef-item-info-section a:hover',
                '.qodef-blog-holder.qodef-blog-type-standard article .qodef-post-info-bottom .qodef-blog-share .qodef-social-share-holder.qodef-list li a:hover span',
                '.qodef-shopping-cart-dropdown .qodef-item-info-holder .qodef-item-left a:hover',
                '.qodef-shopping-cart-dropdown .qodef-item-info-holder .qodef-item-right .remove:hover',
                'aside.qodef-sidebar .widget .tagcloud a',
                'aside.qodef-sidebar .widget ul > li a:hover',
                '.qodef-twitter-widget li .qodef-tweet-content-holder .qodef-tweet-text a:hover',
                '.qodef-twitter-widget li .qodef-tweet-content-holder .qodef-tweet-time a:hover',
                'footer a:hover',
                '.qodef-twitter-widget li .qodef-tweet-icon-holder .qodef-social-twitter',
                '.qodef-post-info-bottom .qodef-single-tags-holder .qodef-tags a',
                '.qodef-post-info-bottom .qodef-blog-share .qodef-social-share-holder.qodef-list li a:hover span',
                '.qodef-blog-holder.qodef-blog-type-centered .qodef-post-info-bottom .qodef-blog-share .qodef-social-share-holder.qodef-list li a:hover span',
                '.qodef-search-opener:hover',
                '.qodef-blog-slider-holder .qodef-blog-slider-items .qodef-blog-slider-info-bottom .qodef-post-info-author-link:hover',
                'aside.qodef-sidebar .widget #searchform input[type="submit"]:hover',
                '.qodef-portfolio-filter-holder .qodef-portfolio-filter-holder-inner ul li:hover span',
                '.qodef-header-vertical .qodef-vertical-dropdown-float .qodef-featured-icon',
                '.qodef-team.main-info-below-image .qodef-team-social.normal .qodef-team-social-wrapp a:hover span',
                '.qodef-process-holder.with_arrows .qodef-process-item .qodef-process-number-holder:after',
                '.qodef-header-vertical .qodef-vertical-menu > ul > li > a:hover',
                '.qodef-tabs .qodef-tabs-nav li a .qodef-icon-frame',
                '.qodef-dropcaps.qodef-square',
                '.qodef-dropcaps.qodef-circle',
                '.qodef-woocommerce-page #reviews .star-rating span:before',
                '.qodef-woocommerce-page #reviews .star-rating:before'
            );

            $color_important_selector = array(
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover'
            );

            $background_color_important_selector = array(
                '.qodef-interactive-banner.qodef-banner-button-only .qodef-text-holder .qodef-btn:hover'
            );


            $background_color_selector = array(
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle .second:after',
                '.qodef-header-vertical .qodef-vertical-menu > ul > li > a:before',
                '.qodef-header-vertical .qodef-vertical-menu > ul > li > a:after',
                '.qodef-header-vertical.qodef-vertical-header-hidden .qodef-vertical-menu-hidden-button-line',
                '.qodef-header-vertical.qodef-vertical-header-hidden .qodef-vertical-menu-hidden-button-line:after',
                '.qodef-header-vertical.qodef-vertical-header-hidden .qodef-vertical-menu-hidden-button-line:before',
                '.qodef-fullscreen-menu-opener:hover .qodef-line',
                '.qodef-fullscreen-menu-opener.opened:hover .qodef-line:after',
                '.qodef-fullscreen-menu-opener.opened:hover .qodef-line:before',
                '.qodef-icon-shortcode.circle, .qodef-icon-shortcode.square',
                '.qodef-price-table.qodef-active .qodef-active-text',
                '.qodef-pie-chart-doughnut-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-pie-chart-pie-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.post-password-form input[type="submit"]',
				'.qodef-accordion-holder .qodef-title-holder.ui-state-active .qodef-accordion-mark',
				'.qodef-accordion-holder .qodef-title-holder.ui-state-hover .qodef-accordion-mark',
				'.qodef-portfolio-list-holder.qodef-ptf-standard article .qodef-item-icons-holder a',
                '.qodef-woocommerce-page .qodef-quantity-buttons .qodef-quantity-minus:hover',
                '.qodef-woocommerce-page .qodef-quantity-buttons .qodef-quantity-plus:hover',
                '.qodef-woocommerce-page .products .product .qodef-onsale',
                '.page-template-default .woocommerce .products .product .qodef-onsale',
                '.page-template-full-width .woocommerce .products .product .qodef-onsale',
                '.qodef-blog-holder article.format-audio .mejs-controls .mejs-time-rail .mejs-time-current',
                '.qodef-blog-holder article.format-audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .checkout',
                '.woocommerce-view-order mark',
                '.qodef-shop-masonry .qodef-shop-product .qodef-onsale',
                '.qodef-woocommerce-page .product .qodef-onsale'
            );

            $border_color_selector = array(
                '.qodef-drop-down .second',
				'.qodef-portfolio-list-holder article .qodef-item-icons-holder a',
				'.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.owl-carousel .owl-buttons .qodef-prev-icon',
				'.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.owl-carousel .owl-buttons .qodef-next-icon'
            );

            echo kloe_qodef_dynamic_css($color_selector, array('color' => kloe_qodef_options()->getOptionValue('first_color')));
            echo kloe_qodef_dynamic_css($color_important_selector, array('color' => kloe_qodef_options()->getOptionValue('first_color') . '!important'));
            echo kloe_qodef_dynamic_css($background_color_important_selector, array('background-color' => kloe_qodef_options()->getOptionValue('first_color') . '!important'));
            echo kloe_qodef_dynamic_css('::selection', array('background' => kloe_qodef_options()->getOptionValue('first_color')));
            echo kloe_qodef_dynamic_css('::-moz-selection', array('background' => kloe_qodef_options()->getOptionValue('first_color')));
            echo kloe_qodef_dynamic_css($background_color_selector, array('background-color' => kloe_qodef_options()->getOptionValue('first_color')));
            echo kloe_qodef_dynamic_css($border_color_selector, array('border-color' => kloe_qodef_options()->getOptionValue('first_color')));
        }

		if (kloe_qodef_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.qodef-wrapper-inner',
				'.qodef-content'
			);
			echo kloe_qodef_dynamic_css($background_color_selector, array('background-color' => kloe_qodef_options()->getOptionValue('page_background_color')));
		}

		if (kloe_qodef_options()->getOptionValue('selection_color')) {
			echo kloe_qodef_dynamic_css('::selection', array('background' => kloe_qodef_options()->getOptionValue('selection_color')));
			echo kloe_qodef_dynamic_css('::-moz-selection', array('background' => kloe_qodef_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (kloe_qodef_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = kloe_qodef_options()->getOptionValue('page_background_color_in_box');
		}

		if (kloe_qodef_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(kloe_qodef_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (kloe_qodef_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(kloe_qodef_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (kloe_qodef_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (kloe_qodef_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo kloe_qodef_dynamic_css('.qodef-boxed .qodef-wrapper', $boxed_background_style);
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_design_styles');
}

if (!function_exists('kloe_qodef_h1_styles')) {

    function kloe_qodef_h1_styles() {

        $h1_styles = array();

        if(kloe_qodef_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = kloe_qodef_options()->getOptionValue('h1_color');
        }
        if(kloe_qodef_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h1_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h1_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = kloe_qodef_options()->getOptionValue('h1_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h1_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo kloe_qodef_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h1_styles');
}

if (!function_exists('kloe_qodef_h2_styles')) {

    function kloe_qodef_h2_styles() {

        $h2_styles = array();

        if(kloe_qodef_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = kloe_qodef_options()->getOptionValue('h2_color');
        }
        if(kloe_qodef_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h2_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h2_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = kloe_qodef_options()->getOptionValue('h2_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h2_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo kloe_qodef_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h2_styles');
}

if (!function_exists('kloe_qodef_h3_styles')) {

    function kloe_qodef_h3_styles() {

        $h3_styles = array();

        if(kloe_qodef_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = kloe_qodef_options()->getOptionValue('h3_color');
        }
        if(kloe_qodef_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h3_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h3_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = kloe_qodef_options()->getOptionValue('h3_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h3_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo kloe_qodef_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h3_styles');
}

if (!function_exists('kloe_qodef_h4_styles')) {

    function kloe_qodef_h4_styles() {

        $h4_styles = array();

        if(kloe_qodef_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = kloe_qodef_options()->getOptionValue('h4_color');
        }
        if(kloe_qodef_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h4_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h4_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = kloe_qodef_options()->getOptionValue('h4_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h4_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo kloe_qodef_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h4_styles');
}

if (!function_exists('kloe_qodef_h5_styles')) {

    function kloe_qodef_h5_styles() {

        $h5_styles = array();

        if(kloe_qodef_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = kloe_qodef_options()->getOptionValue('h5_color');
        }
        if(kloe_qodef_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h5_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h5_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = kloe_qodef_options()->getOptionValue('h5_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h5_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo kloe_qodef_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h5_styles');
}

if (!function_exists('kloe_qodef_h6_styles')) {

    function kloe_qodef_h6_styles() {

        $h6_styles = array();

        if(kloe_qodef_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = kloe_qodef_options()->getOptionValue('h6_color');
        }
        if(kloe_qodef_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('h6_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = kloe_qodef_options()->getOptionValue('h6_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = kloe_qodef_options()->getOptionValue('h6_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = kloe_qodef_options()->getOptionValue('h6_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo kloe_qodef_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_h6_styles');
}

if (!function_exists('kloe_qodef_text_styles')) {

    function kloe_qodef_text_styles() {

        $text_styles = array();

        if(kloe_qodef_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = kloe_qodef_options()->getOptionValue('text_color');
        }
        if(kloe_qodef_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = kloe_qodef_get_formatted_font_family(kloe_qodef_options()->getOptionValue('text_google_fonts'));
        }
        if(kloe_qodef_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('text_fontsize')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('text_lineheight')).'px';
        }
        if(kloe_qodef_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = kloe_qodef_options()->getOptionValue('text_texttransform');
        }
        if(kloe_qodef_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = kloe_qodef_options()->getOptionValue('text_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = kloe_qodef_options()->getOptionValue('text_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = kloe_qodef_filter_px(kloe_qodef_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo kloe_qodef_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_text_styles');
}

if (!function_exists('kloe_qodef_link_styles')) {

    function kloe_qodef_link_styles() {

        $link_styles = array();

        if(kloe_qodef_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = kloe_qodef_options()->getOptionValue('link_color');
        }
        if(kloe_qodef_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = kloe_qodef_options()->getOptionValue('link_fontstyle');
        }
        if(kloe_qodef_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = kloe_qodef_options()->getOptionValue('link_fontweight');
        }
        if(kloe_qodef_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = kloe_qodef_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo kloe_qodef_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_link_styles');
}

if (!function_exists('kloe_qodef_link_hover_styles')) {

    function kloe_qodef_link_hover_styles() {

        $link_hover_styles = array();

        if(kloe_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = kloe_qodef_options()->getOptionValue('link_hovercolor');
        }
        if(kloe_qodef_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = kloe_qodef_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo kloe_qodef_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(kloe_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = kloe_qodef_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo kloe_qodef_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_link_hover_styles');
}

if (!function_exists('kloe_qodef_smooth_page_transition_styles')) {

    function kloe_qodef_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(kloe_qodef_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = kloe_qodef_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.qodef-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo kloe_qodef_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(kloe_qodef_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = kloe_qodef_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.qodef-st-loader .pulse', 
            '.qodef-st-loader .double_pulse .double-bounce1', 
            '.qodef-st-loader .double_pulse .double-bounce2', 
            '.qodef-st-loader .cube', 
            '.qodef-st-loader .rotating_cubes .cube1', 
            '.qodef-st-loader .rotating_cubes .cube2', 
            '.qodef-st-loader .stripes > div', 
            '.qodef-st-loader .wave > div', 
            '.qodef-st-loader .two_rotating_circles .dot1', 
            '.qodef-st-loader .two_rotating_circles .dot2', 
            '.qodef-st-loader .five_rotating_circles .container1 > div', 
            '.qodef-st-loader .five_rotating_circles .container2 > div', 
            '.qodef-st-loader .five_rotating_circles .container3 > div', 
            '.qodef-st-loader .atom .ball-1:before', 
            '.qodef-st-loader .atom .ball-2:before', 
            '.qodef-st-loader .atom .ball-3:before', 
            '.qodef-st-loader .atom .ball-4:before', 
            '.qodef-st-loader .clock .ball:before', 
            '.qodef-st-loader .mitosis .ball', 
            '.qodef-st-loader .lines .line1', 
            '.qodef-st-loader .lines .line2', 
            '.qodef-st-loader .lines .line3', 
            '.qodef-st-loader .lines .line4', 
            '.qodef-st-loader .fussion .ball', 
            '.qodef-st-loader .fussion .ball-1', 
            '.qodef-st-loader .fussion .ball-2', 
            '.qodef-st-loader .fussion .ball-3', 
            '.qodef-st-loader .fussion .ball-4', 
            '.qodef-st-loader .wave_circles .ball', 
            '.qodef-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
            echo kloe_qodef_dynamic_css($spinner_selectors, $spinner_style);
        }
    }

    add_action('kloe_qodef_style_dynamic', 'kloe_qodef_smooth_page_transition_styles');
}