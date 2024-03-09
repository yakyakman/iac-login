<?php

if ( ! function_exists( 'pre_print' ) ):
/**
 * Print array or object in pre-formatted HTML. Also accepts scalars.
 * 
 * @deprecated
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed           $output Array, object or scalar to print.
 * @param bool (optional) $echo If true echoes the output. Otherwise returns pre-formatted html string.
 * 
 * @return void|string
 */
function pre_print( $output, $echo = true ){

	_doing_it_wrong( __FUNCTION__, 'Use wph_pre_print instead.', '0.7' );

	return wph_pre_print( $output, $echo );
}
endif;