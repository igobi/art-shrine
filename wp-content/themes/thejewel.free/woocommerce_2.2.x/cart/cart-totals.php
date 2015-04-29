<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

    <?php do_action( 'woocommerce_before_cart_totals' ); ?>

        <table cellspacing="0">
            <thead>
            <tr>
                <th colspan="3"><h2><?php _e( 'CART TOTALS', 'yit' ) ?></h2></th>
            </tr>
            </thead>
            <tbody>

            <tr class="cart-subtotal">
                <th><?php _e( 'Cart Subtotal', 'yit' ); ?></th>
                <td colspan="2"><?php wc_cart_totals_subtotal_html(); ?></td>
            </tr>

            <?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
                <tr class="discount">
                    <th><?php _e( 'Coupon', 'yit' ); ?> <?php echo esc_html( $code ); ?></th>
                    <td colspan="2"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                </tr>
            <?php endforeach; ?>

            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping()  ) : ?>

                <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

                <?php wc_cart_totals_shipping_html(); ?>

                <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

            <?php endif ?>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                <tr class="fee fee-<?php echo $fee->id ?>">
                    <th><?php echo esc_html( $fee->name ); ?></th>
                    <td colspan="2"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                </tr>
            <?php endforeach; ?>

            <?php
            // Show the tax row if showing prices exclusive of tax only
            if ( WC()->cart->tax_display_cart == 'excl' ) {
                foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
                    echo '<tr class="tax-rate tax-rate-' . $code . '">
								<th>' . $tax->label . '</th>
								<td>' . $tax->formatted_amount . '</td>
							</tr>';
                }
            }
            ?>

            <?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
                <tr class="discount">
                    <th><?php _e( 'Coupon', 'yit' ); ?> <?php echo esc_html( $code ); ?></th>
                    <td colspan="2"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                </tr>
            <?php endforeach; ?>

            <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

            <tr class="total">
                <th><?php _e( 'Order Total', 'yit' ); ?></th>
                <td colspan="2"><?php wc_cart_totals_order_total_html(); ?></td>
            </tr>

            <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

            </tbody>
        </table>

        <?php if ( WC()->cart->get_cart_tax() ) : ?>

            <p><small><?php

                    $estimated_text = ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) ? sprintf( ' ' . __( ' (taxes estimated for %s)', 'yit' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'yit' ) ) : '';

                    printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'yit' ), $estimated_text );

                    ?></small></p>

        <?php endif; ?>


    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

    <div class="cart_update_checkout">
        <input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'yit' ); ?>" /> <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e( 'Checkout &rarr;', 'yit' ); ?>" />

        <?php do_action('woocommerce_proceed_to_checkout'); ?>
    </div>

</div>