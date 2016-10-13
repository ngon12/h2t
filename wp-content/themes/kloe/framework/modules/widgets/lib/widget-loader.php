<?php

if (!function_exists('kloe_qodef_register_widgets')) {

	function kloe_qodef_register_widgets() {

		$widgets = array(
			'KloeQodefFullScreenMenuOpener',
			'KloeQodefLatestPosts',
			'KloeQodefSearchOpener',
			'KloeQodefSideAreaOpener',
			'KloeQodefSocialIconWidget',
			'KloeQodefSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'kloe_qodef_register_widgets');