<?php

if ( ! function_exists( 'wph_print_table' ) ):
/**
 * Print multidimensional array as .widefat table
 * 
 * Function expects inner arrays to be associative arrays.
 * 
 * @package WPHelper\Utility
 * 
 * @param array[] $fields multidimensional array
 * @param array (optional) $headers array of header labels
 * @param string (optional) html id
 * @param string|array (optional) html classes. default 'widefat'
 */
function wph_print_table( $fields, $headers = null, $id = null, $classes = 'widefat'){
	
	if (empty($fields))
		return;

	// if no $headers provided - use keys of first $fields array item
	if (empty($headers)){
		$headers = array_keys( current($fields) );
	}
	
	if ( is_array( $classes ) ){
		$classes = implode( ' ', $classes );
	}

	if ( is_string( $classes ) ){
		$classes = sprintf('class="%s"', $classes );
	}

	if ( ! empty( $id ) ){
		$id = sprintf('id="%s"', $id );
	}

	echo "<table $id $classes>";
	
	echo '<thead>';
	echo '<tr>';
	array_map(
		fn($header, $class) => printf('<th class="%2$s">%1$s</th>',$header,$class),
		$headers,
		array_keys( current($fields) ) // used for th class
	);
	echo '</tr>';
	echo '</thead>';

	echo '<tbody>';
	array_walk($fields, function(&$field){
		echo '<tr>';
		array_walk(
			$field,
			fn(&$col) => printf('<td>%s</td>', is_array($col) ? print_r($col, true) : $col )
		);
		echo '</tr>';
	});
	echo '</tbody>';
	
	echo '</table>';
}
endif;
