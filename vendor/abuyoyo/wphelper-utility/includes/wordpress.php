<?php

/**
 * WordPress utility/polyfill-y-ish functions
 * 
 * Useful functios that wp-core should provide but doesn't
 */

if ( ! function_exists( 'wp_strtotime' ) ):
/**
 * wp_strtotime
 * strtotime function that uses wp_timezone()
 * 
 * @package WPHelper\Utility
 * 
 * @return int $timestamp
 */
function wp_strtotime( $time ) {
	// return ( new DateTime( $time, wp_timezone() ) )->format('U');
	return date_create( $time, wp_timezone() )->getTimestamp();
}
endif;