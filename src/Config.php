<?php

namespace IAC_Login;

use WPHelper\Utility\Singleton;
use WPHelper\Utility\PluginCoreStaticWrapper;

/**
 * IAC_Login\Config
 * 
 * Common styles and IAC branding for all IAC WordPress installations (including local dev).
 * Very opinionated.
 * 
 * @since 1.1
 */
class Config {
	use Singleton;
	use PluginCoreStaticWrapper;

	/**
	 * Constructor/Init
	 * 
	 * @since 1.1
	 */
	public function __construct( $plugin_core )
	{

		self::set_plugin_core( $plugin_core );

		Login_Page::init();

		IAC_Admin_Style::init();

	}

	/**
	 * Plugin Activate
	 * Create Maintenance Drop-In.
	 * 
	 * @since 1.1
	 */
	public static function activate() {
		$target = WP_CONTENT_DIR . '/maintenance.php';
		$origin = IAC_LOGIN_DIR . 'wp-content/maintenance.php';

		if ( defined( 'DISALLOW_FILE_MODS' ) && DISALLOW_FILE_MODS ) {
			return;
		}

		if ( ! file_exists( $origin ) ){
			trigger_error(__( 'File ' . $target . ' does not exists.' ), E_USER_ERROR);
		}

		if ( function_exists( 'symlink' ) ) {
			$success = @symlink( $origin, $target );
		}

		if ( ! function_exists( 'symlink' ) || ! $success ) {
			copy( $origin, $target);
		}
		
		// if ( ! file_exists( $target ) ) {
		// 	@trigger_error(__( 'Failed to create Maintenance drop-in.' ), E_USER_ERROR);
		// }
	}


	/**
	 * Plugin Deactivate
	 * Delete Maintenance Drop-In.
	 * 
	 * @since 1.1
	 */
	public static function deactivate() {
		$target = WP_CONTENT_DIR . '/maintenance.php';
		if ( file_exists( $target ) ) {
			@unlink( $target );
		}
	}
}
