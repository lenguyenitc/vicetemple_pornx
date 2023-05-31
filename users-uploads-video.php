<?php
/**
Template Name: Uploaded Video
 **/
if(isset($_GET['xxx']) && !empty($_GET['xxx'])) {
	if(get_user_by('ID', $_GET['xxx']) == false) header('Location:' . site_url() . '/profile/'. get_user_by('ID', wp_get_current_user()->ID)->user_login . '/');
	else $userID = $_GET['xxx'];
} elseif(isset($_GET['xxx']) && empty($_GET['xxx'])) {
	header('Location:' . site_url() . '/profile/'. get_user_by('ID', wp_get_current_user()->ID)->user_login . '/');
} elseif(!isset($_GET['xxx'])) header('Location:' . site_url() . '/profile/'. get_user_by('ID', wp_get_current_user()->ID)->user_login . '/');
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-public-profile-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
	<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
		<header>
            <h2 class="widget-title">
                <i class="fa fa-upload"></i>
				<?php echo esc_html__('Uploaded videos by ', 'arc'); ?> <?=get_user_by('ID', $userID)->user_login?>
                <a id="gallery_link" style="float: right; color: rgb(255, 255, 255);" href="/public-profile/?xxx=<?=$_GET['xxx']?>">
                    <i class="fa fa-arrow-circle-o-left"></i> Go back to <?=get_user_by('ID', $userID)->display_name?>'s profile</a>
            </h2>
		</header>
		<div class="clear"></div>
		<div class="videos-list">
			<?php
			if((int)xbox_get_field_value('my-theme-options', 'number_videos_per_page') % (int)xbox_get_field_value('my-theme-options', 'number_videos_per_row') == 0) {
				$per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page');
			} else {
				$per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page') + 1;
			}
            $count_posts = count_user_posts($userID, 'post', 'publish');
			$args_query = array(
				'author'      => $_GET['xxx'],
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_type'   => 'post',
				'suppress_filters' => true,
				'numberposts' => -1,
				'posts_per_page' => $per_page,
				'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
			);
			query_posts($args_query);
			if(have_posts()) {
				while (have_posts() ) : the_post();
					get_template_part( 'template-parts/loop', 'video' );
				endwhile;
				main_arc_page_navi();
            } else {
			    echo '<div class="alert">No uploaded videos yet.</div>';
            }
			?>
		</div>
	</main>
	<script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
	</script>
</div>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-public-profile-page' ) == 'on') {
	get_sidebar();
}
get_footer();