<?php

if(!function_exists('kloe_qodef_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function kloe_qodef_register_sidebars() {

        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

    }

    add_action('widgets_init', 'kloe_qodef_register_sidebars');
}

if(!function_exists('kloe_qodef_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates KloeQodefSidebar object
     */
    function kloe_qodef_add_support_custom_sidebar() {
        add_theme_support('KloeQodefSidebar');
        if (get_theme_support('KloeQodefSidebar')) new KloeQodefSidebar();
    }

    add_action('after_setup_theme', 'kloe_qodef_add_support_custom_sidebar');
}
