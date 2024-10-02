<?php

if ( ! function_exists( 'wph_pre_dump' ) ):
/**
 * Print var_dump() in HTML pre tag.
 * 
 * @package WPHelper\Utility
 * 
 * @param mixed           $output variable
 * @param bool (optional) $echo If true echoes the output. Otherwise returns pre-formatted html string.
 * 
 * @return void|string
 */
function wph_pre_dump( $output, $echo = true ){

	ob_start();
	var_dump( $output );

	$output = sprintf(
		'<pre>%s</pre>',
		ob_get_clean()
	);

	if ( $echo ){
		echo $output;
	} else {
		return $output;
	}
}
endif;