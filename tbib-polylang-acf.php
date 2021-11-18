<?php

/**

 * Plugin Name:       TBIB Polylang ACF
 * Description:       Adds multilingual capability to ACF With Polylang
 * Version:           1.2
 * Requires at least: 5.4
 * Requires PHP:      5.6
 * Text Domain:       tbib-polylang-acf
 * Author:            Michelle Raouf - TBIB
 * **/


if (!defined('ABSPATH')) {
    exit; // Don't access directly.
};
require_once __DIR__ .'/vendor/autoload.php';
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
define('TBIB_POLYLANG_DEMO_ACF_FILE', __FILE__); // This file.

define('TBIB_POLYLANG_DEMO_ACF_BASENAME', plugin_basename(TBIB_POLYLANG_DEMO_ACF_FILE)); // Plugin name as known by WP.



add_action("plugins_loaded", "load", 15);
$actve = new RequirementsPolylangACF();
if(!$actve){
    return;
}
function load()
{

    if (!class_exists('Polylang')) {
        return;
    }
    require_once 'src/acf/load.php';

    if (!class_exists('Puc_v4p11_Autoloader') || !is_plugin_active('tbib-update-plugin/tbib-update-checker.php')) {
        return;
    }
    require_once ABSPATH . '/wp-content/plugins/tbib-update-plugin/tbib-update-checker.php';
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://raw.githubusercontent.com/the-best-is-best/tbib-polylang-acf/master/check.json',
        __FILE__, //Full path to the main plugin file or functions.php.
        'tbib-polylang-acf'
    );
}
