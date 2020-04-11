<?php
/*
    Plugin Name: Woocommerce Shipping by Item Pricing
    description: This plugin makes it possible to price shipping by number of items.
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