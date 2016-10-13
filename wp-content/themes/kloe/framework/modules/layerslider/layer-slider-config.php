<?php
	if(!function_exists('kloe_qodef_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function kloe_qodef_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'kloe_qodef_layerslider_overrides');
	}
?>