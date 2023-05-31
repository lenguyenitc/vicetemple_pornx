jQuery(document).ready(function($){
    var ads_form = false;
    $('.add_new_ads').on('click', function () {
        if (false === ads_form) {
            $('.ads_form').slideDown(200);
            ads_form = true;
        } else {
            $('.ads_form').slideUp(200);
            ads_form = false;
        }
    });

    var number_page = 1;
    /** Save ad in db [start]*/
    $('#send_message').on('click', function(){
            var text_message   = $('#text_message').val();
            var ad_type = $('#select_ad_type').val();
            save_ad_in_db(text_message, ad_type);
    });
    function save_ad_in_db(text_message, ad_type){
           $.ajax({
               url: obj_for_ajax.url,
               type: 'POST',
               data: {
                   action         : 'save_ad_in_db',
                   nonce          : obj_for_ajax.nonce,
                   text_message   : text_message,
                   ad_type        : ad_type,
               },
               success: function( data ) {
                    $('#ads_response').css('display', 'block');
                    setTimeout(() => {
                        $('.ads_form').slideUp(200);
                        ads_form = false;
                        $('#text_message').val('');
                        $('#ads_response').css('display', 'none');
                    }, 1200);
               }
           });

    }
    /** Save ad in db [start]*/

    /** Displaying existing ads [start]*/
    function displaying_existing_ads(number_page){
        var offset = new Date().getTimezoneOffset();
        $.ajax({
            url: obj_for_ajax.url,
            type: 'POST',
            data: {
                action         : 'displaying_existing_ads',
                nonce          : obj_for_ajax.nonce,
                number_page    : number_page,
                offset         : offset
            },
            success: function(response) {
                if(response.length < 20) $('#load_more_ads').css('display', 'none');
                else if(response.length == 0) $('#load_more_ads').css('display', 'none');
                else $('#load_more_ads').css('display', 'table');
                for (var key in response) {
                    $('#list_ads').append('<div class="ads-wrap">' +
                        '<div class="photo">' +
                        '<div class="avatar">' +
                        '<a href="' + response[key]['link_to_profile'] + '">' +
                        '<img style="max-width: 90px;" src="' + response[key]['user_photo'] + '" alt="' + response[key]['user_name'] + '">' +
                        '</a>' +
                        '</div>' +
                        '</div>' +
                        '<div class="ads-block">' +
                        '<p class="ads-text">' + response[key]['text_message'] + '</p>' +
                        '<div class="ads-comment">' +
                        '<div class="ads-date">' + response[key]['publication_date'] + '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    }
    displaying_existing_ads(number_page);
    /** Displaying existing ads [end]*/

    /** Load more rendering [start]*/
    $(document).on('click', '#load_more_ads', function(){
        number_page++;
        load_more(number_page);
    });
    function load_more(number_page){
        var offset = new Date().getTimezoneOffset();
        $.ajax({
            url: obj_for_ajax.url,
            type: 'POST',
            data: {
                action         : 'displaying_existing_ads',
                nonce          : obj_for_ajax.nonce,
                number_page    : number_page,
                offset         : offset
            },
            success: function( response ) {
                if(response.length < 20) $('#load_more_ads').css('display', 'none');
                else if(response.length == 0) $('#load_more_ads').css('display', 'none');
                else $('#load_more_ads').css('display', 'table');
                for (var key in response) {
                    $('#list_ads').append('<div class="ads-wrap">' +
                        '<div class="photo">' +
                        '<div class="avatar">' +
                        '<a href="' + response[key]['link_to_profile'] + '">' +
                        '<img style="max-width: 90px;" src="' + response[key]['user_photo'] + '" alt="' + response[key]['user_name'] + '">' +
                        '</a>' +
                        '</div>' +
                        '</div>' +
                        '<div class="ads-block">' +
                        '<p class="ads-text">' + response[key]['text_message'] + '</p>' +
                        '<div class="ads-comment">' +
                        '<div class="ads-date">' + response[key]['publication_date'] + '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    }
    /** Load more rendering [end]*/
});