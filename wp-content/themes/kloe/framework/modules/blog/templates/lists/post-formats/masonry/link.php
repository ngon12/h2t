<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-post-info">
					<?php kloe_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'no', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
				<?php kloe_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h3')); ?>
			</div>
		</div>
	</div>
</article>