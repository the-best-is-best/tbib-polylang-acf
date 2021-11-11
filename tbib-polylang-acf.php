<?php

/**

 * Plugin Name:       TBIB Polylang ACF
 * Description:       Adds multilingual capability to ACF With Polylang
 * Version:           1.2
 * Requires at least: 5.4
 * Requires PHP:      5.6
 * Author:            Michelle Raouf - TBIB
 * **/


if (!defined('ABSPATH')) {
    exit; // Don't access directly.
};
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

add_action("plugins_loaded", "load", 15);

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
