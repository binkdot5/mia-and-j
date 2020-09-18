<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="row">
	<div class="col-12">
		<h5>shopping cart</h5>
	</div>
</div>

	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<div id="cart" class="shop_table shop_table_responsive woocommerce-cart-form__contents">
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>
						<div class="col-8 cart-items-headings">
							<div class="product-thumbnail">
								<h5 class="product-price"><?php esc_html_e( 'price', 'woocommerce' ); ?></h5>
							</div>
							<div class="product-quantity">
								<h5 class="product-quantity"><?php esc_html_e( 'quantity', 'woocommerce' ); ?></h5>
							</div>
							<div class="product-subtotal">
								<h5 class="product-subtotal"><?php esc_html_e( 'subtotal', 'woocommerce' ); ?></h5>
							</div>
						</div>
						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
									<ul class="cart-items-photo lsn">
										<li class="product-thumbnail center-align">
											<div class="cart-items">
												<?php
												$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

												if ( ! $product_permalink ) {
													echo $thumbnail; // PHPCS: XSS ok.
												} else {
													printf( '<a href="%s">%s</a>', esc_url( $thumbnail ), $thumbnail ); // PHPCS: XSS ok.
												}
												?>
											</div>
										</li>
									</ul>

									<ul class="cart-items-info lsn">

										<li class="product-price center-align" data-title="<?php esc_attr_e( 'price', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</li>
										
										<li class="product-quantity center-align" data-title="<?php esc_attr_e( 'quantity', 'woocommerce' ); ?>">
											<?php
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => '0',
															'product_name' => $_product->get_name(),
														),
														$_product,
														false
													);
												}

												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
											?>
										</li>

										<li class="product-subtotal center-align" data-title="<?php esc_attr_e( 'subtotal', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</li>

										<li class="product-remove center-align">
											<?php
												echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														esc_html__( 'remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
													),
													$cart_item_key
												);
											?>
										</li>
									</ul>
								</div>
								<?php
							}
						}
						?>

						<?php do_action( 'woocommerce_cart_contents' ); ?>
						<ul class="lsn">
							<li class="actions">
								<button type="submit" class="update-cart-button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'update cart', 'woocommerce' ); ?></button>
								
								<?php do_action( 'woocommerce_cart_actions' ); ?>

								<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</li>
						</ul>
						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</div>
			</div>	
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>

			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
	</div>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<?php get_template_part( '/template-parts/cart/cart-footer', 'cart'); ?>

<?php do_action( 'woocommerce_after_cart' ); ?>
