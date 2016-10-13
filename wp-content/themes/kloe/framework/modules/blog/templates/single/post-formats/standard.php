<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-info">
			<?php kloe_qodef_post_info(array(
				'date' => 'yes',
				'category' => 'no',
				'author' => 'no',
				'comments' => 'no',
				'like' => 'no'
			)) ?>
		</div>
		<?php kloe_qodef_get_module_template_part('templates/single/parts/title', 'blog'); ?>
		<?php kloe_qodef_get_module_template_part('templates/single/parts/image', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner clearfix">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="qodef-post-info-bottom clearfix">
		<?php do_action('kloe_qodef_before_blog_article_closed_tag'); ?>
	</div>
</article>