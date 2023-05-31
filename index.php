<?php
if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['from'] == 'frame') {
	header('Location: ' . get_post_meta($_GET['id'], 'video_url', true));
	exit;
}
get_header();
?>
<?php
if(wp_is_mobile()) {
	if(xbox_get_field_value( 'my-theme-options', 'mob-homepage-widgets' ) == 'on' && is_front_page()) {
		$sidebar_pos = false;
	} else {
		if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-content' ) == 'on' ) {
			if ( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
				$sidebar_pos = 'with-sidebar-right';
			} else {
				$sidebar_pos = 'with-sidebar-left';
			}
		} else {
			$sidebar_pos = '';
		}
	}
} else {
	if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-content' ) == 'on' ) {
		if ( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
			$sidebar_pos = 'with-sidebar-right';
		} else {
			$sidebar_pos = 'with-sidebar-left';
		}
	} else {
		$sidebar_pos = '';
	}
}
?>

    <div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
        <main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <?php if ( get_theme_mod( 'seo_title' ) !== '' || get_theme_mod( 'seo_setting' )) : ?>
            <div class="customizer_content">
			<?php if( get_theme_mod( 'title-desc-pos' ) == 'top') {
				echo get_theme_mod( 'seo_title' );
				if ( get_theme_mod( 'seo_setting' ) ) {
					echo get_theme_mod( 'seo_setting' );
				}
			}?>
            </div>
	        <?php endif;?>
                    <?php
			if ( have_posts() ) {
				if ( !wp_is_mobile() && function_exists('dynamic_sidebar') && is_active_sidebar('homepage-top') && is_active_sidebar('homepage-bottom') && !isset($_GET['filter']) ) {
				    dynamic_sidebar('homepage-top');
				    if(xbox_get_field_value( 'my-theme-options', 'layout') == 'full-width') {
				        dynamic_sidebar('homepage-ads-full');
                    } else {
					    dynamic_sidebar('homepage-ads-boxed');
                    }
					dynamic_sidebar('homepage-bottom');
				}
				elseif( wp_is_mobile() && function_exists('dynamic_sidebar') && is_active_sidebar('homepage-top') && is_active_sidebar('homepage-bottom') && !isset($_GET['filter'])) {
				    dynamic_sidebar('homepage-top');
					if(xbox_get_field_value( 'my-theme-options', 'layout') == 'full-width') {
						dynamic_sidebar('homepage-ads-full');
					} else {
						dynamic_sidebar('homepage-ads-boxed');
					}
					dynamic_sidebar('homepage-bottom');
				}
				else { ?>
                    <header class="page-header">
                        <h2 class="widget-title"><?php echo arc_get_filter_title(); ?></h2>
						<?php get_template_part( 'template-parts/content', 'filters' ); ?>
                    </header><!-- .page-header -->
                    <?php
                    //display featured videos
                    if(isset($_GET['filter']) && $_GET['filter'] == 'featured') {
                            $count = count(get_posts(['meta_key' => 'featured_video', 'meta_value'  => 'on','numberposts' => -1]));
                           $args_query = array(
	                           'post_type'      => 'post',
	                           'meta_key'	  => 'featured_video',
	                           'meta_value'  => 'on',
	                           'posts_per_page' => 16,
	                           'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                           );
						    $home_query = new WP_Query($args_query);
                           ?>
                    <div class="videos-list">
                        <?php
                        while ( $home_query->have_posts() ) : $home_query->the_post();
                                get_template_part( 'template-parts/loop', 'video' );
                                endwhile; ?>
                    </div>
                        <div class="clear"></div>
                        <div class="separator-pagination"></div>

					<?php
	                    arc_page_featured_navi(ceil($count / 16));
                    }  else {?>
                        <div class="videos-list">
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/loop', 'video' );
						endwhile;
						?>
                        </div>
                        <div class="clear"></div>
                        <div class="separator-pagination"></div>
					<?php
						arc_page_navi();
                    }
				}
			} ?>

            <!----all videos---->
            <?php if(xbox_get_field_value( 'my-theme-options', 'enable_all_videos' ) == 'on'):?>
                <?php if(!isset($_GET['filter'])) :?>
                <header class="page-header">
                    <h2 class="widget-title"><?=(xbox_get_field_value('my-theme-options', 'title_all_videos')) ? xbox_get_field_value('my-theme-options', 'title_all_videos') : 'All videos'; ?></h2>
                </header><!-- .page-header -->
                    <div class="videos-list">
                        <?php
                        $args_all_videos = array(
                            'post_type'      => 'post',
                            'posts_per_page' => (!wp_is_mobile()) ? xbox_get_field_value('my-theme-options', 'number_videos_per_page') : xbox_get_field_value('my-theme-options', 'mob-number_videos_per_page') ,
                            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                        );
                        $all_videos_result = new WP_Query($args_all_videos);
                        /* Start the Loop */
                        while ( $all_videos_result->have_posts() ) : $all_videos_result->the_post();
                            get_template_part( 'template-parts/loop', 'video' );
                        endwhile; ?>

                    </div>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
                    <?php main_arc_page_navi();?>
                <?php endif; ?>
            <?php endif; ?>
            <!----end all videos---->

            <div class="customizer_content">
			<?php if( get_theme_mod('title-desc-pos' ) == 'bottom') {
				if ( get_theme_mod( 'seo_title' ) != '' ) : ?>
                    <?php echo get_theme_mod( 'seo_title' ); ?>
				<?php endif;?>
                <?php if(get_theme_mod('seo_setting')) { echo get_theme_mod('seo_setting');}?>
                <?php } ?>
            </div>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
if(wp_is_mobile()) {
	//get_sidebar();
	if(xbox_get_field_value( 'my-theme-options', 'mob-homepage-widgets' ) == 'on' && is_front_page()) {
		$disable = false;
	} else $disable = true;

	if(xbox_get_field_value( 'my-theme-options', 'mob-show-sidebar' ) == 'on' && $disable) {
		get_sidebar();
	}

} else get_sidebar();

get_footer();
