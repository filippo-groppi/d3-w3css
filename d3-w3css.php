<?php

/**
* Plugin Name: D3 W3.CSS
* Plugin URI: https://www.derved.com/wp-plugins/d3-suite/d3-w3css
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


/**
 * Submenu Content
 */

function print_d3_w3css()  {
    include("templates/d3-submenu-page-content.php");
}


/**
 * Submenu Page
 */

function d3_w3css_admin_submenu()  {
    add_submenu_page(
        'd3-suite',
        'D3 W3CSS', // page title
        'D3 W3CSS', // menu title
        'manage_options', // capability
        'd3-w3css', // menu slug
        'print_d3_w3css'  // callback function
    );
}

/**
 * Menu Page
 */

function d3_w3css_admin_menu()
{
    global $menu;
    $menuExist = false;
    foreach ($menu as $item) {
        if (strtolower($item[0]) == strtolower('D3 Suite')) {
            $menuExist = true;
        }
    }
    if (!$menuExist) {
        add_menu_page(
            'D3 Suite', // page title
            'D3 Suite', // menu title
            'manage_options', // capability
            'd3-suite', // menu slug
            'd3_w3css_menus_print_d3_suite'  // callback function
        );
    }
    d3_w3css_admin_submenu();
}

add_action( 'admin_menu', 'd3_w3css_admin_menu' );