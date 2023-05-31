<?php
/****add custom options on discussion page****/
add_action('admin_init', 'add_option_field_to_discussion_admin_page');
function add_option_field_to_discussion_admin_page(){
	$option_name_all = 'allow_comments_to_all';

	register_setting('discussion', $option_name_all, ['default' => 'on']);
	$checkbox_all = array(
		'type'      => 'checkbox',
		'id'        => 'allow_comments_to_all',
	);
	add_settings_field( 'allow_comments_to_all',
		__('Enable comments for users', 'arc'),
		'display_settings_all',
		'discussion',
		'default',
		$checkbox_all);
}
function display_settings_all($args) {
	extract($args);
	$option_name = 'allow_comments_to_all';
	$o = get_option($option_name);
	switch ($type) {
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" : '';
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
			echo "</label>";
			break;
	}
}/**** end add custom options on discussion page****/