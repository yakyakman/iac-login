<?php

namespace IAC_Login;

use WPHelper\Utility\Singleton;

/**
 * IAC_Login\Login_Page
 * 
 * @since 0.1
 */
class Login_Page {
	use Singleton;

	/**
	 * Constructor/Init
	 * 
	 * @since 0.1
	 */
	public function __construct()
	{

		add_action( 'login_head', [ $this, 'iac_login_logo' ] );
		
		// add_filter( 'login_headerurl', fn($url) => 'ani-mator.com' );
		add_filter( 'login_headerurl', fn($url) => home_url() );
		// add_filter( 'login_headerurl', 'home_url' );

		add_action( 'login_enqueue_scripts', [ $this, 'iac_login_stylesheet'] );

		add_filter( 'login_site_html_link', '__return_empty_string' );
		
	}

	/**
	 * Print IAC logo on Login page.
	 * 
	 * @hook login_head
	 * 
	 * @since 0.1
	 */
	function iac_login_logo() {
		printf(
			'<style type="text/css">%s</style>',
			sprintf(
				'.login h1 a {background-image: url(%s) !important}',
				IAC_LOGIN_URL . 'icon/icon128.png'
			)
		);
	}

	/**
	 * IAC branded Login page.
	 * 
	 * @hook login_enqueue_scripts
	 * 
	 * @since 0.1
	 */
	function iac_login_stylesheet() {
		wp_enqueue_style( 'iac-login', IAC_LOGIN_URL . 'iac-login.css' );
	}

}
