jQuery(document).ready(function($){
    var img_src = preview_reg_obj.form_logo;
    var show_logo = preview_reg_obj.show_form_logo;

    if(show_logo !== "false") {
        $('#registerform, #lostpasswordform, #loginform').prepend('<p id="form_logo" style="text-align: center;margin-bottom: 30px">' +
        '<img style="width: 100%" src="' + img_src + '"/></p>');
    }
});