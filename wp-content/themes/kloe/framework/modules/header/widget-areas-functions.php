<?php

if(!function_exists('kloe_qodef_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function kloe_qodef_register_top_header_areas() {
        $top_bar_layout  = kloe_qodef_options()->getOptionValue('top_bar_layout');
        $top_bar_enabled = kloe_qodef_options()->getOptionValue('top_bar');

        if($top_bar_enabled == 'yes') {
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'kloe'),
                'id'            => 'qodef-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'kloe'),
                    'id'            => 'qodef-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'kloe'),
                'id'            => 'qodef-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
        }
    }

    add_action('widgets_init', 'kloe_qodef_register_top_header_areas');
}

if(!function_exists('kloe_qodef_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function kloe_qodef_header_standard_widget_areas() {
        if(kloe_qodef_options()->getOptionValue('header_type') == 'header-standard') {
            register_sidebar(array(
                'name'          => esc_html__('Right From Main Menu', 'kloe'),
                'id'            => 'qodef-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-main-menu-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'kloe')
            ));
        }
    }

    add_action('widgets_init', 'kloe_qodef_header_standard_widget_areas');
}

if(!function_exists('kloe_qodef_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function kloe_qodef_header_vertical_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Vertical Area', 'kloe'),
            'id'            => 'qodef-vertical-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-area-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'kloe')
        ));
    }

    add_action('widgets_init', 'kloe_qodef_header_vertical_widget_areas');
}



if(!function_exists('kloe_qodef_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function kloe_qodef_register_mobile_header_areas() {
        if(kloe_qodef_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'kloe'),
                'id'            => 'qodef-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'kloe')
            ));
        }
    }

    add_action('widgets_init', 'kloe_qodef_register_mobile_header_areas');
}

if(!function_exists('kloe_qodef_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function kloe_qodef_register_sticky_header_areas() {
        if(in_array(kloe_qodef_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'kloe'),
                'id'            => 'qodef-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'kloe')
            ));
        }
    }

    add_action('widgets_init', 'kloe_qodef_register_sticky_header_areas');
}