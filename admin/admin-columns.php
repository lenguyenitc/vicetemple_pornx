<?php
/****add post columns featured and premium*****/
add_filter('manage_edit-post_columns', 'arc_add_columns');
function arc_add_columns($defaults) {
	$defaults['featured_video'] = esc_html__( 'Featured', 'arc' );
	$defaults['premium_video'] = esc_html__( 'Premium', 'arc' );
	$defaults['author'] = esc_html__( 'Uploader', 'arc' );
	return $defaults;
}

/****add featured and premiun images*****/
add_action('manage_posts_custom_column',  'arc_columns_content');
function arc_columns_content($name) {
	global $post;
	$featured_video = get_post_meta( $post->ID, 'featured_video', true );
	$premium_video = get_post_meta( $post->ID, 'premium_video', true );
	switch ($name) {
		case 'featured_video':
			if( $featured_video == 'on' ){
				echo wp_kses(
					'<img width="100%" height="auto" src="'. get_template_directory_uri() . '/assets/img/recommended.png" alt="recommend"/>',
					wp_kses_allowed_html(
						[
							'img' => [
								'alt'    => [],
								'class'  => [],
								'height' => [],
								'src'    => [],
								'width'  => [],
							],
						]
					)
				);
			}
			break;
		case 'premium_video':
			$premium_image = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label')) ?: px_get_premium_label_url();
			if( $premium_video == 'on' ){
				echo wp_kses(
					'<img width="100%" height="auto" src="'. $premium_image.'" alt="premium"/>',
					wp_kses_allowed_html(
						[
							'img' => [
								'alt'    => [],
								'class'  => [],
								'height' => [],
								'src'    => [],
								'width'  => [],
							],
						]
					)
				);
			}
			break;
	}
}

/****filter by featured*****/
add_action('pre_get_posts', 'arc_query_add_filter' );
function arc_query_add_filter( $wp_query ) {
	if( is_admin()) {
		add_filter('views_edit-post', 'arc_add_my_filter');
		global $pagenow;
		if( 'edit.php' == $pagenow && isset( $_GET['meta_key'] )&& $_GET['meta_key'] == 'featured_video'){
			$wp_query->set( 'meta_key', 'featured_video' );
			$wp_query->set( 'meta_value', 'on');
		}
	}
}
function arc_add_my_filter($views) {
	global $wp_query;
	$query = array(
		'post_type'   => 'post',
		'meta_key'	  => 'featured_video',
		'meta_value'  => 'on'
	);
	$result = new WP_Query($query);
	$class = ($wp_query->query_vars['meta_key'] == 'featured_video') ? ' class="current"' : '';
	if(isset($_GET['partner']) && !empty($_GET['partner'])) $views['featured'] = '';
	if($_GET['videos_type'] == 'premium_video') {
		$views['featured'] = sprintf(__('<a href="%s" '. $class .'>Featured <span class="count"></span></a>', 'arc'),
			admin_url('edit.php?post_type=post&meta_key=featured_video&meta_value=on'));
	}
	else {
		$views['featured'] = sprintf(__('<a href="%s" '. $class .'>Featured <span class="count">(%d)</span></a>', 'arc'),
			admin_url('edit.php?post_type=post&meta_key=featured_video&meta_value=on'),
			$result->found_posts);
	}
	return $views;
}

/****filter by premium*****/
add_action('pre_get_posts', 'arc_premium_add_filter' );
function arc_premium_add_filter( $wp_query ) {
	if( is_admin()) {
		add_filter('views_edit-post', 'arc_premium_my_filter');
		global $pagenow;
		if( 'edit.php' == $pagenow && isset( $_GET['meta_key'] ) && $_GET['meta_key'] == 'premium_video' ){
			$wp_query->set( 'meta_key', 'premium_video' );
			$wp_query->set( 'meta_value', 'on');
		}
	}
}
function arc_premium_my_filter($views) {
	global $wp_query;
	$query = array(
		'post_type'   => 'post',
		'meta_key'	  => 'premium_video',
		'meta_value'  => 'on'
	);
	$result = new WP_Query($query);
	$class = ($wp_query->query_vars['meta_key'] == 'premium_video') ? ' class="current"' : '';
	if(isset($_GET['partner']) && !empty($_GET['partner'])) $views['premium'] = '';
	if($_GET['videos_type'] == 'featured_video') {
		$views['premium'] = sprintf(__('<a href="%s" '. $class .'>Premium <span class="count"></span></a>', 'arc'),
			admin_url('edit.php?post_type=post&meta_key=premium_video&meta_value=on'));
	}
	else {
		$views['premium'] = sprintf(__('<a href="%s" '. $class .'>Premium <span class="count">(%d)</span></a>', 'arc'),
			admin_url('edit.php?post_type=post&meta_key=premium_video&meta_value=on'),
			$result->found_posts);
	}
	return $views;
}

/******filter by the partners***/
if(is_admin() && $_GET['post_type'] != 'photos' && $_GET['post_type'] != 'blog' && $_GET['post_type'] != 'user_post') {
	add_action('restrict_manage_posts', 'add_filter_by_partners');
	function add_filter_by_partners($post_type){
		$posts = get_posts( array(
			'numberposts' => -1,
			'meta_key'    => 'partner',
		));
		foreach($posts as $post){
			$partners[] = get_post_meta($post->ID, 'partner', true);
		}
		$partners = array_unique($partners);
		if (isset( $_GET['partner'] ) && $_GET['partner'] != 'all') {
			$selectedPartner = $_GET['partner'];
		}
		$out = '<select class="postform" name="partner" id="partner" '. selected($selectedPartner, @ $_GET['partner'], 0) .'><option value="all">All partners</option>';
		foreach ($partners as $partner) {
			if(!empty($partner)) {
				$out .= '<option value="' . $partner . '" '. selected($partner, @ $_GET['partner'], 0) .'>' . ucfirst($partner) . '</option>';
			}
		}
		$out .= '</select>';
		echo $out;
	}
	add_action( 'pre_get_posts', 'add_event_filter_by_partners' );
	function add_event_filter_by_partners( $query ){
		$cs = function_exists('get_current_screen') ? get_current_screen() : null;
		if( !is_admin() || empty($cs->post_type))
			return;
		global $pagenow;
		$current_page = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
		if (is_admin() && 'post' == $current_page && 'edit.php' == $pagenow && isset($_GET['partner']) && $_GET['partner'] != 'all') {
			$search = $_GET['partner'];
			if ( $search != '' ) {
				$query->set( 'meta_key', 'partner' );
				$query->set( 'meta_value', (string)$search);
				$query->set( 'meta_compare', '=' );
			}
		}
	}
	/*add_filter( 'parse_query', 'add_event_filter_by_partners' );
	function add_event_filter_by_partners($query){
		global $pagenow;
		$current_page = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
		if (is_admin() && 'post' == $current_page && 'edit.php' == $pagenow && isset($_GET['partner']) && $_GET['partner'] != 'all') {
			$search = $_GET['partner'];
			if ($search != '') {
				$query->query_vars['meta_key']     = 'partner';
				$query->query_vars['meta_value']   = $search;
				$query->query_vars['meta_compare'] = '=';
			}
		}
	}*/
}
add_action('restrict_manage_posts', 'restore_all_filters');
function restore_all_filters() {
	echo '<input type="button" name="restore_all_filters" id="restore_all_filters" class="button" value="Reset all filters" style="margin-right: 4px" onclick="resetFilters()"/>
		<script>
			function resetFilters() {
			    window.location.href = location.pathname; 
			}
		</script>
		';
}

/*****reports column*****/
add_filter('manage_edit-comments_columns', 'add_column_reports');
function add_column_reports($defaults) {
	$defaults['reports'] = esc_html__( 'Reports', 'arc' );
	return $defaults;
}
add_action('manage_comments_custom_column', 'add_column_reports_value');
function add_column_reports_value($name) {
	global $comment;
	$reports = get_comment_meta($comment->comment_ID, 'reports', true );
	if($reports >= 0) {
		echo $reports;
	}
}
add_filter( 'manage_'.'edit-comments'.'_sortable_columns', 'add_comment_reports_sortable_column' );
function add_comment_reports_sortable_column( $sortable_columns ){
	$sortable_columns['reports'] = [ 'reports', false ];
	return $sortable_columns;
}/***** end reports column*****/

/****add filter link for comments with reports****/
add_action( 'current_screen', 'get_comments_with_report', 10, 2 );
function get_comments_with_report($screen){
	if ($screen->id != 'edit-comments' )
		return;
	if(isset($_GET['meta_key'])  && $_GET['meta_key'] == 'reports')
		add_action( 'pre_get_comments', 'get_comment_on_specific_page', 10, 1);
	add_filter( 'comment_status_links', 'show_report_filter_link' );
}
function get_comment_on_specific_page($clauses) {
	$clauses->query_vars['meta_key'] = 'reports';
}
function show_report_filter_link($status_links) {
	$count = get_comments(['meta_key' => 'reports', 'count' => true]);
	if(isset($_GET['meta_key']) && $_GET['meta_key'] == 'reports'){
		$status_links['all'] = '<a href="edit-comments.php?comment_status=all">All</a>';
		$status_links['reports'] = sprintf(__('<a href="%s" class="current">Reports <span class="count">(%d)</span></a>', 'arc'),
			admin_url('edit-comments.php?meta_key=reports'), $count);
	} else {
		$status_links['reports'] = sprintf(__('<a href="%s">Reports <span class="count">(%d)</span></a>', 'arc'),
			admin_url('edit-comments.php?meta_key=reports'), $count);
	}
	return $status_links;
}/**** end add filter link for comments with reports****/

/*****profile photo column****/
/*add_filter('manage_users_columns', 'add_column_profile_photo');
function add_column_profile_photo($columns) {
	$num = 2;
	$new_columns = array(
		'profile_photo' => __('Profile Photo','arc'),
	);
	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
add_action( 'manage_users_custom_column', 'add_image_to_photo_column', 10, 3);
function add_image_to_photo_column($val, $colname, $user_id ){
	if(get_user_meta($user_id, 'personal_foto', true) == false) {
		$user_img = '<img src="'.get_template_directory_uri() . '/assets/img/picture.png'.'" width="90">';
	} else {
		$user_img = '<img src="'. get_user_meta($user_id, 'personal_foto', true).'" width="90">';
	}
	if($colname === 'profile_photo' ){
		return $user_img;
	}
}*/


/*****premium column****/
add_filter('manage_users_columns', 'add_column_premium_user');
function add_column_premium_user($columns) {
	$num = 2;
	$new_columns = array(
		'premium' => __('Premium','arc'),
	);
	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
/**** add albums column****/

/***** add premium duration column****/
add_filter('manage_users_columns', 'add_premium_duration_column');
function add_premium_duration_column($columns) {
	$num = 3;
	$new_columns = array(
		'premium_duration' => __('Premium duration','arc'),
	);
	return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}
/***** [end] add premium duration column ****/


add_filter('manage_users_columns', 'add_albums_column');
function add_albums_column($columns) {
	$columns['videos'] = 'Videos';
	$columns['albums'] = 'Albums';
	return $columns;
}/***** [end] add albums column****/

add_action( 'manage_users_custom_column', 'add_info_to_users_column', 10, 3);
function add_info_to_users_column($val, $colname, $user_id ){

	$premium_access = false;
    $input_data = get_all_orders_current_user($user_id);
    if ($input_data !== false){
        $final = get_final_expires_time_of_active_user_order($input_data, false, $user_id);
        if($final > time()){
            $premium_access = true;
            $final = round(($final - time()) / 86400);
        }
    }

    $premium_duration = get_user_meta($user_id, 'premium_duration', true);

    if ( $premium_duration !== '' && $premium_access !== true) {
        $active_time = (($premium_duration['premium_duration'] * 86400) + $premium_duration['start']) - time();
        if ($active_time > 0) {
            $input_data = [];
            $final = get_final_expires_time_of_active_user_order($input_data, false, $user_id);
            if($final > time()){
                $premium_access = true;
                $final = round(($final - time()) / 86400);
            }
        }
    }
	if(!$premium_access) {
		$final = 0;
		update_user_meta($user_id, 'payed', false);
	}

	$get_albums = get_posts( array(
		'numberposts' => -1,
		'post_type'   => 'photos',
		'post_status' => 'publish',
		'author' => $user_id,
		'suppress_filters' => true,
	));
	$get_videos = get_posts( array(
		'numberposts' => -1,
		'post_type'   => 'post',
		'post_status' => 'publish',
		'author' => $user_id,
		'suppress_filters' => true,
	));
	if($premium_access) {
		$user_img = '<svg height="24px" viewBox="0 0 512 512" width="24px" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0" fill="#2196f3"/><path d="m385.75 201.75-138.667969 138.664062c-4.160156 4.160157-9.621093 6.253907-15.082031 6.253907s-10.921875-2.09375-15.082031-6.253907l-69.332031-69.332031c-8.34375-8.339843-8.34375-21.824219 0-30.164062 8.339843-8.34375 21.820312-8.34375 30.164062 0l54.25 54.25 123.585938-123.582031c8.339843-8.34375 21.820312-8.34375 30.164062 0 8.339844 8.339843 8.339844 21.820312 0 30.164062zm0 0" fill="#fafafa"/></svg>';
	} else {
		$user_img = '<svg height="24px" viewBox="0 0 512 512" width="24px" xmlns="http://www.w3.org/2000/svg"><path d="m256 512c-141.160156 0-256-114.839844-256-256s114.839844-256 256-256 256 114.839844 256 256-114.839844 256-256 256zm0-475.429688c-120.992188 0-219.429688 98.4375-219.429688 219.429688s98.4375 219.429688 219.429688 219.429688 219.429688-98.4375 219.429688-219.429688-98.4375-219.429688-219.429688-219.429688zm0 0"/><path d="m347.429688 365.714844c-4.679688 0-9.359376-1.785156-12.929688-5.359375l-182.855469-182.855469c-7.144531-7.144531-7.144531-18.714844 0-25.855469 7.140625-7.140625 18.714844-7.144531 25.855469 0l182.855469 182.855469c7.144531 7.144531 7.144531 18.714844 0 25.855469-3.570313 3.574219-8.246094 5.359375-12.925781 5.359375zm0 0"/><path d="m164.570312 365.714844c-4.679687 0-9.355468-1.785156-12.925781-5.359375-7.144531-7.140625-7.144531-18.714844 0-25.855469l182.855469-182.855469c7.144531-7.144531 18.714844-7.144531 25.855469 0 7.140625 7.140625 7.144531 18.714844 0 25.855469l-182.855469 182.855469c-3.570312 3.574219-8.25 5.359375-12.929688 5.359375zm0 0"/></svg>';
	}
	if($colname === 'premium'){
		return $user_img;
	} elseif($colname === 'albums'){
		if($get_albums) {
			$link = '<a href="'.admin_url().'edit.php?post_type=photos&author='.$user_id.'">'.count($get_albums).'</a>';
		} else {
			$link = '0';
		}
		return $link;
	} elseif($colname === 'videos'){
		if($get_videos) {
			$link = '<a href="'.admin_url().'edit.php?author='.$user_id.'">'.count($get_videos).'</a>';
		} else {
			$link = '0';
		}
		return $link;
	} elseif($colname === 'premium_duration'){ /***** add info to premium duration column****/
		if($user_id == 1) $link = '-';
		else {
			if($final) {
				$link = '<p>'.$final .' days</p><a href="'.admin_url().'user-edit.php?user_id='.$user_id.'">Edit subscription</a>';
			} else {
				$link = '<p></p><a href="'.admin_url().'user-edit.php?user_id='.$user_id.'">Edit subscription</a>';
			}

		}
	}
	return $link;
}/***** [end] premium column****/


/**** remove name user column***/
add_filter('manage_users_columns', 'remove_name_column');
function remove_name_column($columns) {
	unset($columns['name']);
	unset($columns['posts']);
	return $columns;
}
/**** [end] remove name user column***/

/***public profile link**/
function more_users_link( $actions, $user ) {
    $url_payments = site_url() . "/wp-admin/edit.php?post_status=all&post_type=shop_order&_customer_user=" . $user->ID;
	//print_r($actions);
	$actions['public_profile'] = "<a class='public_profile' href='" . site_url() . "/public-profile/?xxx=".$user->ID."' target='_blank'>Public Profile</a>";
	if(get_user_meta($user->ID, 'ban_on_id', true) !== 'active') {
        if($user->ID != 1)
	        $actions['ban'] = "<a class='ban' href='#' data-user-id='".$user->ID."'>Ban</a>";
	} else {
        if($user->ID != 1)
		    $actions['ban'] = "<a class='unban' href='#' data-user-id='".$user->ID."'>Unban</a>";	}

	$actions['payments'] = "<a class='payments' target='_blank' href='".$url_payments."' data-user-id='".$user->ID."'>Payments</a>";
	return $actions;
}
add_filter('user_row_actions', 'more_users_link', 10, 2);
/*** [end] public profile link**/

/*** add author column to playlists****/
function fill_author_playlists_columns($out, $column_name, $id) {
	global $wpdb;
	$term = get_term($id, 'playlists')->term_id;
	$query = $wpdb->get_row("SELECT `user_id` FROM `wp_usermeta` WHERE `meta_key` = 'userPlaylists' AND `meta_value` = " .$term, ARRAY_A);
	switch ($column_name) {
		case 'author':
			$out .= '<a href="'.site_url().'/public-profile/?xxx='.$query['user_id'].'" target="_blank">'.get_user_by('ID', $query['user_id'])->user_login. '</a>';
			break;
	}
	return $out;
}

add_filter("manage_playlists_custom_column", 'fill_author_playlists_columns', 10, 3);

add_filter("manage_edit-playlists_columns", 'add_column_playlists_author_name');
function add_column_playlists_author_name($author_columns) {
	$preview = array( 'author' => 'User' );
	return array_slice( $author_columns, 0, 2 ) + $preview + array_slice( $author_columns, 2 );
}


/***add filter by featured and premium****/
$cs = function_exists('get_current_screen') ? get_current_screen() : null;
if($_GET['post_type'] != 'photos' || $_GET['post_type'] != 'blog') {
	add_action( 'restrict_manage_posts', 'add_premium_and_featured_filters');
	function add_premium_and_featured_filters( $post_type ){
		$cs = function_exists('get_current_screen') ? get_current_screen() : null;
		if($cs->id == 'edit.php' || $cs->post_type == 'post') {
			echo '
			<select name="videos_type">
				<option value="-1">All videos</option>
				<option value="featured_video" '. selected('featured_video', @$_GET['videos_type'], 0) .'>Featured videos</option>
				<option value="premium_video"'.   selected('premium_video', @$_GET['videos_type'], 0) .'>Premium videos</option>
			</select>';
		}

	}
	add_action( 'pre_get_posts', 'add_event_premium_featured_filters_handler' );
	function add_event_premium_featured_filters_handler( $query ){
		$cs = function_exists('get_current_screen') ? get_current_screen() : null;
		if( !is_admin() || empty($cs->post_type))
			return;
		if(@$_GET['videos_type'] == 'featured_video'){
			$query->set( 'meta_key', 'featured_video' );
			$query->set( 'meta_value', 'on');
		}
		if(@$_GET['videos_type'] == 'premium_video'){
			$query->set( 'meta_key', 'premium_video' );
			$query->set( 'meta_value', 'on');
		}
	}
}

/***sortable videos and albums columns***/
add_filter( 'manage_users_sortable_columns', 'add_users_comm_sortable_column' );
function add_users_comm_sortable_column($sortable_columns){
	$sortable_columns['videos'] = 'videos_count';
	$sortable_columns['albums'] = 'albums_count';
	return $sortable_columns;
}
add_action( 'pre_user_query', 'add_users_comm_sort_query' );
function add_users_comm_sort_query( $user_query ){
	global $wpdb, $current_screen;
	if ($current_screen->id != 'users' )
		return;

	$vars = $user_query->query_vars;
	if('videos_count' === $vars['orderby'] ){
		$user_query->query_from     .= " LEFT JOIN (SELECT COUNT(ID) as video_count, post_author FROM $wpdb->posts";
		$user_query->query_where    .= " AND post_type = 'post' AND post_status = 'publish' GROUP BY post_author) as result ON (ID = result.post_author)";
		$user_query->query_orderby  = " ORDER BY video_count ". $vars['order'];
	}
	elseif('albums_count' === $vars['orderby']){
		$user_query->query_from     .= " LEFT JOIN (SELECT COUNT(ID) as album_count, post_author FROM $wpdb->posts";
		$user_query->query_where    .= " AND post_type = 'photos' AND post_status = 'publish' GROUP BY post_author) as result ON (ID = result.post_author)";
		$user_query->query_orderby  = " ORDER BY album_count ". $vars['order'];
		//SELECT * FROM `wp_users` LEFT JOIN (SELECT COUNT(`wp_posts`.`ID`) as album_count, `wp_posts`.`post_author` FROM `wp_posts` WHERE `wp_posts`.`post_type` = 'photos' AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`post_author`) as author ON (`wp_users`.`ID` = author.post_author) ORDER BY album_count ASC
	}
}
/*** [end] sortable videos and albums columns***/

/****filter by premium users***/
add_action('pre_get_users', 'filter_users_by_premium' );
function filter_users_by_premium( $wp_query ) {
	if( is_admin()) {
		add_filter('views_users', 'filter_premium_tab');
		global $pagenow;
		if( 'users.php' == $pagenow && isset( $_GET['meta_key'] )&& $_GET['meta_key'] == 'payed'){
			$wp_query->set( 'meta_key', 'payed' );
			$wp_query->set( 'meta_value', 1 );
		}
	}
}
function filter_premium_tab($views) {
	global $wp_query;
	$query = array(
		'meta_key'=> 'payed',
		'meta_query'     => array(
			'relation' => 'OR',
			array(
				'key'=> 'payed',
				'value' => 1,
				'compare' => '='
			),
			array(
				'key'=> 'payed',
				'value' => true,
				'compare' => '='
			),
		),
	);
	$result = new WP_Query($query);
	$count_premium = get_users(['meta_key' => 'payed', 'meta_value' => 1]);
	$class = ($wp_query->query_vars['meta_key'] == 'payed') ? ' class="current"' : '';
	if($_GET['meta_key'] == 'ban_on_id') {
		$views['payed'] = sprintf(__('<a href="%s" '. $class .'>Premium <span class="count"></span></a>', 'arc'),
			admin_url('users.php?&meta_key=payed&meta_value=1'));
	} else {
		$views['payed'] = sprintf(__('<a href="%s" '. $class .'>Premium <span class="count">(%d)</span></a>', 'arc'),
			admin_url('users.php?&meta_key=payed&meta_value=1'), count($count_premium));
	}

	return $views;
}
/**** [end] filter by premium users***/

/****filter by banned users***/
add_action('pre_get_users', 'filter_users_by_ban' );
function filter_users_by_ban( $wp_query ) {
	if( is_admin()) {
		add_filter('views_users', 'filter_ban_tab');
		global $pagenow;
		if( 'users.php' == $pagenow && isset( $_GET['meta_key'] )&& $_GET['meta_key'] == 'ban_on_id'){
			$wp_query->set( 'meta_key', 'ban_on_id' );
			$wp_query->set( 'meta_value', 'active');
		}
	}
}
function filter_ban_tab($views) {
	global $wp_query;
	$query = array(
		'meta_key'	  => 'ban_on_id',
		'meta_value'  => 'active'
	);
	$result = new WP_Query($query);
	$count_banned = get_users(['meta_key' => 'ban_on_id', 'meta_value'=> 'active']);
	$class = ($wp_query->query_vars['meta_key'] == 'ban_on_id') ? ' class="current"' : '';
	if($_GET['meta_key'] == 'payed') {
		$views['ban_on_id'] = sprintf(__('<a href="%s" '. $class .'>Banned <span class="count"></span></a>', 'arc'),
			admin_url('users.php?&meta_key=ban_on_id&meta_value=active'));
	} else {
		$views['ban_on_id'] = sprintf(__('<a href="%s" '. $class .'>Banned <span class="count">(%d)</span></a>', 'arc'),
			admin_url('users.php?&meta_key=ban_on_id&meta_value=active'), count($count_banned));
	}
	return $views;
}
/****filter by banned users***/

/****add photos columns images and views*****/
add_filter('manage_edit-photos_columns', 'arc_add_photos_columns');
function arc_add_photos_columns($defaults) {
    $defaults['images'] = esc_html__( 'Images', 'arc' );
    $defaults['views'] = esc_html__( 'Views', 'arc' );
    $defaults['author'] = esc_html__( 'Uploader', 'arc' );
    return $defaults;
}
add_action('manage_photos_posts_custom_column',  'arc_columns_photos_content');
function arc_columns_photos_content($name) {
    global $post;
    $images_blocks = parse_blocks($post->post_content);
    foreach ($images_blocks as $block) {
        if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
            $blocks = array_map( function ( $image_id ) {
                return $image_id;
            }, $block['attrs']['ids'] );
        }
    }
    $images = count($blocks);
    $views = get_post_meta($post->ID, 'photo_gallery_views', true);
    switch ($name) {
        case 'images':
            echo $images;
            break;
        case 'views':
            echo $views;
            break;
    }
}
add_filter("manage_edit-photos_columns", 'move_column_photos_images_views');
function move_column_photos_images_views($author_columns) {
    $preview = array( 'images' => 'Images', 'views' => 'Views');
    return array_slice( $author_columns, 0, 4 ) + $preview + array_slice( $author_columns, 4 );
}
/**** [end] add photos columns images and views*****/

/**** remove products image column ***/
add_filter('manage_edit-product_columns', 'remove_image_products_column',10, 1);
function remove_image_products_column($columns) {
    unset($columns['thumb']);
    return $columns;
}
/**** [end] remove products image column ***/