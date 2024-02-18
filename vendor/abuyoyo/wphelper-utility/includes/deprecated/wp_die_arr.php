<?php

if ( ! function_exists( 'wp_die_arr' ) ):
/**
 * Deprecated - wrapper function for wph_die()
 * 
 * @deprecated
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed             $item  Array, object or scalar.
 * @param string (optional) $title Title used in HTML and document title.
 */
function wp_die_arr( $item, $title = '' ){

	_doing_it_wrong( __FUNCTION__, 'Use wph_die instead.', '0.7' );

	wph_die( $item, $title );
}
endif;