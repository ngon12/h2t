<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php kloe_qodef_get_module_template_part('templates/lists/parts/gallery', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-post-info">
					<?php kloe_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'no', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
				<?php kloe_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php
					the_content();
				?>
			</div>
		</div>
	</div>
	<div class="qodef-post-info-bottom clearfix">
		<?php do_action('kloe_qodef_before_blog_article_closed_tag'); ?>
	</div>
</article>