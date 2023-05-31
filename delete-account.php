<?php
/**
 * Template Name: Delete Users Account
 */
get_header();
if(!empty($_GET['send_key']) && $_GET['confirm'] == 'yes' && base64_decode($_GET['send_key']) == wp_get_current_user()->ID) {?>
    <style>
        #dropdown_menus {
            display: none!important;
        }
     </style>
    <?php
    global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/user.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';

	//delete galleries
    $del_user_gallery_folder = 'wp-content/uploads/main_directory_user_photo/'. get_userdata(base64_decode($_GET['send_key']))->user_login . '/';
	function delDir($dir) {
		$files = array_diff(scandir($dir), ['.','..']);
		foreach ($files as $file) {
			(is_dir($dir.'/'.$file)) ? delDir($dir.'/'.$file) : unlink($dir.'/'.$file);
		}
		rmdir($dir);
	}
	delDir($del_user_gallery_folder);

	//delete comments
	 $del_comments = "DELETE a, b FROM `wp_comments` a
						 LEFT JOIN `wp_commentmeta` b ON (a.`comment_ID` = b.`comment_id`)
						 WHERE a.`user_id` = ". (string)base64_decode($_GET['send_key']);
	 $wpdb->query($del_comments);


    //delete user playlists
    $playlists = get_user_meta(base64_decode($_GET['send_key']), 'userPlaylists');
    foreach ($playlists as $playlist) {
	    wp_delete_term($playlist, 'playlists');
    }
	delete_user_meta(base64_decode($_GET['send_key']), 'userPlaylists');

	//delete default watch list playlists
    $def_playlist = get_user_meta(base64_decode($_GET['send_key']), 'userLaterPlaylists', true);
	wp_delete_term($def_playlist, 'playlists');
	delete_user_meta(base64_decode($_GET['send_key']), 'userLaterPlaylists');

	//delete watch videos
	delete_user_meta(base64_decode($_GET['send_key']), 'watchList');

	//delete subscriptions
    delete_user_meta(base64_decode($_GET['send_key']), 'subscribe_author');

	//delete payments
	$del_bitcoin = "DELETE FROM `wp_vicetemple_payment_bitcoin` WHERE `client_id` = " . (string)base64_decode($_GET['send_key']);
	$wpdb->query($del_bitcoin);

	//delete user
	$del = wp_delete_user(base64_decode($_GET['send_key']));

	if($del) {
	    echo '<div class="alert">Your account has been successfully deleted!</div>';
	}
} else {
	wp_redirect(home_url());
	exit;
}?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                /*var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main>
	</div>
<?php
get_footer();
exit;