<?php
/**

 * Plugin Name:       TBIB Polylang ACF
 * Description:       Adds multilingual capability to ACF With Polylang
 * Version:           1.1
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
