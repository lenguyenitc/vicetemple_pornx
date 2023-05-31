jQuery(document).ready(function ($){
    $(document).on('click', '.de-listing', function(e) {
        e.preventDefault();
        let post_id = $(this).attr('data-id-for-remove');

        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'remove_updates_from_the_recent_activity',
                nonce: arc_ajax_var.nonce,
                post_id: post_id
            },
            beforeSend: function(){

            },
            success: function (res) {
                $('.activity_block[data-id-for-hidden="'+res+'"]').hide();
            }
        });
    });
});

