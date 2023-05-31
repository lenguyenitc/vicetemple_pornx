<?php
/***add list of roles for access denied to wp-admin***/
add_action('admin_init', 'access_denied_to_wp_admin');
function access_denied_to_wp_admin() {
	$all_roles = get_editable_roles();
	$option_name = 'access_denied_roles';
	foreach ($all_roles as $key => $role) {
		if($key == 'administrator') continue;
		else {
			$vals[$key] = ucfirst($key);
			register_setting('general', $option_name, ['default' => 'off']);
			$checkbox_all = array(
				'type'      => 'checkbox',
				'id'        => $option_name,
				'vals' => $vals
			);
		}
	}
	add_settings_field('access_denied_field',
		'/wp-admin/ Access',
		'display_roles_checkbox',
		'general',
		'default',
		$checkbox_all);
}
function display_roles_checkbox($args) {
	extract($args);
	$option_name = $args['id'];
	$o = get_option($option_name);
	$vals = $args['vals'];
	echo "<fieldset>";
	foreach($vals as $v => $l){
		$checked = ($o[$v] == 'denied') ? "checked='checked'" : '';
		echo "<label><input type='checkbox' name='" . $option_name . "[$v]' value='denied' $checked />$l</label><br />";
	}
	echo "</fieldset>";
}/***[end] add list of roles for access denied to wp-admin***/

/****access denied to wp-admin for subscriber***/
add_action('init', 'denied_access_to_wp_admin');
function denied_access_to_wp_admin() {
	$access_denied_roles = get_option('access_denied_roles');
	if($_SERVER['REQUEST_URI'] == '/wp-admin/profile.php' || $_SERVER['REQUEST_URI'] == '/wp-admin/' || $_SERVER['REQUEST_URI'] == '/wp-admin/index.php') {
		if (get_current_user_role() == 'subscriber') {
			wp_redirect(home_url());
			exit;
		}
	}
}
function get_current_user_role() {
	if(is_user_logged_in()) {
		$user = wp_get_current_user();
		$role = (array) $user->roles;
		return $role[0];
	}
}