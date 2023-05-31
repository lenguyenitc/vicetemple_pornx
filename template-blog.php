<?php
/**
 * Template Name: Blog
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-blog' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_blog_pos' ) == 'top') {
				if ( get_theme_mod( 'seo_blog_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_blog_title' ); ?>
				<?php endif;?>
                <p >
					<?php if(get_theme_mod('seo_blog_text')) { echo get_theme_mod('seo_blog_text'); } ?>
                </p>
			<?php }?>
			<header class="page-header">
				<?php the_title( '<h2 class="widget-title">', '</h2>' ); ?>
			</header><!-- .page-header -->
			<?php $myposts = new WP_Query( array(
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'operator' => 'NOT EXISTS',
					),
				)
			) ); ?>
			<div class="videos-list">
				<?php if ( $myposts->have_posts() ) : while ( $myposts->have_posts() ) : $myposts->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
            <div class="clear"></div>
			<?php
			if( get_theme_mod( 'title_desc_blog_pos' ) == 'bottom') {
				if ( get_theme_mod( 'seo_blog_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_blog_title' ); ?>
				<?php endif;?>
                <p>
					<?php if(get_theme_mod('seo_blog_text')) { echo get_theme_mod('seo_blog_text'); } ?>
                </p>
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
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-blog' ) == 'on') {
	get_sidebar();
}
get_footer();