<?php

if ( ! function_exists( 'wph_die' ) ):
/**
 * Kill WordPress execution and print array or object.
 * 
 * Use wp_die() to display preformatted PHP arrays and objects.
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed             $item  Array, object or scalar.
 * @param string (optional) $title Title used in HTML and document title.
 */
function wph_die( $item, $title = '' ){
	wp_die(
		sprintf(
			'%s%s',
			empty( $title ) ? '' : sprintf( '<h1>%s</h1>' . PHP_EOL, $title ),
			wph_pre_print( $item, false )
		),
		$title
	);
}
endif;
