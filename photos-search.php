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
			if( get_theme_mod( 'title_desc_search_pos' ) == 'top') {
				if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
				<p>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</p>
			<?php }
			$s = htmlentities(sanitize_text_field(explode('&', get_search_query())[0]));?>
            <?php if(empty($_GET['s'])):?>
                <h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
                <p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
            <?php else:?>
				<?php
				query_posts([
					'post_type'=>'photos',
					'orderby'  => 'meta_value_num',
					'order'    => 'ASC',
					's'        => $s,
					'posts_per_page' => 10,
					'posts_per_archive_page' => 10,
					'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
					'suppress_filters' => true
				]);
				if ( have_posts() ) : ?>
				<header class="page-header">
					<h2 class="widget-title"><?php printf( __( 'Search results for: %s', 'arc' ), '<span>' . explode('&', get_search_query())[0] . '</span>' ); ?></h2>
					<?php /*get_template_part( 'template-parts/content', 'filters' ); */?>
				</header>
				<div class="gallery-list">
					<?php
					while (have_posts()) : the_post();
						get_template_part( 'template-parts/loop', 'photo' );
					endwhile;
					?>
				</div>
            <?php
					wp_reset_postdata();
					$count_albums = count(get_posts(['post_type' => 'photos','numberposts' => -1, 'hidden_empty' => 1]));
                    if($count_albums > 10):?>
            <div class="clear"></div>
            <div class="separator-pagination"></div>
            <style>
                div.pagination ul {
                    margin-bottom: 0 !important;
                    padding-bottom: 0 !important;
                }
                div.pagination {
                    margin-bottom: 40px !important;
                }
            </style>
            <?php endif;
	                albums_page_navi();
			?>
			<?php else : ?>
				<h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
				<p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
			<?php endif; ?>
			<div class="clear"></div>
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'bottom') {
				if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
				<p>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</p>
			<?php } ?>
            <?php endif;?>
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