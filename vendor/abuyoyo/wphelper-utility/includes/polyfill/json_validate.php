<?php
// skip polyfill
if ( defined( 'WPHELPER_JSON_MAX_DEPTH' ) ){
	return;
}

const WPHELPER_JSON_MAX_DEPTH = 0x7FFFFFFF; // see https://www.php.net/manual/en/function.json-decode.php

if ( ! function_exists( 'json_validate' ) ):
/**
 * json_validate
 * 
 * Polyfill for json_validate
 * 
 * @version PHP < 8.3
 * 
 * @package WPHelper\Utility
 * 
 * @link https://github.com/symfony/polyfill/blob/1.x/src/Php83/Php83.php
 */
function json_validate(string $json, int $depth = 512, int $flags = 0): bool
    {
        if (0 !== $flags && defined('JSON_INVALID_UTF8_IGNORE') && JSON_INVALID_UTF8_IGNORE !== $flags) {
            throw new ValueError('json_validate(): Argument #3 ($flags) must be a valid flag (allowed flags: JSON_INVALID_UTF8_IGNORE)');
        }

        if ($depth <= 0) {
            throw new ValueError('json_validate(): Argument #2 ($depth) must be greater than 0');
        }

        if ($depth > WPHELPER_JSON_MAX_DEPTH) {
            throw new ValueError(sprintf('json_validate(): Argument #2 ($depth) must be less than %d', WPHELPER_JSON_MAX_DEPTH));
        }

        json_decode($json, null, $depth, $flags);

        return JSON_ERROR_NONE === json_last_error();
    }
endif;
