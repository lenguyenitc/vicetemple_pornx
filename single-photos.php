<?php
$count_key = 'photo_gallery_views';
$count = get_post_meta($post->ID, $count_key, true);
if($count == ''){
	$count = 0;
	add_post_meta($post->ID, $count_key, '0');
}else{
	$count++;
	update_post_meta($post->ID, $count_key, $count);
}
//get ids photos from this gallery and make content string
$get_ids_images = parse_blocks($post->post_content);
foreach ($get_ids_images as $block ) {
	if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
		$arr_images_id = array_map(function ($image_id) {
			return $image_id;
		}, $block['attrs']['ids'] );
	}
}

$image_per_page = xbox_get_field_value('my-theme-options', 'number_images_per_page');
$image_count = 1;
$all_pages = ceil(count($arr_images_id)/$image_per_page); //count of all pages
if($_GET['pg'] > $all_pages) {

    header('Location: ' . get_permalink($post->ID).'/?pg='.$all_pages);
}
if($_GET['pg'] == 1 || (isset($_GET['pg']) && empty($_GET['pg']))){
	header('Location: ' . get_permalink($post->ID));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit_photo'])) {
	global $wpdb;
	$album = $post->ID;
	$access_types   = [ 'image/jpeg', 'image/jpg', 'image/png', 'image/gif' ];
	$j = 0;
	foreach ( $_FILES["userfile"]["type"] as $type ) {
		if ( in_array( $_FILES["userfile"]["type"][ $j ], $access_types ) === false ) {
			header( 'Location: ' . get_page_uri());// the page empty because this code executed
			die(); // the page empty because this code executed
		}
		$j++;
	}
	$k = 0;
	foreach ( $_FILES['userfile']['tmp_name'] as $item ) {
		$imageinfo = getimagesize($_FILES['userfile']['tmp_name'][$k]);
		if(in_array($imageinfo['mime'], $access_types ) === false) {
			header( 'Location: ' . get_page_uri()); // the page empty because this code executed
			die(); // the page empty because this code executed
		}
		$k++;
	}
	//upload photos to media library
	if (wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload')) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		$i = 0;

		$files = &$_FILES['userfile'];
		foreach ($files['name'] as $key => $value) {
			if ($files['name'][$key]) {
				$file = array(
					'name'     => $files['name'][$key],
					'type'     => $files['type'][$key],
					'tmp_name' => $files['tmp_name'][$key],
					'error'    => $files['error'][$key],
					'size'     => $files['size'][$key]
				);
				$overrides = [ 'test_form' => false ];
				$movefile = wp_handle_upload($file, $overrides);
				if ( $movefile && empty($movefile['error']) ) {
					$wp_upload_dir = wp_upload_dir();
					$filetype = wp_check_filetype($movefile['url'], null);
					$link = explode('/', preg_replace( '/\.[^.]+$/', '', $movefile['url']));
					$file_title = explode('.', $link[count($link)-1])[0];
					$attachment_preview = array(
						'guid'           => $movefile['url'],
						'post_mime_type' => $movefile['type'],
						'post_title'     => /*preg_replace( '/\.[^.]+$/', '', $movefile['url'])*/$file_title,
						'post_content'   => '',
						'post_status'    => 'inherit',
						'post_author'    => get_current_user_id()
					);
					$scaled_video_attachment_id = wp_insert_attachment($attachment_preview, $movefile['url'], 0);
					$scaled_video_attachment_data = wp_generate_attachment_metadata($scaled_video_attachment_id, $movefile['url']);
					wp_update_attachment_metadata($scaled_video_attachment_id, $scaled_video_attachment_data);
					$images_array[] = [
						$scaled_video_attachment_id => $movefile['url']
					];
				}
			}
		}
	}

	//get ids photos from this gallery and make content string
	$post_blocks = parse_blocks($post->post_content);
	foreach ($post_blocks as $block ) {
		if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
			$old_photos = array_map(function ($image_id) {
				return $image_id;
			}, $block['attrs']['ids'] );
		}
	}
	if($old_photos > 0) {
        foreach ($old_photos as $old_photo) {
            $old_photos_content .= '<li class="blocks-gallery-item">
							<figure>
								<a href="'.site_url().'/?attachment_id='.$old_photo.'">
									<img src="'.wp_get_attachment_image_url($old_photo, 'full').'"
										alt=""
										data-id="'.$old_photo.'"
										data-full-url="'.wp_get_attachment_image_url($old_photo, 'full').'"
										data-link="'.site_url().'/?attachment_id='.$old_photo.'"
										class="wp-image-'.$old_photo.'"/>
								</a>
							</figure>
						</li>';
        }
        $old_photos_string = implode(',', $old_photos);
    }

	//create variable from ids picture for content
	$j = 0;
	foreach ($images_array as $image) {
		foreach ( $image as $id => $url) {
			$ids .= $id .',';
		}
	}
	$ids = mb_substr($ids, 0, -1); //cut last symbol ','

    if($old_photos > 0) {
        $start_content = '<!-- wp:gallery {"ids":['.$ids.','.$old_photos_string.'],"columns":4,"linkTo":"post"} -->
                <figure class="wp-block-gallery columns-4 is-cropped">
                    <ul class="blocks-gallery-grid">';
    } else {
        $start_content = '<!-- wp:gallery {"ids":['.$ids.'],"columns":4,"linkTo":"post"} -->
                <figure class="wp-block-gallery columns-4 is-cropped">
                    <ul class="blocks-gallery-grid">';
    }

	foreach ($images_array as $image) {
		foreach ($image as $id => $url) {
			$center_content .= '<li class="blocks-gallery-item">
                            <figure>
                                <a href="'.site_url().'/?attachment_id='.$id.'">
                                    <img src="'.$url.'" 
                                        alt="" 
                                        data-id="'.$id.'" 
                                        data-full-url="'.$url.'" 
                                        data-link="'.site_url().'/?attachment_id='.$id.'" 
                                        class="wp-image-'.$id.'"/>
                                </a>
                            </figure>
                        </li>';
		}
	}
    if($old_photos > 0) {
        $center_content = $center_content . $old_photos_content;
    }


	$end_content = '</ul></figure><!-- /wp:gallery -->';
	$finish_content = $start_content.$center_content.$end_content;

	$new_album_data = [
		'ID' => $post->ID,
		'post_content' => $finish_content
	];
	wp_update_post($new_album_data);

	//$succMsg = esc_html__( 'Photos successfully added.', 'arc' );
} else $succMsg = '';
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-photos' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<?php
/** Additional attribute for redirect pages [start]**/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit_photo']))
{
    echo '<div id="do_redirect" class="find_redirect"></div>';?>
    <script>
        jQuery(document).ready(function($){
            if ($('body').find('div.find_redirect').attr('id') == 'do_redirect')
            {
                window.location.href = location;
            }
        });
    </script>
<?php
}
/** Additional attribute for redirect pages [end]**/
?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' && empty($_POST['submit_photo']))
            {
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'photos' );
                endwhile;
            }

			?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-photos' ) == 'on') {
	get_sidebar();
}
get_footer();