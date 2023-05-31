jQuery(document).ready(function ($) {
    /****delete one photo****/
    $('p.delete_photo i').on('click', function (){
        var file_path = $(this).attr('data-delete');
        $.ajax({
            type: "post",
            url: jstree_obj.url,
            data: {
                action: 'ARC_front_delete_one_foto_from_album',
                nonce: jstree_obj.nonce,
                addr: file_path
            },
            success: function (res) {
                $('li[data-id="' + res + '"]').remove();
            }
        });
    });

    /****delete album****/
    $('p.delete_album i').on('click', function (){
        var data_delete = $(this).attr('data-delete');
        $.ajax({
            type: "post",
            url: jstree_obj.url,
            data: {
                action: 'ARC_front_delete_album',
                nonce: jstree_obj.nonce,
                addr: data_delete
            },
            success: function (res) {
                $('article[data-id="' + res + '"]').remove();
            }
        });
    });
});
