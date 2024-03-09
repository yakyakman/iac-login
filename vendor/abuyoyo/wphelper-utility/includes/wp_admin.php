<?php
/**
 * WordPress Admin utilitiy functions
 */

if ( ! function_exists( 'wp_admin_get_post_type' ) ):
/**
 * Get post_type anywhere in WP Admin
 * 
 * @link https://wordpress.stackexchange.com/questions/5837/get-post-type-on-edit-page
 * 
 * @package WPHelper\Utility
 * 
 * @return string post-type
 */
function wp_admin_get_post_type() {
	global $post, $parent_file, $typenow, $current_screen, $pagenow;

	$post_type = NULL;

	if (
		$post
		&&
		(
			property_exists( $post, 'post_type' )
			||
			method_exists( $post, 'post_type' )
		)
	)
		$post_type = $post->post_type;

	if (
		empty( $post_type )
		&&
		! empty( $current_screen )
		&& (
			property_exists( $current_screen, 'post_type' )
			||
			method_exists( $current_screen, 'post_type' )
		)
		&& ! empty( $current_screen->post_type )
	)
		$post_type = $current_screen->post_type;

	if ( empty( $post_type ) && ! empty( $typenow ) )
		$post_type = $typenow;

	if ( empty( $post_type ) && function_exists( 'get_current_screen' ) )
		$post_type = get_current_screen();

	if (
		empty( $post_type )
		&&
		isset( $_REQUEST['post'] )
		&&
		! empty ($_REQUEST['post'] )
		&&
		function_exists( 'get_post_type' )
		&&
		$get_post_type = get_post_type( (int) $_REQUEST['post'] )
	)
		$post_type = $get_post_type;

	if (
		empty( $post_type )
		&&
		isset( $_REQUEST['post_type'] )
		&&
		! empty( $_REQUEST['post_type'] )
	)
		$post_type = sanitize_key( $_REQUEST['post_type'] );

	if ( empty( $post_type ) && 'edit.php' == $pagenow )
		$post_type = 'post';

	return $post_type;
}
endif;


if ( ! function_exists( 'wp_get_current_admin_url' ) ):
/**
 * Get current admin page URL.
 *
 * Returns an empty string if it cannot generate a URL.
 * Based on WooCommerce wc_get_current_admin_url()
 * @link https://github.com/woocommerce/woocommerce/blob/master/includes/admin/wc-admin-functions.php#L506
 * 
 * @package WPHelper\Utility
 * 
 * @return string
 */
function wp_get_current_admin_url() {
	$uri = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$uri = preg_replace( '|^.*/wp-admin/|i', '', $uri );

	if ( ! $uri ) {
		return '';
	}

	return remove_query_arg( array( '_wpnonce' ), admin_url( $uri ) );
}
endif;