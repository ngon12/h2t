<?php

if(!function_exists('kloe_qodef_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function kloe_qodef_get_button_html($params) {
        $button_html = kloe_qodef_execute_shortcode('qodef_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}