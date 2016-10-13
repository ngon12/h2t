<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="quantity qodef-quantity-buttons">
	<span class="qodef-quantity-minus"><i class="fa fa-minus"></i></span><input type="text" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'kloe' ) ?>" class="input-text qty text qodef-quantity-input" size="4" /><span class="qodef-quantity-plus"><i class="fa fa-plus"></i></span>
</div>

<!--<input type="number" step="--><?php //echo esc_attr( $step ); ?><!--" --><?php //if ( is_numeric( $min_value ) ) : ?><!--min="--><?php //echo esc_attr( $min_value ); ?><!--"--><?php //endif; ?><!-- --><?php //if ( is_numeric( $max_value ) ) : ?><!--max="--><?php //echo esc_attr( $max_value ); ?><!--"--><?php //endif; ?><!-- name="--><?php //echo esc_attr( $input_name ); ?><!--" value="--><?php //echo esc_attr( $input_value ); ?><!--" title="--><?php //echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'kloe' ) ?><!--" class="input-text qty text" size="4" />-->
