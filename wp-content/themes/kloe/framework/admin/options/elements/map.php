<?php

if ( ! function_exists('kloe_qodef_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function kloe_qodef_load_elements_map() {

		kloe_qodef_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => 'Elements',
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'kloe_qodef_options_elements_map' );

	}

	add_action('kloe_qodef_options_map', 'kloe_qodef_load_elements_map', 8);

}