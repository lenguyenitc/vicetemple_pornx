jQuery(document).ready(function() {
    if(arc_admin_scripts_ajax_var.hook == 'toplevel_page_my-theme-options') {

        var active_niche = false;
        var change_active_niche = false;
        var active_tab_niche = false;
        var change_active_tab = false;

        var li_niches = jQuery('#xbox-my-theme-options nav.xbox-tab-nav ul.xbox-tab-menu li[data-item="niches"]');
        active_tab_niche = li_niches.hasClass('active');


        if(li_niches.hasClass('active')) {
            //console.log('active_tab_niche - ' + active_tab_niche + '\n');
        }


        active_niche = jQuery('div.xbox-field-id-choose-niche input[name="choose-niche"]').filter(":checked").val();
            //console.log('active_niche - ' + active_niche + '\n');


        jQuery('div.xbox-field-id-choose-niche input[name="choose-niche"]').change(function(){
           change_active_niche = jQuery(this).filter(":checked").val();
           /*console.log('change_active_niche - ' + change_active_niche + '\n');
            console.log('active_niche - ' + active_niche + '\n');*/
        });


        jQuery('#xbox-my-theme-options nav.xbox-tab-nav ul.xbox-tab-menu li.xbox-item').click(function(){
            change_active_tab = jQuery(this).attr('data-item');
            /*console.log('change_active_tab - ' + change_active_tab + '\n');
            console.log('active_tab_niche - ' + active_tab_niche + '\n');*/
        });


        jQuery(document).on('click', '#xbox-save', function() {
            if(active_tab_niche && (change_active_tab === false || change_active_tab == 'niches') && active_niche != change_active_niche && change_active_niche !== false) {
                localStorage.setItem('demo_scheme', 'demo');
                jQuery.ajax({
                    type: "post",
                    url: ajaxurl,
                    data: {
                        action: 'change_demo_scheme_option',
                        nonce: arc_admin_scripts_ajax_var.nonce,
                    },
                    beforeSend: function() {
                    },
                });
            } else {
                //localStorage.setItem('custom_scheme', 'custom');
            }
        });

        //checking FireFox Browser
        if(window.navigator.userAgent.indexOf('Firefox') > 0) {
            if(localStorage.getItem('demo_scheme') !== null) {
                jQuery.ajax({
                    type: "post",
                    url: ajaxurl,
                    data: {
                        action: 'change_demo_scheme_option',
                        nonce: arc_admin_scripts_ajax_var.nonce,
                    },
                    beforeSend: function() {
                    },
                    success: function (res) {
                    },
                });
            }
        }
    }
});