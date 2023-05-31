<?php
require get_template_directory() . '/tgm-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/plugin-activation.php';
/*** Customizer additions.*/
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/additional-customizer-settings.php';

if(!function_exists('is_plugin_active') ) include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('dev-core-plugin/dev-core-plugin.php')) {
	/***setup theme***/
	add_action( 'after_setup_theme', 'arc_setup' );

	/**connect scripts***/
	add_action('wp_enqueue_scripts', 'arc_front_scripts_and_styles');

	/**change post name to videos**/
	function arc_change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = __('Videos','arc');
		$submenu['edit.php'][5][0] = __('Videos','arc');
		$submenu['edit.php'][10][0] = __('Add Video', 'arc');
		$submenu['edit.php'][15][0] = __('Categories','arc');
		$submenu['edit.php'][16][0] = __('Tags','arc');
	}

	function arc_change_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = __('Videos','arc');
		$labels->singular_name = __('Videos','arc');
		$labels->add_new = __('Add Video', 'arc');
		$labels->add_new_item = __('Add Video', 'arc');
		$labels->edit_item = __('Edit Video','arc');
		$labels->new_item = __('Videos','arc');
		$labels->view_item = __('View Videos', 'arc');
		$labels->search_items = __('Search videos', 'arc');
		$labels->not_found = __('No Videos found','arc');
		$labels->not_found_in_trash = __('No Videos found in Trash', 'arc');
		$labels->all_items = __('All Videos','arc');
		$labels->menu_name = __('Videos','arc');
		$labels->name_admin_bar = __('Videos','arc');
	}
	add_action( 'admin_menu', 'arc_change_post_label' );
	add_action( 'init', 'arc_change_post_object' );

	function arc_change_cat_object() {
		global $wp_taxonomies;
		$labels = &$wp_taxonomies['category']->labels;
		$labels->name = __('Categories', 'arc');
		$labels->singular_name = __('Category', 'arc');
		$labels->add_new = __('Add a new category', 'arc');
		$labels->add_new_item = __('Add a new category', 'arc');
		$labels->edit_item = __('Edit a category', 'arc');
		$labels->new_item = __('Category', 'arc');
		$labels->view_item = __('View Category','arc');
		$labels->search_items = __('Search Categories','arc');
		$labels->not_found = __('No Categories found', 'arc');
		$labels->not_found_in_trash = __('No Categories found in Trash', 'arc');
		$labels->all_items = __('All Categories', 'arc');
		$labels->menu_name = __('Categories', 'arc');
		$labels->name_admin_bar = __('Categories', 'arc');
	}
	add_action( 'init', 'arc_change_cat_object' );

	function arc_change_tag_object() {
		global $wp_taxonomies;
		$labels = &$wp_taxonomies['post_tag']->labels;
		$labels->name = __('Tags', 'arc');
		$labels->singular_name = __('Tag', 'arc');
		$labels->add_new = __('Add a new tag', 'arc');
		$labels->add_new_item = __('Add a new tag', 'arc');
		$labels->edit_item = __('Edit a tag', 'arc');
		$labels->new_item = __('Tag', 'arc');
		$labels->view_item = __('View Tag', 'arc');
		$labels->search_items = __('Search Tags', 'arc');
		$labels->not_found = __('No Tags found', 'arc');
		$labels->not_found_in_trash = __('No Tags found in Trash', 'arc');
		$labels->all_items = __('All Tags', 'arc');
		$labels->menu_name = __('Tags', 'arc');
		$labels->name_admin_bar = __('Tags', 'arc');
	}
	add_action( 'init', 'arc_change_tag_object' );
	function replace_admin_menu_icons_css() {
		?>
		<style>
			#menu-posts .dashicons-admin-post::before, #menu-posts .dashicons-format-standard::before {
				content: "\f236";
			}
		</style>
		<?php
	}
	add_action( 'admin_head', 'replace_admin_menu_icons_css' );

	/*** Custom functions that act independently of the theme templates.*/
	require get_template_directory() . '/inc/extras.php';

	/*** Widget Video Block*/
	require get_template_directory() . '/inc/widgets/widget-video.php';

	/*** Widget Playlists Block*/
	require get_template_directory() . '/inc/widgets/widget-playlist.php';

	/*** Widget Articles Block*/
	require get_template_directory() . '/inc/widgets/widget-articles.php';

	/*** Video functions*/
	require get_template_directory() . '/inc/additional-functions/front/video-functions.php';

	/*** Video async data for cache compatibilty*/
	require get_template_directory() . '/inc/actions/posts/ajax-get-async-post-data.php';

	/*** Video Views & Rating*/
	require get_template_directory() . '/inc/actions/posts/ajax-post-like.php';
	require get_template_directory() . '/inc/actions/posts/ajax-post-views.php';
	require get_template_directory() . '/inc/actions/posts/post-like.php';

	/*** Comments Views & Rating*/
	require get_template_directory() . '/inc/actions/comments/ajax-comment-like.php';
	require get_template_directory() . '/inc/actions/comments/comment-like.php';

	/*** Breadcrumbs*/
	require get_template_directory() . '/inc/additional-functions/front/breadcrumbs.php';


	/** * Actor image*/
	require get_template_directory() . '/inc/additional-functions/backend/actor-image.php';

	/*** Category image*/
	require get_template_directory() . '/inc/additional-functions/backend/category-image.php';

	/*** Category premium*/
	require get_template_directory() . '/inc/additional-functions/backend/category-premium.php';

	/*** Pagination*/
	require get_template_directory() . '/inc/additional-functions/front/pagination.php';


	/*** Pornstars taxonomy*/
	require get_template_directory() . '/inc/taxonomies/pornstars.php';

	/*** Playlists taxonomy*/
	require get_template_directory() . '/inc/taxonomies/playlists.php';

	/*** CPT Articles Blog*/
	require get_template_directory() . '/inc/custom-post-types/cpt-blog.php';

	/*** User Posts*/
	require get_template_directory() . '/inc/custom-post-types/user-posts.php';

	/*** Blog functions*/
	require get_template_directory() . '/inc/additional-functions/front/blog-functions.php';

	/*** CPT Gallery Photos*/
	require get_template_directory() . '/inc/custom-post-types/cpt-photos.php';

	/*** Theme activation*/
	require get_template_directory() . '/admin/theme-activation.php';

	if(!is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {
		add_action('init', 'check_theme_options_settings', 1);
		function check_theme_options_settings() {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if (is_plugin_active('dev-core-plugin/dev-core-plugin.php') &&
				is_plugin_active('woocommerce/woocommerce.php') &&
				is_plugin_active('meta-box/meta-box.php') &&
				is_plugin_active('nextend-facebook-connect/nextend-facebook-connect.php') &&
				is_plugin_active('wp-mail-smtp/wp_mail_smtp.php') &&
				is_plugin_active('tinymce-advanced/tinymce-advanced.php') &&
				is_plugin_active('blockonomics-bitcoin-payments/blockonomics-woocommerce.php') &&
				is_plugin_active('rocket-lazy-load/rocket-lazy-load.php')) {

				if(get_option('my-theme-options') === false) {
					output_message();
					die();
				}
			}
		}
	}

	function output_message() {
		echo '<style>
		body {
			background: #181c26;
		}
		body div:nth-child(1){
			position:fixed;
			top:0;
			left:0;
			right:0;
			bottom:0;
			text-align:center;
		}		
		body div:nth-child(1) > div{
			position: absolute;
			top: 50%;
			left:0;
			right:0;
			transform: translateY(-50%);
			display:block;
			text-align:center;
		}
		p#msg {
			color: white;
			font-family: "Open Sans", sans-serif;
			font-size: 72pt;
			text-align: center;
			display: inline-flex;
			font-weight: 600;
			align-items: center;
			margin-bottom: 0;
			margin-top: 0;
		}
		a {
			border: 1px solid #c32ce2;
			border-radius: 4px;
			background: transparent;
			padding: 10px 20px;
			color: #c32ce2;
			outline: none; 
			text-decoration: none;
			font-family: "Open Sans", sans-serif;
			font-size: 26pt;
			text-align: center;
			display: inline-flex;
			font-weight: 400;
			justify-content: center;
		}
	</style>';
		if(get_option('_current_site_user_license') === false) {
			echo '<div>
	<div>
		<p id="msg">Pick a demo under Niches and click Save.</p><p style="text-align: center">
			<a href="'.admin_url() . 'admin.php?page=arc-dashboard">Theme Options</a>
		</p>
	</div>	
</div>';
		} else {
			echo '<div>
	<div>
		<p id="msg">Pick a demo under Niches and click Save.</p><p style="text-align: center">
			<a href="'.admin_url() . 'admin.php?page=my-theme-options">Theme Options</a>
		</p>
	</div>	
</div>';
		}

	}

	if(get_option('my-theme-options') !== false) {
		//Actions
		require get_template_directory() . '/inc/actions/actions.php';
	}

	require_once get_template_directory() . '/inc/additional-functions/backend/extract.php';

	/*** Admin columns*/
	require get_template_directory() . '/admin/admin-columns.php';

	/*** Importer*/
	require_once get_template_directory() . '/admin/import/arc-importer.php';

	/*** Email shortcodes*/
	require_once get_template_directory() . '/inc/email/email-shortcodes.php';

	/*** Email letters*/
	require_once get_template_directory() . '/inc/email/email-letters.php';

	/*** Data for filter video page*/
	require_once get_template_directory() . '/inc/actions/posts/ajax-get-data-porn-video-page.php';
}

if(is_plugin_active('meta-box/meta-box.php')) {
	/*** Video information metabox*/
	require_once get_template_directory() . '/admin/metabox.php';

	/**** XBOX metabox for admin galleries***/
	require_once get_template_directory() . '/inc/admin/metabox/admin-galleries-metabox.php';

	/**** XBOX metabox for admin premium page logos settings***/
	require_once get_template_directory() . '/inc/admin/metabox/admin-premium-page-metabox.php';
}


add_action('admin_init', function() {
	/** add default option to open images by attachment template */
	if(is_plugin_active('wordpress-seo/wp-seo.php')) {
		$wpseo_titles = get_option('wpseo_titles');
		$wpseo_titles['disable-attachment'] = 0;
		update_option('wpseo_titles', $wpseo_titles);
	}
	/** add default option lazy load images and iframes */
	if(is_plugin_active('rocket-lazy-load/rocket-lazy-load.php')) {
		$rocket_lazyload_options = [];
		if(!get_option('rocket_lazyload_options')) {
			$rocket_lazyload_options['images'] = 1;
			$rocket_lazyload_options['iframes'] = 1;
			update_option('rocket_lazyload_options', $rocket_lazyload_options);
		}
	}
});


/***connect widgets**/
add_action( 'widgets_init', 'arc_widgets_init' );
function arc_widgets_init() {
	register_sidebar([
		'name' 			=> esc_html__('Homepage Top', 'arc'),
		'id' 			=> 'homepage-top',
		'description' 	=> esc_html__('Display widgets on your homepage on the top (before ads banner).', 'arc'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
	register_sidebar([
		'name' 			=> esc_html__('Homepage Ads (Boxed)', 'arc'),
		'id' 			=> 'homepage-ads-boxed',
		'description' 	=> esc_html__('Display ads on your homepage in center for boxed layout.', 'arc'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
	register_sidebar([
		'name' 			=> esc_html__('Homepage Ads (Full width)', 'arc'),
		'id' 			=> 'homepage-ads-full',
		'description' 	=> esc_html__('Display ads on your homepage in center for full width layout.', 'arc'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
	register_sidebar([
		'name' 			=> esc_html__('Homepage Bottom', 'arc'),
		'id' 			=> 'homepage-bottom',
		'description' 	=> esc_html__('Display widgets on your homepage on the bottom (after ads banner and before all videos section).', 'arc'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);

	register_sidebar([
		'name'          => esc_html__( 'Sidebar', 'arc' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Display widgets in your sidebar.', 'arc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
	register_sidebar([
		'name'          => esc_html__( 'Under the video', 'arc' ),
		'id'            => 'under_video',
		'description'   => esc_html__( 'Display widgets under the video in your single video pages.', 'arc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
	register_sidebar([
		'name'          => esc_html__( 'Footer', 'arc' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Display widgets in your footer.', 'arc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);

}

/**
 * vicetemple_pornx functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package vicetemple_pornx
 */
if ( !defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( !function_exists( 'arc_setup' ) ) :
	function arc_setup() {
		add_filter( 'use_widgets_block_editor', '__return_false' );
		/***upload to media library logo and set an option***/
		if(get_option('milf_logo') === false) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$auth_bg = get_template_directory_uri() . '/assets/img/main_background.png';
			$img_auth_bg = media_sideload_image($auth_bg, 0, 'auth_bg', 'id');
			update_option('auth_bg', $img_auth_bg, 'yes');
			$milf = get_template_directory_uri() . '/assets/img/PornX.png';
			$img_milf = media_sideload_image($milf, 0, 'milf', 'id');
			update_option('milf_logo', $img_milf, 'yes');
		}
		/***upload to media library favicon and set an option***/
		if(get_option('milf_icon') === false) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$milf_icon = get_template_directory_uri() . '/assets/img/pxlogo2.png';
			$icon_milf = media_sideload_image($milf_icon, 0, 'milf_icon', 'id');
			update_option('milf_icon', $icon_milf, 'yes');
		}
		/***upload to media library premium page background and set an option***/
		if(get_option('premium_bg') === false) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$premium_bg     = get_template_directory_uri() . '/assets/img/main_background.png';
			$img_premium_bg = media_sideload_image( $premium_bg, 0, 'premium_bg', 'id' );
			update_option( 'premium_bg', $img_premium_bg, 'yes' );
		}

		/***upload to media library footer widget image and set an option***/
		if(get_option('footer_widget_one') === false) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$footer_widget_one     = get_template_directory_uri() . '/assets/img/banners/sidebar-ads.png';
			$img_footer_widget_one = media_sideload_image( $footer_widget_one, 0, 'footer_widget_one', 'id' );
			update_option( 'footer_widget_one', $img_footer_widget_one, 'yes' );
		}

		/***upload to media library homepage widget image and set an option***/
		if(get_option('homepage_widget_boxed') === false) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
			$homepage_widget_boxed     = get_template_directory_uri() . '/assets/img/banners/home-ads-boxed.png';
			$img_homepage_widget_boxed = media_sideload_image( $homepage_widget_boxed, 0, 'homepage_widget_boxed', 'id' );
			update_option( 'homepage_widget_boxed', $img_homepage_widget_boxed, 'yes' );
			$homepage_widget_full     = get_template_directory_uri() . '/assets/img/banners/home-ads-full.png';
			$img_homepage_widget_full = media_sideload_image( $homepage_widget_full, 0, 'homepage_widget_full', 'id' );
			update_option( 'homepage_widget_full', $img_homepage_widget_full, 'yes' );
		}

		load_theme_textdomain( 'arc', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 320, 180, true );
		add_image_size( 'arc_thumb_large', '640', '360', true );
		add_image_size( 'arc_thumb_medium', '320', '180', true );
		add_image_size( 'arc_thumb_small', '150', '84', true );

		register_nav_menus( array(
			'arc-main-menu' => esc_html__( 'Main Menu', 'arc' ),
			'arc-footer-menu' => esc_html__( 'Footer Menu', 'arc' )
		));

		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'arc_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'post-formats', ['video'] );
		add_theme_support(
			'custom-logo',
			[
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);

		/*** Change which columns are active by default when installing the theme***/
		if(is_admin()) {
			if(get_option('set_hidden_videos_columns_by_default') === false) {
				$hidden_videos_columns_by_default = [
					'author', 'taxonomy-playlists', 'comments', 'wpseo-score', 'wpseo-score-readability',
					'wpseo-title', 'wpseo-metadesc', 'wpseo-focuskw', 'wpseo-links', 'partner'
				];
				update_user_meta(get_current_user_id(), 'manageedit-postcolumnshidden', $hidden_videos_columns_by_default);
				update_option('set_hidden_videos_columns_by_default', 'set');
			}
		}
		/** [end] /*** Change which columns are active by default when installing the theme***/
	}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function arc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arc_content_width', 640 );
}
add_action( 'after_setup_theme', 'arc_content_width', 0 );


/*** FRONT - Enqueue scripts and styles.*/
function arc_front_scripts_and_styles() {
	/****
	 * MAIN SCRIPTS AND STYLES
	 */
	wp_enqueue_script('jquery');
	$current_theme = wp_get_theme();
	wp_enqueue_style( 'arc-style', get_stylesheet_uri(),[], $current_theme->get( 'Version' ), 'all');
	global $post;
	global $wp_query;
	if(is_category()) { $catName = get_queried_object()->name; $catId = get_cat_ID($catName);}
	wp_enqueue_script( 'arc-navigation', get_template_directory_uri() . '/assets/js/navigation.js', ['jquery'], '1.0.0', true );
	if(is_front_page()) {
		wp_enqueue_script( 'arc-carousel', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', ['jquery'], '4.2.12', true );
	}

	wp_enqueue_script( 'arc-touchswipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.min.js', ['jquery'], '1.6.18', true );
	wp_enqueue_script( 'arc-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], $current_theme->get( 'Version' ), true );

	if(is_singular('photos')) {
		$ids_images = parse_blocks($post->post_content);
		foreach ($ids_images as $block ) {
			if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
				$arr_images_id = array_map(function ($image_id) {
					return $image_id;
				}, $block['attrs']['ids'] );
			}
		}
		$count_imgs = count($arr_images_id);
	}

	/***object for javaScript - exists on the all front pages***/
	wp_localize_script( 'arc-main', 'arc_ajax_var', [
		'url'       		=> admin_url( 'admin-ajax.php' ),
		'nonce'     		=> wp_create_nonce( 'ajax-nonce' ),
		'siteUrl' => site_url(),
		'attachId' => is_attachment($post->ID) ? $post->ID :null,
		'attachement' => is_attachment($post->ID),
		'galleryID' => $post->ID,
		'count_imgs'=> $count_imgs,
		'postAuthor' => $post->post_author,
		'photos_per_row' => xbox_get_field_value( 'my-theme-options', 'number_photos_per_row') ? xbox_get_field_value( 'my-theme-options', 'number_photos_per_row') : '4',
		'slideshow_duration' => xbox_get_field_value( 'my-theme-options', 'slideshow_duration') ? xbox_get_field_value( 'my-theme-options', 'slideshow_duration') : '5',
		'defUserAvatar' => get_user_meta(get_current_user_id(),'def_avatar',true),
		'currentPageUrl' => get_page_uri(),
		'currentPageLink' => get_permalink($post->ID),
		'requestURI' => $_SERVER['REQUEST_URI'],
		'vicetemplepl_installed' 	=> is_plugin_active('vicetemple-player/vicetemple-player.php'),
		'postId' => is_single() ? $post->ID : null,
		'postType' => $post->post_type,
		'catName' => @$catName,
		'catId' => @$catId,
		'maxPages' => $wp_query->max_num_pages,
		'currentPage' => (get_query_var('paged')) ? get_query_var('paged') : 1,
		'truePosts' => serialize($wp_query->query_vars),
		'images' => get_template_directory_uri() . '/assets/img/',
		'viewGallery' => xbox_get_field_value('my-theme-options', 'photos-display'),
		'niche' => xbox_get_field_value( 'my-theme-options', 'choose-niche' ),
		'buttonsColor' => get_theme_mod('btn_color_setting'),
		'passiveColor' => get_theme_mod('passive_color_setting'),
		'activeColor' => get_theme_mod('links_color_setting'),
		'secondary_text_site_color' => get_theme_mod('secondary_text_site_color'),
		'secondaryColor' => get_theme_mod('secondary_color_setting'),
		'linksColor' => get_theme_mod('links_color_setting'),
		'iconsColor' => get_theme_mod('icons_color_setting'),
		'textColor' => get_theme_mod('text_site_color'),
		'discShow' => get_theme_mod('disc_show'),
		'enablePreview' => xbox_get_field_value('my-theme-options', 'enable_preview'),
		'enableRotation' => xbox_get_field_value('my-theme-options', 'enable_thumb_rotation'),
		'cid' => wp_get_current_user()->ID,
		'get_xxx' => $_GET['xxx'],
		'logged' => is_user_logged_in(),
		'loginUrl' => wp_login_url(),
		'minReqChar' =>  (get_option('min_required_characters') !== false) ? get_option('min_required_characters') : 5,
		'maxReqCharUserPost' =>  xbox_get_field_value('my-theme-options', 'post_character'),
		'filterPornVideos' => get_option('filter_porn_videos'),
		'user_post_interval' => xbox_get_field_value('my-theme-options', 'user_post_interval'),
		'posts_in_category' => json_encode( $wp_query->query_vars ),
	]);
	wp_localize_script( 'arc-main', 'objectL10nMain', [
		'readmore'		=> __( 'Read more', 'arc' ),
		'close'       	=> __( 'Close', 'arc' )
	]);
	wp_localize_script( 'arc-main', 'options', [
		'thumbnails_ratio' =>  xbox_get_field_value( 'my-theme-options', 'thumb_rotation' ),
	]);
	/*** Font Awesome Icons */
	wp_enqueue_style( 'arc-font-awesome', get_template_directory_uri() . '/assets/stylesheets/font-awesome/css/font-awesome.min.css', [], '4.7.0', 'all' );
	wp_enqueue_style( 'arc-font-awesome-woff', get_template_directory_uri() . '/assets/stylesheets/font-awesome/fonts/fontawesome-webfont.woff', [], '4.7.1', 'all' );
	wp_enqueue_style( 'arc-font-awesome-woff2', get_template_directory_uri() . '/assets/stylesheets/font-awesome/fonts/fontawesome-webfont.woff2', [], '4.7.1', 'all' );


	/***JQuery UI***/
	wp_enqueue_style('main-jquery-ui-css', get_template_directory_uri() . '/assets/stylesheets/jquery-ui.css', ['arc-style'], $current_theme->get( 'Version' ), 'all');
	wp_enqueue_script('main-jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('jquery'), $current_theme->get( 'Version' ), true);
	/****
	 * [END] MAIN SCRIPTS AND STYLES
	 */


	/***FAQ page*/
	if(is_page_template('template-faq.php')){
		wp_enqueue_style( 'faq-page-style', get_stylesheet_directory_uri() . '/assets/stylesheets/faq-page-styles.css',[],'');
	}

	/*****Watch List Page*****/
	if(is_page_template('template-watchlist.php')) {
		wp_enqueue_script('page-channel-script', plugins_url('dev-core-plugin') . '/public/assets/page-channel-script.js', array('jquery'), '', true);
	}

	/*****Community Page *****/
	if(is_page_template('template-community.php')) {
		wp_enqueue_script('community-ui-js', get_template_directory_uri() . '/assets/js/community-ui.js', array('jquery'), '', true);
	}

	/***Profile and Account Pages***/
	if(is_page_template('template-account-settings.php') || is_page_template('template-my-profile.php') && !isset($_GET['xxx']) && is_user_logged_in()) {
		wp_enqueue_script( 'arc-profile-js', get_template_directory_uri() . '/assets/js/profile.js', ['jquery'], '', true);
		//wp_enqueue_style( 'arc-choices-css', get_template_directory_uri() . '/assets/stylesheets/choices.css', [], '', 'all' );
		//wp_enqueue_script( 'arc-choices-js', get_template_directory_uri() . '/assets/js/choices.min.js', ['jquery'], '', true);
		wp_enqueue_style( 'arc-crop-css', get_template_directory_uri() . '/assets/stylesheets/crop.css', [], '', 'all' );
		wp_enqueue_script( 'arc-crop-js', get_template_directory_uri() . '/assets/js/crop.js', ['jquery'], '', true);
	}

	/**** Favorites Page ****/
	if(is_page_template('template-favorites.php') || is_page_template('template-watchlist.php')) {
		wp_enqueue_script( 'arc-favorites-js', get_template_directory_uri() . '/assets/js/favorites.js', ['jquery'], '', true);
	}

	/**** Watched videos ****/
	if(is_page_template('template-watchlist.php')) {
		wp_enqueue_script( 'arc-watchlist-js', get_template_directory_uri() . '/assets/js/watchlist.js', ['jquery'], '', true);
	}

	/***Plugin - Vicetemple player ***/
	if( is_single() && is_plugin_active( 'vicetemple-player/vicetemple-player.php') || is_page_template('template-community.php') && is_plugin_active( 'vicetemple-player/vicetemple-player.php')){
		wp_enqueue_style( 'arc-videojs-style', get_template_directory_uri() . '/vendor/videojs/video-js.css', [], '7.4.1', 'all' );
		wp_enqueue_script( 'arc-videojs', get_template_directory_uri() . '/vendor/videojs/video.min.js', [], '7.4.1', true );
		wp_enqueue_script( 'arc-videojs-quality-selector', get_template_directory_uri() . '/vendor/videojs/videojs-quality-selector.min.js', ['arc-videojs'], '1.1.2', true);

		wp_enqueue_script('vicetemplepl-fluid-js', 'https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js', ['jquery'], '', false);
		$is_logo = xbox_get_field_value('vicetemplepl-options', 'logo-watermark-video-player');
		if($is_logo == 'on') $is_logo = wp_get_attachment_url(get_theme_mod('custom_logo'), 'small', false, ['class'=>'player-logo']);
		else $is_logo = '';

		if('on' == xbox_get_field_value('vicetemplepl-options', 'logo-watermark-grayscale')) $grayscale = 1;
		wp_localize_script( 'vicetemplepl-fluid-js', 'arc_fluid_player',[
			'mainColor' => esc_html(get_theme_mod('main_color_setting')),
			'playerLogo' => $is_logo,
			'autoPlay' => xbox_get_field_value('vicetemplepl-options', 'vp-autoplay'),
			'logoOpacity' => xbox_get_field_value('vicetemplepl-options', 'logo-watermark-opacity'),
			'grayscale' => $grayscale,
			'preRoll' => plugins_url('vicetemple-player') . '/admin/files/vast-preroll.xml',
			'midRoll' => plugins_url('vicetemple-player') . '/admin/files/vast-midroll.xml',
			'midRollTimer' => esc_html(xbox_get_field_value('vicetemplepl-options', 'vp-mid-roll-timer')),
			'preRollUrl' => esc_html(xbox_get_field_value('vicetemplepl-options', 'vp-pre-roll-url')),
			'midRollUrl' => esc_html(xbox_get_field_value('vicetemplepl-options', 'vp-mid-roll-url'))
		]);
	}


	/***
	 * photos page, archive
	 * custom-post-types photos, blog
	 */
	if( is_singular('photos') || is_singular('blog') || is_page() || is_archive()) {
		/*wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null, true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'arc-waterfall', get_template_directory_uri() . '/assets/js/waterfall.js', [], '1.1.0', true );*/
	}

	/***connect captcha **/
	if( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' ) {
		wp_register_script("arc-recaptcha", "https://www.google.com/recaptcha/api.js");
		wp_enqueue_script("arc-recaptcha");
	}

	/***connect comments **/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/****Cookie Modal - front****/
	if (get_theme_mod( 'show_cookie' ) == "1" && !is_customize_preview()) {
		if(get_theme_mod('cookie_dropdownpages') !== false || get_theme_mod('cookie_dropdownpages') != 0 || get_theme_mod('cookie_dropdownpages') != '') {
			$link = get_page_link(get_theme_mod('cookie_dropdownpages'));
		}
		wp_enqueue_script( 'modal-cookie-script', get_template_directory_uri() . '/assets/modal-cookie.js', [ 'jquery' ], '', true );
		wp_localize_script( 'modal-cookie-script', 'cookie_obj', [
			'cookieText' => get_theme_mod('cookie_text'),
			/*'linkExist' => get_theme_mod('cookie_dropdownpages'),*/
			'privacyLink' => $link,
			'btnText' => get_theme_mod('agree_btn_text'),
			'privacyText' => __('Privacy policy', 'arc'),
			'cookiePos' => get_theme_mod('cookie_text_pos'),
			'agreeBtnPos' => get_theme_mod('cookie_agree_btn_pos')
		]);
	}

	/****Cookie preview - customizer****/
	if (get_theme_mod( 'show_preview_cookie' ) == "1" && is_customize_preview()) {
		if(get_theme_mod('cookie_dropdownpages') !== false || get_theme_mod('cookie_dropdownpages') != 0 || get_theme_mod('cookie_dropdownpages') != '') {
			$link = get_page_link(get_theme_mod('cookie_dropdownpages'));
		}
		wp_enqueue_script( 'modal-cookie-preview-script', get_template_directory_uri() . '/assets/modal-cookie-preview.js', [ 'jquery' ], '', false );
		wp_localize_script( 'modal-cookie-preview-script', 'cookie_obj', [
			'cookieText' => get_theme_mod('cookie_text'),
			/*'linkExist' => get_theme_mod('cookie_dropdownpages'),*/
			'privacyLink' => $link,
			'btnText' => get_theme_mod('agree_btn_text'),
			'privacyText' => __('Privacy policy', 'arc'),
			'cookiePos' => get_theme_mod('cookie_text_pos'),
			'agreeBtnPos' => get_theme_mod('cookie_agree_btn_pos')
		]);
	}

	/****Disclaimer Modal - front****/
	if(get_theme_mod('disc_show') == "1" && !is_customize_preview()) {
		wp_enqueue_script('disclaimer-script', get_template_directory_uri() . '/assets/disclaimer-script.js', [ 'jquery' ], '',  false);
		wp_localize_script('disclaimer-script', 'disc_obj', [
			'discShow'          => get_theme_mod('disc_show'),
			'discPreview'       => get_theme_mod('disc_preview'),
			'logoShow'          => (get_theme_mod('disc_logo_show') == "1") ? get_theme_mod('disc_logo_show') : 'false',
			'logo'              => (get_theme_mod('disc_logo_file') !== false && get_theme_mod('disc_logo_file') !== "") ? wp_get_attachment_image_url(get_theme_mod('disc_logo_file'), 'full') : wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'),
			'customLogo'        => wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'medium'),
			'firstHeading'      => get_theme_mod('disc_form_header'),
			'firstDesc'         => get_theme_mod('disc_form_text'),
			'yesBtn'            => get_theme_mod('disc_form_btn_yes_text'),
			'noBtn'             => get_theme_mod('disc_form_btn_no_text'),
			'redirectLink'      => get_theme_mod('disc_nope_form_link'),
			'firstHeadingNope'  => get_theme_mod('disc_nope_form_header1'),
			'secondHeadingNope' => get_theme_mod('disc_nope_form_header2'),
			'descNope'          => get_theme_mod('disc_nope_form_text'),
			'nopeBtn'           => get_theme_mod('disc_nope_form_btn_text'),
			'redirectOn'        => get_theme_mod('disc_nope_form_link')
		]);
	}

	/****Disclaimer preview - customizer****/
	if(get_theme_mod('disc_preview') == "1" && is_customize_preview()) {
		wp_enqueue_script( 'disclaimer-preview', get_template_directory_uri() . '/assets/disclaimer-preview.js', [ 'jquery' ], '', false );
		wp_localize_script( 'disclaimer-preview', 'disc_obj', [
			'discShow'          => get_theme_mod( 'disc_show' ),
			'discPreview'       => get_theme_mod( 'disc_preview'),
			'logoShow'          => ( get_theme_mod( 'disc_logo_show' ) == "1" ) ? get_theme_mod( 'disc_logo_show' ) : 'false',
			'logo'              => ( get_theme_mod( 'disc_logo_file' ) !== false && get_theme_mod( 'disc_logo_file' ) !== "" ) ? wp_get_attachment_image_url(get_theme_mod('disc_logo_file'), 'full') : wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'medium' ),
			'customLogo'        => wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'medium' ),
			'firstHeading'      => get_theme_mod( 'disc_form_header' ),
			'firstDesc'         => get_theme_mod( 'disc_form_text' ),
			'yesBtn'            => get_theme_mod( 'disc_form_btn_yes_text' ),
			'noBtn'             => get_theme_mod( 'disc_form_btn_no_text' ),
			'redirectLink'      => get_theme_mod( 'disc_nope_form_link' ),
			'firstHeadingNope'  => get_theme_mod( 'disc_nope_form_header1' ),
			'secondHeadingNope' => get_theme_mod( 'disc_nope_form_header2' ),
			'descNope'          => get_theme_mod( 'disc_nope_form_text' ),
			'nopeBtn'           => get_theme_mod( 'disc_nope_form_btn_text' ),
			'redirectOn'        => get_theme_mod( 'disc_nope_form_link' )
		]);
	}

	/****Login-Register preview - customizer****/
	if((get_theme_mod('login_form_preview') == 1 || get_theme_mod('reg_form_preview') == 1) && is_customize_preview()) {
		wp_enqueue_script('login-reg-preview', get_template_directory_uri() . '/assets/js/preview-register.js', ['jquery'], '', '');
		wp_localize_script('login-reg-preview', 'preview_reg_obj', [
			'form_logo' => (get_theme_mod('logo_file') !== false && get_theme_mod('logo_file') !== "") ? get_theme_mod('logo_file') : wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'),
			'show_form_logo' => (get_theme_mod('logo_show') !== false) ? get_theme_mod('logo_show') : 'false',
			'custom_logo' => wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'),
		]);
	}

	/****Edit Comments - front****/
	if(is_user_logged_in() && current_user_can('administrator')) {
		wp_enqueue_script(
			'front-edit-comments',
			get_template_directory_uri() . '/assets/js/front-edit-comments.js',
			array('jquery'),
			'',
			true);
		wp_localize_script(
			'front-edit-comments',
			'obj_for_ajax', [
			'url'   => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('my_nonce_for_examle_ajax'),
		]);
	}


	/****Edit Video - front****/
	if(is_user_logged_in()) {
		wp_enqueue_script(
			'front-edit-video',
			get_template_directory_uri() . '/assets/js/front-edit-video.js',
			array( 'jquery' ),
			'',
			true );
	}
	/** Photo gallery on a separate page */
	if (is_singular('photos') || is_attachment()) {
		wp_enqueue_script(
				'photo-on-a-separate-page',
				get_template_directory_uri() . '/assets/js/photo-on-a-separate-page.js',
				[],
				'1.1.0',
				true );
		global $post;
		if (is_attachment()) {
			$gallery_id = get_gallery_id($post->ID);
			$all_photos_id_from_gallery = get_post_block_gallery_images($post->ID);
			foreach ($all_photos_id_from_gallery as $id) {
				$arr_data[] = [
					'id_photo'    => $id,
					'url'         => wp_get_attachment_url($id),
					'id_gallery'  => $gallery_id,
					'photo_title' => get_the_title($id),
				];
			}
		}

		wp_localize_script(
			'photo-on-a-separate-page',
			'obj_for_ajax', [
			'url'                        => site_url('/photo-on-a-separate-page/'),
			'url_ajax'                   => admin_url('admin-ajax.php'),
			'nonce'                      => wp_create_nonce('ajax-nonce'),
			'arr_data'                   => $arr_data,
		]);
	}

	/** Front management photo gallery */
	if (is_singular('photos')) {
		wp_enqueue_script(
			'front_management_photo_gallery',
			get_template_directory_uri() . '/assets/js/front-management-photo-gallery.js',
			[],
			'1.1.0',
			true );
		wp_localize_script(
			'photo-on-a-separate-page',
			'obj_for_front_management_photo_gallery', [
			'site_url'                        => site_url(),
			'ajax_url'                   => admin_url('admin-ajax.php'),
			'nonce'                      => wp_create_nonce('ajax-nonce'),
		]);
	}

	/** AJAX download files */
	if (is_page_template('template-submit-user-photos.php')) {
		wp_enqueue_script(
			'ajax-download-files',
			get_template_directory_uri() . '/assets/js/ajax-download-files.js',
			[],
			'1.1.0',
			true );
	}

	if (is_page_template('template-community.php')) {
		wp_enqueue_script(
			'remove-updates-from-the-recent-activity',
			get_template_directory_uri() . '/assets/js/remove-updates-from-the-recent-activity.js',
			[],
			'1.1.0',
			true );
	}
}

/*** ADMIN - Enqueue admin scripts*/
add_action( 'admin_enqueue_scripts', 'arc_admin_scripts' );
function arc_admin_scripts($hook) {

	wp_enqueue_script( 'admin-scripts', get_template_directory_uri() . '/admin/assets/js/admin.js', ['jquery'], '', false);
	wp_localize_script( 'admin-scripts', 'arc_admin_scripts_ajax_var', [
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ajax-nonce' ),
		'hook' => $hook,
		'post_type_page' => $_GET['post_type'] ? $_GET['post_type'] : null ,
		'currentScreenTax' => get_current_screen()->taxonomy,
		'theme_template_url' => get_template_directory_uri(),
		'user_id' => $_GET['user_id'],
		'profile_picture' => (get_user_meta($_GET['user_id'], 'personal_foto', true)) ? '<img src="'.get_user_meta($_GET['user_id'],'personal_foto', true) .'" />' : '<svg width="212" height="212" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect width="212" height="212" rx="4" fill="#200437"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint0_linear)"/>
									<defs>
										<linearGradient id="paint0_linear" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
											<stop stop-color="#BA25D6"/>
											<stop offset="1" stop-color="#200437"/>
										</linearGradient>
									</defs>
								</svg>'
	]);
	wp_enqueue_script( 'xbox-admin-scripts', get_template_directory_uri() . '/admin/assets/js/xbox-admin-scripts.js', ['jquery'], '', true);
	/***theme option page***/
	if($hook == 'toplevel_page_my-theme-options') {
		$current_theme = wp_get_theme();
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'my-theme-options' ) {
			wp_enqueue_style( 'arc-bootstrap-modal-style', get_template_directory_uri() . '/admin/vendor/bootstrap.modal.min.css', [], '3.3.7', 'all' );
			wp_enqueue_script( 'arc-bootstrap-modal', get_template_directory_uri() . '/admin/vendor/bootstrap.modal.min.js', ['jquery'], '3.3.7', true );
		}
		wp_enqueue_script( 'arc-import', get_template_directory_uri() . '/admin/import/arc-import.js', ['jquery'], $current_theme->get( 'Version' ) );
		wp_localize_script( 'arc-import', 'arc_import_ajax_var', [
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajax-nonce' )
		]);
		wp_localize_script( 'arc-import', 'objectL10n', [
			'dataimport'  => __( 'Data is being imported please be patient...', 'arc' ),
			'videosubmit' => __( 'Upload a Video page created.', 'arc' ),
			'havefun'     => __( 'Have fun!', 'arc' ),
			'profilepage' => __( 'My Uploads page created.', 'arc' ),
			'blogpage'    => __( 'Blog page created.', 'arc' ),
			'catpage'     => __( 'Categories page created.', 'arc' ),
			'tagpage'     => __( 'Tags page created.', 'arc' ),
			'actorspage'  => __( 'Actors page created.', 'arc' ),
			'menu'        => __( 'Menus created.', 'arc' ),
			'widgets'     => __( 'Widgets created.', 'arc' )
		]);
	}

	/***custom admin styles***/
	if(is_admin()) {
		wp_enqueue_style('admin-styles-css', get_template_directory_uri() . '/admin/assets/css/admin-styles.css', '', '', 'all');
	}

	if($hook == 'options-discussion.php') {
		wp_enqueue_script( 'discussion-js', get_template_directory_uri() . '/assets/js/discussion-js.js', ['jquery'], '', true);
		wp_localize_script('discussion-js', 'discussion_obj', [
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'ajax-nonce' ),
			'minRequiredCharacters' => (get_option('min_required_characters') !== false) ? get_option('min_required_characters') : 5
		]);
	}

	/** JS for user page for ban function [start]**/
	$screen = get_current_screen();
	if ($screen->id === 'users') {
		wp_enqueue_script( 'ban-js', get_template_directory_uri() . '/assets/js/ban.js', ['jquery'], '', true);
	}

}

/*** Implement the Custom Header feature.*/
require get_template_directory() . '/inc/custom-header.php';

/*** Custom template tags for this theme.*/
require get_template_directory() . '/inc/additional-functions/front/template-tags.php';

/*** Functions which enhance the theme by hooking into WordPress.*/
require get_template_directory() . '/inc/additional-functions/front/template-functions.php';

/*** Load Jetpack compatibility file.*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**** [start] get value page without paging***/
function arc_get_nopaging_url() {
	global $wp;
	$current_url =  home_url( $wp->request );
	$position = strpos( $current_url , '/page' );
	$nopaging_url = ( $position ) ? substr( $current_url, 0, $position ) : $current_url;
	return trailingslashit( $nopaging_url );
}
/**** [end] get value page without paging***/

/****[start] get value filter*****/
function arc_selected_filter($filter){
	$current_filter = '';
	if(is_home() || is_category()) {
		$current_filter = xbox_get_field_value( 'my-theme-options', 'show_videos' );
	}
	if(isset($_GET['filter'])) {
		$current_filter = $_GET['filter'];
	}
	if($current_filter == $filter) {
		return 'active';
	}
	return false;
}
/****[end] get value filter*****/

/**[start] get title of filter**/
function arc_get_filter_title(){
	$title = '';
	$filter = '';
	if(isset($_GET['filter'])) {
		$filter = $_GET['filter'];
	}else{
		$filter = xbox_get_field_value( 'my-theme-options', 'show_videos' );
	}
	switch($filter) {
		case 'hd-videos' :
			$title = esc_html__('HD videos', 'arc');
			break;
		case 'latest' :
			$title = esc_html__('Latest videos', 'arc');
			break;
		case 'popular' :
			$title = esc_html__('Popular videos', 'arc');
			break;
		case 'most-viewed' :
			$title = esc_html__('Most viewed videos', 'arc');
			break;
		case 'longest' :
			$title = esc_html__('Longest videos', 'arc');
			break;
		case 'all' :
			$title = esc_html__('All videos', 'arc');
			break;
		case 'featured' :
			$title = esc_html__('Featured videos', 'arc');
			break;
		case 'random' :
			$title = esc_html__('Random videos', 'arc');
			break;
		default :
			$title = esc_html__('Latest videos', 'arc');
			break;
	}
	return $title;
}
/**[end] get title of filter**/

/***[start] get rgb from hex for background***/
if(!function_exists('wc_rgb_from_hex')) {
	function wc_rgb_from_hex($color) {
		if($color == '') $color = '#000';
		$color = str_replace( '#', '', $color);
		// Convert shorthand colors to full format, e.g. "FFF" -> "FFFFFF".
		$color = preg_replace( '~^(.)(.)(.)$~', '$1$1$2$2$3$3', $color );

		$rgb      = array();
		$rgb['R'] = hexdec( $color[0] . $color[1] );
		$rgb['G'] = hexdec( $color[2] . $color[3] );
		$rgb['B'] = hexdec( $color[4] . $color[5] );

		return $rgb;
	}
}
/***[end] get rgb from hex***/

/***[start] Modify the "must_log_in" string of the comment form.*/
add_filter( 'comment_form_defaults', function( $fields ) {
	$fields['must_log_in'] = sprintf(
		__( '<p class="must-log-in">
				 You must be <a href="' .  wp_login_url()  . '">logged in</a> to post a comment.</p>', 'arc'
		),
		wp_registration_url(),
		wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	);
	return $fields;
});
/***[end] Modify the "must_log_in" string of the comment form.*/

add_filter('the_excerpt_rss', 'arc_rss_post_thumbnail');
add_filter('the_content_feed', 'arc_rss_post_thumbnail');
function arc_rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . $content;
	}
	return $content;
}

add_action('xbox_after_save_field_duration', 'arc_duration_custom_field', 10, 2);
function arc_duration_custom_field( $updated, $field ){
	$duration_hh = isset( $_POST['duration_hh'] ) ? $_POST['duration_hh'] : 0;
	$duration_mm = isset( $_POST['duration_mm'] ) ? $_POST['duration_mm'] : 0;
	$duration_ss = isset( $_POST['duration_ss'] ) ? $_POST['duration_ss'] : 0;
	$field->save( $duration_hh * 3600 + $duration_mm * 60 + $duration_ss );
}

/*** remove admin menu Videos for users who can`t edit posts***/
add_action('admin_menu', 'remove_videos_for');
function remove_videos_for() {
	$user = wp_get_current_user();
	if ( is_admin() && !$user->has_cap( 'edit_posts')) {
		remove_menu_page( 'edit.php' );
	}
}
/***[end] remove admin menu Videos for users who can`t edit posts***/

/*** Media Library Setting ***/
require_once get_template_directory() .'/inc/additional-functions/backend/medialibrary-settings.php';

/*****separate search query on header search and blog****/
if (!is_admin()) {
	add_filter( 'pre_get_posts','custom_search_filter' );
	function custom_search_filter($query) {
		if ( $query->is_search ) {
			$type = $_GET['search-type'];
			if($type == 'normal') {
				$query->set('post_type', ['post']);
			} elseif($type == 'blog') {
				$query->set('post_type', ['blog']);
			}
		}
		return $query;
	}
}
/***** end separate search query on header search and blog****/

/*** Settings on Discussion Page ***/
require_once get_template_directory() .'/inc/additional-functions/backend/settings-on-discussion-page.php';

/*** Settings on User Page ***/
require_once get_template_directory() .'/inc/additional-functions/backend/setting-on-user-page.php';

/*** Default Playlist ***/
require_once get_template_directory() .'/inc/additional-functions/front/default-playlist.php';

/*** Registration Functions ***/
require_once get_template_directory() .'/inc/additional-functions/front/registration-functions.php';

/***hide create playlist from admin***/
add_action('current_screen', 'get_current_admin_playlist_screen');
function get_current_admin_playlist_screen(){
	$screen = get_current_screen();
	if('edit-playlists' === $screen->id):?>
		<style>
			div#col-container div#col-left {
				display:none !important;
			}
			div#col-container div#col-right {
				width: 100% !important;
			}
		</style>
	<?php endif;
}
/*** [end] hide create playlist from admin***/


/*** Post Bulk Actions Setting ***/
require_once get_template_directory() .'/inc/additional-functions/backend/post-bulk-actions.php';

/***Admin Notices Functions***/
require_once get_template_directory() .'/inc/additional-functions/backend/admin-notices-functions.php';

/***Playlists Functions***/
require_once get_template_directory() .'/inc/additional-functions/backend/playlists-functions.php';

/*** Admin Bar Setting ***/
require_once get_template_directory() .'/inc/additional-functions/backend/setting-admin-bar.php';

/** Admin footer modification */
function remove_footer_admin() {
	echo '<span id="footer-thankyou">Thank you for using <a href="https://vicetemple.com/wordpress-porn-theme" target="_blank">PornX</a>, the most advanced WordPress porn theme.</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
/** [end] Admin footer modification */

/****replace author link in URL***/
add_filter( 'author_link', 'filter_author_link', 10, 3 );
function filter_author_link( $link, $author_id, $author_nicename ) {
	return home_url( '/profile/' ) . $author_nicename;
}
add_action( 'init', 'new_author_base' );
function new_author_base() {
	global $wp_rewrite;
	$wp_rewrite->author_base = 'profile';
}
/**** [end] replace author link in URL***/

/****Custom Variable for Yoast SEO****/
require_once get_template_directory() .'/inc/additional-functions/backend/yoast-custom-settings.php';

/***Set default user avatar on attachment page because of bag***/
add_action( 'init', 'set_def_avatar_user' );
function set_def_avatar_user() {
	if(!is_attachment()) {
		update_user_meta(get_current_user_id(), 'def_avatar', get_avatar_url(get_current_user_id()));
	}
}
/*** [end] Set default user avatar on attachment page because of bag***/

/*** Get attachment ID from url***/
if(function_exists('attachment_url_to_post_id')) {
	function attachment_url_to_post_id( $url = null ){
		global $wpdb;
		if( ! $url )
			return false;
		$name = basename( $url );
		$name = preg_replace( '~-(?:\d+x\d+|scaled|rotated)~', '', $name );

		$name = preg_replace( '~\.[^.]+$~', '', $name );
		$post_name = sanitize_title( $name );
		$sql = $wpdb->prepare(
			"SELECT ID, guid FROM $wpdb->posts WHERE post_name LIKE %s AND post_title = %s AND post_type = 'attachment'",
			$wpdb->esc_like( $post_name ) .'%', $name
		);
		$attaches = $wpdb->get_results( $sql );
		if(!$attaches)
			return false;
		$attachment_id = reset( $attaches )->ID;
		if( count($attaches) > 1 ){
			$url_path = parse_url( $url, PHP_URL_PATH );
			foreach( $attaches as $attach ){
				if( false !== strpos( $attach->guid, $url_path ) ){
					$attachment_id = $attach->ID;
					break;
				}
			}
		}
		return (int) $attachment_id;
	}
}
/*** [end] Get attachment ID from url***/

/**** Change Login | Register | Lost Password title****/
add_filter( 'login_title', 'filter_login_page_title', 10, 2 );
function filter_login_page_title( $login_title, $title ){
	$login_title = 'Login | ' . get_bloginfo('name');
	if(@$_REQUEST['action'] === 'register') {
		$login_title = 'Register | ' . get_bloginfo('name');
	}
	if(@$_REQUEST['action'] === 'lostpassword') {
		$login_title = 'Lost Password | ' . get_bloginfo('name');
	}
	if(@$_GET['action'] == 'rp') {
		$login_title = 'Set Password | ' . get_bloginfo('name');
	}
	return $login_title;
}
/**** [end] Change Login | Register | Lost Password title****/

/*** Change Log In text to Login***/
add_action( 'gettext','change_login_text');
function change_login_text( $text ) {
	if(@$_REQUEST['action'] === 'register' || @$_REQUEST['action'] === 'lostpassword' || @$_GET['action'] == 'rp' || @$_GET['reg'] == 'confirm') {
		if('Log in' === $text) {
			$text = 'Login';
		}
	}
	if(@$_REQUEST['action'] === 'lostpassword') {
		if('Get New Password' === $text) {
			$text = 'Send Email';
		}
	}
	return $text;
}
/*** [end] Change Log In text to Login***/

/**** Prevent redirect after reset password ***/
add_filter( 'lostpassword_redirect', 'filter_lost_password_redirect' );
function filter_lost_password_redirect($lostpassword_redirect){
	$lostpassword_redirect = wp_lostpassword_url() . '?send=true';
	return $lostpassword_redirect;
}
/**** [end] Prevent redirect after reset password ***/

 /*** Filter playlists***/

/** Get all photos from gallery [start]**/
function get_post_block_gallery_images($post_id) {
		$posts = get_posts( array(
			'numberposts' => -1,
			'category'    => 0,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'include'     => array(),
			'exclude'     => array(),
			'meta_key'    => '',
			'meta_value'  =>'',
			'post_type'   => 'photos',
			'suppress_filters' => true,
		) );

		$all_id_for_each_gallery = [];
		foreach ($posts as $post) {
			$post_blocks = parse_blocks( $post->post_content );
			foreach ( $post_blocks as $block ) {
				if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
					$all_id_for_each_gallery[$post->ID] = array_map( function ( $image_id ) {
						return $image_id;
					}, $block['attrs']['ids'] );
				}
			}
		}

		foreach ($all_id_for_each_gallery as $one_gallery) {
			if (array_search($post_id, $one_gallery) !== false) {
				return $one_gallery;
			}
		}

		return null;
	}
/** Get all photos from gallery [end] */

/** Get gallery id [start]*/
function get_gallery_id($photos_id){
	$posts = get_posts( array(
		'numberposts' => -1,
		'category'    => 0,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'photos',
		'suppress_filters' => true,
	) );

	$all_id_for_each_gallery = [];
	foreach ($posts as $post) {
		$post_blocks = parse_blocks( $post->post_content );
		foreach ( $post_blocks as $block ) {
			if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
				$all_id_for_each_gallery[$post->ID] = array_map( function ( $image_id ) {
					return $image_id;
				}, $block['attrs']['ids'] );
			}
		}
	}

	foreach ($all_id_for_each_gallery as $k => $one_gallery) {
		if (array_search($photos_id, $one_gallery) !== false) {
			$res = $k;
		}
	}
	return $res;
}
/** Get gallery id [end]*/

/** Redirect [start]*/
function custom_redirect()
{
	$data = get_option('custom_config');

	if ($data['login'] == false) {
		$login = strpos($_SERVER['REQUEST_URI'], 'wp-login.php');
	} else {
		$login = strpos($_SERVER['REQUEST_URI'], $data['login']);
	}

	if ($data['register'] == false) {
		$register = strpos($_SERVER['REQUEST_URI'], 'action=register');
	} else {
		$register = strpos($_SERVER['REQUEST_URI'], $data['register']);
	}

	if ($data['lostpassword'] == false) {
		$lostpassword = strpos($_SERVER['REQUEST_URI'], 'action=lostpassword');
	} else {
		$lostpassword = strpos($_SERVER['REQUEST_URI'], $data['lostpassword']);
	}


	$invalidkey = strpos($_SERVER['REQUEST_URI'], 'lostpass&error=invalidkey');
	if ($login === false && $register === false && $lostpassword === false && $invalidkey === false )
		return null;

	// Replace link with your login page link
	$custom_login  = home_url();
	if( $_SERVER['REQUEST_METHOD'] == 'GET' && is_user_logged_in() !== false)
	{
		wp_redirect($custom_login);
	}
}
add_action('init','custom_redirect');
/** Redirect [end]*/

/**** Redirect from modal window ***/
add_filter( 'login_redirect', 'redirect_from_modal_window', 1000, 3 );
function redirect_from_modal_window($redirect_to, $requested_redirect_to, $user){
	$data = get_option('custom_config');
	if ($_SERVER['REQUEST_URI'] !== $data['login'] || strpos($_SERVER['REQUEST_URI'], 'wp-login.php') === false && strpos($_SERVER['HTTP_REFERER'], $data['login']) === false)
	{
		$redirect_to = $_COOKIE['REQUEST_URI'];
		setcookie("REQUEST_URI", "", time()-3600);
		return $redirect_to;
	}
	return $redirect_to;
}
$data = get_option('custom_config');
if ($_SERVER['REQUEST_URI'] === $data['login'] || strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
	setcookie("REQUEST_URI", "", time()-3600);
}
/**** [end] Redirect from modal window ***/

/** Restyle tag [start]**/
function restyle_tag($tag_name)
{
	/*if ($tag_name !== '会意字')
		return;*/

	if (xbox_get_field_value('my-theme-options', 'ignore_arabic') === 'on'){
		if (preg_match('/[أ-ي]/ui', $tag_name)) {
			$additional_simbol = [];
			for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
				if (preg_match('/[أ-ي]/ui', $res)) {
					$additional_simbol[] = mb_strtoupper($res);
					$additional_simbol[] = mb_strtolower($res);
				}
			}
		}
	}

	if(xbox_get_field_value('my-theme-options', 'ignore_chinese') === 'on') {
		if (preg_match("/\p{Han}+/u", $tag_name)) {
			$additional_simbol = [];
			for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
				if (preg_match('/\p{Han}+/u', $res)) {
					$additional_simbol[] = mb_strtoupper($res);
					$additional_simbol[] = mb_strtolower($res);
				}
			}

		}
	}

	if (xbox_get_field_value('my-theme-options', 'ignore_cyrillic') === 'on') {
		if (preg_match("/\p{Cyrillic}/u", $tag_name)) {
			$additional_simbol = [];
			for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
				if (preg_match('/\p{Cyrillic}/u', $res)) {
					$additional_simbol[] = mb_strtoupper($res);
					$additional_simbol[] = mb_strtolower($res);
				}
			}
		}
	}

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$arr_symbol = [
		'A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i',
		'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r',
		'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
	];

	if (sizeof($additional_simbol) > 0){
		$arr_symbol = array_merge($arr_symbol, $additional_simbol);
	}

	if (xbox_get_field_value('my-theme-options', 'tag_letter_case') !== 'default') {
		$value = xbox_get_field_value('my-theme-options', 'tag_letter_case');
		if ($value == 'lower')
			$tag_name = mb_strtolower($tag_name);
		if ($value == 'upper')
			$tag_name = mb_strtoupper( $tag_name );
		if ($value == 'first_upper') {
			$add_val = xbox_get_field_value('my-theme-options', 'first_letter');
			if ($add_val == 'no')
				$tag_name = ucfirst($tag_name);
			if ($add_val == 'after_space')
				$tag_name = ucwords($tag_name);
			if ($add_val == 'all') {
				$count = strlen($tag_name);
				if (preg_match("/\p{Han}+/u", $tag_name) || preg_match("/\p{Cyrillic}/u", $tag_name) || preg_match('/[أ-ي]/ui', $tag_name)) {
					for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
						$count = $i;
					}
					$count = $count + 1;
				}
				$res = '';
				for($i  = 0; $i < $count; $i++) {
					if ($i  === 0){
						$res .= mb_strtoupper(mb_substr($tag_name, $i, 1));
						continue;
					}

					if (in_array(mb_substr($tag_name, $i, 1), $arr_symbol) === false) {
						$symbol = true;
						$res .= mb_substr($tag_name, $i, 1);
						continue;
					}

					if ($symbol) {
						$res .= mb_strtoupper(mb_substr($tag_name, $i, 1));
						$symbol = false;
						continue;
					}

					$res .= mb_substr($tag_name, $i, 1);
				}
				$tag_name = $res;
			}
		}
	}
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	if (xbox_get_field_value('my-theme-options', 'tag_spacing') == 'replace_spaces') {
		$symbol_from_input = xbox_get_field_value('my-theme-options', 'replacement_symbol');
		$tag_name = str_ireplace(' ', $symbol_from_input, $tag_name);
		if (xbox_get_field_value('my-theme-options', 'treat_dashes') == 'on')
			$tag_name =str_ireplace('-', $symbol_from_input, $tag_name);
	} elseif (xbox_get_field_value('my-theme-options', 'tag_spacing') == 'remove_spaces') {
		$tag_name = str_ireplace(' ', '', $tag_name);
		if (xbox_get_field_value('my-theme-options', 'treat_dashes') == 'on')
			$tag_name = str_ireplace('-', '', $tag_name);
	}
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	if (xbox_get_field_value('my-theme-options', 'tag_symbols') != 'allow_symbols') {
		if (xbox_get_field_value('my-theme-options', 'tag_symbols') == 'replace_symbols') {
			$arr_symbol = [
				'A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i',
				'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r',
				'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z',
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ' ',
			];

			if (sizeof($additional_simbol) > 0){
				$arr_symbol = array_merge($arr_symbol, $additional_simbol);
			}

			if (xbox_get_field_value('my-theme-options', 'treat_dashes') == 'on')
				$arr_symbol[] = '-';
			$symbol_from_input = xbox_get_field_value('my-theme-options', 'symbol');

			$count = strlen($tag_name);
			if (preg_match("/\p{Han}+/u", $tag_name) || preg_match("/\p{Cyrillic}/u", $tag_name) || preg_match('/[أ-ي]/ui', $tag_name)) {
				for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
					$count = $i;
				}
				$count = $count + 1;
			}
			$res = '';

			for($i  = 0; $i < $count; $i++) {
				if (in_array(mb_substr($tag_name, $i, 1), $arr_symbol) === false) {
					$res .= $symbol_from_input;
					continue;
				}
				$res .= mb_substr($tag_name, $i, 1);
			}

			$tag_name = $res;
		} elseif (xbox_get_field_value('my-theme-options', 'tag_symbols') == 'remove_symbols') {
			$arr_symbol = [
				'A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i',
				'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r',
				'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z',
				'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ' ',
			];

			if (sizeof($additional_simbol) > 0){
				$arr_symbol = array_merge($arr_symbol, $additional_simbol);
			}

			if (xbox_get_field_value('my-theme-options', 'treat_dashes') == 'on')
				$arr_symbol[] = '-';
			$symbol_from_input = '';
			$count = strlen($tag_name);
			if (preg_match("/\p{Han}+/u", $tag_name) || preg_match("/\p{Cyrillic}/u", $tag_name) || preg_match('/[أ-ي]/ui', $tag_name)) {
				for($i = 0; $res = mb_substr($tag_name, $i, 1); $i++ ){
					$count = $i;
				}
				$count = $count + 1;
			}
			$res = '';
			for($i  = 0; $i < $count; $i++) {
				if (in_array(mb_substr($tag_name, $i, 1), $arr_symbol) === false) {
					$res .= $symbol_from_input;
					continue;
				}
				$res .= mb_substr($tag_name, $i, 1);
			}
			$tag_name = $res;
		}

	}

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	return $tag_name;
}
/** Restyle tag [end]**/


 /****send support messages***/
  add_action('wp_ajax_send_msg_to_support', 'send_msg_to_support');
  add_action('wp_ajax_nopriv_send_msg_to_support', 'send_msg_to_support');
  function send_msg_to_support() {
	  global $wpdb;
	  $table = 'supportMsg';
	  if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) die ( 'Busted!');
	  if(!empty($_POST['msg_title'])) {
		  $msg_title = strip_tags($_POST['msg_title']);
	  }
	  if(!empty($_POST['msg_desc'])) {
		  $msg_desc = strip_tags($_POST['msg_desc']);
	  }
	  if(isset($_POST['msg_type'])) {
		  $msg_type = $_POST['msg_type'];
	  }
	  if(!empty($_POST['username'])) {
		  $user_name = strip_tags($_POST['username']);
	  }
	  if(!empty($_POST['useremail'])) {
		  $user_email = strip_tags($_POST['useremail']);
	  }
	  $msg_data = [
		  'date' => date("Y-m-d H:i:s"),
		  'title' => $msg_title,
		  'msg' => $msg_desc,
		  'type' => $msg_type,
		  'name' => $user_name,
		  'email' => $user_email,
	  ];
	  $types = ['%s', '%s', '%s', '%s', '%s', '%s',];

	  $wpdb->insert($wpdb->prefix . $table, $msg_data, $types);

	  /****letter for admin****/
	  send_letter_to_support($msg_type, $msg_title);
	  /****end letter for admin****/
	  wp_send_json('ok');
  }
/**** [end] send support messages***/

/** Time ago [start]**/
function time_ago($startTime, $format = false)
{
	$arr_res = [
		'y'  => 0,
		'm'  => 0,
		'd'  => 0,
		'h'  => 0,
		'min'=> 0,
		's'  => 0,
	];
	$amount_of_elapsed_time = '';
	$startTime = new Datetime($startTime);
	$endTime = new DateTime();
	$diff = $endTime->diff($startTime);
	if ($diff->format('%y') !== '0') {
		if ($format !== true)
			$y = true;
		if ($diff->format('%y') === '1') {
			$amount_of_elapsed_time = $diff->format('%y') . ' year ago ';
			$arr_res['y'] = $diff->format('%y') . ' year';
		} else {
			$amount_of_elapsed_time = $diff->format('%y') . ' years ago ';
			$arr_res['y'] = $diff->format('%y') . ' years';
		}
	}

	if ($diff->format('%m') !== '0') {
		if ($amount_of_elapsed_time != '' && $format !== true) {
			$amount_of_elapsed_time = str_replace('ago', 'and', $amount_of_elapsed_time);
			$m = true;
			if ($diff->format('%m') === '1') {
				$amount_of_elapsed_time .= $diff->format('%m') . ' month ago';
			} else {
				$amount_of_elapsed_time .= $diff->format('%m') . ' months ago';
			}
		} else {
			if ($format !== true)
				$m = true;
			if ($diff->format('%m') === '1') {
				$amount_of_elapsed_time .= $diff->format('%m') . ' month ago';
				$arr_res['m'] = $diff->format('%m') . ' month';
			} else {
				$amount_of_elapsed_time .= $diff->format('%m') . ' months ago';
				$arr_res['m'] = $diff->format('%m') . ' months';
			}
		}
	}

	if ($y == false && $m == false) {
		if ($diff->format('%d') !== '0') {
			if ($diff->format('%d') === '1') {
				$amount_of_elapsed_time = $diff->format('%d') . ' day ago';
				$arr_res['d'] = $diff->format('%d') . ' day';
			} else {
				$amount_of_elapsed_time = $diff->format('%d') . ' days ago';
				$arr_res['d'] = $diff->format('%d') . ' days';
			}
			if ($format !== true)
				$stop = true;
		}
		if ($diff->format('%h') !== '0' && $stop !== true) {
			if ($diff->format('%h') === '1') {
				$amount_of_elapsed_time = $diff->format('%h') . ' hour ago' ;
				$arr_res['h'] = $diff->format('%h') . ' hour' ;
			} else {
				$amount_of_elapsed_time = $diff->format('%h') . ' hours ago';
				$arr_res['h'] = $diff->format('%h') . ' hours';
			}
			if ($format !== true)
				$stop = true;
		}
		if ($diff->format('%i') !== '0' && $stop !== true) {
			if ($diff->format('%i') === '1') {
				$amount_of_elapsed_time = $diff->format('%i') . ' minute ago';
				$arr_res['min'] = $diff->format('%i') . ' minute';
			} else {
				$amount_of_elapsed_time = $diff->format('%i') . ' minutes ago';
				$arr_res['min'] = $diff->format('%i') . ' minutes';
			}
			if ($format !== true)
				$stop = true;
		}
		if ($diff->format('%s') !== '0' && $stop !== true) {
			if ($diff->format('%s') === '1') {
				$amount_of_elapsed_time = $diff->format('%s') . ' second ago' ;
				$arr_res['s'] = $diff->format('%s') . ' second' ;
			} else {
				$amount_of_elapsed_time = $diff->format('%s') . ' seconds ago' ;
				$arr_res['s'] = $diff->format('%s') . ' seconds' ;
			}
		}
		$stop = true;
	}
	if ($format === true)
		return $arr_res;
	return $amount_of_elapsed_time;
}
/** Time ago [end]**/

/***change the content type for letters***/
add_filter( 'wp_mail_content_type', function( $old_content_type ){
	$new_content_type = 'text/html';
	return $new_content_type;
});
/*** [end] change the content type for letters***/

/**** count video views by pornstar****/
function count_views_by_pornstars($ID) {
	global $wpdb;
	$query_post_ids = $wpdb->get_results("SELECT `wp_posts`.`ID` FROM `wp_posts`
		LEFT JOIN `wp_term_relationships` ON `wp_posts`.`ID` = `wp_term_relationships`.`object_id`
	WHERE `wp_posts`.`post_type` = 'post' AND `wp_posts`.`post_status` = 'publish'
	  AND `wp_term_relationships`.`term_taxonomy_id` = ". $ID, ARRAY_A);
	foreach ($query_post_ids as $ids) {
		$views_count[] = get_post_meta($ids['ID'], 'post_views_count', true);
	}
	$sum = array_sum($views_count);
	return ($sum > 999) ? number_format($sum, 0, ',', ',') : $sum;
}


function wph_comments_form($default) {
	$default['logged_in_as'] = '';
	return $default;
}
add_filter('comment_form_defaults','wph_comments_form',999);


/** Add bulk action for user ban [start]*/
add_filter( 'bulk_actions-'.'users', 'register_ban_bulk_actions' );
function register_ban_bulk_actions( $bulk_actions ){
	$bulk_actions['Ban'] = 'Ban';
	return $bulk_actions;
}

add_filter( 'handle_bulk_actions-'.'users', 'ban_bulk_action_handler', 10, 3 );
function ban_bulk_action_handler( $redirect_to, $doaction, $users_ids ){
	if( $doaction !== 'Ban' )
		return $redirect_to;
	$arr_ban_id = [];

	foreach( $users_ids as $user_id ){
		if (get_user_meta($user_id, 'ban_on_id', true) === 'active') {
			continue;
		}
		update_user_meta( $user_id, 'ban_on_id', 'active' );
	}

	$redirect_to = add_query_arg( 'my_bulk_action_ban_on_id_done', count( $users_ids ), $redirect_to );

	return $redirect_to;
}

add_action( 'admin_notices', 'my_bulk_action_ban_on_id_admin_notice' );
function my_bulk_action_ban_on_id_admin_notice(){
	if( empty( $_GET['my_bulk_action_ban_on_id_done'] ) )
		return;

	$data = $_GET['my_bulk_action_ban_on_id_done'];

	if (intval($data) === 1) {
		$msg = sprintf( 'Added %d user in ban.', intval($data) );
	} else {
		$msg = sprintf( 'Added %d users in ban.', intval($data) );
	}

	echo '<div id="message" class="updated"><p>'. $msg .'</p></div>';
}

/** Add bulk action for user ban [end]*/

/** My number format [start]**/
function my_number_format($num)
{
	$res = $num;
	if ($num >= 1000 && $num < 100000 ) {
		$remainder_of_the_division = $num % 1000;
		if ($remainder_of_the_division === 0){
			$res = $num / 1000;
		} else {
			$res = $num / 1000;
			$res = bcdiv((string)$res, '1', 1);
		}
		$res .= 'k';
	}

	if ($num >= 100000 && $num < 1000000) {
		$remainder_of_the_division = $num % 1000;
		$num -= $remainder_of_the_division;
		$res = $num / 1000;
		$res .= 'k';
	}

	if ($num >= 1000000) {
		$remainder_of_the_division = $num % 1000000;
		$res = ($num - $remainder_of_the_division) / 1000000;
		$i = 0;
		while ($remainder_of_the_division >= 10000) {
			$remainder_of_the_division -= 10000;
			$i++;
		}

		if ($i) {
			if ($i < 10)
				$i = '0' . $i;
			$res .= '.' . $i . 'M';
		} else {
			$res .= 'M';
		}
	}

	return (string)$res;
}
/** My number format [end]**/

/***change password protected form**/
add_filter( 'the_password_form', 'rob_override_the_password_form' );
function rob_override_the_password_form( $form = '' ) {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<form id="password_protected_form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	<p>' . __( "This content is password protected. To view it please enter the password below:" ) . '</p>
	<div style="width: 100%;display: flex;"><input style="margin-right: 15px" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />
	<input id="password_protected_btn" type="submit" name="Submit" value="' . esc_attr__( "Show me" ) . '" /></div>
	</form>';
	return $form;
}
/*** [end] change password protected form ***/

function return_default_avatar($userID) {

	$def_avatar_img = '<svg width="212" height="212" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="212" height="212" rx="4" fill="#200437"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint0_linear)"/>
					<defs>
					<linearGradient id="paint0_linear" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
					<stop stop-color="#BA25D6"/>
					<stop offset="1" stop-color="#200437"/>
					</linearGradient>
					</defs>
					</svg>';
	return $def_avatar_img;
}
function user_last_login( $user_login, $user ) {
	update_user_meta( $user->ID, 'last_login', time() );
}
add_action('wp_login', 'user_last_login', 10, 2 );

/****woo****/
add_action('init', 'check_if_activate_woocommerce', 99999);
function check_if_activate_woocommerce() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if(is_plugin_active('woocommerce/woocommerce.php')) {
		add_filter( 'woocommerce_default_address_fields', 'custom_override_default_address_fields', 99999 );
		function custom_override_default_address_fields( $address_fields ) {

			unset( $address_fields['address_1'] );
			unset( $address_fields['address_2'] );
			unset( $address_fields['state'] );

			$address_fields['first_name']['placeholder'] = 'First name';
			$address_fields['first_name']['label']       = 'First name';
			$address_fields['first_name']['priority']    = 10;
			/*if ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'required' ) {
				$address_fields['first_name']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'optional' ) {
				$address_fields['first_name']['required'] = 0;
			} else {
				unset( $address_fields['first_name'] );
			}

			$address_fields['last_name']['placeholder'] = 'Last name';
			$address_fields['last_name']['label']       = 'Last name';
			$address_fields['last_name']['priority']    = 20;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'required' ) {
				$address_fields['last_name']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'optional' ) {
				$address_fields['last_name']['required'] = 0;
			} else {
				unset( $address_fields['last_name'] );
			}


			$address_fields['company']['placeholder'] = 'Company name';
			$address_fields['company']['label']       = 'Company name';
			$address_fields['company']['priority']    = 30;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['company_show'] == 'required' ) {
				$address_fields['company']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['company_show'] == 'optional' ) {
				$address_fields['company']['required'] = 0;
			} else {
				unset( $address_fields['company'] );
			}*/

			$address_fields['country']['placeholder'] = 'Country';
			$address_fields['country']['label']       = 'Country';
			$address_fields['country']['priority']    = 40;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'required' ) {
				$address_fields['country']['required'] = 1;
				$address_fields['address_1']['required'] = 0;
				$address_fields['address_2']['required'] = 0;
				unset($address_fields['address_1']);
				unset($address_fields['address_2']);
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'optional' ) {
				$address_fields['country']['required'] = 0;
			} else {
				unset( $address_fields['country'] );
			}

			/*$address_fields['city']['placeholder'] = 'City/Town';
			$address_fields['city']['label']       = 'City/Town';
			$address_fields['city']['priority']    = 50;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'required' ) {
				$address_fields['city']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'optional' ) {
				$address_fields['city']['required'] = 0;
			} else {
				unset( $address_fields['city'] );
			}

			$address_fields['postcode']['placeholder'] = 'Postal code';
			$address_fields['postcode']['label']       = 'Postal code';

			$address_fields['postcode']['priority'] = 60;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'required' ) {
				$address_fields['postcode']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'optional' ) {
				$address_fields['postcode']['required'] = 0;
			} else {
				unset( $address_fields['postcode'] );
			}

			$address_fields['phone']['placeholder'] = 'Phone';
			$address_fields['phone']['label']       = 'Phone';

			$address_fields['phone']['priority'] = 70;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'required' ) {
				$address_fields['phone']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'optional' ) {
				$address_fields['phone']['required'] = 0;
			} else {
				unset( $address_fields['phone'] );
			}*/

			if (!get_theme_mod('show_billings_details')) {
				unset( $address_fields['first_name'] );
				unset( $address_fields['last_name'] );
				unset( $address_fields['company'] );
				unset( $address_fields['country'] );
				unset( $address_fields['city'] );
				unset( $address_fields['postcode'] );
				unset( $address_fields['phone'] );
				$address_fields['first_name']['required'] = 0;
				$address_fields['last_name']['required'] = 0;
				$address_fields['company']['required'] = 0;
				$address_fields['country']['required'] = 0;
				$address_fields['city']['required'] = 0;
				$address_fields['postcode']['required'] = 0;
				$address_fields['phone']['required'] = 0;
			}
		}

		add_filter( 'woocommerce_checkout_fields', 'custom_override_checkout_fields', 99999 );
		function custom_override_checkout_fields( $fields ) {
			/*global $woocommerce;
			woocommerce_form_field( 'billing_country', array( 'type' => 'country' ) );*/

			unset( $fields['billing']['billing_email'] );
			unset( $fields['billing']['billing_address_1'] );
			unset( $fields['billing']['billing_address_2'] );
			unset( $fields['order'] );
			unset($fields['shipping']);
			unset($fields['account']);

			$fields['billing']['billing_first_name']['placeholder'] = 'First name';
			$fields['billing']['billing_first_name']['label']       = 'First name';
			$fields['billing']['billing_first_name']['priority']    = 1;

			if ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'required' ) {
				$fields['billing']['billing_first_name']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'hidden' ) {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
					$fields['billing']['billing_last_name']['class'][0]  = 'form-row-last';
				}

			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'optional' ) {
				$fields['billing']['billing_first_name']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'hidden' ) {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
					$fields['billing']['billing_last_name']['class'][0]  = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_first_name'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] != 'hidden' ) {
					$fields['billing']['billing_last_name']['class'][0] = 'form-row-last';
				}
			}

			$fields['billing']['billing_last_name']['placeholder'] = 'Last name';
			$fields['billing']['billing_last_name']['label']       = 'Last name';
			$fields['billing']['billing_last_name']['priority']    = 2;

			if ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'required' ) {
				$fields['billing']['billing_last_name']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'hidden' ) {
					$fields['billing']['billing_last_name']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
					$fields['billing']['billing_last_name']['class'][0]  = 'form-row-last';
				}
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['lastname_show'] == 'optional' ) {
				$fields['billing']['billing_last_name']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] == 'hidden' ) {
					$fields['billing']['billing_last_name']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
					$fields['billing']['billing_last_name']['class'][0]  = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_last_name'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['firstname_show'] != 'hidden' ) {
					$fields['billing']['billing_first_name']['class'][0] = 'form-row-wide';
				}
			}


			$fields['billing']['billing_company']['placeholder'] = 'Company name';
			$fields['billing']['billing_company']['label']       = 'Company name';
			$fields['billing']['billing_company']['priority']    = 3;
			$fields['billing']['billing_company']['class'][0]    = 'form-row-wide';
			if ( get_option( 'theme_mods_vicetemple_pornx' )['company_show'] == 'required' ) {
				$fields['billing']['billing_company']['required'] = 1;
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['company_show'] == 'optional' ) {
				$fields['billing']['billing_company']['required'] = 0;
			} else {
				unset( $fields['billing']['billing_company'] );
			}


			$fields['billing']['billing_country']['placeholder'] = 'Country';
			$fields['billing']['billing_country']['label']       = 'Country';
			$fields['billing']['billing_country']['priority']    = 4;
			/*$fields['billing']['billing_country']['type']    = 'country';*/
			if ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'required' ) {
				$fields['billing']['billing_address_1']['required'] = 0;
				$fields['billing']['billing_address_2']['required'] = 0;
				unset( $fields['billing']['billing_address_1']);
				unset( $fields['billing']['billing_address_2']);
				$fields['billing']['billing_country']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'hidden' ) {
					$fields['billing']['billing_country']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_country']['class'][0] = 'form-row-first';
					$fields['billing']['billing_city']['class'][0]    = 'form-row-last';
				}
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'optional' ) {
				$fields['billing']['billing_country']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'hidden' ) {
					$fields['billing']['billing_country']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_country']['class'][0] = 'form-row-first';
					$fields['billing']['billing_city']['class'][0]    = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_country'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] != 'hidden' ) {
					$fields['billing']['billing_city']['class'][0] = 'form-row-wide';
				}
			}

			$fields['billing']['billing_city']['placeholder'] = 'City';
			$fields['billing']['billing_city']['label']       = 'City';
			$fields['billing']['billing_city']['priority']    = 5;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'required' ) {
				$fields['billing']['billing_city']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'hidden' ) {
					$fields['billing']['billing_city']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_country']['class'][0] = 'form-row-first';
					$fields['billing']['billing_city']['class'][0]    = 'form-row-last';
				}
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['city_show'] == 'optional' ) {
				$fields['billing']['billing_city']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] == 'hidden' ) {
					$fields['billing']['billing_city']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_country']['class'][0] = 'form-row-first';
					$fields['billing']['billing_city']['class'][0]    = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_city'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['country_show'] != 'hidden' ) {
					$fields['billing']['billing_country']['class'][0] = 'form-row-wide';
				}
			}

			$fields['billing']['billing_postcode']['placeholder'] = 'Postal code';
			$fields['billing']['billing_postcode']['label']       = 'Postal code';
			$fields['billing']['billing_postcode']['priority']    = 6;
			$fields['billing']['billing_postcode']['class'][0]    = 'form-row-first';
			if ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'required' ) {
				$fields['billing']['billing_postcode']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'hidden' ) {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-first';
					$fields['billing']['billing_phone']['class'][0]    = 'form-row-last';
				}
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'optional' ) {
				$fields['billing']['billing_postcode']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'hidden' ) {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-first';
					$fields['billing']['billing_phone']['class'][0]    = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_postcode'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] != 'hidden' ) {
					$fields['billing']['billing_phone']['class'][0] = 'form-row-wide';
				}
			}


			$fields['billing']['billing_phone']['placeholder'] = 'Phone';
			$fields['billing']['billing_phone']['label']       = 'Phone';
			$fields['billing']['billing_phone']['priority']    = 7;
			if ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'required' ) {
				$fields['billing']['billing_phone']['required'] = 1;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'hidden' ) {
					$fields['billing']['billing_phone']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-first';
					$fields['billing']['billing_phone']['class'][0]    = 'form-row-last';
				}
			} elseif ( get_option( 'theme_mods_vicetemple_pornx' )['phone_show'] == 'optional' ) {
				$fields['billing']['billing_phone']['required'] = 0;
				if ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] == 'hidden' ) {
					$fields['billing']['billing_phone']['class'][0] = 'form-row-wide';
				} else {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-first';
					$fields['billing']['billing_phone']['class'][0]    = 'form-row-last';
				}
			} else {
				unset( $fields['billing']['billing_phone'] );
				if ( get_option( 'theme_mods_vicetemple_pornx' )['postcode_show'] != 'hidden' ) {
					$fields['billing']['billing_postcode']['class'][0] = 'form-row-wide';
				}
			}
			if (!get_theme_mod('show_billings_details')) {
				unset( $fields['billing']['billing_first_name'] );
				unset( $fields['billing']['billing_last_name'] );
				unset( $fields['billing']['billing_company'] );
				unset( $fields['billing']['billing_country'] );
				unset( $fields['billing']['billing_city'] );
				unset( $fields['billing']['billing_postcode'] );
				unset( $fields['billing']['billing_phone'] );
				$fields['billing']['billing_first_name']['required'] = 0;
				$fields['billing']['billing_last_name']['required'] = 0;
				$fields['billing']['billing_company']['required'] = 0;
				$fields['billing']['billing_country']['required'] = 0;
				$fields['billing']['billing_city']['required'] = 0;
				$fields['billing']['billing_postcode']['required'] = 0;
				$fields['billing']['billing_phone']['required'] = 0;
			}

			return $fields;
		}

		add_filter( 'woocommerce_order_button_html', 'custom_order_button_html' );
		function custom_order_button_html( $button ) {
			$order_button_text = __( 'Pay', 'arc' );
			$button            = '<button id="custom_Checkout_Button">' . $order_button_text . '</button>';

			return $button;
		}

		add_filter( 'woocommerce_product_add_to_cart_url', 'misha_fix_for_individual_products', 10, 2 );
		function misha_fix_for_individual_products( $add_to_cart_url, $product ) {
			if ( $product->get_sold_individually() // if individual product
				&& WC()->cart->find_product_in_cart( WC()->cart->generate_cart_id( $product->id ) ) // if in the cart
				&& $product->is_purchasable() // we also need these two conditions
				&& $product->is_in_stock() ) {
				$add_to_cart_url = wc_get_checkout_url();
			}

			return $add_to_cart_url;
		}

		add_filter( 'woocommerce_terms_is_checked_default', 'apply_default_check' );
		function apply_default_check() {
			return 1;
		}

		remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
		add_action( 'woocommerce_review_order_and_proceed', 'woocommerce_order_review', 20 );

		/**add best choice product to cart***/
		add_action( 'template_redirect', function () {
			$products = get_posts( array(
				'numberposts'      => 1,
				'orderby'          => 'price',
				'order'            => 'ASC',
				'post_type'        => 'product',
				'suppress_filters' => true,
			) );

			if ( WC()->cart->is_empty() && is_user_logged_in() && ! is_page_template( 'template-account-settings.php' ) ) {
				WC()->cart->add_to_cart( $products[0]->ID, 1 );
			}
		} );

		/****if cart - not empty reset cart****/
		add_filter( 'woocommerce_add_to_cart_validation', 'one_cart_item_at_the_time', 10, 3 );
		function one_cart_item_at_the_time( $passed, $product_id, $quantity ) {
			if ( ! WC()->cart->is_empty() ) {
				WC()->cart->empty_cart();
			}

			return $passed;
		}


		/***redirect from shop page***/
		add_action( 'template_redirect', function () {
			if (is_shop() || is_product_category() || is_product()) {
				wp_redirect(site_url());
			}
		} );
	}
}
if(is_plugin_active('woocommerce/woocommerce.php')) {
	/**get information about user orders**/
	function get_all_orders_current_user($user_id) {
		global $wpdb;
		$query = "SELECT `wp_wc_order_stats`.`order_id`, `wp_wc_order_stats`.`date_created`  FROM `wp_wc_order_stats`
				LEFT JOIN `wp_wc_customer_lookup` ON `wp_wc_order_stats`.`customer_id`= `wp_wc_customer_lookup`.`customer_id` 
				WHERE `wp_wc_customer_lookup`.`user_id` = " .$user_id ." 
				AND (`wp_wc_order_stats`.`status` = 'wc-processing' OR `wp_wc_order_stats`.`status` = 'wc-completed') 
				ORDER BY `wp_wc_order_stats`.`date_created` ASC";
		$orders = $wpdb->get_results($query, ARRAY_A);
		if($orders) {
			foreach($orders as $order) {
				$query = "SELECT `product_id` FROM `wp_wc_order_product_lookup` WHERE `order_id` = " . $order['order_id'];
				$product_id = $wpdb->get_var($query);
				$product_title = get_post($product_id, ARRAY_A )['post_title'];
				$orders_array[] = [
					'title' => $product_title, 'start' => $order['date_created']
				];
			}
			return $orders_array;
		} else return false;
	}
	/** [end] get information about user orders**/

	/*** get final expires time of active user order****/
	function get_final_expires_time_of_active_user_order($input_data = [], $arg = false, $id = false) {
		$all_pay_for_one_user = [];
		foreach ($input_data as $v) {
			switch($v['title']) {
				case '1 month':
					$end = strtotime("+1 month", strtotime($v['start']));
					break;
				case '3 months':
					$end = strtotime("+3 months", strtotime($v['start']));
					break;
				case '6 months':
					$end = strtotime("+6 months", strtotime($v['start']));
					break;
				case '12 months':
					$end = strtotime("+12 months", strtotime($v['start']));
					break;
			}
			$all_pay_for_one_user[] = ['title' => $v['title'], 'start' => $v['start'], 'end' => date('Y-m-d H:i:s', $end)];
		}

		$active_orders = [];
		foreach ($all_pay_for_one_user as $separate_order) {
			if (strtotime($separate_order['end']) > time()) {
				$active_orders[] = $separate_order;
			}
			unset($separate_order);
		}

		$list_of_values_of_available_time = [];
		foreach ($active_orders as $separate_order) {
			$list_of_values_of_available_time[] = strtotime($separate_order['end']) - time();
		}

		foreach ($list_of_values_of_available_time as $v) {
			$summ_available_time += $v;
		}

		$final = strtotime($all_pay_for_one_user[sizeof($all_pay_for_one_user) - 1]['end']) - strtotime($all_pay_for_one_user[sizeof($all_pay_for_one_user) - 1]['start']);
		$final = $summ_available_time - $final;
		$final = strtotime($all_pay_for_one_user[sizeof($all_pay_for_one_user) - 1]['end']) + $final;
		if ($arg !== false) {
			return $active_orders[sizeof($active_orders) - 1]['title'];
		}
		/** Experiment [start]*/
		$premium_duration = get_user_meta($id, 'premium_duration', true);

		if ( $premium_duration !== '' ) {

			$active_time = (($premium_duration['premium_duration'] * 86400) + $premium_duration['start']) - time();
			if ($active_time > 0) {
				$summ = 0;
				foreach ($active_orders as $v) {
					if (strtotime($v['start']) >= $premium_duration['start']) {
						$summ += strtotime($v['end']) - time();
					}
				}
				if ($summ > 0) {
					$final = $active_time + $premium_duration['start'] + $summ;
				} else {
					$final = $active_time + $premium_duration['start'];
				}
			}

			if ($premium_duration['premium_duration'] == '0') {
				$summ = 0;
				foreach ($active_orders as $v) {
					if (strtotime($v['start']) >= $premium_duration['start']) {
						$summ += strtotime($v['end']) - time();
					}
				}
				if ($summ > 0) {
					$final = $summ + strtotime($active_orders[sizeof($active_orders) - 1]['start']);
				} else {
					$final = '0';
				}
			}
		}
		/** Experiment [end]*/

		return $final;
	}
	/*** [end] get final expires time of active user order****/

	/***remove dismiss notice demo store***/
	add_filter('woocommerce_demo_store', 'demo_store_filter',99999, 1);
	function demo_store_filter($text){
		return '';
	}

	add_action('widgets_init', function () {
		unregister_widget('WC_Widget_Products');
		unregister_widget('WC_Widget_Product_Categories');
		unregister_widget('WC_Widget_Product_Tag_Cloud');
		unregister_widget('WC_Widget_Recently_Viewed');
		unregister_widget('WC_Widget_Top_Rated_Products');
		unregister_widget('WC_Widget_Product_Search');
		unregister_widget('WC_Widget_Cart');
		unregister_widget('WC_Widget_Layered_Nav_Filters');
		unregister_widget('WC_Widget_Layered_Nav');
		unregister_widget('WC_Widget_Rating_Filter');
		unregister_widget('WC_Widget_Price_Filter');
	}, 1);


	/*WooCommerce - remove WooC Generator tag, css, scripts for pages, that not related to checkout*/
	add_action( 'wp_head', 'my_on_woocommerce_scripts', 9999 );
	add_action( 'wp_enqueue_scripts', 'my_on_woocommerce_scripts', 9999 );
	function my_on_woocommerce_scripts() {
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
		if (function_exists('is_woocommerce')) {
			if (!is_checkout() && !is_cart() && !is_page_template('template-account-settings.php') && !is_woocommerce()) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_deregister_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_deregister_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_deregister_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_deregister_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_style( 'wc-blocks-vendors-style' );
				wp_deregister_style( 'wc-blocks-vendors-style' );
				wp_dequeue_style( 'wc-blocks-style' );
				wp_deregister_style( 'wc-blocks-style' );
				wp_dequeue_style( 'wc-block-vendors-style' );
				wp_deregister_style( 'wc-block-vendors-style' );
				wp_dequeue_style( 'wc-block-style' );
				wp_deregister_style( 'wc-block-style' );
				wp_dequeue_style( 'woocommerce-layout' );
				wp_deregister_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_deregister_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce-general' );
				wp_deregister_style( 'woocommerce-general' );
				wp_dequeue_style( 'woocommerce-inline-inline' );
				wp_deregister_style( 'woocommerce-inline-inline' );

				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );

			}
		}
	}
}

add_action('admin_init', 'delete_default_pages_by_woocommerce', 9999);
function delete_default_pages_by_woocommerce() {
	if(is_plugin_active('woocommerce/woocommerce.php') && is_admin()) {
		$id_cart = get_page_by_path('/cart/')->ID;
		$id_checkout = get_page_by_path('/checkout/')->ID;
		$id_my_acc = get_page_by_path('/my-account/')->ID;
		$id_shop = get_page_by_path('/shop/')->ID;
		wp_delete_post($id_cart, true);
		wp_delete_post($id_checkout, true);
		wp_delete_post($id_my_acc, true);
		wp_delete_post($id_shop, true);

		$id_account_settings = get_page_by_path('/account-settings/')->ID;
		if(get_option('woocommerce_checkout_page_id') != $id_account_settings) {
			update_option('woocommerce_checkout_page_id', $id_account_settings);
		}
		$id_terms_page = get_page_by_path('/terms-and-conditions/')->ID;
		if(get_option('woocommerce_terms_page_id') != $id_terms_page) {
			update_option('woocommerce_terms_page_id', $id_terms_page);
		}
	}
	else return;
}
/*** [end woo]****/


/*****delete tags if post deleting*****/
add_action( 'wp_trash_post', 'delete_tags_after_delete_post', 10, 1);
function delete_tags_after_delete_post($post_id) {
	global $wpdb;
	$all_tag_list = wp_get_post_tags((int)$post_id);

	$all_unique_tag_list = [];
	foreach ($all_tag_list as $k=>$v) {
		$wp_query = new WP_Query( array( 'tag' => $v->slug ) );
		if ((int)$wp_query->found_posts == 1){
			$all_unique_tag_list[] = $v->slug;
		}
	}

	$res = $wpdb->get_results( "SELECT `id`, `arr_tag` FROM `wp_ip_country_trend`" );
	$number_key_for_delete = [];
	foreach ($res as $k=>$v) {
		$all_tag_for_one_country = unserialize($v->arr_tag);

		foreach ($all_unique_tag_list as $tag) {
			$r = array_search($tag, $all_tag_for_one_country) ;
			if ($r !== false) {
				$number_key_for_delete[] = $r;
			}
		}

		if (sizeof($number_key_for_delete) > 0) {
			foreach ($number_key_for_delete as $key) {
				unset($all_tag_for_one_country[$key]);
			}
			$all_tag_for_one_country = serialize($all_tag_for_one_country);
			$data = ['arr_tag' => $all_tag_for_one_country];
			$wpdb->update( 'wp_ip_country_trend', $data, ['id'=>$v->id] );
		}
	}
}

function remove_uncategorized_category( $terms, $taxonomy, $query_vars, $term_query ) {
	if ( is_admin() )
		return $terms;

	if ( $taxonomy[0] == 'category' ) {
		foreach ( $terms as $k => $term ) {
			if ( $term->term_id == get_option( 'default_category' ) ) {
				unset( $terms[$k] );
			}
		}
	}
	return $terms;
}
add_filter( 'get_terms', 'remove_uncategorized_category', 10, 4 );

add_filter('pre_get_posts', 'pornstars_videos_per_page', 1 );
function pornstars_videos_per_page( $query ) {
	if( is_admin() || ! $query->is_main_query() )
		return;
	if( $query->is_tax('pornstars') ){
		$query->set( 'posts_per_page', xbox_get_field_value( 'my-theme-options', 'number-video-per-actors-page' ));
	}
	if( $query->is_post_type_archive('photos')){
		$query->set( 'posts_per_page', xbox_get_field_value('my-theme-options', 'number_albums_per_page'));
	}
}

if(!is_single() || !is_singular('photos') || !is_singular('blog') || !is_attachment() || !is_page_template('template-community.php')) {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

function wpshablon_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'wpshablon_remove_jquery_migrate' );

//remove styles from $array_to_footer to global array $arr_styles and deregister them from queue
function an_move_css_to_global() {
	$array_to_footer = array('dashicons', 'admin-bar','wp-block-library','wp-mail-smtp-admin-bar', 'yoast-seo-adminbar','arc-font-awesome','arc-font-awesome-woff', 'arc-font-awesome-woff2' );
	global $arr_styles;
	$arr_styles = array();
	foreach( wp_styles()->registered as $style ) {
		if (in_array($style->handle, $array_to_footer, true)) {
			$arr_styles[] = array(
				'handle' => $style->handle,
				'src'    => $style->src
			);
		}
	}
	foreach( $arr_styles as $style ) {
		wp_deregister_style( $style['handle'] );
	}
}
add_action( 'wp_enqueue_scripts', 'an_move_css_to_global', 99 );

//remove styles from global array $arr_styles and enqueue them in footer
function an_css_global_to_footer() {
	global $arr_styles;
	foreach( $arr_styles as $style ) {
		if($style['handle'] === 'dashicons' || $style['handle'] === 'admin-bar' || $style['handle'] === 'wp-mail-smtp-admin-bar' || $style['handle'] === 'yoast-seo-adminbar') {
			if(is_user_logged_in() && current_user_can('administrator')) {
				wp_register_style( $style['handle'], $style['src'] );
				wp_print_styles( $style['handle'] );
			}
		} else {
			wp_register_style( $style['handle'], $style['src'] );
			wp_print_styles( $style['handle'] );
		}
	}
}
add_action( 'wp_footer', 'an_css_global_to_footer' );


/***preload font-awesome fonts***/
add_filter( 'style_loader_tag','wpse366869_preload_styles', 10, 4 );
function wpse366869_preload_styles( $html, $handle, $href, $media ) {
	// do this only when 'fontawesome-webfont' is mentioned in the html
	if($handle === 'arc-font-awesome-woff') {
		$html = str_replace( "<link rel='stylesheet'", "<link rel='preload' as='font' crossorigin type='font/woff'", $html );
	}
	if($handle === 'arc-font-awesome-woff2') {
		$html = str_replace( "<link rel='stylesheet'", "<link rel='preload' as='font' crossorigin type='font/woff2'", $html );
	}
	return $html;
}

/*** disable download videos via direct link***/
add_filter( 'mod_rewrite_rules', function ( $rules ) {
	if('off' === xbox_get_field_value('my-theme-options','display-tracking-button')) {
		$site_url = parse_url(site_url(), PHP_URL_HOST);
		$https  = "\n";
		$https .= "# Protect links from download by direct links\n";
		$https .= "<IfModule mod_rewrite.c>\n";
		$https .= "RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?".$site_url." [NC]\n";
		$https .= "RewriteRule \.(mp4|webm)$ - [NC,F,L]\n";
		$https .= "</IfModule>\n";
		$https .= "\n";
	} else {
		$site_url = parse_url(site_url(), PHP_URL_HOST);
		$https  = "\n";
		$https .= "# Protect links from download by direct links\n";
		$https .= "<IfModule mod_rewrite.c>\n";
		$https .= "RewriteCond %{HTTP_REFERER} !^http(s)?://(www\.)?".$site_url." [NC]\n";
		$https .= "RewriteRule \.(random)$ - [NC,F,L]\n";
		$https .= "</IfModule>\n";
		$https .= "\n";
	}
	return $https . $rules;
});
/*** [end] disable download videos via direct link***/

/**** replace m4v extention to mp4 before upload file****/
function wp_replace_m4v_to_mp4($file) {
	$file['name'] = str_replace('.m4v', '.mp4', $file['name']);
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'wp_replace_m4v_to_mp4', 1, 1);
/**** [end] replace m4v extention to mp4 before upload file****/

/** Add custom config urls*/
add_action('wp_loaded', function(){
	if(get_option('custom_config') === false) {
		$custom_config_links = [
			"login" => "/login",
			"register" => "/register",
			"lostpassword" => "/lostpassword",
			"logout" => "/logout",
			"redirect_login" => "/",
			"redirect_logout" => "/"
		];

		update_option("custom_config", $custom_config_links);
		flush_rewrite_rules();
	}
});
/** [end] Add custom config urls*/

 /**** rewrite plain permalink to post name***/
add_action( 'permalink_structure_changed', 'rewrite_plain_permalink_structure', 10, 2 );
function rewrite_plain_permalink_structure( $old_permalink_structure, $permalink_structure ){
	if(empty($permalink_structure)) {
		$custom_config_links = [
			"login" => "/login",
			"register" => "/register",
			"lostpassword" => "/lostpassword",
			"logout" => "/logout",
			"redirect_login" => "/",
			"redirect_logout" => "/"
		];
		update_option("custom_config", $custom_config_links);
		update_option('permalink_structure', '/%postname%/');
	} else {
		$custom_config_links = [
			"login" => "/login",
			"register" => "/register",
			"lostpassword" => "/lostpassword",
			"logout" => "/logout",
			"redirect_login" => "/",
			"redirect_logout" => "/"
		];
		update_option("custom_config", $custom_config_links);
	}
}
/**** [end] rewrite plain permalink to post name***/


/*** rename Uploaded by on videos page***/
 add_action('admin_footer', function() {
	 echo "<script>
			jQuery(document).ready(function(){                   
				if(arc_admin_scripts_ajax_var.hook === 'edit.php') {
					var displaying_num = jQuery('th#author').html();
					jQuery('th#author').html(displaying_num.replace('Uploaded by', 'Uploader'));
				} 
			});
	</script>";
 });
/*** [end] rename Uploaded by on videos page***/

 /** remove unnecessary image formats**/
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	return array_diff( $sizes, [
		'medium_large',
		'woocommerce_thumbnail',
		'1536x1536',
		'2048x2048',
		'woocommerce_single',
		'woocommerce_gallery_thumbnail',
		'shop_catalog',
		'shop_thumbnail',
		'shop_single',
	] );
}
/** [end] remove unnecessary image formats**/

/*** xHamster allow full screen***/
if(!is_plugin_active('vicetemple-mass-embedder/vicetemple-mass-embedder.php')) {
	require_once get_template_directory() . '/vendor/simple-html-dom-x.php';
}
function xhamster_allowfullscreen_iframes($meta_value, $object_id, $meta_key, $single) {
	if ('embed' === $meta_key) {
		$meta_cache = wp_cache_get($object_id, 'post_meta'); //all meta data about current post on output
		if (!$meta_cache) {
			$meta_cache = update_meta_cache('post', array($object_id));
			$meta_cache = $meta_cache[$object_id];
		}
		if (isset($meta_cache[$meta_key])) {
			if ($single) {
				$meta_value = maybe_unserialize($meta_cache[$meta_key][0]);
			} else {
				$meta_value = array_map('maybe_unserialize', $meta_cache[$meta_key]);
			}
			$meta_value = str_get_html($meta_value);
			if (false !== $meta_value) {
				foreach ($meta_value->find('iframe') as $iframe) {
					if ($iframe->src) {
						$partner_id_from_iframe_url = strtolower( str_replace( array( 'www.', 'embed.' ), '', pathinfo( wp_parse_url( $iframe->src, PHP_URL_HOST ), PATHINFO_FILENAME ) ) );
						if ($partner_id_from_iframe_url == 'xhamster') {
							$iframe->allowfullscreen = 'allowfullscreen';
						}
					}
				}
			}
		}
	}
	return $meta_value;
}
add_filter( 'get_post_metadata', 'xhamster_allowfullscreen_iframes', 999, 4);



/** Check update [start]*/
add_action('admin_init', 'check_update_from_main_dashboard');
function check_update_from_main_dashboard()
{
	if ($_SERVER['PHP_SELF'] === '/wp-admin/index.php' && get_option('_current_site_user_license') !== false) {
		$status = get_option('check_update_from_main_dashboard');
		if ($status !== false && ($status + 21600) < time() ) { // 21600
			/*** plugins***/
			$site_name = ['site_name' => site_url()];
			if($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, VICETEMPLECORE_API . 'plugin');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, 'data_plugin=' . $site_name);
				$data_plugins = curl_exec($curl);
				curl_close($curl);
				$data_about_all_plugins = [];
				$plugins_api = json_decode($data_plugins, true);

				if( !function_exists('get_plugins') ){
					require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				}

				$all_plugins = get_plugins();
				foreach ($plugins_api as $plugin) {
					$root_plugin_file = $plugin['archive_name'] . '/'. $plugin['archive_name'] .'.php';
					if(is_plugin_active($root_plugin_file)){
						$get_curr_version = $all_plugins[$root_plugin_file]['Version'];
						$data_about_all_plugins[$plugin['name']] = [
							'version' => $get_curr_version,
							'new_version' => $plugin['version'],
							'additional_version' => $plugin['version'],
							'archive_name' => $plugin['archive_name']
						];
					}
				}
				if(get_option('vicetemple_update_plugin') === false) {
					update_option('vicetemple_update_plugin', $data_about_all_plugins);
				} else {
					$old_data_about_all_plugins = get_option('vicetemple_update_plugin');
					$result = array_merge($old_data_about_all_plugins, $data_about_all_plugins);
					update_option('vicetemple_update_plugin', $result);
				}
			}
			/*** [end] plugins***/

			/*** theme **/
			if($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, VICETEMPLECORE_API .'theme');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, 'data_theme=' . $site_name);
				$data_theme = curl_exec($curl);
				curl_close($curl);
				$currentTheme = wp_get_theme();
				$curr_theme_version = $currentTheme->get('Version');
				$update_version = json_decode($data_theme, true)[0]['version'];
				if($update_version > $curr_theme_version) {
					$data[] = [
						'new_version' => $update_version,
						'flag' => 'yes',
						'version' => $curr_theme_version
					];
				} else {
					$data[] = [
						'new_version' => null,
						'version' => $curr_theme_version
					];
				}
				update_option('vicetemple_update_theme', json_encode($data));
			}


			/*** [end] theme ***/
			update_option('check_update_from_main_dashboard', time());
		} elseif($status === false) {
			update_option('check_update_from_main_dashboard', time());
		}
	}
}
/** Check update [end]*/

 /*** Get count of PORNX updates***/
  function count_of_pornx_updates() {
	  $plugins_data = get_option('vicetemple_update_plugin');
	  $plugin_new_v = 0;
	  $theme_new_v = 0;
	  if( !function_exists('get_plugins') ){
		  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	  }
	  foreach($plugins_data as $plugin_dt) {
		  if(is_plugin_active($plugin_dt['archive_name'] . '/'. $plugin_dt['archive_name'] .'.php')) {
			  if ($plugin_dt['additional_version'] > $plugin_dt['version']) {
				  $plugin_new_v++;
			  }
		  }
	  }

	  $theme_data = json_decode(get_option('vicetemple_update_theme', true));

	  for($i = 0; $i < @count($theme_data); $i++) {
		  if (($theme_data[$i]->flag !== 'indefined' || $theme_data[$i]->flag !== null) && $theme_data[$i]->new_version !== null) {
			  if ($theme_data[$i]->flag == 'yes') {
				  $theme_new_v++;
			  }
		  }
	  }

	  $updates = $plugin_new_v + $theme_new_v;
	  return $updates;
  }
/*** [end] Get count of PORNX updates***/

add_action('pornstars_add_form_fields', function( $taxonomy ) {
	?>
		<div class="form-field term-group">
			<label for="category-image-id"><?php _e('Image', 'arc'); ?></label>
			<input type="hidden" id="category-image-id" name="pornstars-image-id" class="custom_media_url" value="">
			<div id="category-image-wrapper"></div>
			<p>
				<input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'arc' ); ?>" />
				<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'arc' ); ?>" />
			</p>
		</div>
	<?php
}, 10, 1);

add_action('created_pornstars', function( $term_id, $tt_id ) {
	$image = $_POST['pornstars-image-id'] ?? '';
	update_term_meta($term_id, 'pornstars-image-id', $image);
}, 10, 2);

add_action('pornstars_edit_form_fields', function( $term, $taxonomy ) {
	?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="category-image-id"><?php _e( 'Image', 'arc' ); ?></label>
		</th>
		<td>
			<?php $image_id = get_term_meta( $term->term_id, 'pornstars-image-id', true ); ?>
			<input type="hidden" id="category-image-id" name="pornstars-image-id" value="<?php echo $image_id; ?>">
			<div id="category-image-wrapper">
				<?php if ( $image_id ) { ?>
					<?php echo wp_get_attachment_image ( $image_id, 'arc_thumb_medium' ); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'arc' ); ?>" />
				<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'arc' ); ?>" />
			</p>
		</td>
	</tr>
	<?php
}, 10, 2);

add_action('edited_pornstars', function( $term_id, $tt_id ) {
	$image = $_POST['pornstars-image-id'] ?? '';
	update_term_meta ( $term_id, 'pornstars-image-id', $image );
}, 10, 2);

function px_get_premium_label_url() {
    $current_niche = get_option('my-theme-options')['choose-niche'];

    if ('lesbian' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/lesbianx.png';
    }
    //teens
    elseif ('college' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/teenx.png';
    }
    elseif ('milf' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/milfx.png';
    }
    elseif ('hentai' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/hentaix.png';
    }
    //gay
    elseif ('livexcams' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/gayx.png';
    }
    //pornx default
    elseif ('trans' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/pornx.png';
    }
    //trans
    elseif ('transs' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/transx.png';
    }
    //fetish
    elseif ('filf' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/fetishx.png';
    }
    //porn light
    elseif ('light' == $current_niche) {
        $url = get_template_directory_uri() . '/assets/img/premium/pornx.png';
    }

    return $url;
}
// bt custom 
require_once( 'inc/helper.php' );