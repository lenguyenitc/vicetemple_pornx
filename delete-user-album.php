<?php
/**
 * Template Name: Delete User Album
 */
get_header();
if(!empty($_GET['send_key']) && $_GET['confirm'] == 'yes' && get_post(base64_decode($_GET['send_key']), ARRAY_A)['post_author'] == get_current_user_id()) {?>
	<style>
        #dropdown_menus {
            display: none!important;
        }
	</style>
	<?php
    $gallery_id = base64_decode($_GET['send_key']);
    $content = get_post($gallery_id, ARRAY_A)['post_content'];
    function get_arr_url_size ($size, $content)
    {
        $GLOBALS['size'] = $size;
        $post_blocks = parse_blocks( $content );
        foreach ( $post_blocks as $block ) {
            if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
                $arr_url_image = array_map( function ( $image_id ) {
                    return wp_get_attachment_image_url( $image_id, $GLOBALS['size'] );
                }, $block['attrs']['ids'] );
            }
        }
        return $arr_url_image;
    }
    function get_arr_id_photos ($content)
    {
        $post_blocks = parse_blocks( $content );
        foreach ( $post_blocks as $block ) {
            if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
                $arr_url_image = array_map( function ( $image_id ) {
                    return $image_id;
                }, $block['attrs']['ids'] );
            }
        }
        return $arr_url_image;
    }

    $arr_id_photos_from_current_gallery = get_arr_id_photos($content);
    foreach ($arr_id_photos_from_current_gallery as $id) {
        wp_delete_attachment($id, true);
	    /*** delete from favorites ***/
        $get_all_users_id = get_users(['fields' => 'ID']);
        foreach($get_all_users_id as $item => $user_id) {
            $arr_favorite_photos = unserialize(get_user_meta($user_id, 'favorite_photos', true ));
            $key = array_search($id, $arr_favorite_photos);
            unset($arr_favorite_photos[$key]);
            $new_favorite_photos = serialize($arr_favorite_photos);
            update_user_meta($user_id, 'favorite_photos', $new_favorite_photos);
        }
	    /*** [end] delete from favorites ***/
    }

	if(base64_decode($_GET['last_photo']) !== false) {
		$last_photo = base64_decode($_GET['last_photo']);
		$get_id_last_from_current_gallery = get_arr_id_photos($content);
		foreach ($get_id_last_from_current_gallery as $id) {
			wp_delete_attachment($id, true);
			/*** delete from favorites ***/
			$arr_favorite_photos = unserialize(get_user_meta(get_current_user_id(), 'favorite_photos', true ));
			$key = array_search($id, $arr_favorite_photos);
			unset($arr_favorite_photos[$key]);
			$value = serialize($arr_favorite_photos);
			update_user_meta(get_current_user_id(), 'favorite_photos', $value );
			/*** [end] delete from favorites ***/
		}
	}

    $size = ['thumbnail', 'medium', 'large', 'full', 'arc_thumb_medium', 'arc_thumb_small', 'arc_thumb_large'];
    foreach ($size as $v) {
        $arr_url_image[] = get_arr_url_size($v, $content);
    }

    $upload_dir = wp_upload_dir()['basedir'];
        foreach ($arr_url_image as $val) {
            foreach ($val as $link) {
                $file = explode('/wp-content/uploads/', $link)[1];
                $file_path = $upload_dir . '/'. $file;
                unlink($file_path);
            }
        }
    $delete_post = wp_delete_post( $gallery_id, true );
    if ($delete_post) {
		echo '<div class="alert">Your album has been successfully deleted!</div>';
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