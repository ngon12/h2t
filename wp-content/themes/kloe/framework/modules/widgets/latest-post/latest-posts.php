<?php

class KloeQodefLatestPosts extends KloeQodefWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'qodef_latest_posts_widget', // Base ID
			'Select Latest Post', // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'kloe' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'widget_title',
				'type' => 'textfield',
				'title' => 'Widget Title'
			),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => 'Number of posts'
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => 'Order By',
				'options' => array(
					'title' => 'Title',
					'date' => 'Date'
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => 'Order',
				'options' => array(
					'ASC' => 'ASC',
					'DESC' => 'DESC'
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => 'Category Slug'
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => 'Number of characters'
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => 'Title Tag',
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'minimal';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h4';
		}

		echo '<div class="widget qodef-latest-posts-widget">';

		if(!empty($params['widget_title'])){
			echo '<h5 class="qodef-latest-posts-widget-title">' . $params['widget_title'] .'</h5>';
		}
		
		echo kloe_qodef_execute_shortcode('qodef_blog_list', $params);

		echo '</div>'; //close qodef-latest-posts-widget
	}
}
