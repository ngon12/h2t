<?php
namespace KloeQodef\Modules\ServiceTable;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ServiceTable implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'qodef_service_table';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map( array(
            'name' => 'Service Table',
            'base' => $this->base,
            'icon' => 'icon-wpb-service-table-item extended-custom-icon',
            'category' => 'by SELECT',
            'allowed_container_element' => 'vc_row',
            'as_child' => array('only' => 'qodef_service_tables'),
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Type',
                        'param_name' => 'type',
                        'value' => array(
                            'With Image' => 'with_image',
                            'With Icon' => 'with_icon'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                ),
                kloe_qodef_icon_collections()->getVCParamsArray(array('element' => 'type',  'value' => 'with_icon')),
                array(
                    array(
                        'type'       => 'attach_image',
                        'heading'    => 'Custom Image',
                        'param_name' => 'custom_image',
                        'dependency' => array('element' => 'type',  'value' => 'with_image')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => 'Background Color',
                        'param_name' => 'background_color',
                        'description' => ''
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
                        'heading' => 'Description',
                        'param_name' => 'description'
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
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Button Link',
                        'param_name' => 'link',
                        'dependency' => array('element' => 'show_button',  'value' => 'yes')
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {

        $args = array(
            'type'				=> 'with_image',
            'custom_image'		=> '',
            'background_color'	=> '',
            'title'		        => '',
            'title_tag'		    => 'h5',
            'description'		=> '',
            'show_button'		=> 'yes',
            'link'          	=> '',
            'button_text'   	=> 'Learn More'
        );
        $args = array_merge($args, kloe_qodef_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);
        extract($params);

        $html						= '';
        $service_table_clasess		= 'qodef-service-table ';

        $service_table_clasess .= $params['type'];

        $params['service_table_classes'] = $service_table_clasess;
        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['table_styles'] = $this->getTableStyle($params);

        $html .= kloe_qodef_get_shortcode_module_template_part('templates/service-table-template','service-table', '', $params);

        return $html;

    }

    private function getIconParameters($params)
    {
        $params_array = array();

        if ($params['type'] == 'with_icon') {
            $iconPackName = kloe_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack'] = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];
            $params_array['type'] = 'circle';
        }

        return $params_array;
    }

    private function getTableStyle($params) {

        $style = array();

        if($params['background_color'] != '') {
            $style[] = "background-color: "  .$params['background_color'];
        }

        return implode(';', $style);
    }
}