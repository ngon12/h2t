<?php

namespace QodeCore\CPT\Testimonials\Shortcodes;


use QodeCore\Lib;

/**
 * Class Testimonials
 * @package QodeCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'qodef_testimonials';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map()
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                'name' => 'Testimonials',
                'base' => $this->base,
                'category' => 'by SELECT',
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Testimonial Type',
                        'param_name' => 'type',
                        'value' => array(
                            'Boxed' => 'boxed',
                            'Standard' => 'standard'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Skin',
                        'param_name' => 'skin',
                        'value' => array(
                            'Dark' => 'dark',
                            'Light' => 'light'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
						'admin_label' => true,
                        'heading' => 'Category',
                        'param_name' => 'category',
                        'value' => '',
                        'description' => 'Category Slug (leave empty for all)'
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Number',
                        'param_name' => 'number',
                        'value' => '',
                        'description' => 'Number of Testimonials'
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Title',
                        'param_name' => 'show_title',
                        'value' => array(
                            'Yes' => 'yes',
                            'No' => 'no'
                        ),
						'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Author',
                        'param_name' => 'show_author',
                        'value' => array(
                            'Yes' => 'yes',
                            'No' => 'no'
                        ),
						'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => 'Show Author Job Position',
                        'param_name' => 'show_position',
                        'value' => array(
                            'Yes' => 'yes',
							'No' => 'no',
                        ),
						'save_always' => true,
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'description' => ''
                    ), 
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => 'Animation speed',
                        'param_name' => 'animation_speed',
                        'value' => '',
                        'description' => __('Speed of slide animation in miliseconds', 'select-core')
                    )
                )
            ) );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {
        
        $args = array(
            'type' => 'boxed',
            'skin' => 'dark',
            'number' => '-1',
            'category' => '',
            'show_title' => 'yes',
            'show_author' => 'yes',
            'show_position' => 'yes',
            'animation_speed' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);

        $number = esc_attr($number);
        $category = esc_attr($category);
        $animation_speed = esc_attr($animation_speed);
		
		$data_attr = $this->getDataParams($params);
		$query_args = $this->getQueryParams($params);

		$html = '';
        $html .= '<div class="qodef-testimonials-holder clearfix">';
        $html .= '<div class="qodef-testimonials ' . $type . ' ' . $skin . '" ' .$data_attr.'>';
        $i = 0;
        $opened = false;

        query_posts($query_args);
        if (have_posts()) :
            while (have_posts()) : the_post();

                $i++;

                $testimonial_title = get_the_title();
                $author = get_post_meta(get_the_ID(), 'qodef_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'qodef_testimonial_text', true);
                $title = get_post_meta(get_the_ID(), 'qodef_testimonial_title', true);
                $job = get_post_meta(get_the_ID(), 'qodef_testimonial_author_position', true);

                $params['testimonial_title'] = $testimonial_title;
				$params['author'] = $author;
				$params['text'] = $text;
				$params['title'] = $title;
				$params['job'] = $job;
				$params['current_id'] = get_the_ID();

                if($i%3 == 1 && $type == 'boxed'){
                    $html .= '<div class="qodef-testimonials-slider-item">';
                    $opened = true;
                }
				
				$html .= qode_core_get_shortcode_module_template_part('testimonials','testimonials-template', '', $params);

                if($i%3 == 0 && $type == 'boxed') {
                    $html .= '</div>';
                    $opened = false;
                }
				
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'select-core');
        endif;

        wp_reset_query();
        if($opened && $type == 'boxed') {
            $html .= '</div>';
        }
        $html .= '</div>';
		$html .= '</div>';
		
        return $html;
    }
	/**
    * Generates testimonial data attribute array
    *
    * @param $params
    *
    * @return string
    */
	private function getDataParams($params){
		$data_attr = '';
		
		if(!empty($params['animation_speed'])){
			$data_attr .= ' data-animation-speed ="' . $params['animation_speed'] . '"';
		}
		
		return $data_attr;
	}
	/**
    * Generates testimonials query attribute array
    *
    * @param $params
    *
    * @return array
    */
	private function getQueryParams($params){
		
		$args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials_category'] = $params['category'];
        }
		return $args;
	}
	 
}