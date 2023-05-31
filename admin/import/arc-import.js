jQuery(document).ready(function() {
    /**modal for creating pages*/
    jQuery('.xbox-wrap-admin-page').append('<div class="modal fade" id="create_video_submit_page_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h4 class="modal-title" id="page_title"></h4>' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '</div>' +
        '<div class="modal-body" id="page_desc"></div>' +
        '<div class="modal-footer">' +
        '<button style="font-size: 14px" type="button" class="btn btn-default" data-dismiss="modal" id="close_button"></button>' +
        '<button style="font-size: 14px" type="button" class="btn btn-primary"></button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>');


    /** Create video submit page */
    jQuery('#create-videos-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'submit'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'submit_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });

    });
    jQuery('#create_video_submit_page_modal .btn-primary').click(function(){
        var action = '';
        var id = jQuery(this).attr('id');
        if(id == 'submit_page') action = 'arc_create_video_submit_page';
        else if(id == 'profile_page') action = 'arc_create_my_profile_page';
        else if(id == 'blog_page') action = 'arc_create_blog_page';
        else if(id == 'category_page') action = 'arc_create_categories_page';
        else if(id == 'tags_page') action = 'arc_create_tags_page';
        else if(id == 'actors_page') action = 'arc_create_actors_page';
        else if(id == 'menu_page') action = 'arc_create_menu';
        else if(id == 'widget_page') action = 'arc_create_widgets';

        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            dataType   : "text",
            data: {
                'action': action,
                'nonce': arc_import_ajax_var.nonce
            },
            beforeSend : function(){
                jQuery('#create_video_submit_page_modal').modal('hide');
            },
            success    : function(data, textStatus, jqXHR){
                if(data == 'submit') alert(objectL10n.videosubmit);
                else if(data == 'profile') alert(objectL10n.profilepage);
                else if(data == 'category') alert(objectL10n.catpage);
                else if(data == 'actors') alert(objectL10n.actorspage);
                else if(data == 'tags') alert(objectL10n.tagpage);
                else if(data == 'menu') alert(objectL10n.menu);
                else if(data == 'widget') alert(objectL10n.widgets);
                else if(data == 'blog') alert(objectL10n.blogpage);
            }
        });
    });
    /** Create profile page */
    jQuery('#create-profile-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'profile'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'profile_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

    /** Create blog page */
    jQuery('#create-blog-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'blog'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'blog_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });

    });

    /** Create categories page */
    jQuery('#create-categories-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'category'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'category_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

    /** Create tags page */
    jQuery('#create-tags-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'tags'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'tags_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

    /** Create actors page */
    jQuery('#create-actors-page').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'actors'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'actors_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

    /** Create menu */
    jQuery('#create-menu').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'menu'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'menu_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

    /** Create widgets */
    jQuery('#create-widgets').click(function(){
        jQuery.ajax({
            type: "post",
            url: arc_import_ajax_var.url,
            data: {
                'action': 'arc_get_pages_attributes',
                'nonce': arc_import_ajax_var.nonce,
                'page' : 'widget'
            },
            success : function(res){
                var data = JSON.parse(res);
                jQuery("#page_title").html(data.title);
                jQuery("#page_desc").html(data.desc);
                jQuery("#close_button").html(data.exit);
                jQuery("#create_video_submit_page_modal .btn-primary").html(data.submit);
                jQuery("#create_video_submit_page_modal .btn-primary").attr('id', 'widget_page');
                jQuery('#create_video_submit_page_modal').modal('show');
            }
        });
    });

});