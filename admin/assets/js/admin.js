jQuery(document).ready(function(){
    /*** rename items on photos page***/
    if(arc_admin_scripts_ajax_var.post_type_page === 'photos') {
        var displaying_num = jQuery('span.displaying-num').html();
        if(displaying_num.indexOf('items') > -1) {
            jQuery('span.displaying-num').html(displaying_num.replace('items', 'albums'));
        } else {
            jQuery('span.displaying-num').html(displaying_num.replace('item', 'album'));
        }
    }


    /***** add profile photo ****/
    jQuery('tr.user-profile-picture td img').remove();
    jQuery('tr.user-profile-picture td').append(arc_admin_scripts_ajax_var.profile_picture);

    jQuery('table#premium_subscription').prepend('<h3>Premium Subscription</h3>');

    jQuery('#wpadminbar #wp-admin-bar-wp-logo>.ab-item span.ab-icon').removeClass('ab-icon').addClass('ab-icon-porn-x');
    jQuery('#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon-porn-x').append('<img style="opacity:0.5;-webkit-filter: grayscale(100%);filter: grayscale(100%);width: 18px;height: 16px; position: relative;margin-top: 8px !important;display: block" src="'+ arc_admin_scripts_ajax_var.theme_template_url +'/assets/img/icons/PX-X-2.png" />');
    /*** add buttons to plugins options page***/
    {
        if(arc_admin_scripts_ajax_var.hook == 'toplevel_page_vicetemple-single-options') {
            jQuery('div.xbox-header-actions').prepend('<button type="button" id="go_back_sve" class="xbox-form-btn xbox-btn xbox-btn-orange">Back to plugin</button>');
            jQuery(document).on('click', '#go_back_sve', function(){
                window.location.href = '/wp-admin/admin.php?page=asev-options';
            });
        }
        if(arc_admin_scripts_ajax_var.hook == 'toplevel_page_amg-options') {
            jQuery('div.xbox-header-actions').prepend('<button type="button" id="go_back_mvg" class="xbox-form-btn xbox-btn xbox-btn-pink">Back to plugin</button>');
            jQuery(document).on('click','#go_back_mvg', function(){
                window.location.href = '/wp-admin/admin.php?page=amvg-options';
            });
        }
        if(arc_admin_scripts_ajax_var.hook == 'toplevel_page_amve-options-page') {
            jQuery('div.xbox-header-actions').prepend('<button type="button" id="go_back_mve" class="xbox-form-btn xbox-btn xbox-btn-bluepurple">Back to plugin</button>');
            jQuery(document).on('click','#go_back_mve', function(){
                window.location.href = '/wp-admin/admin.php?page=amve-options';
            });
        }
    }
    /*** [end] add buttons to plugins options page***/

    /**** rename taxonomy and posts options***/
    {
        jQuery('th#posts > a > span:nth-child(1)').text('Video count');

        if(arc_admin_scripts_ajax_var.currentScreenTax == 'post_tag') {
            jQuery('#addtag #submit').val('Add tag');
        }

        if(arc_admin_scripts_ajax_var.currentScreenTax == 'pornstars') {
            jQuery('#addtag #submit').val('Add pornstar');
        }
        if(arc_admin_scripts_ajax_var.currentScreenTax == 'category') {
            jQuery('#addtag #submit').val('Add category');
        }

        jQuery('table.posts th#author').text('Uploaded by');
        jQuery('#posts-filter select#cat option[value=0]').text('All video categories');
    }
    /**** [end] rename taxonomy options***/


    /**** [end] rename taxonomy options***/

    /** rename and add target to top menu "New"***/
    {
        jQuery('li#wp-admin-bar-comments a').attr('href', '/wp-admin/edit-comments.php?comment_status=moderated');
        jQuery('li#wp-admin-bar-new-post a.ab-item').attr('target', '_blank').text('Video');
        jQuery('li#wp-admin-bar-new-wp_paypal_order a.ab-item').attr('target', '_blank').text('PayPal order');
        jQuery('li#wp-admin-bar-new-blog a.ab-item').attr('target', '_blank').text('Blog post');
        jQuery('li#wp-admin-bar-new-user_post a.ab-item').attr('target', '_blank').text('Community post');
        jQuery('li#wp-admin-bar-new-media a.ab-item').attr('target', '_blank');
        jQuery('li#wp-admin-bar-new-page a.ab-item').attr('target', '_blank');
        jQuery('li#wp-admin-bar-new-user a.ab-item').attr('target', '_blank');
    }

    /** [end] rename and add target to top menu "New"***/

    /*** rename set a password on users.php page***/
    if(arc_admin_scripts_ajax_var.hook == 'users.php') {
        jQuery('img.avatar').remove();
        jQuery('a.resetpassword').text('Reset Password');
        jQuery('span.view').remove();
        jQuery('option[value="resetpassword"]').text('Reset Password');
    }
    /*** [end] rename set a password on users.php page***/

    var location = window.location.href;
    if(location.indexOf('meta_key=payed') > 1) {
        jQuery('li.all a').removeClass('current');
        jQuery('li.payed a').addClass('current');
    } else if(location.indexOf('meta_key=ban_on_id') > 1) {
        jQuery('li.all a').removeClass('current');
        jQuery('li.ban_on_id a').addClass('current');
    }

    jQuery(window).scroll(function() {
        jQuery('.xbox-header-actions .xbox-actions-sticky').removeClass('xbox-actions-sticky').removeAttr('data-sticky');
    });
});