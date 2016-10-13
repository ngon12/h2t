<?php
namespace KloeQodef\Modules\InteractiveBanner;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class InteractiveBanner
 */
class InteractiveBanner implements ShortcodeInterface
{
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_interactive_banner';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap()	{

		vc_map( array(
			'name' => 'Interactive Banner',
			'base' => $this->base,
			'category' => 'by SELECT',
			'icon' => 'icon-wpb-interactive-banners extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type' => 'dropdown',
						'heading' => 'Type',
						'param_name' => 'type',
						'value' => array(
							'Info Over' => 'info-over',
							'Button Only' => 'button-only'
						),
						'description' => '',
						'save_always' 	=> true
					),
					array(
						'type' => 'attach_image',
						'heading' => 'Image',
						'param_name' => 'image'
					),
					array(
						'type' => 'textfield',
						'heading' => 'Title',
						'admin_label' => true,
						'param_name' => 'title',
						'dependency' => array('element' => 'type', 'value' => 'info-over')
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Title Tag',
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'dependency' => array('element' => 'title', 'not_empty' => true)
					),
					array(
						'type' => 'textfield',
						'heading' => 'Subtitle',
						'admin_label' => true,
						'param_name' => 'subtitle',
						'dependency' => array('element' => 'type', 'value' => 'info-over')
					),
					array(
						'type' => 'textfield',
						'heading' => 'Link',
						'param_name' => 'link',
						'description' => '',
						'admin_label' 	=> true
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Target',
						'param_name' => 'target',
						'value' => array(
								'' => '',
								'Self' => '_self',
								'Blank' => '_blank'
						),
						'description' => ''
					),
					array(
						'type' 			=> 'dropdown',
						'heading' 		=> 'Show Button',
						'param_name' 	=> 'show_button',
						'value' 		=> array(
							'Yes' 		=> 'yes',
							'No' 		=> 'no'
						),
						'admin_label' 	=> true,
						'save_always' 	=> true,
						'description' 	=> ''
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Type',
						'param_name'  => 'button_type',
						'value'       => array(
							'Default' => '',
							'Outline' => 'outline',
							'Solid'   => 'solid'
						),
						'save_always' => true,
						'admin_label' => true,
						'dependency' => array('element' => 'show_button', 'value' => array('yes'))
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Button Size',
						'param_name' => 'button_size',
						'value' => array(
								'Default' => '',
								'Small' => 'small',
								'Medium' => 'medium',
								'Large' => 'large',
								'Extra Large' => 'big_large'
						),
						'description' => '',
						'dependency' => array('element' => 'show_button', 'value' => array('yes'))
					),
					array(
						'type' => 'textfield',
						'heading' => 'Button Text',
						'param_name' => 'button_text',
						'admin_label' 	=> true,
						'description' => 'Default text is "button"',
						'dependency' => array('element' => 'show_button', 'value' => array('yes'))
					)
				)
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null){

		$args = array(
			'type' => 'info-over',
			'image' => '',
			'title' => '',
			'title_tag' => 'h3',
			'subtitle' => '',
			'link' => '',
			'target' => '_self',
			'show_button' => 'yes',
			'button_type' => '',
			'button_size' => '',
			'button_text' => 'button'
		);


		$args = array_merge($args);

		$params = shortcode_atts($args, $atts);

		$params['title_tag'] = $this->getNameTag($params, $args);
		$params['image_src'] = $this->getImage($params);
		$params['button_parameters'] = $this->getButtonParameters($params);

		//Get HTML from template based on type of interactive banner
		if($params['type'] == 'info-over') {
			$html = kloe_qodef_get_shortcode_module_template_part('templates/info-over', 'interactive-banner', '', $params);
		}
		else {
			$html = kloe_qodef_get_shortcode_module_template_part('templates/button-only', 'interactive-banner', '', $params);
		}

		return $html;

	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getNameTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	/**
	 * Return  image
	 *
	 * @param $params
	 * @return false|string
	 */
	private function getImage($params) {

		if (is_numeric($params['image'])) {
			$image_src = wp_get_attachment_url($params['image']);
		} else {
			$image_src = $params['image'];
		}
		return $image_src;

	}

	private function getButtonParameters($params) {
		$button_params_array = array();

		if(!empty($params['link'])) {
			$button_params_array['link'] = $params['link'];
		}

		if(!empty($params['button_type'])) {
			$button_params_array['type'] = $params['button_type'];
		}
		if(!empty($params['button_size'])) {
			$button_params_array['size'] = $params['button_size'];
		}

		if(!empty($params['target'])) {
			$button_params_array['target'] = $params['target'];
		}

		if(!empty($params['button_text'])) {
			$button_params_array['text'] = $params['button_text'];
		}

		return $button_params_array;
	}

}