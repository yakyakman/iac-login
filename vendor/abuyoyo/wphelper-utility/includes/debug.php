<?php
/**
 * General custom functions used for debugging by abuyoyo
 */

if ( ! function_exists( 'br' ) ):
/**
 * BR
 * 
 * shorthand for adding <br> tags and PHP_EOL to debug messages
 * 
 * @package WPHelper\Utility
 */
function br(){

	if ( defined('BR') && BR == 'PHP' )
		echo PHP_EOL; // ( BR == 'PHP' )
	else
		echo '<br>' . PHP_EOL; // ( BR == 'HTML' )
}
endif;

include 'debug/qm_debug.php';
include 'debug/wph_die.php';
include 'debug/wph_dump.php';
