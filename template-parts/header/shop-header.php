<?php
/**
 * Displays navigation for the Shop page.
 *
 * @package Mia&J
 * 
 */
?>

<h2 class="hidden">Header</h2>
<nav class="navbarShop fixed-top grey-border">
    <div class="navbarLogo"> 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img class="shop-logo" src="' . esc_url( $custom_logo_url ) . '" alt="mia and j logo">';
            ?>
        </a>
    </div>
    <div class="shopnavMenu right-grey-border">
        <div class="searchBox grey-left-border nav-item">
            <?php get_search_form(); ?>
        </div>
        <div class="userBox grey-left-border nav-item">
            <a class="nav-icon-inline" href="<?php echo esc_url( home_url( '/my-account' ) ); ?>"> <i class="icon-user"></i></a>
        </div>
        <div class="cartBox grey-left-border nav-item">
            <?php global $woocommerce; ?>
            <a class="nav-icon-inline" href="<?php echo $woocommerce->cart->get_cart_url();?>">
                <i class="icon-cart"></i>
            </a>
            <div class="cart-badge">
                <span class="cart-badge-value">
                <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'mia-and-j'),
                $woocommerce->cart->cart_contents_count);?>
                </span>
            </div>
        </div>
    </div>
</nav>