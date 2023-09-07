<?php
/*
 * Plugin Name:       custom-product
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            nibedita
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:        custom-product
 * Domain Path:       /languages
 */

 if(!defined('ABSPATH')){
    exit;
    }
    $dir=Plugin_dir_path(__FILE__);
    $url=Plugin_dir_url(__FILE__);
    
    
    define("PRODUCT_PLUGIN_PATH",$dir);
    define("PRODUCT_PLUGIN_URL",$url);
    include PRODUCT_PLUGIN_PATH."includes/class-manage-product-system.php";
    