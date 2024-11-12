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

}
