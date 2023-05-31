<?php
/**** [start] Add approve bulk action for videos****/
add_filter( 'bulk_actions-edit-post', 'approve_videos_bulk_actions' );
function approve_videos_bulk_actions($bulk_array) {
	$bulk_array['publish_videos_status'] = 'Approve';
	asort($bulk_array);
	return $bulk_array;
}

add_filter( 'handle_bulk_actions-edit-post', 'approve_videos_bulk_action_handler', 10, 3 );
function approve_videos_bulk_action_handler( $redirect, $doaction, $object_ids ) {
	$redirect = remove_query_arg(['publish_videos_status'], $redirect );
	if ($doaction == 'publish_videos_status') {
		foreach ( $object_ids as $post_id ) {
			wp_update_post( array(
				'ID' => $post_id,
				'post_status' => 'publish'
			) );
		}
		$redirect = add_query_arg(
			'publish_videos_status',
			count( $object_ids ),
			$redirect );
	}
	return $redirect;
}
/**** [end] Add approve bulk action for videos****/

/**** [start] Add approve bulk action for galleries****/
add_filter( 'bulk_actions-edit-photos', 'approve_galleries_bulk_actions' );
function approve_galleries_bulk_actions($bulk_array) {
	$bulk_array['publish_galleries_status'] = 'Approve';
	asort($bulk_array);
	return $bulk_array;
}

add_filter( 'handle_bulk_actions-edit-photos', 'approve_galleries_bulk_action_handler', 10, 3 );
function approve_galleries_bulk_action_handler( $redirect, $doaction, $object_ids ) {
	$redirect = remove_query_arg(['publish_galleries_status'], $redirect );
	if ($doaction == 'publish_galleries_status') {
		foreach ( $object_ids as $post_id ) {
			wp_update_post( array(
				'ID' => $post_id,
				'post_status' => 'publish',
				'post_type' => 'photos'
			) );
		}
		$redirect = add_query_arg(
			'publish_galleries_status',
			count( $object_ids ),
			$redirect );
	}
	return $redirect;
}
/**** [end] Add approve bulk action for galleries****/



/**** [start] Add approve bulk action for posts****/
add_filter( 'bulk_actions-edit-user_post', 'approve_posts_bulk_actions' );
function approve_posts_bulk_actions($bulk_array) {
	$bulk_array['publish_posts_status'] = 'Approve';
	asort($bulk_array);
	return $bulk_array;
}

add_filter( 'handle_bulk_actions-edit-user_post', 'approve_posts_bulk_action_handler', 10, 3 );
function approve_posts_bulk_action_handler( $redirect, $doaction, $object_ids ) {
	$redirect = remove_query_arg(['publish_posts_status'], $redirect );
	if ($doaction == 'publish_posts_status') {
		foreach ( $object_ids as $post_id ) {
			wp_update_post( array(
				'ID' => $post_id,
				'post_status' => 'publish',
				'post_type' => 'user_post'
			) );
		}
		$redirect = add_query_arg(
			'publish_posts_status',
			count( $object_ids ),
			$redirect );
	}
	return $redirect;
}
/**** [end] Add approve bulk action for posts****/