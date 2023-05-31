<?php
/*****add wp-pointer notice******/
function ARC_include_wp_pointer() {
	$position = 'left';

	$title = __('This is a main Dashboard', 'arc');
	$content = __('There you can setting your theme and plugins, watch reports and support messages etc.', 'arc');
	$css_id = 'toplevel_page_arc-dashboard';
	$id = 1;
	?>
	<script type="text/javascript">
        //<![CDATA[
        jQuery(document).ready( function($) {
            $('#<?php echo $css_id ?>').pointer({
                content: '<?php echo '<h3>'.$title.'</h3><p>'.$content.'</p>' ?>',
                position: '<?php echo $position ?>',
                close: function() {
					<?php update_user_meta(get_current_user_id(), 'deny_'. $id, true);?>
                }
            }).pointer('open');
        });
        //]]>
	</script>
	<?php
}
$id = 1;
if(get_user_meta(get_current_user_id(), 'deny_'.$id, true) != 1){
	add_action('admin_print_footer_scripts','ARC_include_wp_pointer');
}
function ARC_turn_on_wp_pointer() {
	wp_enqueue_style('wp-pointer');
	wp_enqueue_script('wp-pointer');
}
add_action( 'admin_enqueue_scripts', 'ARC_turn_on_wp_pointer');
/***** end add wp-pointer notice******/

add_action( 'admin_notices', 'approve_videos_bulk_action_notices' );
function approve_videos_bulk_action_notices() {
	if ( ! empty( $_REQUEST['publish_videos_status'] ) ) {
		printf( '<div id="message" class="updated notice is-dismissible"><p>' .
		        _n( '%s posts updated.',
			        '%s posts updated.',
			        intval( $_REQUEST['publish_videos_status'] )
		        ) . '</p></div>', intval( $_REQUEST['publish_videos_status'] ) );
	}
}


/***display admin notices about pending posts***/
if(is_admin()) {
	if( current_user_can('manage_options') ){
		global $pagenow;
		if($pagenow == 'edit.php' && ($_GET['post_type'] !== 'product' && $_GET['post_type'] !== 'blog' && $_GET['post_type'] !== 'photos' && $_GET['post_type'] !== 'page' && $_GET['post_type'] !== 'user_post')) {
			add_action( 'admin_notices', 'notice_about_pending_videos' );
			function notice_about_pending_videos() {
				$count_posts = wp_count_posts();
				$countpanding = $count_posts->pending;
				if ($countpanding > 0) {
					?>
                    <div class="notice notice-info is-dismissible">
                        <p style="font-weight:bold; font-size:16px"><?php echo __('New videos are pending moderation. Their count:  ', 'arc') . $countpanding;?> </p>
                        <p><a href="<?php echo admin_url();?>edit.php?post_status=pending&post_type=post"><?php echo __('Review pending videos', 'arc');?></a></p>
                    </div>
					<?php
				}
			}
		}
	}
	add_action( 'admin_menu', 'add_user_menu_bubble' );
	function add_user_menu_bubble(){
		global $menu;
		//posts
		$count = wp_count_posts()->pending; //on pending
		if($count){
			foreach( $menu as $key => $value ){
				if( $menu[$key][2] == 'edit.php' ){
					$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
					break;
				}
			}
		}
	}

	if(current_user_can('manage_options')){
		global $pagenow;
		if($pagenow == 'edit.php' && $_GET['post_type'] == 'photos') {
			add_action( 'admin_notices', 'notice_about_pending_photos' );
			function notice_about_pending_photos() {
				$count_posts = wp_count_posts('photos');
				$countpanding = $count_posts->pending;
				if ($countpanding > 0) {
					?>
                    <div class="notice notice-info is-dismissible">
                        <p style="font-weight:bold; font-size:16px"><?php echo __('New albums are pending moderation. Their count:  ', 'arc') . $countpanding;?> </p>
                        <p><a href="<?php echo admin_url();?>edit.php?post_status=pending&post_type=photos"><?php echo __('Review pending albums', 'arc');?></a></p>
                    </div>
					<?php
				}
			}
		}
	}
	add_action( 'admin_menu', 'add_user_menu_photos_bubble' );
	function add_user_menu_photos_bubble(){
		global $menu;
		//print_r($menu);
		//posts
		$count = wp_count_posts('photos')->pending; //on pending
		if($count){
			foreach( $menu as $key => $value ){
				if( $menu[$key][2] == 'edit.php?post_type=photos'){
					$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
					break;
				}
			}
		}
	}

	if( current_user_can('manage_options') ){
		global $pagenow;
		if($pagenow == 'edit.php' && $_GET['post_type'] == 'user_post') {
			add_action( 'admin_notices', 'notice_about_pending_user_posts' );
			function notice_about_pending_user_posts() {
				$count_posts = wp_count_posts('user_post')->pending;
				if ($count_posts > 0) {
					?>
                    <div class="notice notice-info is-dismissible">
                        <p style="font-weight:bold; font-size:16px"><?php echo __('New posts are pending moderation. Their count:  ', 'arc') . $count_posts;?> </p>
                        <p><a href="<?php echo admin_url();?>edit.php?post_status=pending&post_type=user_post"><?php echo __('Review pending posts', 'arc');?></a></p>
                    </div>
					<?php
				}
			}
		}
	}
	add_action( 'admin_menu', 'add_user_menu_posts_bubble' );
	function add_user_menu_posts_bubble(){
		global $menu;
		//posts
		$count = wp_count_posts('user_post')->pending; //on pending
		if($count){
			foreach( $menu as $key => $value ){
				if( $menu[$key][2] == 'edit.php?post_type=user_post' ){
					$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
					break;
				}
			}
		}
	}
}/*** end display admin notices about pending posts***/

/***show bubbles updates***/
if(current_user_can('administrator') && is_admin()) {
    add_action( 'admin_menu', 'add_updates_menu_bubble' );
    function add_updates_menu_bubble(){
        global $menu;
        //updates
        $updates = count_of_pornx_updates();
        if($updates > 0){
            foreach( $menu as $key => $value ){
                if( $menu[$key][2] == 'arc-dashboard' ){
                    $menu[$key][0] .= ' <span class="awaiting-updates"><span class="update-plugins">'.$updates.'</span></span>';
                    break;
                }
            }
        }
    }
}
/*** [end] show bubbles updates***/