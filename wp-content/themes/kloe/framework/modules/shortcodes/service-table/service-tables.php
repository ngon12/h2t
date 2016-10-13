<?php
namespace KloeQodef\Modules\ServiceTables;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ServiceTables implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'qodef_service_tables';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map( array(
            'name' => 'Service Tables',
            'base' => $this->base,
            'as_parent' => array('only' => 'qodef_service_table'),
            'content_element' => true,
            'category' => 'by SELECT',
            'icon' => 'icon-wpb-service-tables extended-custom-icon',
            'show_settings_on_create' => true,
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Columns',
                    'param_name' => 'columns',
                    'value' => array(
                        'Three'     => 'qodef-three-columns',
                        'Four'      => 'qodef-four-columns',
                        'Five'      => 'qodef-five-columns'
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
            'columns'         => 'qodef-three-columns'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '<div class="qodef-service-tables clearfix '.$columns.'">';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;
    }

}