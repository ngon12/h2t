<?php

if ( file_exists( '../../../../../wp-load.php' ) ) {
    require_once( '../../../../../wp-load.php' );
} else {
    if ( file_exists( '../../../../../../wp-load.php' ) ) {
        require_once( '../../../../../../wp-load.php' );
    }
}

header("Content-type: text/css; charset=utf-8");

do_action('kloe_qodef_style_dynamic');