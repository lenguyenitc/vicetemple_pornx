<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<section id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <div id="primary" class="actors-list">
                <main id="main" class="site-main" role="main">
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'top') {?>
                <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</div>
			<?php }?>
			<?php
			$s = htmlentities(sanitize_text_field(get_search_query()));
			if(empty($_GET['s'])):?>
                <h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
                <p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
            <?php
            else:
			global $wpdb;
			$q_actors = "SELECT `wp_terms`.`name`, 
								`wp_terms`.`slug`, 
								`wp_terms`.`term_id` 
							FROM `wp_terms` 
							JOIN `wp_term_taxonomy` 
							ON `wp_term_taxonomy`.`term_id` = `wp_terms`.`term_id` 
							WHERE `wp_terms`.`name` 
							LIKE '{$s}%' 
							AND `wp_term_taxonomy`.`taxonomy` = 'pornstars'
							AND `wp_term_taxonomy`.`count` > 0";
			$actors = $wpdb->get_results($q_actors);
			if(count($actors) > 0) {?>
                    <header class="page-header">
                        <h2 class="widget-title">
                            <div><?php printf( __( 'Search results for: %s', 'arc' ), '<span>' . explode('&', get_search_query())[0] . '</span>' ); ?>
                            </div></h2>
                    </header>
                    <?php foreach ($actors as $actor):?>
                    <div class="videos-list">
                        <article id="post-<?php echo $actor->term_id;?>" class="thumb-block actors post-<?php the_ID(); ?> type-post">
                            <a href="<?php echo esc_url(home_url()); ?>/pornstar/<?php echo $actor->slug; ?>/" title="<?php echo $actor->name; ?>">
                                <!-- Thumbnail -->
	                            <?php
	                            $objects = get_objects_in_term($actor->term_id, 'pornstars');
	                            $thumb_url = get_post_meta($objects[0], 'thumb', true);
	                            $image_id = get_term_meta($actor->term_id, 'actors-image-id', true );
	                            $back_img_url = wp_get_attachment_image_url($image_id, 'full');
	                            if($image_id) {
		                            $back_img_url = wp_get_attachment_image_url($image_id, 'full');
	                            }
                                elseif ($image_id === false || $thumb_url === false) {
		                            $back_img_url = get_template_directory_uri() .'/assets/img/no-image.jpg';
	                            }
                                elseif ($thumb_url) {
		                            $back_img_url = $thumb_url;
	                            }
	                            if(strpos($back_img_url, '(') !== false || strpos($back_img_url, ')') !== false) {
		                            $host         = parse_url($back_img_url, PHP_URL_HOST);
		                            $protocol     = parse_url($back_img_url, PHP_URL_SCHEME);
		                            $part_one     = $protocol .'://'. $host . '/';
		                            $part_twoo    = explode($part_one, $back_img_url)[1];
		                            $part_twoo    = urlencode($part_twoo);
		                            $res = $part_one . $part_twoo;
		                            $back_img_url = $res;
	                            }
	                            ?>
                                <div class="post-thumbnail" style="border-radius:4px;background-image: url(<?=$back_img_url;?>) !important;">
                                </div>
                                <header class="entry-header actors-entry-header">
                                    <p style="text-align: left; width: 100%;" class="actor-title"><?php echo $actor->name; ?></p>
                                    <p class="video_block_delimiter"></p>
                                    <p class="rating-bar">
			                            <?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
				                            <?php echo get_term_meta($actor->term_id, 'actors_views_count', true); ?> <span class="viewers">views</span></span><?php endif; ?>
                                        <span class="actors-video-count"><?php echo get_term($actor->term_id)->count;?> <span> video</span></span>
                                    </p>
                                </header>
                            </a>
                        </article>
                    </div>
                    <?php
                endforeach;
			} else { ?>
				<h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
				<p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
			<?php } endif;?>

			<div class="clear"></div>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'bottom') {?>
                    <div class="customizer_content" style="margin-bottom: 0 !important;">
				<?php
                if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</div>
			<?php } ?>
                </main>
            </div>
		</main>
	</section>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	get_sidebar();
}
get_footer();