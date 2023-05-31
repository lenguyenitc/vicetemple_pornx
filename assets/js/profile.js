jQuery(document).ready(function($) {
    /****choices multiply select***/
    /*{
        var choices1 = new Choices('#languages', {
            items: [],
            choices: [],
            maxItemCount: -1,
            addItems: true,
            removeItems: true,
            removeItemButton: true,
            editItems: false,
            duplicateItems: false,
            delimiter: ',',
            paste: true,
            search: true,
            searchFloor: 1,
            position: 'auto',
            resetScrollPosition: true,
            regexFilter: null,
            shouldSort: true,
            /!*sortFilter: () => {...},*!/
            sortFields: ['label', 'value'],
            placeholder: true,
            placeholderValue: null,
            prependValue: null,
            appendValue: null,
            loadingText: 'Loading...',
            noResultsText: 'No results found',
            noChoicesText: 'No choices to choose from',
            itemSelectText: 'Press to select',
            addItemText: (value) => {
                return `Press Enter to add <b>"${value}"</b>`;
            },
            maxItemText: (maxItemCount) => {
                return `Only ${maxItemCount} values can be added.`;
            },
            classNames: {
                containerOuter: 'choices lang',
                containerInner: 'choices__inner',
                input: 'choices__input',
                inputCloned: 'choices__input--cloned',
                list: 'choices__list',
                listItems: 'choices__list--multiple',
                listSingle: 'choices__list--single',
                listDropdown: 'choices__list--dropdown',
                item: 'choices__item',
                itemSelectable: 'choices__item--selectable',
                itemDisabled: 'choices__item--disabled',
                itemChoice: 'choices__item--choice',
                group: 'choices__group',
                groupHeading : 'choices__heading',
                button: 'choices__button',
                activeState: 'is-active',
                focusState: 'is-focused',
                openState: 'is-open',
                disabledState: 'is-disabled',
                highlightedState: 'is-highlighted',
                hiddenState: 'is-hidden',
                flippedState: 'is-flipped',
                loadingState: 'is-loading',
            },
            // Choices uses the great Fuse library for searching. You
            // can find more options here: https://github.com/krisk/Fuse#options
            fuseOptions: {
                include: 'score',
            },
            callbackOnInit: null,
            callbackOnCreateTemplates: null,
        });
        //fetishes multi select
        var choices2 = new Choices('#fetishes', {
            items: [],
            choices: [],
            maxItemCount: -1,
            addItems: true,
            removeItems: true,
            removeItemButton: true,
            editItems: false,
            duplicateItems: false,
            delimiter: ',',
            paste: true,
            search: true,
            searchFloor: 1,
            position: 'auto',
            resetScrollPosition: true,
            regexFilter: null,
            shouldSort: true,
            /!*sortFilter: () => {...},*!/
            sortFields: ['label', 'value'],
            placeholder: true,
            placeholderValue: null,
            prependValue: null,
            appendValue: null,
            loadingText: 'Loading...',
            noResultsText: 'No results found',
            noChoicesText: 'No choices to choose from',
            itemSelectText: 'Press to select',
            addItemText: (value) => {
                return `Press Enter to add <b>"${value}"</b>`;
            },
            maxItemText: (maxItemCount) => {
                return `Only ${maxItemCount} values can be added.`;
            },
            classNames: {
                containerOuter: 'choices fet',
                containerInner: 'choices__inner',
                input: 'choices__input',
                inputCloned: 'choices__input--cloned',
                list: 'choices__list',
                listItems: 'choices__list--multiple',
                listSingle: 'choices__list--single',
                listDropdown: 'choices__list--dropdown',
                item: 'choices__item',
                itemSelectable: 'choices__item--selectable',
                itemDisabled: 'choices__item--disabled',
                itemChoice: 'choices__item--choice',
                group: 'choices__group',
                groupHeading : 'choices__heading',
                button: 'choices__button',
                activeState: 'is-active',
                focusState: 'is-focused',
                openState: 'is-open',
                disabledState: 'is-disabled',
                highlightedState: 'is-highlighted',
                hiddenState: 'is-hidden',
                flippedState: 'is-flipped',
                loadingState: 'is-loading',
            },
            // Choices uses the great Fuse library for searching. You
            // can find more options here: https://github.com/krisk/Fuse#options
            fuseOptions: {
                include: 'score',
            },
            callbackOnInit: null,
            callbackOnCreateTemplates: null,
        });
    }*//**** end choices multiply select***/

    /****crop photo profile****/
    {
        $('#video_file_upload2 #btn2').on('click', () => {
            $('input#file-input-profile').trigger('click');
        });
        // vars
        let result_profile = document.querySelector('.result_profile'),
            img_result_profile = document.querySelector('.img-result_profile'),
            options_profile = document.querySelector('.options_profile'),
            save_profile = document.querySelector('.save-profile'),
            cropped_profile = document.querySelector('.cropped_profile'),
            upload_profile = document.querySelector('#file-input-profile'),
            cropper_profile = '';

        // on change show image with crop options
        upload_profile.addEventListener('change', (e) => {
            $('.crop-profile').css('display', 'block');
            if (e.target.files.length) {
                var file_name = e.target.files[0].name.replace(/\\/g, '/').replace(/.*\//, '')
                $('div#upload_text2 p').text(file_name);
                // start file reader
                const reader = new FileReader();
                reader.onload = (e)=> {
                    if(e.target.result){
                        // create new image
                        let img2 = document.createElement('img');
                        img2.id = 'image2';
                        img2.src = e.target.result
                        // clean result before
                        result_profile.innerHTML = '';
                        // append new image
                        result_profile.appendChild(img2);
                        // show save btn and options
                        save_profile.classList.remove('hide');
                        options_profile.classList.remove('hide');
                        // init cropper
                        cropper_profile = new Cropper(img2);
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // save on click
        save_profile.addEventListener('click',(e)=>{
            e.preventDefault();
            // get result to data uri
            let imgSrc2 = cropper_profile.getCroppedCanvas({
                width: 206, // input value
                height: 206 // input value
            }).toDataURL();
            $.ajax({
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_profile_image',
                    nonce: arc_ajax_var.nonce,
                    img: imgSrc2
                },
                type: 'POST',
                success: function (res) {
                    $('.crop-profile').css('display', 'none');
                    $('#file-input-profile').val('');
                }
            });
            // remove hide class of img
            cropped_profile.classList.remove('hide');
            img_result_profile.classList.remove('hide');
            // show image cropped
            cropped_profile.src = imgSrc2;
        });

    }/**** end crop photo profile****/



    /**** crop background profile ****/
    {
        $('#video_file_upload #btn').on('click', () => {
            $('input#file-input-back').trigger('click');
        });
        // vars
        let result = document.querySelector('.result'),
            img_result = document.querySelector('.img-result'),
            options = document.querySelector('.options'),
            save = document.querySelector('.save-back'),
            cropped = document.querySelector('.cropped'),
            upload = document.querySelector('#file-input-back'),
            cropper = '';

        // on change show image with crop options
        upload.addEventListener('change', (e) => {
            $('.crop-back').css('display', 'block');
            if (e.target.files.length) {
                var file_name = e.target.files[0].name.replace(/\\/g, '/').replace(/.*\//, '')
                $('div#upload_text p').text(file_name);
                // start file reader
                const reader = new FileReader();
                reader.onload = (e)=> {
                    if(e.target.result){
                        // create new image
                        let img3 = document.createElement('img');
                        img3.id = 'image3';
                        img3.src = e.target.result
                        // clean result before
                        result.innerHTML = '';
                        // append new image
                        result.appendChild(img3);
                        // show save btn and options
                        save.classList.remove('hide');
                        options.classList.remove('hide');
                        // init cropper
                        cropper = new Cropper(img3);
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // save on click
        save.addEventListener('click',(e)=>{
            e.preventDefault();
            // get result to data uri
            let imgSrc3 = cropper.getCroppedCanvas({
                width: 1552, // input value
                //height: img_h.value // input value
            }).toDataURL('image/jpeg');
            //console.log(imgSrc3);
            $.ajax({
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_profile_back',
                    nonce: arc_ajax_var.nonce,
                    img2: imgSrc3
                },
                type: 'POST',
                success: function (res) {
                    //console.log(res);
                    //console.log(imgSrc3);
                    $('.crop-back').css('display', 'none');
                    $('#file-input-back').val('');
                }
            });
            // remove hide class of img
            cropped.classList.remove('hide');
            img_result.classList.remove('hide');
            // show image cropped
            cropped.src = imgSrc3;
        });
    }
    /**** end crop background profile ****/



    /****save languages****/
    /*var items_lang;
    $(document).on('change', 'div.lang',function () {
        items_lang = [];
        $("select#languages option").each(function(ind, el) {
            items_lang[ind] = $(el).val();
        });
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_save_multiselect_lang',
                nonce: arc_ajax_var.nonce,
                items: items_lang,
            },
            success: function (res) {
            }
        });
    });*//**** end save languages****/

    /****save fetishes****/
    /*var items_fetish;
    $(document).on('change', 'div.fet',function () {
        items_fetish = [];
        $("select#fetishes option").each(function(ind, el) {
            items_fetish[ind] = $(el).val();
        });
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_save_multiselect_fetish',
                nonce: arc_ajax_var.nonce,
                items: items_fetish,
            },
            success: function (res) {
            }
        });
    });*//**** end save fetishes****/

    /****show email in public profile****/
    $('#show_email, #show_subs, #show_views, #video_submission, #album_submission, #post_submission, #video_published, #show_phone').checkboxradio();

    /***show subs and views****/
    $('#show_email').on('change', function (){
        if($("#show_email:checked").val() == 'on') {
            $.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_setting_for_email',
                    nonce: arc_ajax_var.nonce,
                    show_email: 'on',
                },
                success: function () {
                    $('#show_email').attr('checked', 'checked').val('on');
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_setting_for_email',
                    nonce: arc_ajax_var.nonce,
                    show_email: 'off',
                },
                success: function () {
                    $('#show_email').attr('checked', '').val('off');
                }
            });
        }
    });

    $('#show_phone').on('change', function (){
        if($("#show_phone:checked").val() == 'on') {
            $.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_setting_for_phone',
                    nonce: arc_ajax_var.nonce,
                    show_phone: 'on',
                },
                success: function () {
                    $('#show_email').attr('checked', 'checked').val('on');
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: arc_ajax_var.url,
                data: {
                    action: 'ARC_save_setting_for_phone',
                    nonce: arc_ajax_var.nonce,
                    show_phone: 'off',
                },
                success: function () {
                    $('#show_email').attr('checked', '').val('off');
                }
            });
        }
    });

    /*****send emails****/
    $('#video_submission, #album_submission, #post_submission, #video_published').on('change', function (){
        var data_action = $(this).attr('data-action');
        var val = $(this).prop("checked") ? 'on' : 'off';
        //console.log(val);
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_save_setting_for_email_preferences',
                nonce: arc_ajax_var.nonce,
                data_action: data_action,
                what_show: val

            },
            success: function (res) {
                //console.log(res);
                //$('#show_email').attr('checked', 'checked').val('on');
            }
        });
    });

    $('#show_subs, #show_views').on('change', function (){
        var data_action = $(this).attr('data-action');
        var what_show = $(this).prop('checked') ? 'on' : 'off';
        $.ajax({
            type: "post",
            url: arc_ajax_var.url,
            data: {
                action: 'ARC_save_setting_for_subscribers_and_views',
                nonce: arc_ajax_var.nonce,
                data_action: data_action,
                what_show: what_show

            },
            success: function (res) {
                //console.log(res);
                //$('#show_email').attr('checked', 'checked').val('on');
            }
        });
    });
});