<?php
/**
 * Woocommerce helper functions
 */

if(!function_exists('kloe_qodef_woocommerce_assets')) {
    /**
     * Function that includes all necessary scripts for WooCommerce if installed
     */
    function kloe_qodef_woocommerce_assets() {
        //is woocommerce installed?
        if(kloe_qodef_is_woocommerce_installed()) {
            if(kloe_qodef_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style('qode_woocommerce', QODE_ASSETS_ROOT.'/css/woocommerce.min.css');

                //is responsive option turned on?
                if(kloe_qodef_options()->getOptionValue('responsiveness') == 'yes') {
                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('qode_woocommerce_responsive', QODE_ASSETS_ROOT.'/css/woocommerce-responsive.min.css');
                }
            }
        }
    }

    add_action('wp_enqueue_scripts', 'kloe_qodef_woocommerce_assets');
}

if (!function_exists('kloe_qodef_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function kloe_qodef_woocommerce_body_class( $classes ) {
		if(kloe_qodef_is_woocommerce_page()) {
			$classes[] = 'qodef-woocommerce-page';
			if (is_singular('product')) {
				$classes[] = 'qodef-woocommerce-single-page';
			}
		}
		return $classes;
	}

	add_filter('body_class', 'kloe_qodef_woocommerce_body_class');

}

if(!function_exists('kloe_qodef_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function kloe_qodef_woocommerce_columns_class($classes) {

		if(in_array('woocommerce', $classes)) {

			$products_list_number = kloe_qodef_options()->getOptionValue('qodef_woo_product_list_columns');
			$classes[] = $products_list_number;

		}

		return $classes;
	}

	add_filter('body_class', 'kloe_qodef_woocommerce_columns_class');
}

if(!function_exists('kloe_qodef_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function kloe_qodef_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if(!function_exists('kloe_qodef_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 * @param boolean
	 * @see is_shop()
	 */
	function kloe_qodef_is_woocommerce_shop($include_single = true) {
		if($include_single) {
			return function_exists('is_shop') && (is_shop() || is_product());
		}
		else {
			return function_exists('is_shop') && is_shop();
		}
	}
}

if(!function_exists('kloe_qodef_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function kloe_qodef_get_woo_shop_page_id() {
		if(kloe_qodef_is_woocommerce_installed()) {
			return get_option('woocommerce_shop_page_id');
		}
	}
}

if(!function_exists('kloe_qodef_is_product_category')) {
	function kloe_qodef_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('kloe_qodef_is_product_tag')) {
	function kloe_qodef_is_product_tag() {
		return function_exists('is_product_tag') && is_product_tag();
	}
}

if(!function_exists('kloe_qodef_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see kloe_qodef_is_woocommerce_page()
	 * @see kloe_qodef_has_woocommerce_shortcode()
	 * @see kloe_qodef_has_woocommerce_widgets()
	 * @return bool
	 */

	function kloe_qodef_load_woo_assets() {
		return kloe_qodef_is_woocommerce_installed() && (kloe_qodef_is_woocommerce_page() ||
			kloe_qodef_has_woocommerce_shortcode() || kloe_qodef_has_woocommerce_widgets());
	}
}

if(!function_exists('kloe_qodef_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function kloe_qodef_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking',
			'add_to_cart',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = kloe_qodef_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('kloe_qodef_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function kloe_qodef_has_woocommerce_widgets() {
		$widgets_array = array(
			'qodef_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('kloe_qodef_get_woocommerce_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function kloe_qodef_get_woocommerce_pages() {
		$woo_pages_array = array();

		if(kloe_qodef_is_woocommerce_installed()) {
			if(get_option('woocommerce_shop_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_shop_page_id'));
			}
			if(get_option('woocommerce_cart_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_cart_page_id'));
			}
			if(get_option('woocommerce_checkout_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_checkout_page_id'));
			}
			if(get_option('woocommerce_pay_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_pay_page_id '));
			}
			if(get_option('woocommerce_thanks_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_thanks_page_id '));
			}
			if(get_option('woocommerce_myaccount_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_myaccount_page_id '));
			}
			if(get_option('woocommerce_edit_address_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_edit_address_page_id '));
			}
			if(get_option('woocommerce_view_order_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_view_order_page_id '));
			}
			if(get_option('woocommerce_terms_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_terms_page_id '));
			}

			$woo_products = get_posts(array('post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => '-1'
			));

			foreach($woo_products as $product) {
				$woo_pages_array[] = get_permalink($product->ID);
			}
		}

		return $woo_pages_array;
	}

}

if(!function_exists('kloe_qodef_woocommerce_share')) {
    /**
     * Function that social share for product page
     * Return array array of WooCommerce pages
     */
    function kloe_qodef_woocommerce_share()
    {
        if (kloe_qodef_is_woocommerce_installed()) {

            if (kloe_qodef_options()->getOptionValue('enable_social_share') == 'yes'
                && kloe_qodef_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
                echo kloe_qodef_get_social_share_html();
            endif;
        }
    }

}

if(!function_exists('kloe_qodef_woocommerce_add_meta_box')) {
	/**
	 * Function that adds meta box field to product needed for masonry layout
	 */
	function kloe_qodef_woocommerce_add_meta_box() {
		$meta_box = kloe_qodef_add_meta_box(array(
			'scope' => 'product',
			'title' => 'Product Masonry Settings',
			'name'  => 'product-settings-meta-box'
		));

		kloe_qodef_add_meta_box_field(array(
			'name'        => 'shop_masonry_dimensions',
			'type'        => 'select',
			'label'       => 'Dimensions for Masonry',
			'description' => 'Choose image dimensions for Masonry Shop list',
			'parent'      => $meta_box,
			'options'     => array(
				'default'            => 'Default',
				'large_width'        => 'Large width',
				'large_height'       => 'Large height',
				'large_width_height' => 'Large width/height'
			)
		));
	}

	add_action('kloe_qodef_meta_boxes_map', 'kloe_qodef_woocommerce_add_meta_box');
}

if (!function_exists('kloe_qodef_get_woocommerce_out_of_stock')) {
	/**
	 * Function that prints html with out of stock text if product is out of stock
	 */
	function kloe_qodef_get_woocommerce_out_of_stock(){

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="qodef-out-of-stock-button"><span class="qodef-out-of-stock-button-inner">' . esc_html__("Out of stock!", "kloe") . '</span></span>';
		}


	}
}


