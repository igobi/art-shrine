<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();
?>

<div class="cart-empty">

    <p><?php _e( 'Your cart is currently empty.', 'yit' ) ?></p>
    
    <?php do_action('woocommerce_cart_is_empty'); ?>
    
    <p><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php _e( 'Return To Shop &gt;', 'yit' ) ?></a></p>

</div>