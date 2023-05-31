<?php
/****create_default_playlist*****/
add_action( 'wp_login', 'create_default_playlist', 10, 2 );
function create_default_playlist( $user_login, $user ){
	$terms = get_terms([
		'taxonomy'      => array('playlists'),
		'hide_empty'    => false,
		'slug'          => 'watchlater'. $user->ID]);
	if(count($terms) == 0) {
		$userPlaylist = wp_insert_term('Watch Later', 'playlists', array(
			'parent'      => 0,
			'slug'        => 'watchLater'.$user->ID,
		));
		add_user_meta($user->ID, "userPlaylists", $userPlaylist['term_id']);
        update_term_meta($userPlaylist['term_id'], 'playlist_data', time());
	}
}/**** end create_default_playlist*****/