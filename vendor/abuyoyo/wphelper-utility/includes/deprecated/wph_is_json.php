<?php

if ( ! function_exists( 'wph_is_json' ) ):
/**
 * WPH is_json
 * Test if string is valid JSON
 * 
 * @link https://subinsb.com/php-check-if-string-is-json/
 * 
 * @since 0.3
 * @since 0.8 deprecated
 * 
 * @deprecated
 * 
 * @package WPHelper\Utility
 */
function wph_is_json( $json ){

	_doing_it_wrong( __FUNCTION__, 'Use json_validate() instead.', '0.8');

	return is_string( $json ) && json_validate( $json );

}
endif;