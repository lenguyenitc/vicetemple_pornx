<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<section id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
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
			query_posts([
				'post_type'=>'blog',
				'orderby'  => 'meta_value_num',
				'order'    => 'ASC',
				's'        => explode('&', htmlentities(sanitize_text_field(get_search_query())))[0]
			]);
			if ( have_posts() ) : ?>

				<header class="page-header">
					<h2 class="widget-title"><?php printf( __( 'Search results for: %s', 'arc' ), '<span>' . explode('&', get_search_query())[0] . '</span>' ); ?></h2>
				</header>
				<div id="articles_container">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/loop', 'blog' );
					endwhile;
					?>
				</div>
			<?php arc_page_navi(); ?>
			<?php else : ?>
				<h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
				<p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
			<?php endif; ?>
			<div class="clear"></div>
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
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	get_sidebar();
}
get_footer();