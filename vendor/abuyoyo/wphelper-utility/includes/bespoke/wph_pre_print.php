<?php

if ( ! function_exists( 'wph_pre_print' ) ):
/**
 * Print array, object or scalar in HTML pre tag.
 * 
 * Strings in array or object are html-escaped. Scalar strings will be printed directly (accepts HTML string).
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed           $output Array, object or scalar to print.
 * @param bool (optional) $echo If true echoes the output. Otherwise returns pre-formatted html string.
 * 
 * @return void|string
 */
function wph_pre_print( $output, $echo = true ){

	if ( is_array( $output ) || is_object( $output ) ){
		$output = htmlspecialchars( print_r( $output, true ) );
	}

	$output = sprintf(
		'<pre>%s</pre>',
		$output
	);

	if ( $echo ){
		echo $output;
	} else {
		return $output;
	}
}
endif;