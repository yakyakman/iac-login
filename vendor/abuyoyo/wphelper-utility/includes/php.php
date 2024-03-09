<?php
/**
 * General functions that PHP should provide but doesn't
 * 
 * Polyfill-y-ish functions
 */

if ( ! function_exists( 'natksort' ) ):
/**
 * natksort
 * 
 * natsort for keys
 * 
 * @package WPHelper\Utility
 */
function natksort(&$array){
	$flipped = array_flip($array);
	natsort($flipped);
	$array = array_flip($flipped);
}
endif;
