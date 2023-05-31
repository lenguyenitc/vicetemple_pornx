jQuery(document).ready(function($){
    $(document).on('click', 'a.ban', function(e) {
        e.preventDefault();
        let user_id = $(this).attr('data-user-id');

        $.ajax({
            type: "post",
            url: arc_admin_scripts_ajax_var.url,
            data: {
                action: 'ban_on_id',
                nonce: arc_admin_scripts_ajax_var.nonce,
                user_id: user_id
            },
            beforeSend: function(){
                //console.log(arc_admin_scripts_ajax_var.url);
            },
            success: function (res) {
                if (res != false) {
                    $('a.ban[data-user-id="'+res+'"]').text('Unban');
                    $('a.ban[data-user-id="'+res+'"]').attr('class', 'unban');

                }
            }
        });
    });

    $(document).on('click', 'a.unban', function(e) {
        e.preventDefault();
        let user_id = $(this).attr('data-user-id');

        $.ajax({
            type: "post",
            url: arc_admin_scripts_ajax_var.url,
            data: {
                action: 'unban_on_id',
                nonce: arc_admin_scripts_ajax_var.nonce,
                user_id: user_id
            },
            beforeSend: function(){
                //console.log(arc_admin_scripts_ajax_var.url);
            },
            success: function (res) {
                if (res != false) {
                    $('a.unban[data-user-id="'+res+'"]').text('Ban');
                    $('a.unban[data-user-id="'+res+'"]').attr('class', 'ban');

                }

            }
        });
    });

});
