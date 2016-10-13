<?php

if ( ! function_exists('kloe_qodef_like') ) {
	/**
	 * Returns KloeQodefLike instance
	 *
	 * @return KloeQodefLike
	 */
	function kloe_qodef_like() {
		return KloeQodefLike::get_instance();
	}

}

function kloe_qodef_get_like() {

	echo wp_kses(kloe_qodef_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('kloe_qodef_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function kloe_qodef_like_latest_posts() {
		return kloe_qodef_like()->add_like();
	}

}

if ( ! function_exists('kloe_qodef_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function kloe_qodef_like_portfolio_list($portfolio_project_id) {
		return kloe_qodef_like()->add_like_portfolio_list($portfolio_project_id);
	}

}