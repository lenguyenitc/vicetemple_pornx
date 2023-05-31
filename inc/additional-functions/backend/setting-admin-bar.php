<?php
/*** [start] hide search in admin bar***/
add_action('admin_head', 'hide_search_toolbar');
add_action('wp_head', 'hide_search_toolbar');
function hide_search_toolbar () { ?>
	<style type="text/css">
        #wpadminbar #adminbarsearch {
            display: none; }
	</style>
<?php } /*** [end] hide search in admin bar***/

/****change admin top bar***/
add_action( 'add_admin_bar_menus', 'change_admin_top_bar');
function change_admin_top_bar() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_customize_menu', 40); //customize menu
	remove_action( 'admin_bar_menu', 'wp-admin-bar-new-content', 40); //new content
	remove_action( 'admin_bar_menu', 'wp-admin-bar-themes', 40); //themes
	remove_action( 'admin_bar_menu', 'wp-admin-bar-widgets', 40); //widgets
	remove_action( 'admin_bar_menu', 'wp-admin-bar-menus', 40); //menus
	remove_action( 'admin_bar_menu', 'wp-admin-bar-background', 40); //background
	remove_action( 'admin_bar_menu', 'wp-admin-bar-header', 40); //header
	remove_action( 'admin_bar_menu', 'wp-admin-bar-archive', 40); //product
}
/*****add top bar link on dashboard for admin***/
add_action( 'admin_bar_menu', 'dashboard_link_to_admin_bar_menu', 30 );
function dashboard_link_to_admin_bar_menu( $wp_admin_bar ) {
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'id'     => 'theme_dashboard_id',
		'title' => __('Theme Dashboard', 'arc'),
		'href'  => admin_url() . 'admin.php?page=arc-dashboard'
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'id'     => 'customizer_theme_id',
		'title' => __('Theme Customizer', 'arc'),
		'href'  => admin_url() . 'customize.php?return=%2Fwp-admin%2Fadmin.php%3Fpage%3Darc-dashboard'
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'id'     => 'theme_options_id',
		'title' => __('Theme Options', 'arc'),
		'href'  => admin_url() . 'admin.php?page=my-theme-options'
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'id'     => 'manage_videos_id',
		'title' => __('Manage Videos', 'arc'),
		'href'  => admin_url() . 'edit.php'
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name',
		'id'     => 'manage_photos_id',
		'title' => __('Manage Photos', 'arc'),
		'href'  => admin_url() . 'edit.php?post_type=photos'
	));
}/***** end add top bar link on dashboard for admin***/

 /***hide admin bar***/
if (!current_user_can( 'manage_options' ) ) {
	add_filter('show_admin_bar', '__return_false');
}

//show pending video posts icon on top admin bar
add_action( 'admin_bar_menu', 'pending_video_in_admin_bar_menu', 70 );
function pending_video_in_admin_bar_menu($wp_admin_bar) {
	if (!current_user_can('edit_posts')) {
		return;
	}
	$count_posts = wp_count_posts();
	$countpanding = $count_posts->pending;
	if ($countpanding > 0) {
		$icon   = '<span class="ab-icon"></span>';
		$title  = '<span class="ab-label awaiting-mod pending-count count-' . $countpanding . '" aria-hidden="true">' . number_format_i18n( $countpanding ) . '</span>';

		$wp_admin_bar->add_node(
			array(
				'id'    => 'video',
				'title' => $icon . $title,
				'href'  => admin_url('edit.php?post_status=pending&post_type=post'),
			)
		);
	}
}

//show pending photo posts icon on top admin bar
add_action( 'admin_bar_menu', 'pending_photo_in_admin_bar_menu', 70 );
function pending_photo_in_admin_bar_menu($wp_admin_bar) {
	if (!current_user_can('edit_posts')) {
		return;
	}
	$count_posts = wp_count_posts('photos');
	$countpanding = $count_posts->pending;
	if ($countpanding > 0) {
		$icon   = '<span class="ab-icon"></span>';
		$title  = '<span class="ab-label awaiting-mod pending-count count-' . $countpanding . '" aria-hidden="true">' . number_format_i18n( $countpanding ) . '</span>';

		$wp_admin_bar->add_node(
			array(
				'id'    => 'photos',
				'title' => $icon . $title,
				'href'  => admin_url('edit.php?post_status=pending&post_type=photos'),
			)
		);
	}
}

//show pending user posts icon on top admin bar
add_action( 'admin_bar_menu', 'pending_posts_in_admin_bar_menu', 70);
function pending_posts_in_admin_bar_menu($wp_admin_bar) {
	if (!current_user_can('edit_posts')) {
		return;
	}
	$count_posts = wp_count_posts('user_post');
	$countpanding = $count_posts->pending;
	if ($countpanding > 0) {
		$icon   = '<span class="ab-icon"></span>';
		$title  = '<span class="ab-label awaiting-mod pending-count count-' . $countpanding . '" aria-hidden="true">' . number_format_i18n( $countpanding ) . '</span>';

		$wp_admin_bar->add_node(
			array(
				'id'    => 'user-post',
				'title' => $icon . $title,
				'href'  => admin_url('edit.php?post_status=pending&post_type=user_post'),
			)
		);
	}
}

//show pending orders icon on top admin bar
add_action( 'admin_bar_menu', 'processing_orders_in_admin_bar_menu', 70);
function processing_orders_in_admin_bar_menu($wp_admin_bar) {
	if (!current_user_can('edit_posts')) {
		return;
	}
	global $wpdb;
	$count_posts = $wpdb->get_var("SELECT COUNT(`order_id`) FROM `wp_wc_order_stats` WHERE `status` = 'wc-processing'");

	if ($count_posts > 0) {
		$icon   = '<span class="ab-icon"></span>';
		$title  = '<span class="ab-label awaiting-mod pending-count count-' . $count_posts . '" aria-hidden="true">' . number_format_i18n( $count_posts ) . '</span>';

		$wp_admin_bar->add_node(
			array(
				'id'    => 'user-order',
				'title' => $icon . $title,
				'href'  => admin_url('edit.php?post_status=wc-processing&post_type=shop_order'),
			)
		);
	}
}

//show updates icon on top admin bar
add_action('admin_bar_menu', 'show_icon_pornx_updates', 50);
function show_icon_pornx_updates($wp_admin_bar) {
    $updates = count_of_pornx_updates();
    if($updates > 0) {
        $args = array(
            'id' => 'new_update',
            'title' => '<span class="ab-icon" style="opacity:0.5;-webkit-filter: grayscale(100%);filter: grayscale(100%);width: 18px;height: 16px;"></span><span class="ab-label new_updates">'.$updates.'</span>',
            'href' => admin_url('admin.php?page=arc-dashboard'),
            'meta' => array(
                'class' => 'new_update',
                'title' => 'Theme PornX has an update'
            )
        );
        $wp_admin_bar->add_node($args);
    }
}


/***remove tags in products***/
add_action( 'admin_menu', 'misha_hide_product_tags_admin_menu', 9999 );
function misha_hide_product_tags_admin_menu() {
	remove_submenu_page( 'edit.php?post_type=product', 'edit-tags.php?taxonomy=product_tag&amp;post_type=product' );
}
add_action( 'admin_menu', 'misha_hide_product_tags_metabox' );
function misha_hide_product_tags_metabox() {
	remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
}
add_filter('manage_product_posts_columns', 'misha_hide_product_tags_column', 999 );
function misha_hide_product_tags_column( $product_columns ) {
	unset( $product_columns['product_tag'] );
	return $product_columns;
}
add_filter( 'quick_edit_show_taxonomy', 'misha_hide_product_tags_quick_edit', 10, 2 );
function misha_hide_product_tags_quick_edit( $show, $taxonomy_name ) {
	if ( 'product_tag' == $taxonomy_name )
		$show = false;
	return $show;
}
add_action( 'widgets_init', 'misha_remove_product_tag_cloud_widget' );

function misha_remove_product_tag_cloud_widget(){
	unregister_widget('WC_Widget_Product_Tag_Cloud');
}
/*** [end] remove tags in products***/

/**** rename products labels***/
add_filter( 'woocommerce_register_post_type_product', 'custom_post_type_label_woo' );
function custom_post_type_label_woo( $args ){
	$labels = array(
		'name'               => __( 'Premium Plans', 'arc' ),
		'singular_name'      => __( 'Premium Plan', 'arc' ),
		'menu_name'          => _x( 'Premium Plans', 'arc' ),
		'add_new'            => __( 'Add New', 'arc' ),
		'add_new_item'       => __( 'Add New', 'arc' ),
		'edit'               => __( 'Edit Plan', 'arc' ),
		'edit_item'          => __( 'Edit Plan', 'arc' ),
		'new_item'           => __( 'New Plan', 'arc' ),
		'view'               => __( 'View Plan', 'arc' ),
		'view_item'          => __( 'View Plan', 'arc' ),
		'search_items'       => __( 'Search Plan', 'arc' ),
		'not_found'          => __( 'No Plans found', 'arc' ),
		'not_found_in_trash' => __( 'No Plans found in trash', 'arc' ),
		'parent'             => ''
	);

	$args['labels'] = $labels;
	return $args;
}
/**** [end] rename products labels***/