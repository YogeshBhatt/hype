<?php
/**
 * login form
 */
function login_with_email_address( $username ) {
	$user = get_user_by( 'email', $username );
	if ( !empty( $user->user_login ) ) {
		$username = $user->user_login;
	}
	return $username;
}
add_action( 'wp_authenticate', 'login_with_email_address' );

/**
 * logout redirect
 */

function my_logout_redirect( $redirect_to, $requested_redirect_to, $user ) {
	return home_url();
}
add_filter( 'logout_redirect', 'my_logout_redirect', 10, 3 );