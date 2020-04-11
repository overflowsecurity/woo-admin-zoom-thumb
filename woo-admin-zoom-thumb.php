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

?>