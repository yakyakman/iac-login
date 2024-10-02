<?php

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
