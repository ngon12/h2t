<?php // This line is needed for mixItUp gutter ?>

<article class="qodef-portfolio-item mix <?php echo esc_attr($categories)?>">
	<div class = "qodef-item-image-holder">		
		<a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target) ?>">
			<?php
				echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
			?>
			<span class="qodef-item-image-overlay"></span>
		</a>
		<?php echo $icon_html; ?>
	</div>
	<div class="qodef-item-text-holder">
		<<?php echo esc_attr($title_tag)?> class="qodef-item-title">
			<a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target) ?>">
				<?php echo esc_attr(get_the_title()); ?>
			</a>	
		</<?php echo esc_attr($title_tag)?>>	
		<?php
		echo $category_html;
		?>
	</div>
</article>

<?php // This line is needed for mixItUp gutter ?>