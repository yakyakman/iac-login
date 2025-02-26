<?php

namespace IAC_Login;

use WPHelper\Utility\Singleton;

/**
 * IAC_Login\IAC_Admin_Style
 * 
 * Common styles and IAC branding for all IAC WordPress installations (including local dev).
 * Very opinionated.
 * 
 * @since 0.4
 */
class IAC_Admin_Style {
	use Singleton;

	/**
	 * Constructor/Init
	 * 
	 * @since 0.4
	 */
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts',    [ $this, 'enqueue_iac_admin_style' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_iac_admin_style' ] );
	}

	/**
	 * IAC Admin Style
	 * 
	 * Common styles and IAC branding for all IAC WordPress installations (including local dev).
	 * Very opinionated.
	 * 
	 * @since 0.4
	 */
	function enqueue_iac_admin_style() {
		wp_enqueue_style( 'iac-admin', Config::url( 'css/iac-admin.css' ) );
	}

}
