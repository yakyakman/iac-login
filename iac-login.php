<?php
/**
 * Plugin Name: IAC Login
 * Description: IAC Branding for login page, admin dashboard and toolbar.
 * Author: abuyoyo
 * Version: 1.1.2
 * Release Date: 26-02-2025
 * Update URI: https://github.com/yakyakman/iac-login
 */

// vendor/autoload
// Allow all other loaders to fail before auto-loading 
if (
	(
		! class_exists( 'WPHelper\PluginCore' )
		||
		! trait_exists( 'WPHelper\Utility\Singleton' )
		||
		! trait_exists( 'WPHelper\Utility\PluginCoreStaticWrapper' )
	)
	&&
	file_exists( __DIR__ . '/vendor/autoload.php' )
) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Fail gracefully
if (
	! class_exists( 'WPHelper\PluginCore' )
	||
	! trait_exists( 'WPHelper\Utility\Singleton' )
	||
	! trait_exists( 'WPHelper\Utility\PluginCoreStaticWrapper' )
) {
	return;
}

require_once __DIR__ . '/autoload.php';

new WPHelper\PluginCore(
	__FILE__,
	[
		'activate_cb'    => [ IAC_Login\Config::class, 'activate' ],
		'deactivate_cb'  => [ IAC_Login\Config::class, 'deactivate' ],
		'update_checker' => [ 'auth'=> $yakyakman_oauth ?? null ],
	]
);

add_action( 'plugins_loaded', fn() => IAC_Login\Config::init( __FILE__ ) );
