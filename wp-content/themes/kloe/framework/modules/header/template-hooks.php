<?php

//top header bar
add_action('kloe_qodef_before_page_header', 'kloe_qodef_get_header_top');

//mobile header
add_action('kloe_qodef_after_page_header', 'kloe_qodef_get_mobile_header');