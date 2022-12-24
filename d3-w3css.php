<?php

/**
* Plugin Name: D3 W3.CSS
* Plugin URI: https://www.derved.com/
* Description: Init W3.CSS
* Version: 0.1
* Author: DERVED®
* Author URI: https://www.derved.com/
**/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

$d3_w3css_plugin_dir_path = WP_PLUGIN_DIR . '/d3-w3css';

function init_d3_w3css() {
    include("templates/d3-w3css.php");
}

add_action( 'wp_head', 'init_d3_w3css' );