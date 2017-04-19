<?php
/**
 * Login After Register for Theme Login
 *
 * @link              https://github.com/mwtsn/login-after-register-for-theme-login
 * @package           mkdo\login-after-register-for-theme-login
 *
 * Plugin Name:       Login After Register for Theme Login
 * Plugin URI:        https://github.com/mwtsn/login-after-register-for-theme-login
 * Description:       A tiny plugin to instantly log a user in after they have registered with the Login After Register for Theme Login plugin.
 * Version:           1.0.0
 * Author:            Make Do <hello@makedo.net>
 * Author URI:        https://makedo.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       login-after-register-for-theme-login
 * Domain Path:       /languages
 */

namespace mkdo\login_after_register_for_theme_login;

// Abort if this file is called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Constants.
define( 'MKDO_LOGIN_AFTER_REGISTER_FOR_THEME_LOGIN_ROOT', __FILE__ );
define( 'MKDO_LOGIN_AFTER_REGISTER_FOR_THEME_LOGIN_NAME', 'Login After Register for Theme Login' );
define( 'MKDO_LOGIN_AFTER_REGISTER_FOR_THEME_LOGIN_PREFIX', 'mkdo_login_after_register_for_login_after_register_for_theme_login' );

/**
 * The Plugin Class,
 *
 * This plugin is so small, we only need the one class.
 */
class Plugin {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Go.
	 *
	 * @since	0.1.0
	 */
	public function run() {
		add_action( 'mkdo_theme_login_form_register_before_redirect', array( $this, 'mkdo_theme_login_form_register_before_redirect' ), 0, 2 );
	}

	/**
	 * Instantly login a User after they have registered.
	 *
	 * @param string $redirect_url The redirection URL.
	 * @param string $user_login   The user login name.
	 */
	public function mkdo_theme_login_form_register_before_redirect( $redirect_url, $user_login ) {
		$user = get_user_by( 'login', $user_login );
		if ( $user ) {
			wp_set_auth_cookie( $user->ID );
		}
	}
}

$plugin = new Plugin();
$plugin->run();
