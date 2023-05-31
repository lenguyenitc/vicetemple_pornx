<?php
if(is_admin()) {
    add_action('admin_init', 'check_theme_activation', 1);
    function check_theme_activation() {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        if (is_plugin_active('dev-core-plugin/dev-core-plugin.php') &&
            is_plugin_active('woocommerce/woocommerce.php') &&
            is_plugin_active('meta-box/meta-box.php') &&
            is_plugin_active('nextend-facebook-connect/nextend-facebook-connect.php') &&
            is_plugin_active('wp-mail-smtp/wp_mail_smtp.php') &&
            is_plugin_active('tinymce-advanced/tinymce-advanced.php') &&
            is_plugin_active('blockonomics-bitcoin-payments/blockonomics-woocommerce.php') &&
            is_plugin_active('rocket-lazy-load/rocket-lazy-load.php') &&
            get_option('_current_site_user_license') &&
            (get_option('set_timestamp_start_status') === false ||
                (time() - get_option('set_timestamp_start_status')) > 86400)) {
            update_option('set_timestamp_start_status', time(), 'yes');
            if($curl = curl_init()) {
                $userData = json_encode([
                    'license' => maybe_unserialize(get_option('_current_site_user_license'))['license'],
                    'server_name' => maybe_unserialize(get_option('_current_site_user_license'))['server_name'],
                    'check_status' => "true"
                ]);
                curl_setopt($curl, CURLOPT_URL, VICETEMPLECORE_LIC_URL . 'license-management/');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, 'userData=' . $userData);
                $data = curl_exec($curl);
                curl_close($curl);

                if((int)$data === 0) delete_option('_current_site_user_license');
            }
        }
    }

    add_action('current_screen', 'some_page');
    function some_page() {
        $screen = get_current_screen();
        if(get_option('_current_site_user_license') === false) {
            if($screen->id == 'toplevel_page_my-theme-options' ||
                $screen->id == 'toplevel_page_vicetemplepl-options' ||
                $screen->id == 'toplevel_page_amg-options' ||
                $screen->id == 'toplevel_page_vicetemple-single-options' ||
                $screen->id == 'toplevel_page_amve-options-page' ||
                $screen->id == 'edit-post') {
                die();
            }
        }
    }
}