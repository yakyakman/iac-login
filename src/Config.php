<?php

namespace IAC_Login;

use WPHelper\Utility\Singleton;

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

	/**
	 * Constructor/Init
	 * 
	 * @since 1.1
	 */
	public function __construct()
	{

		Login_Page::init();

		IAC_Admin_Style::init();

	}

}
