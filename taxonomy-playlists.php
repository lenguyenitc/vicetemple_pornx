<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-playlist' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="page-header">
                <?php $playlist_title = str_replace('WatchLater', 'Watch Later', single_term_title('',0));?>
                <h1 class="widget-title playlist-mobile" style="display:none">Playlist <br><span><?=$playlist_title?></span></h1>
                <h1 class="widget-title playlist-desktop">Playlist: <span><?=$playlist_title?></span></h1>
            </header>
            <?php if(get_the_archive_description() !== ''):?>
            <div style="padding-bottom: 10px;border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;margin-bottom: 1em;" class="playlist-description">
	            <?=get_the_archive_description()?>
            </div>
            <?php endif;?>
			<?php
            if (have_posts()): ?>
				<div class="videos-list">
					<?php $taxonomy = get_queried_object(); ?>
                    <input type="hidden" id="taxonomy_slug" value="<?=$taxonomy->slug?>" />
					<?php
					$term = get_term_by('slug', $taxonomy->slug, 'playlists')->term_id;
					$query_author = $wpdb->get_row("SELECT `wp_users`.`user_login`,`wp_users`.`ID`
									FROM `wp_users` WHERE `wp_users`.`ID` =
									(SELECT u.`user_id` FROM `wp_usermeta` u
										INNER JOIN `wp_termmeta` t ON u.`meta_value` = t.`term_id`
									WHERE u.`meta_value` = ". $term ." AND u.`meta_key` = 'userPlaylists')");
					global $set_query_playlist_author_id;
					$set_query_playlist_author_id = $query_author->ID;
					?>
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/loop', 'playlistinside' );
					endwhile; ?>
				</div>
                <div class="clear"></div>
                <div class="separator-pagination"></div>
				<?php arc_page_navi();
			 else:?>
                <div class="playlist-lists">
		            <p><?php echo __('This playlist is empty', 'arc');?></p>
                </div>
			<?php endif; ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-playlist' ) == 'on' ) {
	get_sidebar();
}
get_footer();