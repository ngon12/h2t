<?php
/**
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>
<li>
   	<div class="qodef-product-list-widget-image-wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo kloe_qodef_kses_img($product->get_image()); ?>
		</a>
	</div>
	<div class="qodef-product-list-widget-info-wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<span class="qodef-product-title"><?php print $product->get_title(); ?></span>
		</a>
		<div class="qodef-product-list-widget-price-wrapper">
			<?php echo wp_kses_post($product->get_price_html()); ?>
		</div>
	</div>
</li>