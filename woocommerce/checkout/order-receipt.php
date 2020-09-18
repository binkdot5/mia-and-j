<?php
/**
 * Checkout Order Receipt Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-receipt.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="shop container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <ul class="order_details lc">
            <li class="order">
                <?php esc_html_e( 'Order number: ', 'woocommerce' ); ?>
                <?php echo esc_html( $order->get_order_number() ); ?>
            </li>
            <li class="date">
                <?php esc_html_e( 'Date: ', 'woocommerce' ); ?>
                <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
            </li>
            <li class="total">
                <?php esc_html_e( 'Total: ', 'woocommerce' ); ?>
                <?php echo wp_kses_post( $order->get_formatted_order_total() ); ?>
            </li>
            <?php if ( $order->get_payment_method_title() ) : ?>
            <li class="method">
                <?php esc_html_e( 'Payment method: ', 'woocommerce' ); ?>
                <?php echo wp_kses_post( $order->get_payment_method_title() ); ?>
            </li>
            <?php endif; ?>
            </ul>

            <?php do_action( 'woocommerce_receipt_' . $order->get_payment_method(), $order->get_id() ); ?>

            <div class="clear"></div>
        </div>
    </div>
</div>
