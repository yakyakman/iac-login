<?php
namespace WPHelper\Utility;

use WPHelper\PluginCore;

/**
 * PluginCoreStaticWrapper trait
 * 
 * Expose PluginCore instance methods as static methods. \
 * Requires WPHelper\PluginCore >= 0.28
 * 
 * @package WPHelper\Utility
 * 
 * @since 0.10
 * @since 0.11 Getter method plugin_core()
 * @since 0.12 Utility method cache_buster()
 */
trait PluginCoreStaticWrapper {

	/** @var PluginCore */
	protected static $plugin_core;

	/** @var string */
	protected static $cache_buster;

	/**
	 * Set protected static plugin_core instance.
	 * Run this method from constructor.
	 * 
	 * @since 0.10
	 * 
	 * @param string|PluginCore $plugin_core - Accepts plugin file path or plugin slug or PluginCore instance. 
	 */
	protected static function set_plugin_core( string|PluginCore $plugin_core ) {

		if ( is_a( $plugin_core, PluginCore::class ) ) {
			self::$plugin_core = $plugin_core;
		} else if ( is_readable( $plugin_core ) ) {
			self::$plugin_core = PluginCore::get_by_file( $plugin_core );
		} else {
			self::$plugin_core = PluginCore::get( $plugin_core );
		}

		// PHP >=8.0
		// self::$plugin_core = match( true ){
		// 	is_a( $plugin_core, PluginCore::class ) => $plugin_core,
		// 	is_readable( $plugin_core ) => PluginCore::get_by_file( $plugin_core ),
		// 	default => PluginCore::get( $plugin_core ),
		// };
	}

	/**
	 * @since 0.10
	 * 
	 * Expose PluginCore methods as our own static methods.
	 */
	public static function __callStatic( $name, $arguments )
	{
		return call_user_func_array( [ self::$plugin_core, $name ], $arguments );
	}

	/**
	 * @since 0.10
	 * 
	 * @return string Plugin title.
	 */
	public static function title()
	{
		return self::$plugin_core->title();
	}

	/**
	 * @since 0.10
	 * 
	 * @param string $extension (optional) Extension string.
	 * 
	 * @return string Plugin slug + optional extension (ie. 'my-slug-extension').
	 */
	public static function slug( $extension = '' )
	{
		return rtrim( self::$plugin_core->slug() . '-' . $extension, '-' );
	}

	/**
	 * @since 0.10
	 * 
	 * @param string $extension (optional) Extension string.
	 * 
	 * @return string Plugin underscored + lowercase token + optional extension (ie. 'my_token_extension').
	 */
	public static function token( $extension = '' )
	{
		return rtrim( self::$plugin_core->token() . '_' . str_replace( '-', '_', $extension ), '_' );
	}

	/**
	 * @since 0.10
	 * 
	 * @param string $path (optional) Path relative to plugin file.
	 * 
	 * @return string Plugin file path (+ optional relative path).
	 */
	public static function path( $path = '' )
	{
		return self::$plugin_core->path( $path );
	}

	/**
	 * @since 0.10
	 * 
	 * @param string $url (optional) Path relative to plugin URL.
	 * 
	 * @return string Plugin URL (+ optional relative path).
	 */
	public static function url( $path = '' )
	{
		return self::$plugin_core->url( $path );
	}

	/**
	 * @since 0.10
	 * 
	 * @return string Plugin version
	 */
	public static function version()
	{
		return self::$plugin_core->version();
	}

	/**
	 * @since 0.11
	 * 
	 * @return Plugin_Core instance
	 */
	public static function plugin_core()
	{
		return self::$plugin_core;
	}

	/**
	 * Plugin utility method. \
	 * Generate appropriate cache buster string for enqueuing scripts and styles.
	 * 
	 * @since 0.12
	 * 
	 * @return string cache buster - plugin version on production. timestamp otherwise.
	 */
	public static function cache_buster()
	{
		return self::$cache_buster ??= ( 'production' == wp_get_environment_type() )
			? self::version()
			: (string) time();
	}
	
}