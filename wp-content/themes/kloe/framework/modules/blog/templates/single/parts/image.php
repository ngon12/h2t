<?php if ( has_post_thumbnail() && (kloe_qodef_options()->getOptionValue('blog_single_show_featured_image') == 'yes')) { ?>
	<div class="qodef-post-image">
			<?php the_post_thumbnail('full'); ?>
	</div>
<?php } ?>