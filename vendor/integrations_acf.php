<?php

class ACF_Integrations {
	/**
	 * Singleton instance.
	 *
	 * @var ACF_Integrations
	 */
	protected static $instance;

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 */
	protected function __construct() {
		// Loads external integrations.
		foreach ( glob( __DIR__ . '/*/load.php', GLOB_NOSORT ) as $load_script ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable
			require_once $load_script; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		}
	}

	/**
	 * Access to the single instance of the class.
	 *
	 * @since 1.7
	 *
	 * @return object
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

class_alias( 'ACF_Integrations', 'ACF_Plugins_Compat' ); // For Backward compatibility.
