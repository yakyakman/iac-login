<?php
/**
 * IAC_Login autoloader
 * 
 * @since 1.1
 *
 * @param string $class The fully-qualified class name.
 * @return void
 * 
 * @link https://stackoverflow.com/questions/3642282/php-autoloading-in-namespaces
 */
spl_autoload_register( function( $class ) {

    $prefix = 'IAC_Login\\';

    $len = strlen($prefix);
    if ( strncmp( $prefix, $class, $len ) !== 0) {
        return;
	}

    $base_dir = __DIR__ . '/src/';
    $relative_class = substr( $class, $len );
	$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';
	
    if ( file_exists( $file ) ) {
        require $file;
    }
} );
