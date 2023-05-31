jQuery(document).ready(function($){


    jQuery("span#video-rate-full-screen a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
    jQuery("span#video-rate-full-screen a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
    jQuery("span#video-rate .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
    jQuery("span#video-rate .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');

    /**** hide the number_of_photos_in_album after 5 seconds***/
    setTimeout(function() {
        $('div.number_of_photos_in_album').fadeOut(200);
    }, 5000);
    /**** [end] hide the number_of_photos_in_album after 5 seconds***/

    /*** show modal report fullscreen [start]***/
    $('#fullscreen_flag').on('click', function () {
        $('#modalWindowAlyaFancybox').hide();
        $('#report_photo').show();
        $('body').css('overflow', 'hidden');

        /*antispam read [start]*/
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if (getCookie('antispam_for_photo') !== undefined) {
            let allId = getCookie('antispam_for_photo').split("|,");
            for (let id in allId) {
                if (allId[id] === arc_ajax_var.postId) {
                    $('#sendPhotoReport').remove();
                    $('#photoReportSendMsg').css('display', 'block').text('The administrator has already received your report.');
                    return;
                }
            }

        }
        if (Number(getCookie('timestamp_for_photo')) + 300 > Math.floor(Date.now() / 1000) ){
            $('#sendPhotoReport').remove();
            $('#photoReportSendMsg').css('display', 'block').text('The report can be sent no more than once every 5 minutes.');
            return;
        }
        /*antispam read [end]*/
    });
    /*** show modal report fullscreen [end]***/

    /*** show modal report not fullscreen [start]***/
    $('#not_fullscreen_flag').on('click', function () {
        $('#report_photo').show();
        $('body').css('overflow', 'hidden');
        /*antispam read [start]*/
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if (getCookie('antispam_for_photo') !== undefined) {
            let allId = getCookie('antispam_for_photo').split("|,");
            for (let id in allId) {
                if (allId[id] === arc_ajax_var.postId) {
                    $('#sendPhotoReport').remove();
                    $('#photoReportSendMsg').css('display', 'block').text('The administrator has already received your report.');
                    return;
                }
            }

        }
        if (Number(getCookie('timestamp_for_photo')) + 300 > Math.floor(Date.now() / 1000) ){
            $('#sendPhotoReport').remove();
            $('#photoReportSendMsg').css('display', 'block').text('The report can be sent no more than once every 5 minutes.');
            return;
        }
        /*antispam read [end]*/
    });
    /*** show modal report not fullscreen [end]***/

    /*** send report fullscreen [start]***/
    jQuery('#sendPhotoReport').on('click', function () {
        //console.log(arc_ajax_var.postId);
        /*Anti spam write [start]*/
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if (getCookie('antispam_for_photo') !== undefined) {
            let old_id = getCookie('antispam_for_photo');
            document.cookie = 'antispam_for_photo' + '=' + arc_ajax_var.postId + '|,' + old_id + ';' + 'max-age=2592000' + '; path=/';
            document.cookie = "timestamp_for_photo=" + Math.floor(Date.now() / 1000) + '; path=/' + ';' + 'max-age=2592000';
        } else {
            document.cookie = 'antispam_for_photo' + '=' + arc_ajax_var.postId + '|,' + ';' + 'max-age=2592000' + '; path=/';
            document.cookie = "timestamp_for_photo=" + Math.floor(Date.now() / 1000) + '; path=/' + ';' + 'max-age=2592000';
        }
        /*Anti spam write [end]*/
        //var type = jQuery('select#photoReportType option:selected').val();
        var type = jQuery('#photo_report_type-button span.ui-selectmenu-text').text();
        if(type == 'Violent or harmful acts') {
            type = 'violent';
        }
        if(type == 'Underage nudity') {
            type = 'underagePhoto';
        }
        if(type == 'Other') {
            type = 'otherPhoto';
        }
        if(type == 'Inappropriate content') {
            type = 'wrong';
        }
        if(type == 'Spam') {
            type = 'spam';
        }
        var msg = jQuery('#photoReportMsg').val();

        jQuery.ajax({
            url: arc_ajax_var.url,
            data: {
                action: 'send_photo_report',
                nonce: arc_ajax_var.nonce,
                post_id: arc_ajax_var.postId,
                type: type,
                msg: msg.trim()
            },
            type: 'POST',
            success: function (res) {
                //console.log(res);
                if (res == 'success') {
                    jQuery('#sendPhotoReport').css('display', 'none');
                    jQuery('#photoReportSendMsg').css({
                        'color': 'green',
                        'display': 'block'
                    });
                    setTimeout(() => {
                        jQuery('#photoReportSendMsg').css('display', 'none');
                        jQuery('#sendPhotoReport').css('display', 'block');
                        $('#report_photo').hide();
                        $('body').css('overflow', 'auto');
                    }, 1200);
                }
            }
        });
    });
    /*** send report fullscreen [end]***/

    /****scroll thumbs on page [start]***/
    var intervalID;
    $("#btn_right").hover(function(){
        intervalID = setInterval(function() {
            var value = $('.thumbs_container').scrollLeft() + 200;
                $('.thumbs_container').scrollLeft(value);
        }, 700);
    }, function() {
        clearInterval(intervalID);
    });

    $('#btn_left').hover(function(){
        intervalID = setInterval(function() {
            var value = $('.thumbs_container').scrollLeft() - 200;
            $('.thumbs_container').scrollLeft(value);
        }, 700);
    }, function() {
        clearInterval(intervalID);
    });

    /***scroll thumbs on page***/
    $(document).on('click', '#btn_left_full', function(){
        //console.log('l click');
        var value = $('#full_thumb_inner').scrollLeft() - 200;
        $('#full_thumb_inner').scrollLeft(value);
    });
    $(document).on('click', '#btn_right_full', function(){
        //console.log('r click');
        var value = $('#full_thumb_inner').scrollLeft() + 200;
        $('#full_thumb_inner').scrollLeft(value);
    });
    /****scroll thumbs on page [end]***/

    /*** Show the fullscreen image***/
    $('svg.fa-expand').on('click', function (e) {
        e.preventDefault;
        window.location.redirect = false;
        $('#modalWindowAlyaFancybox #control_interface').css('bottom', '100px');
        $('body').css('overflow', 'hidden');
        $('#modalWindowAlyaFancybox').fadeIn('slow','linear');
        var current_photo_id = $('#modalWindowAlyaFancybox .modal-footer').data('current_photo_id');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] === current_photo_id) {
                var url = obj_for_ajax.arr_data[key]['url'];
                $('#modalWindowAlyaFancybox .modal-footer').html('<div class="chevron-left-full-screen" style="margin-top:40px;height:calc(65vh - 140px);z-index:9999">' +
                    '<svg class="a-chevron-left" style="margin-left: -5px;" width="30" height="30" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                    '<g filter="url(#filter_arr_b)">\n' +
                    '<circle cx="20.0078" cy="20.0078" r="20" fill="#1E2739" fill-opacity="0.8"/>\n' +
                    '</g>\n' +
                    '<path d="M13.4118 20.9901L22.0115 29.5895C22.5585 30.1368 23.4454 30.1368 23.9922 29.5895C24.539 29.0427 24.539 28.1558 23.9922 27.609L16.3828 19.9999L23.992 12.391C24.5388 11.8439 24.5388 10.9571 23.992 10.4103C23.4452 9.86324 22.5583 9.86324 22.0112 10.4103L13.4115 19.0098C13.1381 19.2834 13.0016 19.6415 13.0016 19.9998C13.0016 20.3583 13.1384 20.7167 13.4118 20.9901Z" fill="white" fill-opacity="0.5"/>\n' +
                    '<defs>\n' +
                    '<filter id="filter_arr_b" x="-14.9922" y="-14.9922" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">\n' +
                    '<feFlood flood-opacity="0" result="BackgroundImageFix"/>\n' +
                    '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>\n' +
                    '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>\n' +
                    '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>\n' +
                    '</filter>\n' +
                    '</defs>\n' +
                    '</svg>'+
                    '<svg style="z-index: 2;position: absolute;bottom: 0;left: 0;" class="fa-play" data-stop="off" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<g filter="url(#filter0_b)">' +
                    '<circle cx="15" cy="15" r="15" fill="#1E2739" fill-opacity="0.8"/>' +
                    '</g>' +
                    '<path d="M21 14.134C21.6667 14.5189 21.6667 15.4811 21 15.866L12.75 20.6292C12.0833 21.0141 11.25 20.5329 11.25 19.7631L11.25 10.2369C11.25 9.46706 12.0833 8.98593 12.75 9.37083L21 14.134Z" fill="white" fill-opacity="0.5"/>' +
                    '<defs>' +
                    '<filter id="filter0_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">' +
                    '<feFlood flood-opacity="0" result="BackgroundImageFix"/>' +
                    '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>' +
                    '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>' +
                    '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>' +
                    '</filter>' +
                    '</defs>' +
                    '</svg>'+
                    '</div></div><div id="main_photo" style="height: calc(100% - 5px);position: absolute;top: 40px;" data-redirect="none" data-id_main_photo="'+ current_photo_id +'">' +
                    '<img style="height: calc(100% - 135px);" src="' + url + '"/></div>' +
                    '<div id="full_thumbnails" style="display: flex"></div>' +
                    '<div class="chevron-right-full-screen" style="margin-top:40px;height:calc(65vh - 140px);">' +
                    '<svg class="fa-chevron-right" width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                    '<g filter="url(#filterarr_b)">\n' +
                    '<circle cx="20" cy="20" r="20" fill="#1E2739" fill-opacity="0.8"/>\n' +
                    '</g>\n' +
                    '<path d="M25.9906 20.9901L17.3909 29.5895C16.8438 30.1368 15.9569 30.1368 15.4101 29.5895C14.8633 29.0427 14.8633 28.1558 15.4101 27.609L23.0195 19.9999L15.4103 12.391C14.8635 11.8439 14.8635 10.9571 15.4103 10.4103C15.9572 9.86324 16.8441 9.86324 17.3911 10.4103L25.9908 19.0098C26.2642 19.2834 26.4008 19.6415 26.4008 19.9998C26.4008 20.3583 26.2639 20.7167 25.9906 20.9901Z" fill="white" fill-opacity="0.5"/>\n' +
                    '<defs>\n' +
                    '<filter id="filterarr_b" x="-15" y="-15" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">\n' +
                    '<feFlood flood-opacity="0" result="BackgroundImageFix"/>\n' +
                    '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>\n' +
                    '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>\n' +
                    '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>\n' +
                    '</filter>\n' +
                    '</defs>\n' +
                    '</svg>'+
                    '<svg style="z-index: 1;position: absolute;bottom: 0;right: 0;" class="fa-th-large" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<g filter="url(#filter0_b)">' +
                    '<circle r="15" transform="matrix(1 0 0 -1 15 15)" fill="#1E2739" fill-opacity="0.8"/>' +
                    '</g>' +
                    '<rect x="8.25" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>' +
                    '<rect x="8.25" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>' +
                    '<rect x="16.3516" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>' +
                    '<rect x="16.3516" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>' +
                    '<defs>' +
                    '<filter id="filter0_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">' +
                    '<feFlood flood-opacity="0" result="BackgroundImageFix"/>' +
                    '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>' +
                    '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>' +
                    '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>' +
                    '</filter>' +
                    '</defs>' +
                    '</svg>' +
                    '</div>');
                $('#video-rate-full-screen a').attr('data-post_id', obj_for_ajax.arr_data[key]['id_photo']);
                jQuery.ajax({
                    type: "post",
                    url: arc_ajax_var.url,
                    dataType: "json",
                    data: "action=alreadyVotedFullscreen&nonce=" + arc_ajax_var.nonce + "&post_id=" + obj_for_ajax.arr_data[key]['id_photo'],
                    success: function (data, textStatus, jqXHR) {
                        if(data == 'like') {
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.activeColor +' !important');
                        } else if(data == 'dislike'){
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +'!important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.activeColor +' !important');
                        } else  {
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                        }
                    }
                });
            }
        }

        $('#full_thumbnails').append('<span id="btn_left_full" style="position: absolute;z-index: 1;height: 80px;bottom: 10px;width: 50px;margin-right: 10px;"></span>' +
            '<div id="full_thumb_inner" style="width: 100%;display: flex;overflow: hidden;"></div>');

        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] === current_photo_id) {
                var url = obj_for_ajax.arr_data[key]['url'];
                $('#full_thumbnails #full_thumb_inner').append('<p><img class="active-photo" data-id_photo="'+ obj_for_ajax.arr_data[key]['id_photo'] +'" src="'+ obj_for_ajax.arr_data[key]['url'] +'"></p>')
            } else {
                $('#full_thumbnails #full_thumb_inner').append('<p><img class="no-active-photo" data-id_photo="'+ obj_for_ajax.arr_data[key]['id_photo'] +'" src="'+ obj_for_ajax.arr_data[key]['url'] +'"></p>')
            }
        }
        $('#full_thumbnails').append('<span id="btn_right_full" style="position: absolute;z-index: 1;height: 80px;bottom: 10px;right:0;width: 50px;margin-left: 10px;"></span>');

        /** Add photo counter [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('#video-rate-full-screen a').attr('data-post_id', id_main_photo);
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
               var current_photo_counter = key;
                current_photo_counter++;
            }
        }

        $('#photo_counter').html('<span>' + current_photo_counter + ' of ' + obj_for_ajax.arr_data.length +'</span>');
        /** Add photo counter [end]**/

        /** Replace data for share FULLSCREEN [start]**/
        var link;
        var src;
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('.share-fullscreen a').each(function(){
            for(var key in obj_for_ajax.arr_data) {

                if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo){
                    var photo_title = obj_for_ajax.arr_data[key]['photo_title']
                }
            }

            var id = $(this).find('i').attr('id');
            src = $('#main_photo img').attr('src');
            if (id == 'facebook') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?u=' + src +'&amp;src=sdkpreparse';
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'twitter') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?status=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'linkedin') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?mini=true&amp;url=' + src + '&amp;title=' + photo_title + '&amp;summary=photo&amp;source=' + arc_ajax_var.siteUrl;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'tumblr') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?canonicalUrl=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'odnoklassniki') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?url=' + src + '&title=' + photo_title;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            }
        });
        /** Replace data for share FULLSCREEN [end]**/

    });
    /*** [end] Show the fullscreen image***/

    /** Change full image by click on chevron left [start]**/
    var keyStart_left;
    $(document).on('click', 'div.chevron-left-full-screen svg.a-chevron-left', function(){
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                keyStart_left = key;
            }
        }
        if (keyStart_left == 0) {
            keyStart_left = (countArrData - 1);
        } else {
            keyStart_left--;
        }
        var src = obj_for_ajax.arr_data[keyStart_left]['url'];
        $('#main_photo img').attr('src', src);
        $('#main_photo').attr('data-redirect', arc_ajax_var.siteUrl + '/?attachment_id=' + obj_for_ajax.arr_data[keyStart_left]['id_photo']);
        $('#main_photo').attr('data-id_main_photo', obj_for_ajax.arr_data[keyStart_left]['id_photo']);

        $('#full_thumbnails p img').removeClass('active-photo').addClass('no-active-photo');
        $('#full_thumbnails p img[data-id_photo="'+ obj_for_ajax.arr_data[keyStart_left]['id_photo'] +'"]').removeClass('no-active-photo').addClass('active-photo');

        /** Add photo counter [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                var current_photo_counter = key;
                current_photo_counter++;
            }
        }

        $('#photo_counter').html('<span>' + current_photo_counter + ' of ' + obj_for_ajax.arr_data.length +'</span>');
        /** Add photo counter [end]**/

        /** Re_render heart [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('#video-rate-full-screen a').attr('data-post_id', id_main_photo);
        $.ajax({
            url: obj_for_ajax.url_ajax,
            type: 'POST',
            data: {
                action      : 'rerender_heart',
                photo_id    : id_main_photo,
                nonce       : obj_for_ajax.nonce,
            },
            beforeSend: function(){

            },
            success: function( response ) {
               if (response == '0') {
                   $('#heart-full-screen').removeClass('red-heart');
               } else $('#heart-full-screen').addClass('red-heart');
            },
        });
        /** Re_render heart [end]**/

        jQuery.ajax({
            type: 'post',
            url: arc_ajax_var.url,
            dataType: 'json',
            data: {
                action: 'get-post-data',
                nonce: arc_ajax_var.nonce,
                post_id: id_main_photo
            }
        })
            .done(function (doneData) {
                if (doneData.views) {
                    jQuery("#modalWindowAlyaFancybox #video-views span").text(doneData.views);
                }
                if (doneData.likes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text(doneData.likes.toString());
                } else if(doneData.likes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text('0');
                }
                if (doneData.dislikes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text(doneData.dislikes.toString());
                } else if(doneData.dislikes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text('0');
                }
                if (doneData.rating && doneData.rating !== false) {
                    jQuery("#modalWindowAlyaFancybox .percentage").text(doneData.rating);
                } else {
                    jQuery("#modalWindowAlyaFancybox .percentage").text('0%');
                }
            })
            .fail(function (errorData) {
                console.error(errorData);
            })
            .always(function () {
                // always stuff
            })

        jQuery.ajax({
            type: "post",
            url: arc_ajax_var.url,
            dataType: "json",
            data: "action=alreadyVotedFullscreen&nonce=" + arc_ajax_var.nonce + "&post_id=" + id_main_photo,
            success: function (data, textStatus, jqXHR) {
                //console.log(data);
                if(data == 'like') {
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.activeColor +' !important');
                } else if(data == 'dislike'){
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color',arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.activeColor +'!important');
                } else  {
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color',arc_ajax_var.secondary_text_site_color +'!important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                }
            },
        });

        /** Replace data for share FULLSCREEN [start]**/
        var link;
        var src;
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('.share-fullscreen a').each(function(){
            for(var key in obj_for_ajax.arr_data) {

                if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo){
                    var photo_title = obj_for_ajax.arr_data[key]['photo_title']
                }
            }

            var id = $(this).find('i').attr('id');
            src = $('#main_photo img').attr('src');
            if (id == 'facebook') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?u=' + src +'&amp;src=sdkpreparse';
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'twitter') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?status=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'linkedin') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?mini=true&amp;url=' + src + '&amp;title=' + photo_title + '&amp;summary=photo&amp;source=' + arc_ajax_var.siteUrl;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'tumblr') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?canonicalUrl=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'odnoklassniki') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?url=' + src + '&title=' + photo_title;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            }
        });
        /** Replace data for share FULLSCREEN [end]**/
    });
    /** Change full image by click on chevron left [end]**/

    /** Change full image by click on chevron right [start]**/
    var keyStart_Right;
    $(document).on('click', '.chevron-right-full-screen svg.fa-chevron-right', function(){
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                keyStart_Right = key;
            }
        }
        if (keyStart_Right == (countArrData - 1)) {
            keyStart_Right = 0;
        } else {
            keyStart_Right++;
        }
        var src = obj_for_ajax.arr_data[keyStart_Right]['url'];
        $('#main_photo img').attr('src', src);
        $('#main_photo').attr('data-redirect', arc_ajax_var.siteUrl + '/?attachment_id=' + obj_for_ajax.arr_data[keyStart_Right]['id_photo']);
        $('#main_photo').attr('data-id_main_photo', obj_for_ajax.arr_data[keyStart_Right]['id_photo']);

        $('#full_thumbnails p img').removeClass('active-photo').addClass('no-active-photo');
        $('#full_thumbnails p img[data-id_photo="'+ obj_for_ajax.arr_data[keyStart_Right]['id_photo'] +'"]').removeClass('no-active-photo').addClass('active-photo');

        /** Add photo counter [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                var current_photo_counter = key;
                current_photo_counter++;
            }
        }

        $('#photo_counter').html('<span>' + current_photo_counter + ' of ' + obj_for_ajax.arr_data.length +'</span>');
        /** Add photo counter [end]**/
        /** Re_render heart [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('#video-rate-full-screen a').attr('data-post_id', id_main_photo);
        $.ajax({
            url: obj_for_ajax.url_ajax,
            type: 'POST',
            data: {
                action      : 'rerender_heart',
                photo_id    : id_main_photo,
                nonce       : obj_for_ajax.nonce,
            },
            beforeSend: function(){

            },
            success: function( response ) {
                if (response == '0') {
                    $('#heart-full-screen').removeClass('red-heart');
                } else $('#heart-full-screen').addClass('red-heart');
            },
        });
        /** Re_render heart [end]**/

        jQuery.ajax({
            type: 'post',
            url: arc_ajax_var.url,
            dataType: 'json',
            data: {
                action: 'get-post-data',
                nonce: arc_ajax_var.nonce,
                post_id: id_main_photo
            }
        })
            .done(function (doneData) {
                if (doneData.views) {
                    jQuery("#modalWindowAlyaFancybox #video-views span").text(doneData.views);
                }
                if (doneData.likes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text(doneData.likes.toString());
                } else if(doneData.likes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text('0');
                }
                if (doneData.dislikes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text(doneData.dislikes.toString());
                } else if(doneData.dislikes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text('0');
                }
                if (doneData.rating && doneData.rating !== false) {
                    jQuery("#modalWindowAlyaFancybox .percentage").text(doneData.rating);
                } else {
                    jQuery("#modalWindowAlyaFancybox .percentage").text('0%');
                }
            })
            .fail(function (errorData) {
                console.error(errorData);
            })
            .always(function () {
                // always stuff
            })

        jQuery.ajax({
            type: "post",
            url: arc_ajax_var.url,
            dataType: "json",
            data: "action=alreadyVotedFullscreen&nonce=" + arc_ajax_var.nonce + "&post_id=" + id_main_photo,
            success: function (data, textStatus, jqXHR) {
                //console.log(data);
                if(data == 'like') {
                    jQuery("span#video-rate-full-screen.post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.activeColor +' !important');
                } else if(data == 'dislike'){
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color',arc_ajax_var.activeColor +' !important');
                } else  {
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                }
            },
        });

        /** Replace data for share FULLSCREEN [start]**/
        var link;
        var src;
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('.share-fullscreen a').each(function(){
            for(var key in obj_for_ajax.arr_data) {

                if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo){
                    var photo_title = obj_for_ajax.arr_data[key]['photo_title']
                }
            }

            var id = $(this).find('i').attr('id');
            src = $('#main_photo img').attr('src');
            if (id == 'facebook') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?u=' + src +'&amp;src=sdkpreparse';
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'twitter') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?status=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'linkedin') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?mini=true&amp;url=' + src + '&amp;title=' + photo_title + '&amp;summary=photo&amp;source=' + arc_ajax_var.siteUrl;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'tumblr') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?canonicalUrl=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'odnoklassniki') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?url=' + src + '&title=' + photo_title;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            }
        });
        /** Replace data for share FULLSCREEN [end]**/

    });
    /** Change full image by click on chevron right [end]**/

    /** Change full image by click on photo [start] **/
    $(document).on('click', '#full_thumbnails p img', function(){
        var src = $(this).attr('src');
        $('#main_photo img').attr('src', src);
        var id_photo = $(this).attr('data-id_photo');
        $('#main_photo').attr('data-redirect', arc_ajax_var.siteUrl + '/?attachment_id=' + id_photo);
        $('#main_photo').attr('data-id_main_photo', id_photo);

        $('#full_thumbnails p img').removeClass('active-photo').addClass('no-active-photo');
        $('#full_thumbnails p img[data-id_photo="'+ id_photo +'"]').removeClass('no-active-photo').addClass('active-photo');

        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('#video-rate-full-screen a').attr('data-post_id', id_main_photo);
        jQuery.ajax({
            type: 'post',
            url: arc_ajax_var.url,
            dataType: 'json',
            data: {
                action: 'get-post-data',
                nonce: arc_ajax_var.nonce,
                post_id: id_main_photo
            }
        })
            .done(function (doneData) {
                if (doneData.views) {
                    jQuery("#modalWindowAlyaFancybox #video-views span").text(doneData.views);
                }
                if (doneData.likes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text(doneData.likes.toString());
                } else if(doneData.likes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text('0');
                }
                if (doneData.dislikes) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text(doneData.dislikes.toString());
                } else if(doneData.dislikes == 0) {
                    jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text('0');
                }
                if (doneData.rating && doneData.rating !== false) {
                    jQuery("#modalWindowAlyaFancybox .percentage").text(doneData.rating);
                } else {
                    jQuery("#modalWindowAlyaFancybox .percentage").text('0%');
                }
            })
            .fail(function (errorData) {
                console.error(errorData);
            })
            .always(function () {
                // always stuff
            })

        jQuery.ajax({
            type: "post",
            url: arc_ajax_var.url,
            dataType: "json",
            data: "action=alreadyVotedFullscreen&nonce=" + arc_ajax_var.nonce + "&post_id=" + id_main_photo,
            success: function (data, textStatus, jqXHR) {
                if(data == 'like') {
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.activeColor +' !important');
                } else if(data == 'dislike'){
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.activeColor +' !important');
                } else  {
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color',arc_ajax_var.secondary_text_site_color +'!important');
                    jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +'!important');
                }
            },
        });

        /** Add photo counter [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        for(var key in obj_for_ajax.arr_data) {
            if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                var current_photo_counter = key;
                current_photo_counter++;
            }
        }

        $('#photo_counter').html('<span>' + current_photo_counter + ' of ' + obj_for_ajax.arr_data.length +'</span>');
        /** Add photo counter [end]**/
        /** Re_render heart [start]**/
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $.ajax({
            url: obj_for_ajax.url_ajax,
            type: 'POST',
            data: {
                action      : 'rerender_heart',
                photo_id    : id_main_photo,
                nonce       : obj_for_ajax.nonce,
            },
            beforeSend: function(){

            },
            success: function( response ) {
                if (response == '0') {
                    $('#heart-full-screen').removeClass('red-heart');
                } else $('#heart-full-screen').addClass('red-heart');

            },
        });
        /** Re_render heart [end]**/

        /** Replace data for share FULLSCREEN [start]**/
        var link;
        var src;
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        $('.share-fullscreen a').each(function(){
            for(var key in obj_for_ajax.arr_data) {

                if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo){
                    var photo_title = obj_for_ajax.arr_data[key]['photo_title']
                }
            }

            var id = $(this).find('i').attr('id');
            src = $('#main_photo img').attr('src');
            if (id == 'facebook') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?u=' + src +'&amp;src=sdkpreparse';
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'twitter') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?status=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'linkedin') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?mini=true&amp;url=' + src + '&amp;title=' + photo_title + '&amp;summary=photo&amp;source=' + arc_ajax_var.siteUrl;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'tumblr') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?canonicalUrl=' + src;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            } else if(id == 'odnoklassniki') {
                link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                link = link + '?url=' + src + '&title=' + photo_title;
                $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
            }
        });
        /** Replace data for share FULLSCREEN [end]**/
    });
    /** Change full image by click on photo [end] **/


    /** Autoplay for fullscreen [start]**/
    var timer;
    var progress;
    var keyStart;
    if (obj_for_ajax.arr_data) {
        var countArrData = obj_for_ajax.arr_data.length;
    }
    $(document).on('click', '#modalWindowAlyaFancybox .modal-footer svg.fa-play, #modalWindowAlyaFancybox .modal-footer svg.fa-pause', function(){
        var checkPauseAttr = $(this).attr('data-stop');
        if(checkPauseAttr == 'on') {
            /** Stop autoplay [start]**/
            clearInterval(timer);
            timer = 0;
            clearInterval(progress);
            progress = 0;
            $('progress').css('display', 'none');
            //$('#modalWindowAlyaFancybox .modal-footer svg.fa-pause').removeClass('fa-pause').addClass('fa-play').attr('data-stop', 'off');
            $('#modalWindowAlyaFancybox .modal-footer svg.fa-pause').remove();
            $('#modalWindowAlyaFancybox .modal-footer div.chevron-left-full-screen').append('<svg style="cursor:pointer;z-index: 2;position: absolute;bottom: 0;left: 0;" class="fa-play" data-stop="off" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                '<g filter="url(#filter0_b)">' +
                '<circle cx="15" cy="15" r="15" fill="#1E2739" fill-opacity="0.8"/>' +
                '</g>' +
                '<path d="M21 14.134C21.6667 14.5189 21.6667 15.4811 21 15.866L12.75 20.6292C12.0833 21.0141 11.25 20.5329 11.25 19.7631L11.25 10.2369C11.25 9.46706 12.0833 8.98593 12.75 9.37083L21 14.134Z" fill="white" fill-opacity="0.5"/>' +
                '<defs>' +
                '<filter id="filter0_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">' +
                '<feFlood flood-opacity="0" result="BackgroundImageFix"/>' +
                '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>' +
                '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>' +
                '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>' +
                '</filter>' +
                '</defs>' +
                '</svg>');
            /** Stop autoplay [end]**/
        } else {
            //$('#modalWindowAlyaFancybox .modal-footer svg.fa-play').removeClass('fa-play').addClass('fa-pause').attr('data-stop', 'on');
            $('#modalWindowAlyaFancybox .modal-footer svg.fa-play').remove();
            $('#modalWindowAlyaFancybox .modal-footer div.chevron-left-full-screen').append('<svg style="cursor:pointer;z-index: 2;position: absolute;bottom: 0;left: 0;" class="fa-pause" data-stop="on" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                '<g filter="url(#filter0_b)">' +
                '<circle cx="15" cy="15" r="15" fill="#1E2739" fill-opacity="0.8"/>' +
                '</g>' +
                '<path d="M12.0625 9H8.9375C8.42061 9 8 9.33649 8 9.75V20.25C8 20.6635 8.42061 21 8.9375 21H12.0625C12.5794 21 13 20.6635 13 20.25V9.75C13 9.33649 12.5794 9 12.0625 9Z" fill="#A2A6AD"/>' +
                '<path d="M21.0625 9H17.9375C17.4206 9 17 9.33649 17 9.75V20.25C17 20.6635 17.4206 21 17.9375 21H21.0625C21.5794 21 22 20.6635 22 20.25V9.75C22 9.33649 21.5794 9 21.0625 9Z" fill="#A2A6AD"/>' +
                '<defs>' +
                '<filter id="filter0_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">' +
                '<feFlood flood-opacity="0" result="BackgroundImageFix"/>' +
                '<feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>' +
                '<feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>' +
                '<feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>' +
                '</filter>' +
                '</defs>' +
                '</svg>');
            /** Progress bar [start]**/
            $('progress').css('display', 'inline-block');

            var increment;
            switch (arc_ajax_var.slideshow_duration) {
                case 4:   increment = 2.5;
                    break;
                case 3:   increment = 3.33;
                    break;
                case 2:   increment = 5;
                    break;
                default : increment = 2;
            }
            var val = increment;
            var timeout = arc_ajax_var.slideshow_duration * 20;
            moveProgress ();
            progress = setInterval( moveProgress, timeout );
            function moveProgress () {
                if (val >= (100 + increment))  val = increment;
                $('progress').attr('value', val);
                val = val + increment;
            }
            /** Progress bar [end]**/
            timer = setInterval( autoplay, arc_ajax_var.slideshow_duration * 1000 );
            function autoplay(){
                var id_main_photo = $('#main_photo').attr('data-id_main_photo');
                for(var key in obj_for_ajax.arr_data) {
                    if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                        keyStart = key;
                    }
                }

                if (keyStart == (countArrData - 1)) {
                    keyStart = 0;
                } else {
                    keyStart++;
                }

                var src = obj_for_ajax.arr_data[keyStart]['url'];
                $('#main_photo img').attr('src', src);
                $('#main_photo').attr('data-redirect', arc_ajax_var.siteUrl + '/?attachment_id=' + obj_for_ajax.arr_data[keyStart]['id_photo']);
                $('#main_photo').attr('data-id_main_photo', obj_for_ajax.arr_data[keyStart]['id_photo']);

                $('#full_thumbnails p img').removeClass('active-photo').addClass('no-active-photo');
                $('#full_thumbnails p img[data-id_photo="'+ obj_for_ajax.arr_data[keyStart]['id_photo'] +'"]').removeClass('no-active-photo').addClass('active-photo');

                /** Add photo counter [start]**/
                var id_main_photo = $('#main_photo').attr('data-id_main_photo');
                for(var key in obj_for_ajax.arr_data) {
                    if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo) {
                        var current_photo_counter = key;
                        current_photo_counter++;
                    }
                }

                $('#photo_counter').html('<span>' + current_photo_counter + ' of ' + obj_for_ajax.arr_data.length +'</span>');
                /** Add photo counter [end]**/

                /** Re_render heart [start]**/
                var id_main_photo = $('#main_photo').attr('data-id_main_photo');
                $('#video-rate-full-screen a').attr('data-post_id', id_main_photo);
                $.ajax({
                    url: obj_for_ajax.url_ajax,
                    type: 'POST',
                    data: {
                        action      : 'rerender_heart',
                        photo_id    : id_main_photo,
                        nonce       : obj_for_ajax.nonce,
                    },
                    beforeSend: function(){

                    },
                    success: function( response ) {
                        if (response == '0') {
                            $('#heart-full-screen').removeClass('red-heart');
                        } else $('#heart-full-screen').addClass('red-heart');
                    },
                });
                /** Re_render heart [end]**/

                jQuery.ajax({
                    type: 'post',
                    url: arc_ajax_var.url,
                    dataType: 'json',
                    data: {
                        action: 'get-post-data',
                        nonce: arc_ajax_var.nonce,
                        post_id: id_main_photo
                    }
                })
                    .done(function (doneData) {
                        if (doneData.views) {
                            jQuery("#modalWindowAlyaFancybox #video-views span").text(doneData.views);
                        }
                        if (doneData.likes) {
                            jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text(doneData.likes.toString());
                        } else if(doneData.likes == 0) {
                            jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.likes_count").text('0');
                        }
                        if (doneData.dislikes) {
                            jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text(doneData.dislikes.toString());
                        } else if(doneData.dislikes == 0) {
                            jQuery("#modalWindowAlyaFancybox").find("#video-rate-full-screen span.dislikes_count").text('0');
                        }
                        if (doneData.rating && doneData.rating !== false) {
                            jQuery("#modalWindowAlyaFancybox .percentage").text(doneData.rating);
                        } else {
                            jQuery("#modalWindowAlyaFancybox .percentage").text('0%');
                        }
                    })
                    .fail(function (errorData) {
                        console.error(errorData);
                    })
                    .always(function () {
                        // always stuff
                    })

                jQuery.ajax({
                    type: "post",
                    url: arc_ajax_var.url,
                    dataType: "json",
                    data: "action=alreadyVotedFullscreen&nonce=" + arc_ajax_var.nonce + "&post_id=" + id_main_photo,
                    success: function (data, textStatus, jqXHR) {
                        //console.log(data);
                        if(data == 'like') {
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color',arc_ajax_var.activeColor +'!important');
                        } else if(data == 'dislike'){
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +' !important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.activeColor +' !important');
                        } else  {
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='like'] span.like span i").css('color', arc_ajax_var.secondary_text_site_color +'!important');
                            jQuery("span#video-rate-full-screen .post-like a[data-post_like='dislike'] span.dislike span i").css('color', arc_ajax_var.secondary_text_site_color +'!important');
                        }
                    },
                });

                /** Replace data for share FULLSCREEN [start]**/
                var link;
                var src;
                var id_main_photo = $('#main_photo').attr('data-id_main_photo');
                $('.share-fullscreen a').each(function(){
                    for(var key in obj_for_ajax.arr_data) {

                        if (obj_for_ajax.arr_data[key]['id_photo'] == id_main_photo){
                            var photo_title = obj_for_ajax.arr_data[key]['photo_title']
                        }
                    }

                    var id = $(this).find('i').attr('id');
                    src = $('#main_photo img').attr('src');
                    if (id == 'facebook') {
                        link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                        link = link + '?u=' + src +'&amp;src=sdkpreparse';
                        $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
                    } else if(id == 'twitter') {
                        link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                        link = link + '?status=' + src;
                        $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
                    } else if(id == 'linkedin') {
                        link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                        link = link + '?mini=true&amp;url=' + src + '&amp;title=' + photo_title + '&amp;summary=photo&amp;source=' + arc_ajax_var.siteUrl;
                        $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
                    } else if(id == 'tumblr') {
                        link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                        link = link + '?canonicalUrl=' + src;
                        $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
                    } else if(id == 'odnoklassniki') {
                        link = $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href');
                        link = link + '?url=' + src + '&title=' + photo_title;
                        $('.share-fullscreen a i[id="'+id+'"]').parent('a').attr('href', link);
                    }
                });
                /** Replace data for share FULLSCREEN [end]**/


                /** Progress bar [start]**/
                var checkPauseAttr = $('#modalWindowAlyaFancybox .modal-header .fa-pause').attr('data-stop');
                if(checkPauseAttr == 'on') {
                    clearInterval(progress);
                    progress = 0;
                    //$('progress').css('display', 'none');
                }
                /** Progress bar [start]**/
                $('progress').css('display', 'inline-block');

                var increment;
                switch (arc_ajax_var.slideshow_duration) {
                    case 4:   increment = 2.5;
                        break;
                    case 3:   increment = 3.33;
                        break;
                    case 2:   increment = 5;
                        break;
                    default : increment = 2;
                }
                var val = increment;

                var timeout = arc_ajax_var.slideshow_duration * 20;
                moveProgress ();
                progress = setInterval( moveProgress, timeout );
                function moveProgress () {
                    if (val >= (100 + increment))  val = increment;
                    $('progress').attr('value', val);
                    val = val + increment;
                }
                /** Progress bar [end]**/
            }
        }


    });
    /** Autoplay for fullscreen [end]**/


    /** Close full screen [start]**/
    $('#modalWindowAlyaFancybox button.close').on('click', function (){
        var urn = $('#main_photo').attr('data-redirect');
        if (urn !== 'none') {
            window.location.href = arc_ajax_var.siteUrl+ '/' + urn;
        } else {
            $('#modalWindowAlyaFancybox').hide();
            $('body').css('overflow', 'auto');
        }
    });
    /** Close full screen [end]**/

    /** Close full screen AND move comments [start]**/
    $(document).on('click', '#modalWindowAlyaFancybox .fa-comment', function(){
        var urn = $('#main_photo').attr('data-redirect');
        if (urn !== 'none') {
            window.location.href = arc_ajax_var.siteUrl+ '/' + urn + '/#reply-title';
        } else {
            $('#modalWindowAlyaFancybox').hide();
            $('body').css('overflow', 'auto');
        }
    });
    /**Close full screen AND move comments [end]**/

    /** Add to Favorite [start]*/
    $('#heart').on('click', function(){
        var photo_id = $(this).data('photo_id');
        var user_id = $(this).data('user_id');
        if (user_id === 0) {
            $('#auth_modal').show().css('z-index', '9999999');
        } else {
            add_photo_to_favorite(photo_id, user_id);
            function add_photo_to_favorite(photo_id, user_id){
                $.ajax({
                    url: obj_for_ajax.url_ajax,
                    type: 'POST',
                    data: {
                        action      : 'add_photo_to_favorite',
                        photo_id    : photo_id,
                        user_id     : user_id,
                        nonce       : obj_for_ajax.nonce,
                    },
                    beforeSend: function(){
                    },
                    success: function( response ) {
                        if (response === 'start' || response === 'add') {
                            $('.fa.fa-heart-o').removeClass('fa-heart-o').addClass('fa-heart red-heart');
                        } else if (response === 'delete') {
                            $('.fa.fa-heart').removeClass('fa-heart red-heart').addClass('fa-heart-o');
                        }
                    },
                });
            }
        }

    })
    /** Add to Favorite [end]*/

    /** Add to Favorite FULLSCREEN [start]*/
    $(document).on('click', '#heart-full-screen', function(){
        var id_main_photo = $('#main_photo').attr('data-id_main_photo');
        var user_id = $(this).data('user_id');
        if (user_id === 0) {
            $('#auth_modal').show().css('z-index', '9999999');
        } else {
            add_photo_to_favorite(id_main_photo, user_id);
            function add_photo_to_favorite(photo_id, user_id){
                $.ajax({
                    url: obj_for_ajax.url_ajax,
                    type: 'POST',
                    data: {
                        action      : 'add_photo_to_favorite',
                        photo_id    : id_main_photo,
                        user_id     : user_id,
                        nonce       : obj_for_ajax.nonce,
                    },
                    beforeSend: function(){
                    },
                    success: function( response ) {
                        if (response === 'start' || response === 'add') {
                            $('.fa.fa-heart-o').removeClass('fa-heart-o').addClass('fa-heart red-heart');
                        } else if (response === 'delete') {
                            $('.fa.fa-heart').removeClass('fa-heart red-heart').addClass('fa-heart-o');
                        }
                    },
                });
            }
        }

    })
    /** Add to Favorite FULLSCREEN [end]*/

    /** Redirect from thumbnail [start]**/
    $(document).on('click', '.thumbnail_gallery', function(){
        var parent = $(this).data('parent');
        var urn    = $(this).data('urn');

        if (parent == 'video') {
            window.location.href = arc_ajax_var.siteUrl+ '/' + urn;
        }
        if (parent == 'gallery') {
            window.location.href = arc_ajax_var.siteUrl + '/' + urn;
        }
    })
    /** Redirect from thumbnail [end]**/

    /** Redirect from chevron [start]**/
    $('.chevron-right svg.fa-chevron-right').on('click', function(){
        var parent = $(this).parent('div.chevron-right').data('parent');
        var urn    = $(this).parent('div.chevron-right').data('urn');
        window.location.href = arc_ajax_var.siteUrl + '/' + urn;
    });

    $('.chevron-left svg.fa-chevron-left').on('click', function(){
        var parent = $(this).parent('div.chevron-left').data('parent');
        var urn    = $(this).parent('div.chevron-left').data('urn');
        window.location.href = arc_ajax_var.siteUrl + '/' + urn;
    })
    /** Redirect from chevron [end]**/

    /***scroll thumbs container [start]***/
    $('div.thumbs_container').scroll();
    /***scroll thumbs container [end]***/

    /** Hide/show share [start]**/
    var share_flag = false;
    $('.share-alt-not-fullscreen').on('click', function(){
        if (share_flag === false) {
            $('.share-not-fullscreen').show();
            $('.share-alt-not-fullscreen').addClass('active');
            share_flag = true;
        } else {
            $('.share-not-fullscreen').hide();
            $('.share-alt-not-fullscreen').removeClass('active');
            share_flag = false;
        }
    })
    /** Hide/show share [end]**/

    /** Hide/show share FULLSCREEN [start]**/
    var share_flag_full_screen = false;
    $(document).on('click','#modalWindowAlyaFancybox .share-alt-fullscreen',function(){
        if (share_flag_full_screen === false) {
            $('.share-fullscreen').show().css({
                'position': 'absolute',
                'right': 0,
                'bottom': 0,
                'z-index': 1
            });
            share_flag_full_screen = true;
        } else {
            $('.share-fullscreen').hide();
            share_flag_full_screen = false;
        }
    })
    /** Hide/show share FULLSCREEN [end]**/

    /** Hide/show thumbnail [start]**/
    var thumbnail_flag = true;
    $(document).on('click', '.hidden_thumbs', function(){
        if (thumbnail_flag === true) {
            $('#main .thumb_inner').hide();
            thumbnail_flag = false;
        } else {
            $('#main .thumb_inner').show();
            thumbnail_flag = true;
        }
    })
    /** Hide/show thumbnail [start]**/

    /*** Change the image width when thumbs show or hide **/
    var thumbs_full_flag = false;
    $(document).on('click','ul#control_fullscreen_panel', () => {
        if(false === thumbs_full_flag) {
            $('p#p_full_image_container').css('width', '57vw');
            thumbs_full_flag = true;
        } else {
            $('p#p_full_image_container').css('width', '65vw');
            thumbs_full_flag = false;
        }
    });/*** [end] Change the image width when thumbs show or hide **/

    /** cookies for hide or show thumbnail [start] **/
    $(document).on('click', '.hidden_thumbs', function(){
        let galleryId = document.querySelector('[data-gallery_id]');
        galleryId = galleryId.dataset.gallery_id;
        let nameCookie = 'cookies_for_hide_or_show_thumbnail';
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        let galleryIdFromCookie = getCookie(nameCookie);
        if(galleryId === galleryIdFromCookie) {
            let date = Date.now();
            date = Math.floor(date / 1000);
            date = date - 3600;
            document.cookie = "cookies_for_hide_or_show_thumbnail=" + "null" + ";" + "path=/; max-age=10;";
        } else {
            document.cookie = "cookies_for_hide_or_show_thumbnail=" + galleryId + ";" + "path=/; max-age=43200";
        }

    })
    /** cookies for hide or show thumbnail [end]**/

    /**  Hide/show thumbnail (cookie)[start] **/
    let nameCookie = 'cookies_for_hide_or_show_thumbnail';
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    let galleryIdFromCookie = getCookie(nameCookie);
    let galleryId = document.querySelector('[data-gallery_id]');
    galleryId = galleryId.dataset.gallery_id;
    if (galleryIdFromCookie === galleryId) {
        $('#main .thumb_inner').hide();
        thumbnail_flag = false;
    }
    /** Hide/show thumbnail (cookie)[end] **/
//======================================================================================================================
});
