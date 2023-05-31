<?php
/********************************/
/***** Import dummy content *****/
/********************************/
/*add_action( 'wp_ajax_wpst_import_dummy_content', 'wpst_import_dummy_content' );
function wpst_import_dummy_content() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	global $wpdb;
	if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
	// Load Importer API
	require_once ABSPATH . 'wp-admin/includes/import.php'; // standart file
	if ( !class_exists( 'WP_Importer' ) ) {
		$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php'; // standart file
		if ( file_exists( $class_wp_importer ) ) {
			require $class_wp_importer;
		}
	}
	if ( !class_exists( 'WP_Import' ) ) {
		$class_wp_importer = WPSCORE_DIR . "xbox/libs/wordpress-importer/wordpress-importer.php"; // file in xbox-lite
		if ( file_exists( $class_wp_importer ) )
			require $class_wp_importer;
	}
	if ( class_exists( 'WP_Import' ) ) {
		$import_dummy_filepath = get_template_directory() . "/inc/import/dummy.xml" ; // Get the xml file from directory
		include_once('wpst-import.php');
		$wp_import = new wpst_import();
		$wp_import->fetch_attachments = true;
		$wp_import->import($import_dummy_filepath);
		$wp_import->check();
	}
	wp_die(); // this is required to return a proper result
}*/

add_action( 'wp_ajax_arc_get_pages_attributes', 'arc_get_pages_attributes' );
function arc_get_pages_attributes() {
	$nonce = $_POST['nonce'];
	if (!wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$data_for_modal = '';
	if($_POST['page'] == 'submit') {
			$data_for_modal = array(
				'title' => __('Create the Upload a video page', 'arc'),
				'desc' => strip_tags(__('This will re-create the PornX demo site\'s Upload a video page in your backend.' ,'arc')),
				'submit' => __('Confirm', 'arc'),
				'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'profile') {
			$data_for_modal = array(
				'title' => __('Create the My Uploads page' , 'arc'),
				'desc' =>  strip_tags(__('This will re-create the PornX demo site\'s Blog page in your backend.' ,'arc')),
				'submit' => __('Confirm', 'arc'),
				'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'blog') {
			$data_for_modal = array(
				'title' => __('Create the Blog page' , 'arc'),
				'desc' => strip_tags(__('This will re-create the PornX demo site\'s Blog page in your backend.' ,'arc')),
				'submit' => __('Confirm', 'arc'),
				'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'category') {
			$data_for_modal = array(
				'title' => __('Create the Categories page' , 'arc'),
				'desc' => __('This will re-create the PornX demo site\'s Categories page in your backend.' ,'arc'),
				'submit' => __('Confirm', 'arc'),
				'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'tags') {
			$data_for_modal = array(
				'title' => __('Create the Tags page' , 'arc'),
				'desc' => __('This will re-create the PornX demo site\'s Tags page in your backend.' ,'arc'),
				'submit' => __('Confirm', 'arc'),
				'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'actors') {
		$data_for_modal = array(
			'title' => __('Create the Pornstars page' , 'arc'),
			'desc' => __('This will re-create the PornX demo site\'s Pornstars page in your backend.' ,'arc'),
			'submit' => __('Confirm', 'arc'),
			'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'menu') {
		$data_for_modal = array(
			'title' => __('Create Menus' , 'arc'),
			'desc' => __('This will re-create the PornX demo site\'s menus in your backend.' ,'arc'),
			'submit' => __('Confirm', 'arc'),
			'exit' => __('Close', 'arc')
		);
	}
	if($_POST['page'] == 'widget') {
		$data_for_modal = array(
			'title' => __('Create Widgets' , 'arc'),
			'desc' =>  __('This will re-create the PornX demo site\'s video block widgets in your backend.' ,'arc'),
			'submit' => __('Confirm', 'arc'),
			'exit' => __('Close', 'arc')
		);
	}
	wp_die(json_encode($data_for_modal));
}

/************************************/
/***** Create Video submit page *****/
/************************************/

add_action( 'wp_ajax_arc_create_video_submit_page', 'arc_create_video_submit_page' );
function arc_create_video_submit_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'Upload' => array( '' => 'template-video-submit.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('submit'); // this is required to return a proper result
}
/************************************/

/***** Create My Profile page *******/

/************************************/
add_action( 'wp_ajax_arc_create_my_profile_page', 'arc_create_my_profile_page' );
function arc_create_my_profile_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'My Profile' => array( '' => 'template-my-profile.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('profile');
}

/************************************/

/***** Create Blog page *******/

/************************************/

add_action( 'wp_ajax_arc_create_blog_page', 'arc_create_blog_page' );
function arc_create_blog_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'Blog' => array( '' => 'template-blog.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('blog'); // this is required to return a proper result
}
/**********************************/
/***** Create Categories page *****/
/**********************************/
add_action( 'wp_ajax_arc_create_categories_page', 'arc_create_categories_page' );
function arc_create_categories_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'Categories' => array( '' => 'template-categories.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('category'); // this is required to return a proper result
}
/**********************************/
/***** Create Tags page *****/
/**********************************/
add_action( 'wp_ajax_arc_create_tags_page', 'arc_create_tags_page' );
function arc_create_tags_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'Tags' => array( '' => 'template-tags.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('tags'); // this is required to return a proper result
}
/**********************************/
/***** Create Actors page *****/
/**********************************/
add_action( 'wp_ajax_arc_create_actors_page', 'arc_create_actors_page' );
function arc_create_actors_page() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		// Page Title and URL (a blank space will end up becomeing a dash "-")
		'Pornstars' => array( '' => 'template-pornstars.php' ) );
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	wp_die('actors'); // this is required to return a proper result
}
/***********************/
/***** Create menu *****/
/***********************/
add_action( 'wp_ajax_arc_create_menu', 'arc_create_menu' );
function arc_create_menu() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	$pages = array(
		'Pornstars' => array('' => 'template-pornstars.php'),
		'Categories' => array('' => 'template-categories.php'),
		'Tags' => array('' => 'template-tags.php'),
		'Blog' => array('' => 'template-blog.php'),
		'Photos' => array('' => 'template-photos.php'),
		'Community' => array('' => 'template-community.php'),
		'DMCA' => array('' => 'dmca.php'),
		'2257 Statement' => array('' => '2257-page.php'),
		'Privacy Policy' => array('' => 'privacy-policy.php'),
		'Terms and Conditions' => array('' => 'terms-and-conditions.php'),
		'Contact' => array('' => 'support.php'),
		'Content removal' => array('' => 'content-removal.php'),
		'Parental control' => array('' => 'parental-control.php'),
		'FAQ' => array('' => 'template-faq.php'),
		'Videos' => array('' => 'template-porn-videos.php'),
	);
	foreach($pages as $page_url_title => $page_meta) {
		$id = get_page_by_title($page_url_title);
		foreach ($page_meta as $page_content=>$page_template){
			$page = array(
				'post_type'   => 'page',
				'post_title'  => $page_url_title,
				'post_name'   => $page_url_title,
				'post_status' => 'publish',
				'post_content' => $page_content,
				'post_author' => 1,
				'post_parent' => ''
			);
			if(!isset($id->ID)){
				$new_page_id = wp_insert_post($page);
				if(!empty($page_template)){
					update_post_meta($new_page_id, '_wp_page_template', $page_template);
				}
			}
		}
	}
	$menuname = 'Main Menu';
	$menu_exists = wp_get_nav_menu_object( $menuname );
	//Get all locations (including the one we just created above)
	$locations = get_theme_mod('nav_menu_locations');
	if(!$menu_exists){
		$menu_id = wp_create_nav_menu($menuname);
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Home', 'arc'),
			'menu-item-url'         => home_url(),
			'menu-item-classes'     => 'home-icon',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Videos', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'video-icon',
			'menu-item-object-id'   => get_page_by_path('videos')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Categories', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'cat-icon',
			'menu-item-object-id'   => get_page_by_path('categories')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Tags', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'tag-icon',
			'menu-item-object-id'   => get_page_by_path('tags')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Pornstars', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'star-icon',
			'menu-item-object-id'   => get_page_by_path('pornstars')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Photos & GIFs', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'photo-icon',
			'menu-item-object-id'   => get_page_by_path('photos')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Community', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-classes'     => 'user-icon',
			'menu-item-object-id'   => get_page_by_path('community')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'       =>  __('Blog', 'arc'),
            'menu-item-object'      => 'page',
            'menu-item-classes'     => 'blog-icon',
            'menu-item-object-id'   => get_page_by_path('blog')->ID,
            'menu-item-type'        => 'post_type',
            'menu-item-status'      => 'publish'));
		//set the menu to the new location and save into database
		$locations['arc-main-menu'] = $menu_id;
		//set_theme_mod( 'nav_menu_locations', $locations );
	} else {
		$menuname = 'Main Menu';
		$menu_exists = wp_get_nav_menu_object( $menuname );
		$locations['arc-main-menu'] = $menu_exists->term_id;
		//set_theme_mod( 'nav_menu_locations', $locations );
	}
	$menuname2 = 'Footer Menu';
	$menu_exists2 = wp_get_nav_menu_object( $menuname2 );
	if(!$menu_exists2){
		$menu_id2 = wp_create_nav_menu($menuname2);
		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title'       =>  __('Blog', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('blog')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('DMCA', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('dmca')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('2257', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('2257-statement')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('Privacy Policy', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('privacy-policy')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('Terms and Conditions', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('terms-and-conditions')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('Contact Us', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('contact')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('Content Removal', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('content-removal')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('Parental Control', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('parental-control')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		wp_update_nav_menu_item($menu_id2, 0, array(
			'menu-item-title'       =>  __('FAQ', 'arc'),
			'menu-item-object'      => 'page',
			'menu-item-object-id'   => get_page_by_path('faq')->ID,
			'menu-item-type'        => 'post_type',
			'menu-item-status'      => 'publish'));
		$locations['arc-footer-menu'] = $menu_id2;
		} else {
		$menuname2 = 'Footer Menu';
		$menu_exists2 = wp_get_nav_menu_object( $menuname2 );
		$locations2['arc-footer-menu'] = $menu_exists2->term_id;
		//set_theme_mod( 'nav_menu_locations2', $locations2 );
		}
		set_theme_mod( 'nav_menu_locations', $locations);
	wp_die('menu'); // this is required to return a proper result
}
/**************************/
/***** Create widgets *****/
/**************************/
add_action( 'wp_ajax_arc_create_widgets', 'arc_create_widgets' );
function arc_create_widgets() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		wp_die( 'Busted!' );
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Tag_Cloud');
	update_option( 'sidebars_widgets', array() );
	$home_1 = array(
		'title'             => __('Videos being watched', 'arc'),
		'video_type'        => 'most-viewed',
		'video_number'      => '8',
		'video_category'    => '0'
	);
	$home_2 = array(
		'title'             => '',
		'image'             => get_option('homepage_widget_boxed')
	);
	$home_3 = array(
		'title'             => '',
		'image'             => get_option('homepage_widget_full')
	);
	$home_4 = array(
		'title'             => __('Longest videos', 'arc'),
		'video_type'        => 'longest',
		'video_number'      => '8',
		'video_category'    => '0'
	);
			// Sidebar
	$sidebar_1 = array(
		'title'             => __('Playlists', 'arc'),
		'video_number'             => '4',
	);

	$sidebar_2 = array(
		'title'             => __('Latest videos', 'arc'),
		'video_type'       => 'latest',
		'video_number'     => '6',
		'video_category'   => '0'
	);
	$sidebar_3 = array(
		'title'             => '',
		'image'              => get_template_directory_uri() . '/assets/img/banners/happy-2.png'
	);
	$sidebar_4 = array(
		'title'             => __('Featured videos', 'arc'),
		'video_type'       => 'featured', //featured
		'video_number'     => '8',
		'video_category'   => '0'
	);
	// Footer
	$footer_1 = array(
		'title'             => '',
		'image'              => get_option('footer_widget_one')
	);
	$footer_2 = array(
		'title'             => '',
		'image'              => get_option('footer_widget_one')
	);
	$footer_3 = array(
		'title'             => '',
		'image'              => get_option('footer_widget_one')
	);
	$footer_4 = array(
		'title'             => '',
		'image'              => get_option('footer_widget_one')
	);
	arc_add_widget_theme_activation( 'homepage-top', 'widget_videos_block', 1, $home_1 );
	arc_add_widget_theme_activation( 'homepage-ads-boxed', 'media_image', 2, $home_2 );
	arc_add_widget_theme_activation( 'homepage-ads-full', 'media_image', 3, $home_3 );
	arc_add_widget_theme_activation( 'homepage-bottom', 'widget_videos_block', 4, $home_4 );

	arc_add_widget_theme_activation( 'sidebar', 'widget_videos_block', 5, $sidebar_2 );
	//arc_add_widget_theme_activation( 'sidebar', 'widget_playlists_block', 5, $sidebar_1 );
	arc_add_widget_theme_activation( 'sidebar', 'widget_videos_block', 7, $sidebar_4 );

	arc_add_widget_theme_activation( 'footer', 'media_image', 8, $footer_1 );
	arc_add_widget_theme_activation( 'footer', 'media_image', 9, $footer_2 );
	arc_add_widget_theme_activation( 'footer', 'media_image', 10, $footer_3 );
	arc_add_widget_theme_activation( 'footer', 'media_image', 11, $footer_4 );
	wp_die('widget');
}
function arc_add_widget( $sidebar_id, $widget_type = 'videos_block', $widget_id, $args = array() ){
	global $sidebars_widgets;
	$ops[$widget_id] = '';
	//$sidebars_widgets = '';
	$sidebars_widgets = get_option('sidebars_widgets');
	if(!in_array( $widget_type . "-".$widget_id, (array)$sidebars_widgets[$sidebar_id] ) )
		$sidebars_widgets[$sidebar_id][] = $widget_type . "-" . $widget_id;
	$ops = get_option('widget_' . $widget_type);
	$ops[$widget_id] = $args;
	$ops["_multiwidget"] = 1;
	update_option('widget_' . $widget_type, $ops);
	update_option('sidebars_widgets', $sidebars_widgets);
}