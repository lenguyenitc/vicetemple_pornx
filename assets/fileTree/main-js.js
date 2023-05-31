jQuery(document).ready(function ($) {

    /****admin****/
    sessionStorage.removeItem('all_check');
    var flag = false;
    $('li.li_name').on('click', function () {
        var name = $(this).attr('data-name');
        if(false === flag) {
            $('ol.album[data-name='+name+']').css('display', 'block');
            flag = true;
        } else {
            $('ol.album[data-name='+name+']').css('display', 'none');
            flag = false;
        }
    });

    /****show photos from checked album****/
    $(document).on('click', '.album_name', function (){
        $('li.album_name').removeClass('active');
        $(this).addClass('active');
        $('#photos div').remove();
        var album = $(this).attr('id');
        $('span#album_name').text(album);
        $('h5#location').text(album);
        var folder = $(this).attr('data-folder');
        var main_path = jstree_obj.path;
        $('#delete_folder').attr('data-delete', main_path + '/' + folder + '/' + album);
        $('#delete_folder').attr('data-album-name', album);
        $.ajax({
            type: "post",
            url: jstree_obj.url,
            data: {
                action: 'ARC_get_foto_from_album',
                nonce: jstree_obj.nonce,
                addr: main_path + '/' + folder + '/' + album
            },
            success: function (res) {
                if(res.length != 0) {
                    for(var i = 0; i< res.length; i++) {
                        $('#photos').append('<div class="img_item" data-id="'+main_path + '/' + folder + '/' + album + '/' + res[i] + '">' +
                            '<p><input type="checkbox" class="check_img" value="'+main_path + '/' + folder + '/' + album + '/' + res[i] + '"/>' +
                            '<i style="font-size: 20px; color: red; float: right; cursor: pointer;" class="fa fa-close delete_one_foto" data-delete="'+main_path + '/' + folder + '/' + album + '/' + res[i] + '"></i></p>' +
                            '<img src="' + main_path + '/' + folder + '/' + album + '/' + res[i] + '" />' +
                            '</div>');
                    }
                } else {
                    $('#photos').append('<div class="img_item">No photos found</div>');
                }

            }
        });
    });

    /****delete one photo****/
    $(document).on('click', 'i.delete_one_foto', function (){
        var file_path = $(this).attr('data-delete');
        $.ajax({
            type: "post",
            url: jstree_obj.url,
            data: {
                action: 'ARC_delete_one_foto_from_album',
                nonce: jstree_obj.nonce,
                addr: file_path
            },
            success: function (res) {
                $('div.img_item[data-id="' + res + '"]').remove();
            }
        });
    });  /****check/uncheck all photos****/

    /**uncheck all photos****/
    var checked = false;
    var all_check;
    $(document).on('click', '#select_images', function(){
        if(false === checked) {
            $('input.check_img').prop('checked', true);
            checked = true;
            all_check = getCheckedCheckBoxes();
            sessionStorage.setItem('all_check', JSON.stringify(all_check));
        } else {
            $('input.check_img').prop('checked', false);
            checked = false;
        }
    });

    $(document).on('click', 'input.check_img', function(){
        all_check = getCheckedCheckBoxes();
        sessionStorage.setItem('all_check', JSON.stringify(all_check));
    });
    function getCheckedCheckBoxes() {
        var checkboxes = document.getElementsByClassName('check_img');
        var checkboxesChecked = [];
        for (var index = 0; index < checkboxes.length; index++) {
            if (checkboxes[index].checked) {
                checkboxesChecked.push(checkboxes[index].value);
            }
        }
        return checkboxesChecked;
    }
    /**end uncheck all photos****/

    /****delete all photos****/
    $('#delete_images').on('click', function (){
        var photos = sessionStorage.getItem('all_check');
        if(photos !== null) {
            $.ajax({
                type: "post",
                url: jstree_obj.url,
                data: {
                    action: 'ARC_delete_all_fotos_from_album',
                    nonce: jstree_obj.nonce,
                    addr: photos
                },
                success: function (res) {
                    for(var i = 0; i < res.length; i++) {
                        $('div.img_item[data-id="' + res[i] + '"]').remove();
                    }
                    sessionStorage.removeItem('all_check');
                }
            });
        }
    });


    /****delete album****/
    $('#delete_folder').on('click', function (){
       var data_delete = $(this).attr('data-delete');
       var data_name = $(this).attr('data-album-name');
        $.ajax({
            type: "post",
            url: jstree_obj.url,
            data: {
                action: 'ARC_delete_album',
                nonce: jstree_obj.nonce,
                addr: data_delete,
                name: data_name
            },
            success: function (res) {
                $('#photos div').remove();
                $('li[id="' + res + '"]').remove();
                $('span#album_name').text('');
                $('h5#location').text('');
                $('#delete_folder').removeAttr('data-delete').removeAttr('data-album-name');
            }
        });
    });
});
