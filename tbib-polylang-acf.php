<?php
/**

 * Plugin Name:       TBIB Polylang ACF
 * Description:       Adds multilingual capability to ACF With Polylang
 * Version:           1.0
 * Requires at least: 5.4
 * Requires PHP:      5.6
 * Author:            Michelle Raouf - TBIB
 * **/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Don't access directly.
};
if(!class_exists('Polylang')){
    return;
}
require_once 'src/acf/load.php';

require_once ABSPATH . '/wp-content/plugins/tbib-update-plugin/tbib-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/the-best-is-best/tbib-polylang-acf/master/check.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'unique-plugin-or-theme-slug'
);