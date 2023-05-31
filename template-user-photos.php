<?php
/**
 * Template Name: User Albums
 */
get_header();
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-users-galleries-page' ) == 'on' ) {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<div id="primary" class="content-area gallery-list <?php echo $sidebar_pos; ?>">
<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
    <header class="page-header">
        <h2 class="widget-title"><?php echo get_userdata($_GET['a'])->display_name ."'s albums"?></h2>
    </header>
    <?php
    query_posts([
	    'post_type' => 'photos',
	    'post_status' => 'publish',
	    'author' => $_GET['a']
    ]);
    ?>
    <div class="gallery-list">
	    <?php
	    if(have_posts()):
		    while(have_posts()): the_post();
	            get_template_part('template-parts/loop', 'photo');
		    endwhile;
	    endif;?>
    </div>
    <script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
    </script>
</main>
</div>
<?php
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-users-galleries-page' ) == 'on' ) {
    get_sidebar();
}
get_footer();
