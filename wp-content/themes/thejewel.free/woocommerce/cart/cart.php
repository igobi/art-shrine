<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();
?>

<?php do_action( 'woocommerce_before_cart' ); ?>
<div class="row">
    <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
		<?php wp_nonce_field( 'woocommerce-cart' ) ?>
		<div class="span9">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <table class="shop_table cart" cellspacing="0">
                <thead>
                    <tr><th colspan="6"><h2><?php _e( 'Shopping Cart', 'yit' ); ?></h2></th></tr>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php _e( 'Product', 'yit' ); ?></th>
                    <th class="product-price"><?php _e( 'Price', 'yit' ); ?></th>
                    <th class="product-quantity"><?php _e( 'Quantity', 'yit' ); ?></th>
                    <th class="product-subtotal"><?php _e( 'Total', 'yit' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                        $_product = $values['data'];
                        if ( $_product->exists() && $values['quantity'] > 0 ) {
                            ?>
                            <tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
                                <!-- Remove from cart link -->
                                <td class="product-remove">
                                    <?php
                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'yit' ) ), $cart_item_key );
                                    ?>
                                </td>

                                <!-- The thumbnail -->
                                <td class="product-thumbnail">
                                    <?php
                                    $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );

                                    if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
                                        echo $thumbnail;
                                    else
                                        printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
                                    ?>
                                </td>

                                <!-- Product Name -->
                                <td class="product-name">
                                    <?php
                                    if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
                                        echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
                                    else
                                        printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

                                    // Meta data
                                    echo $woocommerce->cart->get_item_data( $values );

                                    // Backorder notification
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
                                        echo '<p class="backorder_notification">' . __( 'Available on backorder', 'yit' ) . '</p>';
                                    ?>
                                </td>

                                <!-- Product price -->
                                <td class="product-price">
                                    <?php
                                    $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                                    echo apply_filters('woocommerce_cart_item_price_html', wc_price( $product_price ), $values, $cart_item_key );
                                    ?>
                                </td>

                                <!-- Quantity inputs -->
                                <td class="product-quantity">
                                    <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {

                                        $step	= apply_filters( 'woocommerce_quantity_input_step', '1', $_product );
                                        $min 	= apply_filters( 'woocommerce_quantity_input_min', '', $_product );
                                        $max 	= apply_filters( 'woocommerce_quantity_input_max', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product );

                                        $product_quantity = sprintf( '<div class="quantity"><input type="number" name="cart[%s][qty]" step="%s" min="%s" max="%s" value="%s" size="4" title="' . _x( 'Qty', 'Product quantity input tooltip', 'yit' ) . '" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $step, $min, $max, esc_attr( $values['quantity'] ) );
                                    }

                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                                    ?>
                                </td>

                                <!-- Product subtotal -->
                                <td class="product-subtotal">
                                    <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                }

                do_action( 'woocommerce_cart_contents' );
                ?>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                </tbody>
            </table>

            <div class="row-fluid">
                <div class="span5">
                    <?php if ( WC()->cart->coupons_enabled() ) : ?>
                        <div class="cart-collaterals">
                            <h2><?php _e( 'Coupon', 'yit' ); ?></h2>
                            <p class="form-row form-row-wide">
                                <input name="coupon_code" class="input-text" id="coupon_code" value="" />
                            </p>
                            <p class="form-row form-row-wide">
                                <input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'yit' ); ?>" />
                            </p>
                            <?php do_action('woocommerce_cart_coupon'); ?>

                        </div>
                    <?php endif ?>
                </div>
                <div class="span7">
                    <div class="cart-collaterals">
                        <?php woocommerce_shipping_calculator(); ?>
                    </div>
                </div>
            </div>

            <?php do_action( 'woocommerce_after_cart_table' ); ?>
        </div>
        <div class="span3">
            <div class="cart-collaterals">


                <?php woocommerce_cart_totals(); ?>



            </div>
        </div>


    </form>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>