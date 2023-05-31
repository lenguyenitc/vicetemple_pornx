<?php
/**
 * Template Name: Delete User Video
 */
get_header();
if(!empty($_GET['send_key']) && $_GET['confirm'] == 'yes' && get_post(base64_decode($_GET['send_key']), ARRAY_A)['post_author'] == wp_get_current_user()->ID) {?>
	<style>
        #dropdown_menus {
            display: none!important;
        }
	</style>
	<?php
	global $wpdb;
	$upload_dir = wp_upload_dir()['basedir'];
    $postid = base64_decode($_GET['send_key']);
    $video_url =  get_post_meta( $postid, 'video_url', true );
    $main_thumb_url =  get_post_meta( $postid, 'thumb', true );
    if ($video_url) {
        $attachment_id = $wpdb->get_var( "SELECT `post_id` FROM `wp_postmeta` WHERE `meta_value` = '".$video_url."' AND `meta_key` = '_wp_attached_file'" );
	    wp_delete_attachment($attachment_id, true);

        $file = explode('/wp-content/uploads/', $video_url)[1];
        $file_path = $upload_dir . '/'. $file;
        unlink($file_path);
    }
	if ($main_thumb_url) {
		$attachment_id = $wpdb->get_var( "SELECT `post_id` FROM `wp_postmeta` WHERE `meta_value` = '".$main_thumb_url."' AND `meta_key` = '_wp_attached_file'" );
		wp_delete_attachment($attachment_id, true);

		$file = explode('/wp-content/uploads/', $main_thumb_url)[1];
		$file_path = $upload_dir . '/'. $file;
		unlink($file_path);
	}
    $delete_post = wp_delete_post($postid, false);
	if ($delete_post) {
        echo '<div class="alert">Your video has been successfully deleted!</div>';
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