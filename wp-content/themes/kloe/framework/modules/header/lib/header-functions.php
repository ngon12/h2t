<?php
use KloeQodef\Modules\Header\Lib;

if(!function_exists('kloe_qodef_set_header_object')) {
    function kloe_qodef_set_header_object() {
        $header_type = kloe_qodef_get_meta_field_intersect('header_type', kloe_qodef_get_page_id());

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'kloe_qodef_set_header_object', 1);
}