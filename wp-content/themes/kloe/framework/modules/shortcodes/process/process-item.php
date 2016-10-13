<?php
namespace KloeQodef\Modules\ProcessItem;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface{

    private $base;

    function __construct() {
        $this->base = 'qodef_process_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => 'Process Item',
                'base' => $this->base,
                'allowed_container_element' => 'vc_row',
                'as_child' => array('only' => 'qodef_process_holder'),
                'category' => 'by SELECT',
                'icon' => 'icon-wpb-process-item extended-custom-icon',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => 'Number',
                        'param_name' => 'number',
                        'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Enable Small Title',
                        'param_name' => 'enable_small_title',
                        'value' => array(
                            'Yes'    => 'yes',
                            'No'     => 'no'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'Small Title',
                        'param_name' => 'small_title',
                        'admin_label' => true,
                        'description' => '',
                        'dependency' => array('element' => 'enable_small_title', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'Title',
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => ''
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
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => 'Text',
                        'param_name' => 'text',
                        'admin_label' => true,
                        'description' => ''
                    )
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'number' => '',
            'enable_small_title' => 'yes',
            'small_title' => '',
            'title' => '',
            'title_tag' => 'h3',
            'text' => '',
        );


        $params = shortcode_atts($args, $atts);

        $html = kloe_qodef_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);

        return $html;
    }

}