<?php
/*
    Plugin Name: Woocommerce Admin Zoom Thumb
    description: This plugin makes products on the All Products page in the backend enlarge on mouseover to make it easier to see them.
    Author: Justin Tharpe
    Version: Beta 1.0.0
*/


if (!defined('ABSPATH')) die('No direct access allowed');

function create_admin_zoom(){

    wp_register_style( 'jt-style', plugins_url('/css/jt_admin.css', __FILE__) );
    wp_enqueue_style( 'jt-style' );
}
add_action('admin_enqueue_scripts', 'create_admin_zoom');




add_filter( 'manage_edit-product_columns', 'jt_image_column', 20 );
function jt_image_column( $columns_array ) {
 
	// I want to display Images column just after the product name column
	return array_slice( $columns_array, 0, 3, true )
	+ array( 'jtimage' => 'Image' )
	+ array_slice( $columns_array, 3, NULL, true );
 
 
}

add_filter( 'manage_edit-product_columns', 'jt_prodid_column', 20 );
function jt_prodid_column( $columns_array ) {
 
	// I want to display Images column just after the product name column
	return array_slice( $columns_array, 0, 3, true )
	+ array( 'jtprodid' => 'Product ID' )
	+ array_slice( $columns_array, 3, NULL, true );
 
 
}

add_action( 'manage_posts_custom_column', 'jt_populate_prodid' );
function jt_populate_prodid( $column_name ) {
 
	if( $column_name  == 'jtprodid' ) {
        $product = get_the_ID();

        echo "<p>" . $product . "</p>";
    }

}
 
add_action( 'manage_posts_custom_column', 'jt_populate_image' );
function jt_populate_image( $column_name ) {
 
	if( $column_name  == 'jtimage' ) {
		// if you suppose to display multiple brands, use foreach();
        $x = $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'medium' ); 
        
        echo '
        <script src=' . plugins_url('/js/jt_admin.js', __FILE__) . '></script>
        <img id="myImg" src="' . $x[0] . '" alt="" ">
        ';
    }
 
}
?>