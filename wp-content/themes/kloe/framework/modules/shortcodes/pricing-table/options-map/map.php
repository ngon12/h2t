<?php

if ( ! function_exists('kloe_qodef_pricing_table_options_map') ) {
	/**
	 * Add Pricing Table options to elements page
	 */
	function kloe_qodef_pricing_table_options_map() {

		$panel_pricing_table = kloe_qodef_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_pricing_table',
				'title' => 'Pricing Table'
			)
		);

	}

	add_action( 'kloe_qodef_options_elements_map', 'kloe_qodef_pricing_table_options_map');

}