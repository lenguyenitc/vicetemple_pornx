<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-content' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
}
/** **/
if (is_user_logged_in()) {
    if ($_SERVER['REQUEST_URI'] === '/profile/' || $_SERVER['REQUEST_URI'] === '/profile') {
        wp_redirect(site_url() . '/profile/' . get_user_by( 'ID', get_current_user_id() )->user_nicename);
    }
}

if (strpos($_SERVER['REQUEST_URI'], '/page/') !== false)
    wp_redirect(site_url() . '/page-not-found');
/** **/
?>
    <div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
        <main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="widget-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'arc' ); ?></h1>
                </header><!-- .page-header -->
                <div class="page-content">
                    <p class="not-found"><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'arc' ); ?></p>
					<?php get_search_form(); ?>
                    <div class="notfound-videos">
                        <h2 class="widget-title"><?php echo esc_html__('Random videos', 'arc'); ?></h2>
                        <div class="videos-list">
                            <script>
                                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                                //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                            </script>
							<?php
                            $args_query = array(
                                'orderby'     => 'rand',
                                'order'       => 'DESC',
                                'post_type'   => 'post',
                                'suppress_filters' => true,
                                'numberposts' => -1,
                                'posts_per_page' => 8,
                                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                            );
                            query_posts($args_query);
                            while (have_posts() ) { the_post();
                                get_template_part( 'template-parts/loop', 'video' );
                            }
							//main_arc_page_navi();
                            ?>
                        </div>
                    </div>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = <?php echo $wp_query->max_num_pages; ?>;
            </script>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();