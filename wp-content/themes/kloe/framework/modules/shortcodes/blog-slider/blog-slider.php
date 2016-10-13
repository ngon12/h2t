<?php

namespace KloeQodef\Modules\BlogSlider;

use KloeQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogSlider implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'qodef_blog_slider';

        add_action('vc_before_init', array($this,'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }
    public function vcMap() {

        vc_map( array(
            'name' => 'Blog Slider',
            'base' => $this->base,
            'icon' => 'icon-wpb-blog-slider extended-custom-icon',
            'category' => 'by SELECT',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Number of Posts',
                    'param_name' => 'number_of_posts',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Order By',
                    'param_name' => 'order_by',
                    'value' => array(
                        'Title' => 'title',
                        'Date' => 'date'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Order',
                    'param_name' => 'order',
                    'value' => array(
                        'ASC' => 'ASC',
                        'DESC' => 'DESC'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Category Slug',
                    'param_name' => 'category',
                    'description' => 'Leave empty for all or use comma for list'
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => 'Number of Items',
                    'param_name' => 'number_of_items',
                    'value' => array(
                        'Three' => '3',
                        'Four' => '4',
                        'Five' => '5',
                        'Six' => '6'
                    ),
                    'description' => '',
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => 'Title Tag',
                    'param_name' => 'title_tag',
                    'value' => array(
                        ''   => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => ''
                )
            )
        ) );

    }
    public function render($atts, $content = null) {

        $default_atts = array(
            'number_of_posts' => '',
            'order_by' => '',
            'order' => '',
            'category' => '',
            'number_of_items' => '3',
            'title_tag' => 'h2'
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $queryArray = $this->generateBlogQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;
        $params['data_params'] = $this->getDataAtts($params);

        $html ='';
        $html .= kloe_qodef_get_shortcode_module_template_part('templates/blog-slider-holder', 'blog-slider', '', $params);
        return $html;

    }


    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generateBlogQueryArray($params){

        $queryArray = array(
            'orderby' => $params['order_by'],
            'order' => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'category_name' => $params['category']
        );
        return $queryArray;
    }

    private function getDataAtts($params) {
        $data = array();;

        if($params['number_of_items'] != '') {
            $data['data-number-of-items'] = $params['number_of_items'];
        }

        return $data;
    }

}
