jQuery(document).ready(function($){
    var one_click = false;
    $('#btn_delete_album').on('click', function (){
        if(false === one_click) {
            $(this).attr('disabled', true).css('cursor', 'not-allowed');

            var gallery_id = $(this).attr('data-gallery_id');
            var last_photo_for_delete = false;
            if(sessionStorage.getItem('btn_last_clicked') !== undefined && sessionStorage.getItem('btn_last_clicked') == 'delete') {
                last_photo_for_delete = 'delete_last_image';
            } else last_photo_for_delete = false;
            $.ajax({
                url: obj_for_front_management_photo_gallery.ajax_url,
                type: 'POST',
                data: {
                    action      : 'delete_gallery',
                    gallery_id  : gallery_id,
                    nonce       : obj_for_front_management_photo_gallery.nonce,
                    last_photo_for_delete: last_photo_for_delete
                },
                beforeSend: function(){
                    //console.log(gallery_id);
                },
                success: function( response ) {
                    $('#modalDelMsg .modal-guts-del div').append('<h2>We have sent you an email.</h2>' +
                        '<span class="confirm">Your album will be removed permanently once you confirm it.</span>');
                    $('#modal-overlay-del').css('z-index', '99999');
                    $('#modalDelMsg').show();
                },
            });
            one_click = true;
        } else {
            setTimeout(function() {

            }, 2000);
        }

    });

    /****delete user album***/
    $('#modalDelMsg #close-button-del').on('click',function () {
        $('#modalDelMsg .modal-guts-del h2,#modalDelMsg .modal-guts-del span.confirm').remove();
        $('#modalDelMsg .modal-guts-del div span').remove();
        $('#modalDelMsg .modal-guts-del div.div_confirm').remove();
        $('#modalDelMsg').hide();
        $('#modal-overlay-del').css('z-index', '-1000');
        one_click = false;
        $('#btn_delete_album').attr('disabled', false).css('cursor', 'pointer');
    });/**** [end] delete user album***/

    sessionStorage.removeItem('last_photo_for_delete');

    $(document).on('click', 'li.blocks-gallery-item span.delete_image i.svg_delete_photo', function(){
        var href = $(this).closest('li').find('figure a').attr('href');
        var modal = false;
        if(arc_ajax_var.count_imgs == 1) {
            sessionStorage.setItem('last_photo_for_delete', href);
            modal = true;
        }
        else modal = false;

        if(modal) {
            $('div#modalDelMsg div.modal-guts-del div').append('<span class="confirm">Deleting the last image will permanently delete this album. Proceed?</span>');
            $('div#modalDelMsg div.modal-guts-del div').append('<div class="div_confirm" style="margin-top: 25px;"><button class="delete_last">Delete</button><button class="cancel_last">Cancel</button></div>');
            $('#modal-overlay-del').css('z-index', '99999');
            $('div#modalDelMsg').show();
        } else {
            $.ajax({
                url: obj_for_front_management_photo_gallery.ajax_url,
                type: 'POST',
                data: {
                    action      : 'delete_one_photo',
                    href        : href,
                    gallery_id  : arc_ajax_var.galleryID,
                    nonce       : obj_for_front_management_photo_gallery.nonce,
                    count_photo : arc_ajax_var.count_imgs
                },
                beforeSend: function(){

                },
                success: function( response ) {
                    $('figure a[href="'+href+'"]').closest('li.blocks-gallery-item').remove();
                    arc_ajax_var.count_imgs = arc_ajax_var.count_imgs - 1;
                },
            });
        }

    });

    sessionStorage.removeItem('btn_last_clicked');
    $(document).on('click', 'div.div_confirm button', function () {
       var class_btn = $(this).attr('class');

       if(class_btn == 'cancel_last') {
           $('#modalDelMsg .modal-guts-del div span').remove();
           $('#modalDelMsg .modal-guts-del div.div_confirm').remove();
           $('#close-button-del').trigger('click');
           sessionStorage.setItem('btn_last_clicked', 'cancel');
       }
       else if(class_btn == 'delete_last') {
           sessionStorage.setItem('btn_last_clicked', 'delete');
           $('div#modalDelMsg').hide('fast');
           $('#modal-overlay-del').css('z-index', '-111111');
           $('div#modalDelMsg div.modal-guts-del div span').remove();
           $('div#modalDelMsg div.modal-guts-del div.div_confirm').remove();
           $('#btn_delete_album').trigger('click');
        }

    });
});