<?php
namespace KloeQodef\Modules\ProcessHolder;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessHolder implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'qodef_process_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map( array(
            'name' => 'Process Holder',
            'base' => $this->base,
            'as_parent' => array('only' => 'qodef_process_item'),
            'content_element' => true,
            'category' => 'by SELECT',
            'icon' => 'icon-wpb-process-holder extended-custom-icon',
            'show_settings_on_create' => true,
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => 'Columns',
                    'param_name' => 'columns',
                    'value' => array(
                        'Three'     => 'qodef-three-columns',
                        'Four'      => 'qodef-four-columns',
                        'Five'       => 'qodef-five-columns'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => 'Type',
                    'param_name' => 'type',
                    'value' => array(
                        'Standard'     => 'standard',
                        'With Arrows'     => 'with_arrows'
                    ),
                    'save_always' => true,
                    'description' => ''
                )
            ),
            'js_view' => 'VcColumnView'
        ) );

    }

    public function render($atts, $content = null) {
        $args = array(
            'columns'      => 'qodef-three-columns',
            'type'         => 'type1'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '<div class="qodef-process-holder clearfix '.$columns.' ' . $type . '">';
        $html .= '<div class="'.$columns.'-inner">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

}