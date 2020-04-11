<?php
/*
    Plugin Name: Woocommerce Admin Zoom Thumb
    description: This plugin makes products on the All Products page in the backend enlarge on mouseover to make it easier to see them.
    Author: Justin Tharpe
    Version: Beta 1.0.0
*/


if (!defined('ABSPATH')) die('No direct access allowed');

function create_admin_zoom(){

    // Update CSS within in Admin
    function admin_style() {
    wp_enqueue_style('admin-styles', get_plugin_directory_uri().'/css/jt_admin.css');
  
  }
  add_action('admin_enqueue_scripts', 'admin_style');
}

new create_admin_zoom();