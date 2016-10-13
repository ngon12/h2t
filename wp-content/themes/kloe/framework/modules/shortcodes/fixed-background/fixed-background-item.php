<?php
namespace KloeQodef\Modules\FixedBackgroundItem;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class FixedBackgroundItem implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'qodef_fixed_background_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map( array(
            'name' => 'Uncovering Background Item',
            'base' => $this->base,
            'icon' => 'icon-wpb-fixed-background-item extended-custom-icon',
            'category' => 'by SELECT',
            'allowed_container_element' => 'vc_row',
            'as_child' => array('only' => 'qodef_fixed_background_holder'),
            'params' => array_merge(
                array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => 'Background Image',
                        'param_name' => 'background_image'
                    ),
                    array(
                        'type'       => 'attach_image',
                        'heading'    => 'Responsive Background Image',
                        'param_name' => 'featured_image',
                        'description' => 'Upload an image that will appear as the featured image on screens smaller than 768px.'
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => 'Background Color',
                        'param_name' => 'background_color',
                        'description' => 'Choose a background color for this Uncovering Background Item.'
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Title',
                        'param_name' => 'title',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => 'Title Tag',
                        'param_name' => 'title_tag',
                        'value'      => array(
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
                        'admin_label' => true,
                        'heading' => 'Subtitle',
                        'param_name' => 'subtitle',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => 'Subtitle Tag',
                        'param_name' => 'subtitle_tag',
                        'value'      => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                        ),
                        'dependency' => array('element' => 'subtitle', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Description',
                        'param_name' => 'description'
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Item Style',
                        'param_name' => 'style',
                        'value' => array(
                            'Dark' => 'dark',
                            'Light' => 'light'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Button',
                        'param_name' => 'show_button',
                        'value' => array(
                            'Default' => '',
                            'Yes' => 'yes',
                            'No' => 'no'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Button Text',
                        'param_name' => 'button_text',
                        'dependency' => array('element' => 'show_button',  'value' => 'yes')
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
                        'admin_label' => true,
                        'heading' => 'Button Link',
                        'param_name' => 'link',
                        'dependency' => array('element' => 'show_button',  'value' => 'yes')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => 'Button Target',
                        'param_name' => 'button_target',
                        'value' => array(
                            '' => '',
                            'Self' => '_self',
                            'Blank' => '_blank'
                        ),
                        'description' => '',
                        'dependency' => array('element' => 'show_button', 'value' => array('yes'))
                    )

                )
            )
        ));
    }

    public function render($atts, $content = null) {

        $args = array(
            'background_image'	=> '',
            'featured_image'	=> '',
            'title'		        => '',
            'title_tag'		    => 'h2',
            'subtitle'		    => '',
            'subtitle_tag'		    => 'h6',
            'description'		=> '',
            'show_button'		=> 'yes',
            'link'          	=> '',
            'button_size'       => '',
            'button_text'   	=> 'Learn More',
            'style'             => 'dark',
            'background_color'  => '',
            'button_target'     => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $item_clasess = '';

        $item_clasess .= $params['style'];

        $params['item_clasess'] = $item_clasess;
        $params['background_style'] = $this->getBackgroundStyle($params);
        $params['button_parameters'] = $this->getButtonParameters($params);

        $html = '';

        $html .= kloe_qodef_get_shortcode_module_template_part('templates/fixed-background-item','fixed-background', '', $params);
        return $html;

    }

    private function getBackgroundStyle($params) {

        $style = array();
        $image_src = '';

        if($params['background_color'] != '') {
            $style[] = "background-color: "  .$params['background_color'];
        }

        if (is_numeric($params['background_image'])) {
            $image_src = wp_get_attachment_url($params['background_image']);
        } else {
            $image_src = $params['background_image'];
        }


        if($params['background_image'] != '') {
            $style[] = "background-image:url(" .$image_src. ")";
        }

        return implode(';', $style);

    }

    private function getButtonParameters($params) {
        $button_params_array = array();

        if(!empty($params['button_link'])) {
            $button_params_array['link'] = $params['button_link'];
        }

        if(!empty($params['button_size'])) {
            $button_params_array['size'] = $params['button_size'];
        }

        if(!empty($params['button_target'])) {
            $button_params_array['target'] = $params['button_target'];
        }

        if(!empty($params['button_text'])) {
            $button_params_array['text'] = $params['button_text'];
        }

        return $button_params_array;
    }

}