<?php
/**
 * Polyfill PHP functions
 */

if ( ! function_exists( 'array_key_first' ) ):
/**
 * array_key_first
 * 
 * Polyfill for array_key_first
 * 
 * @version PHP < 7.3.0
 * 
 * @package WPHelper\Utility
 */
function array_key_first( array $arr ) {
	foreach( $arr as $key => $unused ) {
		return $key;
	}
	return NULL;
}
endif;


if ( ! function_exists( 'str_contains' ) ):
/**
 * str_contains
 * 
 * Polyfill for str_contains
 * 
 * @version PHP < 8.0
 * 
 * @package WPHelper\Utility
 */
function str_contains ( string $haystack , string $needle ) : bool
{
	if ( ! is_string( $haystack ) ){
		return false;
	}
	
	if ( ! is_string( $needle ) ){
		return false;
	}

	return ( strpos( $haystack, $needle ) !== false );
}
endif;

include 'polyfill/json_validate.php';
