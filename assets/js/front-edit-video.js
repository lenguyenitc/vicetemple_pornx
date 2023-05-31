jQuery(document).ready(function($){
    /** Open form [start]*/
    $(document).on('click', '#edit_user_video', function(){
        $("form#message").fadeIn("slow");
        $("#edit_user_video").hide();
    });
    /** Open form [end]*/


    /***edit video on upload videos page****/

    $('article span.edit_video_from_my_uploads').on('click', function(e) {
        e.preventDefault();
        window.location.redirect = false;
        $('body').css('overflow', 'hidden');
       var post_id = $(this).attr('data-post-id');
       var video_title = $(this).attr('data-post-title');
       var video_desc = $(this).attr('data-post-desc');
       $('#hidden_post_id').val(post_id);
       $('#delete_user_video').attr('data-post', post_id);
       $('#title-video').val(video_title);
       $('#description-video').val(video_desc);
        /** Add tags in modal window [start]**/
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'add_tags_in_modal_window',
                nonce: arc_ajax_var.nonce,
                post_id: post_id
            },
            success: function (res) {
                //console.log(res);
                if (res != '') {
                    $('.remove-all-tag .tags-list').html(res);
                    $('#remove_video_tags_on_upload_page').css('display', 'flex');
                }
            }
        });
        /** Add tags in modal window [end]**/
       $('div#edit_current_video').show();
       $('div#edit_current_video h2 span').text(video_title);
       $('#remove_video_tags_on_upload_page').attr('data-post-id', post_id);
    });
    $('#close_modal_on_my_uploads').on('click', function () {
        $('#hidden_post_id').val();
        $('#remove_video_tags_on_upload_page').attr('data-post-id', '');
        $('#delete_user_video').attr('data-post', '');
        $('div#edit_current_video h2 span').text('');
        $('div#edit_current_video').hide();
        $('body').css('overflow', 'auto');
    });

    /****delete user video on upload videos page***/
    jQuery('#delete_user_video_on_uploads_page').click(function () {
        var post_id = jQuery('#hidden_post_id').val();
        jQuery.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'delete_user_video',
                nonce: arc_ajax_var.nonce,
                postId: post_id,
            },
            success: function (res) {
                if(res == 'delete') {
                    $('#hidden_post_id').val();
                    $('#remove_video_tags_on_upload_page').attr('data-post-id', '');
                    $('#delete_user_video').attr('data-post', '');
                    $('div#edit_current_video h2 span').text('');
                    $('div#edit_current_video').hide();
                    $('#modalDelMsg .modal-guts-del div h2').text('We have sent you an email');
                    $('#modalDelMsg .modal-guts-del div span.confirm').text('Your video will be removed permanently once you confirm it.');
                    $('.modal-overlay-del').css('z-index', '99999');
                    $('#modalDelMsg').show();
                    $('body').css('overflow', 'auto');
                }
            },
        });
    });
    jQuery('main.profile-page #modalDelMsg #close-button-del').on('click',function () {
        $('main.profile-page #modalDelMsg .modal-guts-del div h2').remove();
        $('main.profile-page #modalDelMsg .modal-guts-del div span.confirm').remove();
        $('main.profile-page #modalDelMsg').hide();
        $('main.profile-page .modal-overlay-del').css('z-index', '-1000');
        $('body').css('overflow', 'auto');
    });

    /****remove all tags from video on upload videos page***/
    $('span#remove_video_tags_on_upload_page').on('click', function () {
        var postID = $(this).attr('data-post-id');
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'remove_all_tags_from_video',
                nonce: arc_ajax_var.nonce,
                postID: postID
            },
            success: function (res) {
                $('span#remove_video_tags_on_upload_page').remove();
            }
        });
    });

    $(document).on('click', '.render-x .fa-close', function () {
        var tag_slug = $(this).attr('data-tag_slug');
        if (arc_ajax_var.postId != null) {
            var video_id = arc_ajax_var.postId;
        } else {
            var video_id = $('#hidden_post_id').attr('value');
        }

        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action   : 'delete_one_tag_from_video',
                nonce    : arc_ajax_var.nonce,
                tag_slug : tag_slug,
                video_id : video_id
            },
            success: function (res) {
                if (res === '1') {
                    $('.render-x svg[data-tag_slug="'+tag_slug+'"]').closest('.render-x').remove();
                }
                //console.log(res);
            }
        });
    });

});
