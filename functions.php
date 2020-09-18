<?php
/**
 * Mia&J functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mia&J
 *
 */

function mia_j_scripts() {

    //Function to load CSS Stylesheets
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css', array(), '4.5.0', 'all');
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/inc/css/fontello.css', array(), '1.0', 'all');
    wp_enqueue_style( 'mia-j-style', get_stylesheet_uri(), array(), '1.0', 'all');
    wp_enqueue_script( 'add-to-cart-ajax-js', get_template_directory_uri() . '/js/add-to-cart-ajax.js', array(), '1.0', true);
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array( 'jquery' ), '4.5.0', true);
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'mia_j_scripts' );


function mia_j_config() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    //The theme uses cookie menu as the global header.
    //Navigation menu is primarily used on the index page.
    //Shop header applied to everything after and onwards the Shop page.
    register_nav_menus(
        array(
            'Primary' => 'Navigation Menu',
            'Header' => 'Cookie Menu',
            'Shop Header' => 'Header Menu Shop'
        )
    );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    /* 
    * Adds WooCommerce support.
    * configuration to change shop loop settings.
    */
    add_theme_support( 'woocommerce', array(
        'product_grid' => array (
            'default_rows' => 14,
            'min_rows' => 3,
            'max_rows' => 14,
            'default_columns' => 1,
            'min_columns' => 1,
            'max_columns' => 1,
        )
    ) );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */

    add_theme_support( 'custom-logo', array(
        'height'      => 135,
        'width'       => 360,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );
}

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

add_filter('woocommerce_get_catalog_ordering_args', 'mia_j_woocommerce_catalog_orderby');
function mia_j_woocommerce_catalog_orderby( $args ) {
    $args['orderby'] = 'date';
    $args['order'] = 'desc'; 
    return $args;
}

//removes <a> after the <li> on the shop loop
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//cart notice box
remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_output_all_notices', 5 );

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
remove_action( 'woocommerce_cart_is_empty', 'woocommerce_output_all_notices', 5 );

//removes woocommerce cart-shop notices
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_output_all_notices', 5 );

add_action( 'woocommerce_cart_is_empty', 'mia_j_empty_cart_container_start', 10 );

function mia_j_empty_cart_container_start() {
    echo '<div class="col-8">';
}

add_action( 'woocommerce_cart_is_empty', 'mia_j_empty_cart_container_end', 10 );

function mia_j_empty_cart_container_end() {
    echo '</div>';
}

add_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 20 );
add_action( 'woocommerce_cart_is_empty', 'woocommerce_output_all_notices', 30 );

function mia_j_replace_shop_title() {
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    add_action( 'woocommerce_shop_loop_item_title', 'mia_j_product_title', 10 );
}

add_action( 'woocommerce_before_shop_loop_item', 'mia_j_replace_shop_title' );

function mia_j_product_title() {
    echo '<h3 class="wc-title">' . get_the_title() . '</h3>';
}

add_action( 'woocommerce_before_cart', 'mia_j_cart_start', 10);

function mia_j_cart_start() {
    echo '<div class="shop container-fluid">';
}

add_action( 'woocommerce_after_cart', 'mia_j_cart_end', 10);

function mia_j_cart_end() {
    echo '</div>';
}

add_filter( 'woocommerce_product_add_to_cart_text', 'mia_j_custom_cart_button_text' );
 
function mia_j_custom_cart_button_text() {
return __( 'add to cart', 'woocommerce' );
}

//Checkout Page
add_action( 'woocommerce_before_checkout_form', 'mia_j_checkout_main_container_start', 5 );

function mia_j_checkout_main_container_start() {
    echo '<div class="shop container-fluid">';
}

add_action( 'woocommerce_after_checkout_form', 'mia_j_checkout_main_container_end', 5 );

function mia_j_checkout_main_container_end() {
    echo '</div>';
}

add_action( 'woocommerce_checkout_before_order_review_heading', 'mia_j_checkout_order_container_start' );

function mia_j_checkout_order_container_start() {
    echo '<div class="col-lg-6 col-md-6 col-sm-12 order-details">';
} 

add_action( 'woocommerce_checkout_after_order_review', 'mia_j_checkout_order_container_end' );

function mia_j_checkout_order_container_end() {
    echo '</div">';
}

// woocommerce notices removed
remove_action( 'woocommerce_before_checkout_form_cart_notices', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 10);

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_shipping', 'woocommerce_checkout_payment', 20);

//removes dashboard link from the my-account menu.
add_filter( 'woocommerce_account_menu_items', 'mia_j_remove_my_account_dashboard' );

function mia_j_remove_my_account_dashboard( $menu_links ) {
	unset( $menu_links['dashboard'] );
	return $menu_links;
}

//redirection from /my-account to /my-account/orders on customer login.
add_action('template_redirect', 'mia_j_redirect_to_orders_from_dashboard' );

function mia_j_redirect_to_orders_from_dashboard() {
	if( is_account_page() && empty( WC()->query->get_current_endpoint() ) ){
		wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
		exit;
	}
}

add_action('init','prevent_access_to_product_page');
function prevent_access_to_product_page(){
    if ( is_product() ) {
        wp_redirect( site_url() );//will redirect to home page
    }
}

add_filter( 'woocommerce_states', 'mia_j_custom_woocommerce_states' );
    function mia_j_custom_woocommerce_states() {
    	global $states;

    	$states['IN'] = array(
			'DL' =>	__( 'Delhi' , 'woocommerce' ),
        	'UP' =>	__( 'Uttar Pradesh' , 'woocommerce' ),
        	'WB' =>	__( 'Bengal' , 'woocommerce' ),
        	'MH' =>	__( 'Maharashtra' , 'woocommerce' ),
        	'HR' =>	__( 'Haryana' , 'woocommerce' ),
        	'MP' =>	__( 'Madhya Pradesh' , 'woocommerce' ),
        	'TN' =>	__( 'Tamil Nadu' , 'woocommerce' ),
        	'RJ' =>	__( 'Rajasthan' , 'woocommerce' ),
        	'AP' =>	__( 'Andhra Pradesh' , 'woocommerce' ),
        	'GJ' =>	__( 'Gujarat' , 'woocommerce' ),
        	'PB' =>	__( 'Punjab' , 'woocommerce' ),
        	'KL' =>	__( 'Kerela' , 'woocommerce' ),
        	'CG' =>	__( 'Chhasttisgarh' , 'woocommerce' ),
        	'JK' =>	__( 'Jammu & Kashmir' , 'woocommerce' ),
        	'AR' =>	__( 'Arunachal Pradesh' , 'woocommerce' ),
        	'AS' =>	__( 'Assam' , 'woocommerce' ),
        	'BR' =>	__( 'Bihar' , 'woocommerce' ),
        	'JH' =>	__( 'Jharkhand' , 'woocommerce' ),
        	'MN' =>	__( 'Manipur' , 'woocommerce' ),
        	'ML' =>	__( 'Meghalaya' , 'woocommerce' ),
        	'OR' =>	__( 'Orissa' , 'woocommerce' ),
        	'RJ' =>	__( 'Rajasthan' , 'woocommerce' ),
        	'SK' =>	__( 'Sikkim' , 'woocommerce' ),
        	'TR' =>	__( 'Tripura' , 'woocommerce' ),
        	'UK' =>	__( 'Uttarakhand' , 'woocommerce' ),
        	'AN' =>	__( 'Andaman & Nicobar Islands' , 'woocommerce' ),
        	'CH' =>	__( 'Chandigarh' , 'woocommerce' ),
        	'DD' =>	__( 'Daman and Diu' , 'woocommerce' ),
        	'LD' =>	__( 'Lakshadweep' , 'woocommerce' ),
        	'PY' =>	__( 'Puducherry' , 'woocommerce' )
    	);
    	
    	return $states;
    }

// add_action('wp_ajax_mj_add_to_cart', 'mj_woocommerce_ajax_add_to_cart'); 

// add_action('wp_ajax_nopriv_mj_add_to_cart', 'mj_woocommerce_ajax_add_to_cart');          

// function mj_woocommerce_ajax_add_to_cart() {  

//     $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));

//     $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

//     $variation_id = absint($_POST['variation_id']);

//     $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

//     $product_status = get_post_status($product_id); 

//     if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 

//         do_action('woocommerce_ajax_added_to_cart', $product_id);

//             if ('yes' === get_option('woocommerce_cart_redirect_after_add')) { 

//                 wc_add_to_cart_message(array($product_id => $quantity), true); 

//             } 

//             WC_AJAX :: get_refreshed_fragments(); 

//             } else { 

//                 $data = array( 

//                     'error' => true,

//                     'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

//                 echo wp_send_json($data);

//             }

//             wp_die();

//         }

add_action('wp_ajax_woocommerce_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'woocommerce_ajax_add_to_cart');

add_action( 'after_setup_theme', 'mia_j_config', 0 );


