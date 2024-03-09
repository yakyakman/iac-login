<?php

if ( ! function_exists( 'wph_dump' ) ):
/**
 * Kill WordPress execution and var_dump.
 * 
 * Use wp_die() to display var_dump().
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed             $item  Array, object or scalar.
 * @param string (optional) $title Title used in HTML and document title.
 */
function wph_dump( $item, $title = '' ){
	ob_start();
	var_dump( $item );
	$item = ob_get_clean();

	wph_die( $item, $title );
}
endif;
