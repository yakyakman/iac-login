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
		
		// run late - just pass-through
		add_filter( 'wp_auth_check_load', [ $this, 'wp_auth_check_load' ], 20, 2 );
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

	/**
	 * Add IAC-Login stylesheet to wp_auth_check pages.
	 * 
	 * This is a fix to WordPress core's absurd height:98% iframe "Scrollbar fix". {@see wp-auth-check.css}
	 * We don't mess with the authentication check. Just pass-through.
	 *
	 * Returning a falsey value from the filter will effectively short-circuit
	 * loading the authentication check. {@see wp_auth_check_load()}
	 * 
	 * @since 0.5
	 *
	 * @param bool      $show   Whether to load the authentication check.
	 * @param WP_Screen $screen The current screen object.
	 */
	function wp_auth_check_load( $show, $screen ) {
		if ($show){
			$this->iac_login_stylesheet();
		}
		return $show;
	}
}
