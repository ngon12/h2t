<?php
namespace KloeQodef\Modules\Tab;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Tab
 */

class Tab implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => 'Tab',
			'base' => $this->getBase(),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'qodef_tabs'),
			'is_container' => true,
			'category' => 'by SELECT',
			'icon' => 'icon-wpb-tab-item extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array_merge(
				 \KloeQodefIconCollections::get_instance()->getVCParamsArray(),
				array(
					array(
						'type' => 'textfield',
						'admin_label' => true,
						'heading' => 'Title',
						'param_name' => 'title',
						'description' => ''
					)
				)
			)
		));

	}

	public function render($atts, $content = null) {
		
		$default_atts = array(
			'title' => 'Tab',
			'tab_id' => ''
		);
		
		$default_atts = array_merge($default_atts, kloe_qodef_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);
		extract($params);
		
		$iconPackName = kloe_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$params['icon'] = $params[$iconPackName];
		$params['content'] = $content;

		$rand_number = rand(0, 1000);
		$params['title'] = $params['title'].'-'.$rand_number;
		
		$output = '';
		$output .= kloe_qodef_get_shortcode_module_template_part('templates/tab_content','tabs', '', $params);
		return $output;

	}
}