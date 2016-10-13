<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>

<div class="qodef-single-product-images images">
	<?php do_action('kloe_qodef_woocommerce_out_of_stock_single_action'); ?>
	<?php do_action('kloe_qodef_woocommerce_sale_single_action'); ?>
	<div class="qodef-single-product-images-holder">
	<div class="qodef-single-product-slider">

		<?php
		if ( has_post_thumbnail() ) {

			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
			) );

			$attachment_count = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'kloe' ) ), $post->ID );

		}

		if ( $attachment_count > 0 ) {

			$attachment_ids = $product->get_gallery_attachment_ids();
			foreach ( $attachment_ids as $attachment_id ) {
				$image_link = wp_get_attachment_image_src($attachment_id, 'full');
				$image = wp_get_attachment_image($attachment_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));
				echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" itemprop="image" class="woocommerce-main-image zoom" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link[0], $image));
			}
		}
		?>


	</div>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>
<?php if($product->is_type( 'variable' )){?>
	<div class="qodef-variation-images">
		<?php
		$attachment_id   = get_post_thumbnail_id($post->ID);
		$image_src_thumb = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail' );
		$image_src_original = wp_get_attachment_image_src($attachment_id, 'full' );?>
		<span class="qodef-variation-image"
			  data-original-image = '<?php print esc_attr($image_src_original[0]); ?>'
			  data-thumb-image = '<?php print esc_attr($image_src_thumb[0]); ?>'>
		</span>
		<?php
		$variable_product = new WC_Product_Variable($product);
		$variations = $variable_product->get_available_variations();
		foreach($variations as $variation) {
			if ( has_post_thumbnail($variation['variation_id'])) {
				$attachment_id   = get_post_thumbnail_id($variation['variation_id']);
				$image_src_thumb = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail' );
				$image_src_original = wp_get_attachment_image_src($attachment_id, 'full' );
				$image_src_set = $variation['image_srcset'];
				$image_sizes = $variation['image_sizes'];

				?>
				<span class="qodef-variation-image"
					  data-original-image = '<?php print esc_attr($image_src_original[0]); ?>'
					  data-thumb-image = '<?php print esc_attr($image_src_thumb[0]); ?>'
					  data-image-srcset = '<?php print esc_attr($image_src_set); ?>'
					  data-image-sizes = '<?php print esc_attr($image_sizes); ?>'>
				</span>
				<?php
			}
		}
		?>
	</div>
<?php } ?>