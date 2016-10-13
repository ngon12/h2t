<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	?>
	<div class="qodef-single-product-thumbs thumbnails <?php echo 'columns-' . $columns; ?> clearfix">

		<div class="qodef-thumbnail-holder">
		<?php
			if ( has_post_thumbnail() ) {
				$image = get_the_post_thumbnail( $post->ID, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail') );
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image ) );
			} else {
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'kloe' ) ) );
			}
		?>
		</div>
		<?php

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$image_class = esc_attr( implode( ' ', $classes ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			?>
			<div class="qodef-thumbnail-holder">
			<?php
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image, $image_link, $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class);
			?>
			</div>
			<?php
				$loop++;

		}

	?></div>
	<?php
}
