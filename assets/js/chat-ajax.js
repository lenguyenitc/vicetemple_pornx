jQuery(document).ready(function($){


    /****change color chat scheme****/
    $('#color_chat_scheme input[type="radio"]').on('click', function () {
       var scheme = $(this).val();
        $.ajax({
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_set_color_scheme',
                nonce: arc_ajax_var.nonce,
                scheme: scheme
            },
            type: 'POST',
            success: function (res) {
                location.reload();
            }
        });
    });
    /**** end change color chat scheme****/


    var arrow_flag = false;
    var start_id = $('div.start').attr('id');

    /***check if not conversation and contacts****/
    $('ul#list_id_sender').each(function(){
        var liLen = $(this).find('li').length;
        if(liLen > 0) {
            $('#list_id_sender li').removeAttr('class');
            render_list_message(start_id);
            $('li#' + start_id +'div.color2 i.fa-envelope').css('display', 'none');
        } else {
            $('#sender_name').css('margin-bottom', '40px');
            $('#chat_with div img').css({
               'width' : 0,
               'heigth' : 0
            });
            $('#messages').html('<p style="margin-left: 10px">You don`t have any conversation yet.</p>');
            $('#list_id_sender').html('<p style="margin-left: 20px; margin-right: 5px; margin-top: 25px; float-wrap: wrap; ">You don`t have any contacts yet.</p>');
        }
    });


    /**start render message **/

    function render_list_message(start_id){
        var offset = new Date().getTimezoneOffset();

        var jqXHR = jQuery.post(obj_for_ajax.url, {
            action       : obj_for_ajax.hook_render_list_message,
            nonce        : obj_for_ajax.nonce,
            start_id     : start_id,
            offset       : offset
        });
        jqXHR.done(function(response){
            $('#messages').html(response);
            $("#messages").scrollTop($("#messages")[0].scrollHeight);
            $('li[id='+ start_id +']').attr('class', 'activeLi');
        });
        jqXHR.fail(function (response) {
        });
    }
    /** end start render message **/

    /**choose other sender conversation***/
    $(document).on('click', '#list_id_sender li',function(){
        const screenWidth = window.screen.width;
        if(false === arrow_flag) {
            const screenWidth = window.screen.width;
            if(screenWidth >= 320 && screenWidth < 766) {
                $('section#container aside').attr('style', 'width:0 !important; max-width:100vw !important').hide();
                $('section#main').attr('style', 'width:100% !important; max-width:100vw !important').show();
            }
            arrow_flag = true;
        } else {
            const screenWidth = window.screen.width;
            if(screenWidth >= 320 && screenWidth < 766) {
                $('section#container aside').attr('style', 'width:0 !important; max-width:100vw !important').hide();
                $('section#main').attr('style', 'width:100% !important; max-width:100vw !important').show();
            }
            arrow_flag = false;
        }

        $('#list_id_sender li').removeAttr('class');
        $(this).attr('class', 'activeLi')
        var start_id = $(this).attr('id');
        /***get user avatar and name***/
        $.ajax({
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_get_user_avatar',
                nonce: arc_ajax_var.nonce,
                start_id: start_id
            },
            type: 'POST',
            success: function (res) {
                $('#chat_with div.avatar img').attr('src', res[0]);
                $('#chat_with div.avatar p#sender_name').text(res[1]);
            }
        });

        render_list_message(start_id);
        $('div.color2 i.fa-envelope').css('display', 'none');
        $('div.start').attr('data-current', start_id);
    })

    /**choose other sender conversation***/
    setInterval(check_status_for_new_message, 5000);

    function check_status_for_new_message(){
        var id_sender = $('div.start').attr('data-current');
        var jqXHR = jQuery.post(obj_for_ajax.url, {
            action       : obj_for_ajax.hook_check_status_for_new_message,
            nonce        : obj_for_ajax.nonce,
            id_sender    : id_sender,
        });
        jqXHR.done(function(response){
            if(response.length > 0){
                render_list_message(id_sender);
                var audio = new Audio();
                audio.preload = 'auto';
                audio.src = obj_for_ajax.sound;
                audio.play();
            }
        });
        jqXHR.fail(function (response) {
        });
    }

    /*****send message for user from chat page****/
    $('.material-icons').on('click', function(){
        var textarea_content = ($('#textarea_content').val());
        var id_recipient = ($('div.start').attr('data-current'));
        var trim = textarea_content.trim();
         if(textarea_content != '' && trim != ''){
             send_message_response(textarea_content, id_recipient, );
         }
    });

    function send_message_response(text_message, id_recipient){
        var offset = new Date().getTimezoneOffset();
        var jqXHR = jQuery.post(obj_for_ajax.url, {
            action       : obj_for_ajax.hook_send_message_response,
            nonce        : obj_for_ajax.nonce,
            text_message : text_message,
            id_recipient : id_recipient,
            id_sender    : obj_for_ajax.current_id,
            offset       : offset

        });
        jqXHR.done(function(response){
            $('#messages').append(response);
            $('#textarea_content').val('');
            $("#messages").scrollTop($("#messages")[0].scrollHeight);
        });
    }
    $(document).keyup(function(event){
        if(event.keyCode == 13){
            $(".material-icons").click();
        }
    });

    /**change chat view**/
    const screenWidth = window.screen.width
    if(screenWidth >= 320 && screenWidth < 766) {
        $('i#back_to_msg, i#back_to_list').css('display', 'inline-block');
    } else $('i#back_to_msg, i#back_to_list').css('display', 'none');


    $(document).on('click', '#back_to_list', function () {
        if(false === arrow_flag) {
            const screenWidth = window.screen.width;
            if(screenWidth >= 320 && screenWidth < 766) {
                $('section#container aside').attr('style', 'width:100% !important; max-width:100vw !important').show();
                $('section#main').attr('style', 'width:0 !important; max-width:100vw !important').hide();
            }  else if(screenWidth >= 767) {
                $('section#container aside').css({
                    'width': '100%',
                    'max-width' : '15em'
                }).show();
            }
            $('#back_to_list').removeClass('fa-angle-right').addClass('fa-angle-left');
            arrow_flag = true;
        } else {
            const screenWidth = window.screen.width;
            if(screenWidth >= 320 && screenWidth < 766) {
                $('section#container aside').attr('style', 'width:100% !important; max-width:100vw !important').show();
                $('section#main').attr('style', 'width:0 !important; max-width:100vw !important').hide();
            }  else if(screenWidth >= 767) {
                $('section#container aside').css({
                    'width': '100%',
                    'max-width' : '15em'
                }).show();
            }
            $('#back_to_list').removeClass('fa-angle-right').addClass('fa-angle-left');
            arrow_flag = false;
        }
    });

    $(document).on('click', '#back_to_msg', function () {
        const screenWidth = window.screen.width;
        if(screenWidth >= 320 && screenWidth < 766) {
            $('section#container aside').attr('style', 'width:0% !important; max-width:100vw !important').hide();
            $('section#main').attr('style', 'width:100% !important; max-width:100vw !important').show();
        }
        arrow_flag = false;
    });
})

