<?php
namespace WPHelper\Utility;

/**
 * Singleton trait
 * 
 * @package WPHelper\Utility
 */
trait Singleton {

	private static $instance;

	/**
	 * Get singleton instance.
	 * 
	 * @return static
	 */
	public static function instance(){
		if ( ! isset( static::$instance ) ){
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Set singleton instance.
	 * 
	 * @return static
	 */
	public static function init( $args = [] ){
		if ( ! isset( static::$instance ) ){
			static::$instance = new static( $args );
		}
		return static::$instance;
	}
	
}