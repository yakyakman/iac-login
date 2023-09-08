<?php
/**
 * Plugin Name: IAC Login
 * Description: IAC Branding for login page.
 * Author: abuyoyo
 * Version: 0.2
 */
require_once 'Login_Page.php';

new WPHelper\PluginCore(__FILE__);

function iac_login_config() {
	new IAC_Login\Login_Page();
}
add_action( 'plugins_loaded', 'iac_login_config');
