<?php
/*
Plugin Name: WooCommerce field marketplace URL
Plugin URI: https://digitalmedia.name/
Description:  Add custom field “marketplace_url” to the WooCommerce products
Author: Bantuwebsite
Author URI: https://bantuwebsite.com/
Contributors: Nurcholis
Version: 2.0.0
License: MIT
Text Domain: wc-field-marketplace-url

*/

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'add_custom_woocommerce_general_field_marketplace_url' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'save_custom_woocommerce_general_field_marketplace_url' );

function add_custom_woocommerce_general_field_marketplace_url() {

  global $woocommerce, $post;

  echo '<div class="options_group">';
//tokopedia
	woocommerce_wp_text_input(
		array(
			'id'                => '_tokopedia_url',
			'label'             => __( 'Tokopedia URL', 'woocommerce' ),
			'placeholder'       => 'https://tokopedia.com/item',
			'desc_tip'          => 'true',
			'description'       => __( 'URL of product on the tokopedia site', 'woocommerce' ),
			'type'              => 'url',
			'data_type'         => 'url'
		)
	);
//shopee
	woocommerce_wp_text_input(
		array(
			'id'                => '_shopee_url',
			'label'             => __( 'Shopee URL', 'woocommerce' ),
			'placeholder'       => 'https://shopee.co.id/item',
			'desc_tip'          => 'true',
			'description'       => __( 'URL of product on the Shopee site', 'woocommerce' ),
			'type'              => 'url',
			'data_type'         => 'url'
		)
	);		
//Lazada
	woocommerce_wp_text_input(
		array(
			'id'                => '_lazada_url',
			'label'             => __( 'Lazada URL', 'woocommerce' ),
			'placeholder'       => 'https://lazada.co.id/item',
			'desc_tip'          => 'true',
			'description'       => __( 'URL of product on the Lazada site', 'woocommerce' ),
			'type'              => 'url',
			'data_type'         => 'url'
		)
	);
//Bukalapak
	woocommerce_wp_text_input(
		array(
			'id'                => '_bukalapak_url',
			'label'             => __( 'Bukalapak URL', 'woocommerce' ),
			'placeholder'       => 'https://bukalapak.com/item',
			'desc_tip'          => 'true',
			'description'       => __( 'URL of product on the Bukalapak site', 'woocommerce' ),
			'type'              => 'url',
			'data_type'         => 'url'
		)
	);
	echo '</div>';
}

function save_custom_woocommerce_general_field_marketplace_url( $post_id ) {
	// tokopedia
	$woocommerce_tokopedia_url = $_POST['_tokopedia_url'];
	if( !empty( $woocommerce_tokopedia_url ) ){
		update_post_meta( $post_id, '_tokopedia_url', esc_attr( $woocommerce_tokopedia_url ) );
		}else{
		delete_post_meta( $post_id,'_tokopedia_url',esc_attr($woocommerce_tokopedia_url ));
		}
	//shopee
	$woocommerce_shopee_url = $_POST['_shopee_url'];
	if( !empty( $woocommerce_shopee_url ) ){
		update_post_meta( $post_id, '_shopee_url', esc_attr( $woocommerce_shopee_url ) );
	}else{
	    delete_post_meta( $post_id, '_shopee_url', esc_attr( $woocommerce_shopee_url ) );
	}
	//lazada
	$woocommerce_lazada_url = $_POST['_lazada_url'];
	if( !empty( $woocommerce_shopee_url ) ){
		update_post_meta( $post_id, '_lazada_url', esc_attr( $woocommerce_lazada_url ) );
	}else{
	    delete_post_meta( $post_id, '_lazada_url', esc_attr( $woocommerce_lazada_url ) );
	}
	//bukalapak
	$woocommerce_bukalapak_url = $_POST['_bukalapak_url'];
	if( !empty( $woocommerce_bukalapak_url ) ){
		update_post_meta( $post_id, '_bukalapak_url', esc_attr( $woocommerce_bukalapak_url ) );
	}else{
	    delete_post_meta( $post_id, '_bukalapak_url', esc_attr( $woocommerce_bukalapak_url ) );
	}
}

// Display Front End
add_action( 'woocommerce_before_add_to_cart_button', 'add_content_before_addtocart_button_func' );

function add_content_before_addtocart_button_func() 
{
global $product;
$toped_url = get_post_meta( $product->get_id(), '_tokopedia_url', true );
$shope_url = get_post_meta( $product->get_id(), '_shopee_url', true );
$lazadas_url = get_post_meta($product->get_id(), '_lazada_url', true );
$ebukalapak_url = get_post_meta($product->get_id(), '_bukalapak_url', true );

if ( ! empty( $toped_url ) ) 
echo '<div class="second_content">
<a href="'. $toped_url .'" target="_blank"><img class="nmp" src="/wp-content/plugins/wc-field-marketplace-url/assets/tokopedia.png" alt="tokopedia"></a></div>';

if ( ! empty( $shope_url ) ) 
echo '<div class="second_content">
<a href="'. $shope_url .'" target="_blank"><img class="nmp" src="/wp-content/plugins/wc-field-marketplace-url/assets/shopee.png" alt="shopee"></a></div>';

if ( ! empty( $lazadas_url ) ) 
echo '<div class="second_content">
<a href="'. $lazadas_url .'" target="_blank"><img class="nmp" src="/wp-content/plugins/wc-field-marketplace-url/assets/lazada.png" alt="lazada"></a></div>';

if ( ! empty( $ebukalapak_url ) ) 
echo '<div class="second_content">
<a href="'. $ebukalapak_url .'" target="_blank"><img class="nmp" src="/wp-content/plugins/wc-field-marketplace-url/assets/bukalapak.png" alt="bukalapak"></a></div>';
}
