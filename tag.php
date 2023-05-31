<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-tags' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="page-header">
				<?php
				the_archive_title( '<h1 class="widget-title tag-title">', '</h1>' );
				if( xbox_get_field_value( 'my-theme-options', 'tag-desc-position' ) == 'top')
				{ the_archive_description( '<div class="archive-description">', '</div>' ); }
				?>
            </header><!-- .page-header -->
			<?php if ( have_posts() ):?>
				<div class="videos-list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/loop', 'video' );
					endwhile; ?>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
				</div>
            <style>
                ul.single {
                    margin-bottom: 0 !important;
                    padding-bottom: 0 !important;
                }
            </style>
				<?php arc_page_navi();
			 else: ?>
                <div class="videos-list">
                    <p><?php echo __('There are no videos with this tag.', 'arc');?></p>
                </div>
			<?php endif;
            if( xbox_get_field_value( 'my-theme-options', 'tag-desc-position' ) == 'bottom' ) : ?><div class="clear"></div>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?><?php endif; ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
        </main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-tags' ) == 'on') {
	get_sidebar();
}
get_footer();