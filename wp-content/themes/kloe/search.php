<?php $sidebar = kloe_qodef_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 
global $wp_query;

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(kloe_qodef_options()->getOptionValue('blog_page_range') != ""){
	$blog_page_range = esc_attr(kloe_qodef_options()->getOptionValue('blog_page_range'));
} else{
	$blog_page_range = $wp_query->max_num_pages;
}
?>
<?php get_template_part( 'title' ); ?>
	<div class="qodef-container">
		<?php do_action('kloe_qodef_after_container_open'); ?>
		<div class="qodef-container-inner clearfix">
			<div class="qodef-container">
				<?php do_action('kloe_qodef_after_container_open'); ?>
				<div class="qodef-container-inner" >
					<div class="qodef-blog-holder qodef-blog-type-standard">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="qodef-post-content">
							<div class="qodef-post-text">
								<div class="qodef-post-text-inner">
									<h2>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h2>
									<?php
										kloe_qodef_read_more_button();
									?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php
						if(kloe_qodef_options()->getOptionValue('pagination') == 'yes') {
							kloe_qodef_pagination($wp_query->max_num_pages, $blog_page_range, $paged);
						}
					?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'kloe'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('kloe_qodef_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('kloe_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>