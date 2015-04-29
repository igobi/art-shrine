<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

?>
	<table class="shop_table woocommerce-checkout-review-order-table">
		<thead>
			<tr>
				<th class="product-name"><?php _e('Product', 'yit'); ?></th>
				<th class="product-quantity"><?php _e('Qty', 'yit'); ?></th>
				<th class="product-total"><?php _e('Totals', 'yit'); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
				if (sizeof(WC()->cart->get_cart())>0) :
					foreach (WC()->cart->get_cart() as $item_id => $values) :
						$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
							echo '
								<tr class = "' . esc_attr( apply_filters('woocommerce_checkout_table_item_class', 'checkout_table_item', $values, $item_id ) ) . '">
									<td class="product-name">'.$_product->get_title().WC()->cart->get_item_data( $values ).'</td>
									<td class="product-quantity">'.$values['quantity'].'</td>
									<td class="product-total">' . apply_filters( 'woocommerce_checkout_item_subtotal', WC()->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $item_id ) . '</td>
								</tr>';
						endif;
					endforeach;
				endif;

				do_action( 'woocommerce_cart_contents_review_order' );
			?>
		</tbody>
        <tfoot>

        <tr class="cart-subtotal">
            <th colspan="2"><?php _e('Cart Subtotal', 'yit'); ?></th>
            <td><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr>


        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action('woocommerce_review_order_before_shipping'); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php do_action('woocommerce_review_order_after_shipping'); ?>

        <?php endif; ?>

        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <tr class="fee fee-<?php echo $fee->id ?>">
                <th colspan="2"><?php echo $fee->name ?></th>
                <td><?php
                    if ( $woocommerce->cart->tax_display_cart == 'excl' )
                        echo wc_price( $fee->amount );
                    else
                        echo wc_price( $fee->amount + $fee->tax );
                    ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if ( WC()->cart->tax_display_cart === 'excl' ) : ?>
            <?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
                <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                    <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                        <th><?php echo esc_html( $tax->label ); ?></th>
                        <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="tax-total">
                    <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                    <td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <tr class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
                <th><?php _e( 'Coupon:', 'yit' ); ?> <?php echo esc_html( $code ); ?></th>
                <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <tr class="total">
            <th colspan="2"><?php _e('Order Total', 'yit'); ?></th>
            <td><strong><?php wc_cart_totals_order_total_html(); ?></strong></td>
        </tr>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

        </tfoot>
	</table>