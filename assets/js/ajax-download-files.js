jQuery(document).ready(function($){

    var exist_title = '';
    var exist_tags = '';
    $('#input_album').on('input', function(){
        if($(this).val().length > 0) {
            $(this).attr('required', false);
            exist_title = 'exist';
        }
        else {
            $(this).attr('required', true);
            exist_title = '';
        }
    });
    $('#tags').on('input', function(){
        if($(this).val().length > 0) {
            $(this).attr('required', false);
            exist_tags = 'exist';
        }
        else {
            $(this).attr('required', true);
            exist_tags = '';
        }
    });

    $("form.create_an_album button.large").on("click", function(e){
        if($('#array_photos').attr('required') == 'required' && exist_tags == 'exist' && exist_title == 'exist') {
            $('html, body').stop().animate({
                scrollTop: $('#browse_files').offset().top - 160
            }, 300);
            $('a#browse_files').trigger('mouseenter');
        }
    });

    $('a#browse_files').on('mouseenter', function(){
        $('div.tooltip').css('display', 'inline-block');
        $('span.tooltiptext').css({
            'visibility': 'visible',
            'opacity': 1
        });
    });
    $('a#browse_files').on('mouseleave', function(){
        $('div.tooltip').css('display', 'none');
        $('span.tooltiptext').css({
            'visibility': 'hidden',
            'opacity': 0
        });
    });

    var files;
    var dropbox;

    dropbox = document.getElementById("dropbox");
    dropbox.addEventListener("dragenter", dragenter, false);
    dropbox.addEventListener("dragover", dragover, false);
    dropbox.addEventListener("drop", drop, false);

    function dragenter(e) {
        e.stopPropagation();
        e.preventDefault();
    }
    function dragover(e) {
        e.stopPropagation();
        e.preventDefault();

    }
    function drop(e) {
        e.stopPropagation();
        e.preventDefault();

        var dt = e.dataTransfer;

        files = dt.files;
        if(files.length > 0) {
            $('#array_photos').attr('required',false);
            $('div.tooltip').css('display', 'none');
            $('span.tooltiptext').css({
                'visibility': 'hidden',
                'opacity': 0
            });
        }
        else $('#array_photos').attr('required',true);
        handleFiles(files);
    }

    $('#browse_files').click((e)=>{
        e.preventDefault();
        $('#array_photos').click();
    });

    $('#array_photos').on('change',function (){
        files = this.files;
        if(files.length > 0) {
            $(this).attr('required',false);
            $('div.tooltip').css('display', 'none');
            $('span.tooltiptext').css({
                'visibility': 'hidden',
                'opacity': 0
            });
        }
        else $(this).attr('required',true);
        handleFiles(this.files);
    });

    var my_files = [];
    /****display the files****/
    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            my_files.push(files[i]);
        }
        renderImages(my_files);
    }

    /**render images*/
    function renderImages(my_files, j) {
        $('#upload_photos_area li.img_item').remove();
        for (var i = 0; i < my_files.length; i++) {
            var file = my_files[i];

            if (!file.type.startsWith('image/')) {
                continue;
            }

            var reader = new FileReader();

            var li = document.createElement("li");
            li.classList.add("img_item");

            var img = document.createElement("img");
            img.classList.add("obj");
            img.file = file;

            $('#upload_photos_area').append(li);
            li.append(img);

            var p = document.createElement("p");
            p.classList.add("img_info_" + i);
            li.append(p);

            $('p.img_info_' + i).append('<span class="img_name" id="name_' + i + '"><span id="old_' + i + '"></span></span>' +
                '<span class="img_size" id="size_' + i + '"></span>' +
                '<span class="img_edit_delete" id="edit_' + i + '">' +
                '<i class="fa fa-edit"></i>' +
                '<i class="fa fa-close" data-img-name="' + file.name + '" ></i>' +
                '</span>');
            $('span#old_' + i).text(file.name).attr('data-old-name', file.name);
            $('span#name_' + i).append('<i class="fa fa-spinner fa-pulse"></i>');
            $('span#size_' + i).text(updateSize(file.size));

            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
        function updateSize(size) {
            var nBytes = size;
            var sOutput = nBytes + " bytes";
            // optional code for multiples approximation
            for (var aMultiples = ["kb", "mb", "gb"], nMultiple = 0, nApprox = nBytes / 1024; nApprox > 1; nApprox /= 1024, nMultiple++) {
                sOutput = nApprox.toFixed() + " " + aMultiples[nMultiple];
            }
            return sOutput;
        }
    }


    var ajaxurl = arc_ajax_var.url;
    var nonce   = arc_ajax_var.nonce;

    var get_img_name_for_delete = [];
    $(document).on('click', 'span.img_edit_delete i.fa-close', function() {
        var name = $(this).attr('data-img-name');
        var span = $(this).closest('span.img_edit_delete').attr('id').split('edit_')[1];
        get_img_name_for_delete.push(name);
        $('p.img_info_' + span).closest('li.img_item').css('display','none');
    });

    var arr_names = [];
    $(document).on('click', 'span.img_edit_delete i.fa-edit', function() {
        var id = $(this).closest('span.img_edit_delete').attr('id').split('edit_')[1];
        var old_name = $('#old_' + id).text();
        $('#old_' + id).html('<input style="height:30px;margin-bottom:0;width: 100%;display:inline-flex;margin-left: 5px;" type="text" id="new_name_'+id+'" value="'+old_name.split('.')[0]+'"/>');
        $('#edit_' + id).find('i.fa-edit').removeClass('fa-edit').addClass('fa-check').css('color', 'green').attr('data-input-id', id);
    });
    $(document).on('click', 'span.img_edit_delete i.fa-check', function () {
        var input_id = $(this).attr('data-input-id');
        var new_name = $('#new_name_'+ input_id).val();
        var old_name = $('#old_' + input_id).attr('data-old-name');

        if(new_name != '' && new_name != old_name) {
            arr_names[old_name] = new_name;
        }
        $(this).removeClass('fa-check').addClass('fa-edit');
        $('#new_name_'+input_id).css('display', 'none');
        $('#old_' + input_id).text(new_name);
        //console.log(arr_names);
    });


    var count = 0;
        $('form.create_an_album').on('submit', function( event ){
        //$('.large').on('submit', function( event ){
        // event.stopPropagation();
        // event.preventDefault();

        if (typeof files == 'undefined') return;

        var data = new FormData();
        var res = -1;
        $.each(my_files, function (key, value) {
            if (get_img_name_for_delete.indexOf(value.name) === res) {
                data.append(key, value);
            }
        });


        data.append('action', 'ajax_fileload');
        data.append('nonce', nonce);
        let pid_match = $(document.body).attr('class').match(/postid-([0-9]+)/);
        data.append('post_id', pid_match ? pid_match[1] : 0);
        data.append('photo_tags', $('#tags').val());
        data.append('photo_categories', $('#submit_select_category').val());
        var album = $('#input_album').val();
        if (album == '') {
            $('#input_album').focus();
            return false;
        }
        var string = '';
        for (var k in arr_names) {
            string += k + '~~' + arr_names[k] + '~|~';
        }
        //console.log(string);
        data.append('arr_names', string);
        data.append('album', album);
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('span.img_name i.fa-spinner.fa-pulse').css('display', 'inline-flex');
            },
            error: function (response) {
               // console.log(response);
            },
            success: function (respond, status, jqXHR) {
                if(respond.data == 'Files empty.' && respond.success === false) {
                    $('html, body').stop().animate({
                        scrollTop: $('#browse_files').offset().top - 160
                    }, 300);
                    $('a#browse_files').trigger('mouseenter');
                } else {
                    $('div.tooltip').css('display', 'none');
                    $('span.tooltiptext').css({
                        'visibility': 'hidden',
                        'opacity': 0
                    });
                    $('#upload_photos_area li').each(function () {
                        count++;
                    });
                    for (var j = 0; j <= count; j++) {
                        $('#upload_photos_area li:nth-child(' + j + ')').find('span.img_name').find('i.fa-spinner.fa-pulse').fadeOut(500);
                    }
                    my_files = [];
                    $('#input_album').val('');
                    $('#tags').val('');
                    setTimeout(function () {
                        $('#upload_photos_area li').remove();
                        $('#modalDelMsg3').show();
                        $('#modal-overlay-del3').css('z-index', '99999');
                    }, 1000);

                }
            },
        });
    //});
    });
        $('#modalDelMsg3 #close-button-del3').on('click', function (){
            $('#modalDelMsg3').hide();
            $('#modal-overlay-del3').css('z-index', '-1000');
            $('#array_photos').attr('required',true);
            $('#input_album').attr('required', true);
            $('#tags').attr('required', true);
            $('div.tooltip').css('display', 'none');
            $('span.tooltiptext').css({
                'visibility': 'hidden',
                'opacity': 0
            });
            exist_title = '';
            exist_tags = '';
         });
});