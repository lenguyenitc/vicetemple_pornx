<?php
/**
 * Template Name: Photos
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
	    $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
    <div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
        <main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
	        <?php
	        if( get_theme_mod( 'title_desc_photos_pos' ) == 'top') {
		        if ( get_theme_mod( 'seo_photos_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_photos_title' ); ?>
		        <?php endif;?>
			        <?php if(get_theme_mod('seo_photos_text')) { echo get_theme_mod('seo_photos_text'); } ?>
	        <?php }?>
            <header class="page-header">
                <h2 class="widget-title photos-title" style="border-bottom: none!important;"><?php echo __('Porn albums', 'arc');?></h2>
		        <?php
		        the_archive_description( '<div class="archive-description">', '</div>' );
		        ?>
            </header><!-- .page-header -->
			<?php if ( have_posts() ) { ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/loop', 'photo' );
				endwhile;
				arc_page_navi();
			} else {
				get_template_part( 'template-parts/content', 'none' );
			} ?>
            <div class="clear"></div>
	        <?php
	        if( get_theme_mod( 'title_desc_photos_pos' ) == 'bottom') {
		        if ( get_theme_mod( 'seo_photos_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_photos_title' ); ?>
		        <?php endif;?>
			        <?php if(get_theme_mod('seo_photos_text')) { echo get_theme_mod('seo_photos_text'); } ?>
	        <?php } ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on') {
	get_sidebar();
}
get_footer();