<?php

if ( ! function_exists( 'wp_dump' ) ):
/**
 * Deprecated - wrapper function for wph_dump()
 * 
 * @deprecated
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed             $item  Array, object or scalar.
 * @param string (optional) $title Title used in HTML and document title.
 */
function wp_dump( $item, $title = ''  ){

	_doing_it_wrong( __FUNCTION__, 'Use wph_dump instead.', '0.7' );

	wph_dump( $item, $title );
}
endif;
