<?php
/*** data about site - general ***/
function site_name_for_letter() {
	return get_bloginfo('name');
}
add_shortcode('site_name', 'site_name_for_letter');

function login_page_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Login',
	], $atts);
	return '<a href="'.wp_login_url().'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('login_page', 'login_page_link');

function community_feed_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Community feed',
	], $atts);
	return '<a href="'.site_url('/community/').'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('community_feed', 'community_feed_link');

function site_link($atts, $site){
	$params = shortcode_atts([
		'anchor_text' => do_shortcode('Visit ') . get_bloginfo('name'),
	], $atts);
	return '<a href="'.home_url().'">' . $params["anchor_text"] . do_shortcode($site).'</a>';
}
add_shortcode('site_link', 'site_link');

function contact_page_link($atts, $site){
	$params = shortcode_atts([
		'anchor_text' => 'Contact us',
	], $atts);
	return '<a href="'.site_url('/contact/').'">' . $params["anchor_text"].'</a>';
}
add_shortcode('contact_page', 'contact_page_link');

function reset_pass_link($atts, $anchor){
	$params = shortcode_atts([
		'anchor_text' => 'Set password',
	], $atts);
	return '<a href="~~~ipostas~~~">' . $params["anchor_text"].'</a>';
}
add_shortcode('password_link', 'reset_pass_link');

function delete_account_link($atts, $anchor){
	$params = shortcode_atts([
		'anchor_text' => 'Delete account',
	], $atts);
	return '<a href="~~~ipostas2~~~">' . $params["anchor_text"].'</a>';
}
add_shortcode('delete_account', 'delete_account_link');

function delete_video_link($atts, $anchor){
	$params = shortcode_atts([
		'anchor_text' => 'Delete video',
	], $atts);
	return '<a href="~~~ipostas3~~~">' . $params["anchor_text"].'</a>';
}
add_shortcode('delete_video', 'delete_video_link');

function delete_album_link($atts, $anchor){
	$params = shortcode_atts([
		'anchor_text' => 'Delete album',
	], $atts);
	return '<a href="~~~ipostas4~~~">' . $params["anchor_text"].'</a>';
}
add_shortcode('delete_album', 'delete_album_link');

/*** [end] site - general ***/


/*** admin and support ***/
function get_admin_email_for_letter($atts){
	return get_option('admin_email');
}
add_shortcode('admin_email', 'get_admin_email_for_letter');

function get_admin_name_for_letter($atts){
	return get_userdata('1')->display_name;
}
add_shortcode('admin_name', 'get_admin_name_for_letter');

function support_email($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Email support',
	], $atts);
	return '<a href="mailto:'.xbox_get_field_value('my-theme-options', 'support-email').'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('support_email', 'support_email');
/*** [end] admin and support ***/


/*** data about user ***/
function get_user_login_for_letter($atts){
	$curr_user_login = '~~~curr_user_login~~~';
	return $curr_user_login;
}
add_shortcode('user_login', 'get_user_login_for_letter');

function get_user_first_name_for_letter($atts){
	$curr_user_fname = '~~~curr_user_fname~~~';
	return $curr_user_fname;
}
add_shortcode('user_firstname', 'get_user_first_name_for_letter');

function get_user_last_name_for_letter($atts){
	$curr_user_lname = '~~~curr_user_lname~~~';
	return $curr_user_lname;
}
add_shortcode('user_lastname', 'get_user_last_name_for_letter');

function get_user_email_for_letter($atts){
	$curr_user_email = '~~~curr_user_email~~~';
	return $curr_user_email;
}
add_shortcode('user_email', 'get_user_email_for_letter');

function user_uploads($atts){
	global $current_user_id;
	$user_id = $current_user_id;
	$params = shortcode_atts([
		'anchor_text' => 'My Uploads',
	], $atts);
	return '<a href="'. site_url('/profile/') . get_userdata($user_id)->user_login. '">' . $params["anchor_text"] . '</a>';
}
add_shortcode('user_uploads', 'user_uploads');
/*** [end] data about user ***/

/*** backend - general ***/
function get_link_on_new_video($atts){
	global $current_user;
	$params = shortcode_atts([
		'anchor_text' => 'New video',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=post&author=' . $current_user->ID .'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('new_video', 'get_link_on_new_video');

function get_link_on_all_pending_videos($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Pending videos',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=post">' . $params["anchor_text"] . '</a>';
}
add_shortcode('pending_videos', 'get_link_on_all_pending_videos');

function get_link_on_submitted_photos($atts){
	global $current_user;
	$params = shortcode_atts([
		'anchor_text' => 'New album',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=photos&author=' . $current_user->ID .'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('new_album', 'get_link_on_submitted_photos');

function get_link_on_all_pending_photos($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Pending photos',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=photos">' . $params["anchor_text"] . '</a>';
}
add_shortcode('pending_albums', 'get_link_on_all_pending_photos');

function get_the_link_on_submitted_posts($atts){
	global $current_user;
	$params = shortcode_atts([
		'anchor_text' => 'New post',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=user_post&author=' . $current_user->ID .'">' . $params["anchor_text"] . '</a>';
}
add_shortcode('new_post', 'get_the_link_on_submitted_posts');

function get_the_link_on_all_pending_posts($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Pending posts',
	], $atts);
	return '<a href="'.admin_url().'edit.php?post_status=pending&post_type=user_post">' . $params["anchor_text"] . '</a>';
}
add_shortcode('pending_posts', 'get_the_link_on_all_pending_posts');

function moderate_comment_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'View comment',
	], $atts);
	return '<a href="' . admin_url( 'edit-comments.php?comment_status=moderated#wpbody-content'). '">' . $params["anchor_text"] . '</a>';
}
add_shortcode('view_comment', 'moderate_comment_link');

function reported_comment_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Reported comment',
	], $atts);
	return '<a href="'.admin_url().'edit-comments.php?meta_key=reports">' . $params["anchor_text"] . '</a>';
}
add_shortcode('reported_comment', 'reported_comment_link');

function support_messages_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Support messages',
	], $atts);
	return '<a href="'.admin_url().'admin.php?page=arc-dashboard&tab=support">' . $params["anchor_text"] . '</a>';
}
add_shortcode('support_messages', 'support_messages_link');

function video_reports_link($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Reports',
	], $atts);
	return '<a href="'.admin_url().'admin.php?page=arc-dashboard&tab=reports">' . $params["anchor_text"] . '</a>';
}
add_shortcode('reports', 'video_reports_link');

function members_page_link($atts, $site){
	$params = shortcode_atts([
		'anchor_text' => 'Members',
	], $atts);
	return '<a href="'.admin_url().'users.php'.'">' . $params["anchor_text"].'</a>';
}
add_shortcode('members', 'members_page_link');

/*** [end] backend - general ***/


function watch_video($atts){
	$params = shortcode_atts([
		'anchor_text' => 'Watch video',
	], $atts);
	return '<a href="~~~subs_watch_video~~~">' . $params["anchor_text"] . '</a>';
}
add_shortcode('watch_video', 'watch_video');
