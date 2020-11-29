<?php
/* Woocommerce */
/********************************
* Only load Woocommerce scripts on woo pages
********************************/
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );

function dequeue_woocommerce_styles_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            # Styles
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            # Scripts
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}

/**************************************************
*check for empty-cart get param to clear the cart
**************************************************/
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
  global $woocommerce;
	
	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart(); 
	}
}

/**************************************************
*Add all WooCommerce roles to wordpress Editor
**************************************************/
function add_theme_caps() {
    $role = get_role( 'editor' );
	//for woocommerce
    $role->add_cap("manage_woocommerce");
    $role->add_cap("view_woocommerce_reports");
    $role->add_cap("edit_product");
    $role->add_cap("read_product");
    $role->add_cap("delete_product");
    $role->add_cap("edit_products");
    $role->add_cap("edit_others_products");
    $role->add_cap("publish_products");
    $role->add_cap("read_private_products");
    $role->add_cap("delete_products");
    $role->add_cap("delete_private_products");
    $role->add_cap("delete_published_products");
    $role->add_cap("delete_others_products");
    $role->add_cap("edit_private_products");
    $role->add_cap("edit_published_products");
    $role->add_cap("manage_product_terms");
    $role->add_cap("edit_product_terms");
    $role->add_cap("delete_product_terms");
    $role->add_cap("assign_product_terms");
    $role->add_cap("edit_shop_order");
    $role->add_cap("read_shop_order");
    $role->add_cap("delete_shop_order");
    $role->add_cap("edit_shop_orders");
    $role->add_cap("edit_others_shop_orders");
    $role->add_cap("publish_shop_orders");
    $role->add_cap("read_private_shop_orders");
    $role->add_cap("delete_shop_orders");
    $role->add_cap("delete_private_shop_orders");
    $role->add_cap("delete_published_shop_orders");
    $role->add_cap("delete_others_shop_orders");
    $role->add_cap("edit_private_shop_orders");
    $role->add_cap("edit_published_shop_orders");
    $role->add_cap("manage_shop_order_terms");
    $role->add_cap("edit_shop_order_terms");
    $role->add_cap("delete_shop_order_terms");
    $role->add_cap("assign_shop_order_terms");
    $role->add_cap("edit_shop_coupon");
    $role->add_cap("read_shop_coupon");
    $role->add_cap("delete_shop_coupon");
    $role->add_cap("edit_shop_coupons");
    $role->add_cap("edit_others_shop_coupons");
    $role->add_cap("publish_shop_coupons");
    $role->add_cap("read_private_shop_coupons");
    $role->add_cap("delete_shop_coupons");
    $role->add_cap("delete_private_shop_coupons");
    $role->add_cap("delete_published_shop_coupons");
    $role->add_cap("delete_others_shop_coupons");
    $role->add_cap("edit_private_shop_coupons");
    $role->add_cap("edit_published_shop_coupons");
    $role->add_cap("manage_shop_coupon_terms");
    $role->add_cap("edit_shop_coupon_terms");
    $role->add_cap("delete_shop_coupon_terms");
    $role->add_cap("assign_shop_coupon_terms");
    $role->add_cap("edit_shop_webhook");
    $role->add_cap("read_shop_webhook");
    $role->add_cap("delete_shop_webhook");
    $role->add_cap("edit_shop_webhooks");
    $role->add_cap("edit_others_shop_webhooks");
    $role->add_cap("publish_shop_webhooks");
    $role->add_cap("read_private_shop_webhooks");
    $role->add_cap("delete_shop_webhooks");
    $role->add_cap("delete_private_shop_webhooks");
    $role->add_cap("delete_published_shop_webhooks");
    $role->add_cap("delete_others_shop_webhooks");
    $role->add_cap("edit_private_shop_webhooks");
    $role->add_cap("edit_published_shop_webhooks");
    $role->add_cap("manage_shop_webhook_terms");
    $role->add_cap("edit_shop_webhook_terms");
    $role->add_cap("delete_shop_webhook_terms");
    $role->add_cap("assign_shop_webhook_terms");
}
add_action( 'admin_init', 'add_theme_caps');

/******************************
*Get all Current Items in cart
*******************************/
function get_cart_content() {
	
	$content = WC()->cart->cart_contents;
	
	$output = '';
	foreach( $content as $item ) {
		// Get the image and your specified image size.
		$image = get_the_post_thumbnail($item['product_id'], 'small_thumb' );
		
		$output .=' <div class="top-cart-item clearfix">
                        <div class="top-cart-item-image">
                            <a href="'. get_the_permalink($item['product_id']) .'">'. $image .'</a>
                        </div>
                        <div class="top-cart-item-desc">
                            <a href="'. get_the_permalink($item['product_id']) .'">'. get_the_title( $item['product_id'] ) .'</a>
                            <span class="top-cart-item-price">£ '. number_format($item['data']->price,2) .'</span>
                            <span class="top-cart-item-quantity">x '. $item['quantity'] .'</span>
                       </div>
                    </div>';
		
	}
	
	return $output;
}


/******************************
*Declare theme support
*******************************/
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
?>