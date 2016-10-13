<?php

if( !function_exists('kloe_qodef_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function kloe_qodef_search_body_class($classes) {

		if ( is_active_widget( false, false, 'qode_search_opener' ) ) {

			$classes[] = 'qodef-' . kloe_qodef_options()->getOptionValue('search_type');

			if ( kloe_qodef_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'qodef-' . kloe_qodef_options()->getOptionValue('search_animation');

			}

		}
		return $classes;

	}

	add_filter('body_class', 'kloe_qodef_search_body_class');
}

if ( ! function_exists('kloe_qodef_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kloe_qodef_get_search() {

		if ( kloe_qodef_active_widget( false, false, 'qode_search_opener' ) ) {

			$search_type = kloe_qodef_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				kloe_qodef_set_position_for_covering_search();
				return;
			}
			kloe_qodef_load_search_template();

		}
	}

}

if ( ! function_exists('kloe_qodef_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function kloe_qodef_set_position_for_covering_search() {

		$containing_sidebar = kloe_qodef_active_widget( false, false, 'qode_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'kloe_qodef_after_header_top_html_open', 'kloe_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'kloe_qodef_after_header_menu_area_html_open', 'kloe_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'kloe_qodef_after_mobile_header_html_open', 'kloe_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'kloe_qodef_after_header_logo_area_html_open', 'kloe_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'kloe_qodef_after_sticky_menu_html_open', 'kloe_qodef_load_search_template');
			}

		}

	}

}

if ( ! function_exists('kloe_qodef_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function kloe_qodef_set_search_position_in_menu( $type ) {

		add_action( 'kloe_qodef_after_header_menu_area_html_open', 'kloe_qodef_load_search_template');

	}
}

if ( ! function_exists('kloe_qodef_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function kloe_qodef_set_search_position_mobile() {

		add_action( 'kloe_qodef_after_mobile_header_html_open', 'kloe_qodef_load_search_template');

	}

}

if ( ! function_exists('kloe_qodef_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function kloe_qodef_load_search_template() {
		global $kloe_qodef_IconCollections;

		$search_type = kloe_qodef_options()->getOptionValue('search_type');

		$search_icon = '';
		$search_icon_close = '';
		if ( kloe_qodef_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $kloe_qodef_IconCollections->getSearchIcon( kloe_qodef_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = $kloe_qodef_IconCollections->getSearchClose( kloe_qodef_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> kloe_qodef_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		kloe_qodef_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}