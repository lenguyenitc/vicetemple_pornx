<?php
/*****add checkbox Agree and add custom error message****/
add_action( 'register_form', 'agree_checkbox_on_reg_page' );
function agree_checkbox_on_reg_page(){
	$tos_text = (get_theme_mod('tos_text') !== false) ? get_theme_mod('tos_text'): 'Terms and Conditions';
	$tos_link = (get_theme_mod('tos_link_page') !== false) ? get_theme_mod('tos_link_page'): site_url().'/terms-and-conditions/';

	$checkbox = '<p class="agreePolicy" style="text-align: center; margin-top: 10px">';
	$checkbox .= 'By signing up, you agree to our <a class="tos" href="'.$tos_link.'">'.$tos_text.'</a></p>';
	echo $checkbox;
}/***** end add checkbox Agree and add custom error message****/

/**add new meta value and meta key for standart register**/
add_action( 'register_new_user', 'action_standart_reg' );
function action_standart_reg($user_id){
	global $wpdb;
	$table = $wpdb->prefix."social_users";
	if($wpdb->get_var("SHOW TABLES LIKE '$table'") == $table) {
		$row = $wpdb->get_row( "SELECT * FROM $table WHERE ID = '" . $user_id . "'");
		if($row === null) {
			update_user_meta($user_id, 'method_register', 'standart');
		}
	} else {
		update_user_meta($user_id, 'method_register', 'standart');
	}
}

/***redirect to login page***/
add_filter('registration_redirect', 'new_registration_redirect' );
function new_registration_redirect() {
	return wp_login_url() . '?reg=confirm';
}