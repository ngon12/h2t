<?php
namespace KloeQodef\Modules\FixedBackgroundHolder;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class FixedBackgroundHolder implements ShortcodeInterface{
    private $base;
    function __construct() {
        $this->base = 'qodef_fixed_background_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map( array(
            'name' => 'Uncovering Background Holder',
            'base' => $this->base,
            'as_parent' => array('only' => 'qodef_fixed_background_item'),
            'content_element' => true,
            'category' => 'by SELECT',
            'icon' => 'icon-wpb-fixed-background-holder extended-custom-icon',
            'show_settings_on_create' => true,
            'js_view' => 'VcColumnView'
        ) );

    }

    public function render($atts, $content = null) {

        $html = '<div class="qodef-fixed-background">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        return $html;
    }

}