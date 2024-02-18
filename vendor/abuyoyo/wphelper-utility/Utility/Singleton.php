<?php
namespace WPHelper\Utility;

/**
 * Singleton trait
 * 
 */
trait Singleton {

	private static $instance;

	public static function instance(){
		if ( ! isset( static::$instance ) ){
			static::$instance = new static();
		}
		return static::$instance;
	}

	public static function init( $args = [] ){
		if ( ! isset( static::$instance ) ){
			static::$instance = new static( $args );
		}
		return static::$instance;
	}
	
}