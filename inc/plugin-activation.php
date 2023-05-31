<?php
// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) exit;
include_once ABSPATH . 'wp-admin/includes/plugin.php';
add_action( 'tgmpa_register', 'arc_register_required_plugins_core' );
function arc_register_required_plugins_core() {
    $plugins = array(
    	//core
        array(
            'name'               => 'Dev Core Plugin', // The plugin name.
            'slug'               => 'dev-core-plugin', // The plugin slug (typically the folder name).
            'source'             => 'https://vicetemple-api.com/products/zipDownload/dev-core-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
    );

    $config = array(
        'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa( $plugins, $config );
}
if(is_plugin_active('dev-core-plugin/dev-core-plugin.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_woo' );
	function arc_register_required_plugins_woo() {
		$plugins = array(
			//woocommerce
			array(
				'name'               => 'WooCommerce', // The plugin name.
				'slug'               => 'woocommerce', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/woocommerce/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('woocommerce/woocommerce.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_bitcoin' );
	function arc_register_required_plugins_bitcoin() {
		$plugins = array(
			//blockonomics
			array(
				'name'               => 'WordPress Bitcoin Payments – Blockonomics', // The plugin name.
				'slug'               => 'blockonomics-bitcoin-payments', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/blockonomics-bitcoin-payments/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('blockonomics-bitcoin-payments/blockonomics-woocommerce.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_metabox' );
	function arc_register_required_plugins_metabox() {
		$plugins = array(
			//metabox
			array(
				'name'               => 'Meta Box — WordPress Custom Fields Framework', // The plugin name.
				'slug'               => 'meta-box', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/meta-box/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('meta-box/meta-box.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_tiny' );
	function arc_register_required_plugins_tiny() {
		$plugins = array(
			//tinymce
			array(
				'name'               => 'Advanced Editor Tools (previously TinyMCE Advanced)', // The plugin name.
				'slug'               => 'tinymce-advanced', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/tinymce-advanced/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('tinymce-advanced/tinymce-advanced.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_lazyload' );
	function arc_register_required_plugins_lazyload() {
		$plugins = array(
			//lazyload
			array(
				'name'               => 'Lazy Load', // The plugin name.
				'slug'               => 'rocket-lazy-load', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/rocket-lazy-load/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('rocket-lazy-load/rocket-lazy-load.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_social' );
	function arc_register_required_plugins_social() {
		$plugins = array(
			//social
			array(
				'name'               => 'Nextend Social Login and Register', // The plugin name.
				'slug'               => 'nextend-facebook-connect', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/nextend-facebook-connect/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('nextend-facebook-connect/nextend-facebook-connect.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_smtp' );
	function arc_register_required_plugins_smtp() {
		$plugins = array(
			//smtp
			array(
				'name'               => 'WP Mail SMTP by WPForms', // The plugin name.
				'slug'               => 'wp-mail-smtp', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/wp-mail-smtp/', // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
if(is_plugin_active('wp-mail-smtp/wp_mail_smtp.php')) {
	add_action( 'tgmpa_register', 'arc_register_required_plugins_others' );
	function arc_register_required_plugins_others() {
		$plugins = array(
			//yoast
			array(
				'name'               => 'Yoast SEO', // The plugin name.
				'slug'               => 'wordpress-seo', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/wordpress-seo/', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
			//filebird
			array(
				'name'               => 'FileBird – WordPress Media Library Folders & File Manager', // The plugin name.
				'slug'               => 'filebird', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/filebird/', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
			//easy custom sidebars
			array(
				'name'               => 'Easy Custom Sidebars', // The plugin name.
				'slug'               => 'easy-custom-sidebars', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/easy-custom-sidebars/', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				//'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'           => 'arc',      		   // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                   // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}