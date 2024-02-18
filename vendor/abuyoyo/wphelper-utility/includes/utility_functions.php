<?php

/**
 * General utility functions used throughout abuyoyo plugins
 */


if ( ! function_exists( 'get_http_response_code' ) ):
/**
 * Get HTTP Response Code
 * 
 * @package WPHelper\Utility
 * 
 * @param string $url URL to test
 * @return int HTTP code 
 */
function get_http_response_code($url){

	if ( function_exists( 'wp_remote_get' ) ){
		$response = wp_remote_get( $url );
		return wp_remote_retrieve_response_code( $response );
	}
	
	$handle = curl_init($url);
	curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
	curl_exec($handle);
	$http_code = curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
	curl_close($handle);
	
	return $http_code;
	
}
endif;


if ( ! function_exists( 'camelCaseKeys' ) ):
/**
 * convert array keys from under_score to camelCase
 * 
 * @link https://gist.github.com/goldsky/3372487
 *
 * with a more elegant code from here (that apparently doesn't work):
 * @link https://stackoverflow.com/questions/2791998/convert-dashes-to-camelcase-in-php
 * 
 * @since 0.4
 * 
 * @package WPHelper\Utility
 * 
 * @param   array   $array          array to convert
 * @param   array   $arrayHolder    parent array holder for recursive array
 * 
 * @return  array   camelCase array
 */
function camelCaseKeys($array, $arrayHolder = array()) {
	$camelCaseArray = !empty($arrayHolder) ? $arrayHolder : array();
	foreach ($array as $key => $val) {
		$newKey = @explode('_', $key);
		//array_walk($newKey, create_function('&$v', '$v = ucwords($v);')); //If you are using PHP 5.3.0 or newer a native anonymous function should be used instead.
		array_walk($newKey, function(&$v){$v = ucwords($v);});
		$newKey = @implode('', $newKey);
		$newKey = @lcfirst($newKey); //$newKey{0} = strtolower($newKey{0});
		
		/* if (! $newKey = @ucwords($key, '_') )
			$newKey = $key;
		$newKey = @str_replace('_', '', $newKey);
		$newKey = @lcfirst($newKey); */
		
		if (!is_array($val)) {
			$camelCaseArray[$newKey] = $val;
		} else {
			//this line throws an 'index undefined' notice
			//$camelCaseArray[$newKey] = camelCaseKeys($val, $camelCaseArray[$newKey]);
			
			//$camelCaseArray[$newKey] = camelCaseKeys($val, $array[$key]);  //? this works? why?
			//$camelCaseArray[$newKey] = camelCaseKeys($val, $val);  //? this works? why?
			$camelCaseArray[$newKey] = camelCaseKeys($val);  //? this works? why?
		}
	}
	return $camelCaseArray;
}
endif;

include 'bespoke/wph_print_table.php';
include 'bespoke/wph_card.php';
include 'bespoke/wph_pre_print.php';
include 'bespoke/wph_no_js_meta_box.php';
