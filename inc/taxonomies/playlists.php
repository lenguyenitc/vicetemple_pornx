<?php //hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
add_action( 'init', 'arc_create_playlist_taxonomy', 0 );
function arc_create_playlist_taxonomy() {
// Labels part for the GUI
	$labels = array(
		'name' => esc_html__( 'Playlists', 'arc' ),
		'singular_name' => esc_html__( 'Playlist', 'arc' ),
		'search_items' =>  __( 'Search Playlists', 'arc' ),
		'popular_items' => __( 'Popular Playlists', 'arc' ),
		'all_items' => __( 'All Playlists', 'arc' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Playlist', 'arc' ),
		'update_item' => __( 'Update Playlist', 'arc' ),
		'add_new_item' => __( 'Add to a playlist', 'arc' ),
		'new_item_name' => __( 'New Playlist Name', 'arc' ),
		'add_or_remove_items' => __( 'Add or remove Playlists', 'arc' ),
		'choose_from_most_used' => __( 'Choose from the most used Playlists', 'arc' ),
		'menu_name' => __( 'Playlists', 'arc' ),
		'not_found' => __('No playlists found.', 'arc'),
		'back_to_items' => __('Go to Playlists', 'arc'),
		'delete_with_user' => true
	);
// Now register the non-hierarchical taxonomy like tag
	register_taxonomy('playlists','post', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'playlist' )
	));
}