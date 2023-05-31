<?php
add_action('wp_ajax_nopriv_get_ids_filtered_posts', 'get_ids_filtered_posts');
add_action('wp_ajax_get_ids_filtered_posts', 'get_ids_filtered_posts');
function get_ids_filtered_posts() {
	if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) die ( 'Busted!');


	$get_param = get_option('filter_porn_videos');
	if($get_param[1] !== false) {
		$cat = $get_param[1];
	} else $cat = 0;

	if((int)xbox_get_field_value('my-theme-options', 'number_videos_per_page') % (int)xbox_get_field_value('my-theme-options', 'number_videos_per_row') == 0) {
		$per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page');
	} else {
		$per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page') + 1;
	}


	$args_query = array(
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'post_status' => 'publish',
		'suppress_filters' => true,
		'numberposts' => -1,
		'posts_per_page' => $per_page,
		'paged' => $get_param[0],
		'cat' => $cat
	);

	query_posts($args_query);
	if(have_posts()) :
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/loop', 'video2' );
		endwhile;
	endif;
	wp_die();
}

add_action('wp_ajax_nopriv_update_filter_videos_option', 'update_filter_videos_option');
add_action('wp_ajax_update_filter_videos_option', 'update_filter_videos_option');
function update_filter_videos_option() {
	if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) die ( 'Busted!');
	$get_param = get_option('filter_porn_videos');
	$data = [
		(int)$_POST['filter_page'] + 1,
		$get_param[1],
		$get_param[2]
	];
	update_option('filter_porn_videos', $data, true);
	wp_send_json($data);
}