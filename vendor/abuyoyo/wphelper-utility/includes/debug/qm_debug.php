<?php

if ( ! function_exists( 'qm_debug' ) ):
/**
 * QM::debug wrapper function
 * 
 * @package WPHelper\Utility
 * 
 * @param string $message
 * @param array<string, mixed> $context
 * @return void
 */
function qm_debug( $message, $context = [] ){

	// Validate Query Monitor activated
	if ( ! method_exists( 'QM', 'debug' ) )
		return;

	QM::debug( $message, $context );
}
endif;