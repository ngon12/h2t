<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
<div class="qodef-related-posts-holder">
	<div class="qodef-related-posts-title">
		<h5><?php esc_html_e( 'Related Posts:', 'kloe' ); ?></h5>
	</div>
	<div class="qodef-related-posts-inner clearfix">
		<?php while ( $related_posts->have_posts() ) :
			$related_posts->the_post();
			?>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="qodef-related-post">
				<a href="<?php the_permalink(); ?> ">
					<div class="qodef-related-post-image">
						<?php
							the_post_thumbnail();
						?>
					</div>
				</a>
			</div>
			<?php endif;
		endwhile; ?>
	</div>
</div>
<?php endif;
wp_reset_postdata();
?>
