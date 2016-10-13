<?php // This line is needed for mixItUp gutter ?>
<article class="qodef-portfolio-item mix <?php echo esc_attr($categories)?>" >
	<a class ="qodef-portfolio-link" href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target) ?>">
	<div class = "qodef-item-image-holder">
		<span class="qodef-item-image-overlay"></span>
	<?php
		echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
	?>				
	</div>
	<div class="qodef-item-text-overlay">
		<div class="qodef-item-text-overlay-inner">
			<div class="qodef-item-text-holder">
				<?php
				echo $category_html;
				?>
				<<?php echo esc_attr($title_tag)?> class="qodef-item-title">
					<?php echo esc_attr(get_the_title()); ?>
				</<?php echo esc_attr($title_tag)?>>	

			</div>
		</div>	
	</div>
	</a>
</article>
<?php // This line is needed for mixItUp gutter ?>
