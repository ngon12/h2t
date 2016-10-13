<?php
$blog_archive_pages_classes = kloe_qodef_blog_archive_pages_classes(kloe_qodef_get_default_blog_list());
?>
<?php get_header(); ?>
<?php get_template_part( 'title' ); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
	<?php do_action('kloe_qodef_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php kloe_qodef_get_blog(kloe_qodef_get_default_blog_list()); ?>
	</div>
	<?php do_action('kloe_qodef_before_container_close'); ?>
</div>
<?php get_footer(); ?>
