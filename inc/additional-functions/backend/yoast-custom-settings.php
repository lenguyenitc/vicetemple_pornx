<?php
if(is_plugin_active('wordpress-seo/wp-seo.php')) {
	function user_name_for_public_profile() {
		if(!is_user_logged_in()) {
			return ucfirst(get_userdata($_GET['xxx'])->display_name) . "'s";
		} else {
			return ucfirst(get_userdata($_GET['xxx'])->display_name) . "'s";
		}

	}
	function register_custom_yoast_variables_user_name_for_public_profile() {
		wpseo_register_var_replacement( '%%PublicName%%', 'user_name_for_public_profile', 'advanced', 'Public Profile User Name' );
	}
	add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables_user_name_for_public_profile');
	function user_name_for_playlists_page() {
		if(is_user_logged_in()) {
			if(get_current_user_id() == $_GET['xxx']){
				return ucfirst(get_userdata(get_current_user_id())->display_name) . "'s";
			} else {
				return ucfirst(get_userdata($_GET['xxx'])->display_name) . "'s";
			}

		}
	}
	function register_custom_yoast_variables_user_name_for_playlists_page() {
		wpseo_register_var_replacement( '%%PlaylistName%%', 'user_name_for_playlists_page', 'advanced', 'Playlists User Name' );
	}
	add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables_user_name_for_playlists_page');

	function user_name_for_albums() {
		if(!is_user_logged_in()) {
			return ucfirst(get_userdata($_GET['a'])->display_name) . "'s";
		} else {
			return ucfirst(get_userdata($_GET['a'])->display_name) . "'s";
		}

	}
	function register_custom_yoast_variables_user_name_for_album() {
		wpseo_register_var_replacement( '%%AlbumName%%', 'user_name_for_albums', 'advanced', 'Public Album User Name' );
	}
	add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables_user_name_for_album');

	function user_name_for_photos() {
		global $post;
		if(!is_user_logged_in()) {
			return ucfirst(get_userdata($post->post_author)->display_name) . "'s";
		} else {
			return ucfirst(get_userdata($post->post_author)->display_name) . "'s";
		}

	}
	function register_custom_yoast_variables_user_name_for_photos() {
		wpseo_register_var_replacement( '%%PhotosName%%', 'user_name_for_photos', 'advanced', 'Public Photos User Name' );
	}
	add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables_user_name_for_photos');
}