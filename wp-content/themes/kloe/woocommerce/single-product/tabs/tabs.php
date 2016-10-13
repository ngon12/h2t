<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="qodef-accordion-holder qodef-accordion qodef-boxed clearfix woocommerce-accordions wc-tabs-wrapper">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<h5 class="clearfix qodef-title-holder">
					<span class="qodef-accordion-mark qodef-left-mark">
						<span class="qodef-accordion-mark-icon">
							<i class="fa fa-minus"></i>
							<i class="fa fa-plus"></i>
						</span>
					</span>
					<span class="qodef-tab-title">
						<span class="qodef-tab-title-inner">
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
						</span>
					</span>
			</h5>
			<div class="qodef-accordion-content">
				<div class="qodef-accordion-content-inner">
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>

<?php endif; ?>
