<?php
/**
 * Plugin Name: IAC Login
 * Description: IAC Branding for login page.
 * Author: abuyoyo
 * Version: 0.2
 */

// vendor/autoload
// Allow all other loaders to fail before auto-loading 
if (
	(
		! class_exists( 'WPHelper\PluginCore' )
		||
		! trait_exists( 'WPHelper\Utility\Singleton' )
	)
	&&
	file_exists( __DIR__ . '/vendor/autoload.php' )
	
) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Fail gracefully
if ( ! class_exists('WPHelper\PluginCore') || ! trait_exists('WPHelper\Utility\Singleton') ) {
	return;
}

require_once 'Login_Page.php';

new WPHelper\PluginCore(__FILE__);

function iac_login_config() {
	new IAC_Login\Login_Page();
}
add_action( 'plugins_loaded', 'iac_login_config');
