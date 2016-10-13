<?php

if(!function_exists('kloe_qodef_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function kloe_qodef_is_responsive_on() {
        return kloe_qodef_options()->getOptionValue('responsiveness') !== 'no';
    }
}
