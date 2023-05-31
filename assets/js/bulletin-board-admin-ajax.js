jQuery(document).ready(function($){
    /** Delete ad in db [start]*/
    $('.delete_ads').on('click', function(){
        var data_id_for_delete = $(this).attr('data-id-for-delete');
        delete_ad_in_db(data_id_for_delete);
    })
    function delete_ad_in_db(data_id_for_delete){
        $.ajax({
            url: obj_for_ajax.url,
            type: 'POST',
            data: {
                action             : 'delete_ad_in_db',
                nonce              : obj_for_ajax.nonce,
                data_id_for_delete : data_id_for_delete,
            },
            beforeSend: function( xhr ) {
            },
            success: function( response ) {
                console.log(response);
                $("tr" + "." + response).remove();
            }
        });

    }
    /** Save ad in db [start]*/

    /** Publish ad [start]*/
    $('.to_publish').on('click', function(){
        var data_id_for_publish = $(this).attr('data-id-for-publish');
        publish_ad(data_id_for_publish);
    })
    function publish_ad(data_id_for_publish){
        $.ajax({
            url: obj_for_ajax.url,
            type: 'POST',
            data: {
                action              : 'publish_ad',
                nonce               : obj_for_ajax.nonce,
                data_id_for_publish : data_id_for_publish,
            },
            beforeSend: function( xhr ) {
            },
            success: function( response ) {
                console.log(response);
                $("tr" + "." + response).remove();
            }
        });
    }
    /** Publish ad [end]*/

    /** Edit ad [start]*/
    $('.apply_edits_made').on('click', function(){
        var data_id_for_edit = $(this).attr('data-id-for-edit');
        var text_message   = $('textarea' + "." + data_id_for_edit).val();
        edit_ad(data_id_for_edit, text_message);
    })
    function edit_ad(data_id_for_edit, text_message){
        $.ajax({
            url: obj_for_ajax.url,
            type: 'POST',
            data: {
                action              : 'edit_ad',
                nonce               : obj_for_ajax.nonce,
                data_id_for_edit    : data_id_for_edit,
                text_message        : text_message,
            },
            beforeSend: function( xhr ) {

            },
            error: function (response){

            },
            success: function( response ) {
                console.log(response);
            }
        });
    }
    /** Edit ad [end]*/

})