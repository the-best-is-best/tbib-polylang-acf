<?php

require_once plugin_dir_path( __FILE__ )   . '../../vendor/integrations_acf.php';
require_once plugin_dir_path( __FILE__ )   . 'acf.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Don't access directly.
};

add_action(
	'after_setup_theme',
	function() {
		if ( defined( 'ACF_VERSION' ) && version_compare( ACF_VERSION, '5.7.11', '>=' ) ) {
			add_action( 'init', array( ACF_Integrations::instance()->acf = new TBIB_ACF(), 'init' ) );
		}
	}
);
