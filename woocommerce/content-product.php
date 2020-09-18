<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'mia-j', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	?>
	
	<div class="anchor" id="<?php the_field('title_number'); ?>">&nbsp;</div>
    
	<div class="row freespace">

		<div class="shop-loop col-6">
	
			<div class="cookieTitle"> 

				<h2><?php the_field('title_number'); ?></h2>

				<?php

				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
				
				?>

			</div>

			<div class="shopText extra-margin">
				<?php the_content(); ?>
			</div>

			<div class="row">
				<div class="col-9 shopText">
					<p class="no-margin">
						<?php the_field('nutritional_information'); ?>
					</p>
				</div>
				<div class="col-3">
					<img class="veganism" src="<?php the_field('mandatory_symbol') ?>">
				</div>
			</div>
    
			
	
		</div>

		<div class="col-6 shopRight">

			<div class="product-image">

				<?php

				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );

				?>

			</div>
			
			<?php

			/**
			 * Should come after action (wc_shop_loop_title_item)
			 * 
			 */

			do_action( 'woocommerce_before_add_to_cart_form' );
			do_action( 'woocommerce_before_add_to_cart_button' ); 

			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
			add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
			add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
			add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
			add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
			add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
			do_action( 'woocommerce_before_quantity_input_field' );
			do_action( 'woocommerce_after_quantity_input_field' );
			do_action( 'woocommerce_after_add_to_cart_button' );
			do_action( 'woocommerce_after_add_to_cart_form' );

			?>

			<div class="packaging-info">

				<?php 
					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				
				<p><?php the_field('net_qty'); ?>
				<br />
				<?php the_field('best_before'); ?></p>

				<div class="add-to-cart">
					<?php

					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' );

					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="anchor-bottom">&nbsp;</div>
