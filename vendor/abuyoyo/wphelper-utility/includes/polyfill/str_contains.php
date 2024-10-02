<?php

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
