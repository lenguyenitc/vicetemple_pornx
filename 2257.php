<?php
/**
 * Template Name: 2257
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-2257' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
		$sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
	<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
		<!--<header class="entry-header">
			<?php /*the_title( '<h1 class="widget-title">', '</h1>' ); */?>
		</header>-->
		<div class="entry-content">
			<?php
			the_content();
			//echo get_theme_mod('2257_text');
			?>
		</div><!-- .entry-content -->
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
	</main>
</div>
<?php
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-2257' ) == 'on' ) {
	get_sidebar();
}
get_footer();?>
