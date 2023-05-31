jQuery(document).ready(function($) {
    /* additional function */
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    /*additional function */

    var user_filter = false;
    $('.users_filter').on('click', function () {
        if (false === user_filter) {
            $('#filter_users_area').slideDown(200);
            user_filter = true;
        } else {
            $('#filter_users_area').slideUp(200);
            user_filter = false;
        }
    });

    $("#slider-range").slider({
        range: true,
        min: 18,
        max: 99,
        //values: [18, 99],
        slide: function (event, ui) {
            $("#amount").val(ui.values[0] + "-" + ui.values[1]);
            $("#div_user_gender > p > span").html('years');
        }
    });

    $("#slider-height").slider({
        range: true,
        min: 100,
        max: 250,
        //values: [100, 250],
        slide: function (event, ui) {
            $("#height").val(ui.values[0] + "-" + ui.values[1]);
            $("#filter_users_area > form > div > fieldset:nth-child(2) > div > div.form-display_name.slideheight > p > span").html('cm');
        }
    });


    $("#slider-weight").slider({
        range: true,
        min: 40,
        max: 200,
        //values: [40, 200],
        slide: function (event, ui) {
            $("#weight").val(ui.values[0] + "-" + ui.values[1]);
            $("span.weight-amount").html('kg');
        }
    });

    $('#clear_user_filter').on('click', function () {
        $("form#form_filter_area")[0].reset();
        $("form#form_filter_area input[type=text]").text('');
        $("form#form_filter_area input[type=text]").val('');
        $("#amount").val('').text('');
        $("#height").val('').text('');
        $("#weight").val('').text('');
        $("input#location").text('');
        $("form#form_filter_area select").selectmenu('destroy');
        $("form#form_filter_area select option").removeAttr('disabled').removeAttr('selected');
        $("form#form_filter_area select option:nth-child(1)").attr('selected', true).val('-1');
        $("form#form_filter_area select").selectmenu();
        $('form#form_filter_area input[type=radio]').prop('checked', false);
        $('form#form_filter_area input[type=checkbox]').prop('checked', false);
        $("#div_user_gender > p > span").html('');
        $("#div_user_gender > p:nth-child(2) > span").html('');
        $("#div_user_height > p:nth-child(2) > span").html('');
        $("div.slideweight > p:nth-child(2) > span").html('');
        $("#slider-weight").slider( 'values', [40, 200] );
        $("span.weight-amount").text('');
        $("#slider-height").slider( 'values', [100, 250] );
        $("span.height-amount").text('');
        $("#slider-range").slider( 'values', [18, 99] );
        $("span.age-amount").text('');
        $('input#all_users').prop('checked', true);
        history.pushState(null, '', '/community/?users=all&age=&height=&city=&weight=&username=');
    });

    $('#filter_users_area input[type=radio],#filter_users_area input[type=checkbox]').checkboxradio();


    /** Write a post [start]**/
    var flag_write_a_post = false;
    $('#write_a_post').on('click', function () {
        if(false === flag_write_a_post) {
            $('#form').show();
            flag_write_a_post = true;
            let timestamp_last_post = getCookie('timestamp_last_post');
            if (timestamp_last_post !== undefined) {
                if ((Number(timestamp_last_post) + Number(arc_ajax_var.user_post_interval)) > Math.floor(Date.now() / 1000)){
                    $('#send_after').show();
                    $('#textarea').css('display', 'none');
                    $('#to_publish').css('display', 'none');
                } else {
                    $('#send_after').hide();
                    $('#textarea').css('display', 'inline-block');
                    $('#to_publish').css('display', 'inline-block');
                }
            }
        } else {
            $('#form').hide();
            flag_write_a_post = false;
        }
    });
    /** Write a post [end]**/

    /** Save user post [start]**/
    $('#to_publish').on('click', function () {
        let content = $('#textarea').val();
        if(content == '') {
            $('#textarea').focus();
            return false;
        }
        else {
            document.cookie = 'timestamp_last_post=' + Math.floor(Date.now() / 1000);
            $.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'save_user_post',
                    nonce: arc_ajax_var.nonce,
                    content: content,
                },
                success: function (res) {
                    if (res == 0) {
                        $('#send_after').show();
                    }
                    if (res) {
                        $('#modalDelMsg3').show();
                        $('.modal-overlay-del3').css('z-index', 99999);
                        $('#form').hide();
                        $('#send_after').hide();
                        $('#textarea').val('');
                    }
                }
            });
            setTimeout(function(){$('#modalDelMsg3').hide();
                $('.modal-overlay-del3').css('z-index', -1000);}, 2000);
            setTimeout(function(){$('#send_after').hide();}, 2500);
        }
    });
    //Cancel
    $('#сancel').on('click', function () {
        $('#form').hide();
        $('#textarea').val('');
        $('#send_after').hide();
    });
    /** Save user post [end]**/

    /*** Report post [start]***/
    jQuery('span.report_user_post').on('click', function () {

        var post_id = $(this).attr('data-post-report');
        $('#report_user_post').show();
        /*antispam read [start]*/
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if (getCookie('antispam') !== undefined) {
            let allId = getCookie('antispam').split("|,");
            for (let id in allId) {
                if (allId[id] === post_id) {
                    $('#sendPostReport').remove();
                    $('#userPostReportSendMsg').css('display', 'block').text('The administrator has already received your report.');
                    return;
                }
            }

        }
        if (Number(getCookie('timestamp')) + 300 > Math.floor(Date.now() / 1000) ){
            $('#sendPostReport').remove();
            $('#userPostReportSendMsg').css('display', 'block').text('The report can be sent no more than once every 5 minutes.');
            return;
        }
        /*antispam read [end]*/
        $('#sendPostReport').attr('data-post-report',post_id);
    });

    jQuery('#sendPostReport').on('click', function() {
        var type = jQuery('#user_post_report_type-button span.ui-selectmenu-text').text();

        if(type == 'Other') {
            type = 'otherPost';
        }
        if(type == 'Hate speech') {
            type = 'wrong';
        }
        if(type == 'Spam') {
            type = 'spam';
        }
        var msg = jQuery('#userPostReportMsg').val();
        var post_id = $(this).attr('data-post-report');
        /*Anti spam write [start]*/
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if (getCookie('antispam') !== undefined) {
            let old_id = getCookie('antispam');
            document.cookie = 'antispam' + '=' + post_id + '|,' + old_id + ';' + 'max-age=2592000';
            document.cookie = "timestamp=" + Math.floor(Date.now() / 1000);
        } else {
            document.cookie = 'antispam' + '=' + post_id + '|,' + ';' + 'max-age=2592000';
            document.cookie = "timestamp=" + Math.floor(Date.now() / 1000);
        }
        /*Anti spam write [end]*/
            jQuery.ajax({
            url: arc_ajax_var.url,
            data: {
                action: 'send_user_post_report',
                nonce: arc_ajax_var.nonce,
                post_id: post_id,
                type: type,
                msg: msg
            },
            type: 'POST',
            success: function (res) {
                //console.log(res);
                if (res == 'success') {
                    jQuery('#sendPostReport').css('display', 'none');
                    jQuery('#userPostReportSendMsg').css({
                        'color': 'green',
                        'display': 'block'
                    });
                    jQuery('span.users_control_btns[data-post-report="'+post_id+'"]').text('We got your report');
                    setTimeout(() => {
                        $('#report_user_post').hide();
                        jQuery('#userPostReportSendMsg').css('display', 'none');
                        jQuery('#sendPostReport').css('display', 'block');
                        jQuery('span.users_control_btns[data-post-report="'+post_id+'"]').css('display', 'none');
                    }, 1500);
                }
            }
        });
    });


    /*** add to watch later ****/
    $('span.watchLaterCommunity').click(function (e) {
        var postId = jQuery(this).attr('data-post');
        //console.log(postId);
        var add = jQuery(this).attr('data-add');
        var userID = jQuery(this).attr('data-user');
        if(add !== 'add') {
            jQuery.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_create_default_playlist',
                    nonce: arc_ajax_var.nonce,
                    postId: postId,
                    userID: userID
                },
                error: function (res) {
                    //console.log(res);
                },
                success: function (res) {
                    //console.log(res);
                },
                complete: function (res) {
                    //console.log(res);
                }
            });
            jQuery('span.watchLaterCommunity[data-post="' + postId + '"]').find('i').removeClass('fa-plus').addClass('fa-check');
            jQuery('span.watchLaterCommunity[data-post="' + postId + '"]').attr('data-add', 'add');
        } else {
            jQuery.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_remove_from_default_playlist',
                    nonce: arc_ajax_var.nonce,
                    postId: postId,
                    playlistSlug: 'watchlater' + userID,
                    userID: userID
                },
                error: function (res) {
                },
                success: function (res) {

                }
            });
            jQuery('span.watchLaterCommunity[data-post="' + postId + '"]').find('i').removeClass('fa-check').addClass('fa-plus');
            jQuery('span.watchLaterCommunity[data-post="' + postId + '"]').attr('data-add', '');
        }
    });


    /***check post comment min required characters***/
    jQuery('#users_feeds #form #textarea').on('input', function () {
        var characters = jQuery(this).val().length;
        if(parseInt(characters) > parseInt(arc_ajax_var.maxReqCharUserPost)) {
            jQuery('#to_publish').attr('disabled', true).css('cursor', 'not-allowed');
        } else jQuery('#to_publish').attr('disabled', false).css('cursor', 'pointer');
    });


    /****remove user post to trash****/
    $(document).on('click', 'span.remove_user_post', function() {
        jQuery.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'remove_user_post_to_trash_on_front',
                nonce: arc_ajax_var.nonce,
                postID: $(this).attr('data-post-id'),
            },
            success: function (res) {
                $('div[data-post-id="'+res+'"]').remove();
            },
        });
    });
});