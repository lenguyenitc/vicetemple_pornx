jQuery(document).ready(function($){
    /** Approve [start]*/
    $('.approved').on('click', function(e){
        e.preventDefault();
        var comments_id = $(this).data('comments-id-approve');
        approve_comments(comments_id);
    })
    function approve_comments(comments_id){
        $.ajax({
            url: arc_ajax_var.url,
            type: 'POST',
            data: {
                action      : 'approve_comments',
                comments_id : comments_id,
                nonce       : arc_ajax_var.nonce,
            },
            success: function( response ) {
                //console.log(response);
                if(response == 1) {
                    $('ul#pending_comments li#comment-' + comments_id).hide();
                }
            },
        });
    }
    /** Approve [end]*/

    /** Delete [start]*/
    $('.delete').on('click', function(e){
        e.preventDefault();
        var comments_id = $(this).data('comments-id-delete');
        delete_comments(comments_id);
    })
    function delete_comments(comments_id){
        $.ajax({
            url: arc_ajax_var.url,
            type: 'POST',
            data: {
                action      : 'delete_comments',
                comments_id : comments_id,
                nonce       : arc_ajax_var.nonce,
            },
            success: function( response ) {
                //console.log(response);
                $('li#comment-' + comments_id).hide();
            },
        });
    }
    /** Delete [end]*/

    /** Hold [start]*/
    $('.hold').on('click', function(e){
        e.preventDefault();
        var comments_id = $(this).data('comments-id-hold');
        hold_comments(comments_id);
    })
    function hold_comments(comments_id){
        $.ajax({
            url: arc_ajax_var.url,
            type: 'POST',
            data: {
                action      : 'hold_comments',
                comments_id : comments_id,
                nonce       : arc_ajax_var.nonce,
            },
            success: function( response ) {
                //console.log(response);
                if(response == 1) {
                    $('ul#approve_comments li#comment-' + comments_id).hide();
                }
            },
            error: function( response ) {

            }
        });
    }
    /** Hold [end]*/
})