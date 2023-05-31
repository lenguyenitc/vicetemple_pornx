<?php
/**
 * Template Name: Parental Control page
 **/
get_header();
	$sidebar_pos = '';
 ?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
	<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
        <header class="entry-header">
			<?php the_title( '<h1 class="widget-title">', '</h1>' );?>
        </header>
		<div class="entry-content">
			<?php
			the_content();
			//echo get_theme_mod('privacy_policy_text');
			?>
		</div><!-- .entry-content -->
		<script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            //var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
		</script>
	</main>
</div>
<?php
get_footer();?>
