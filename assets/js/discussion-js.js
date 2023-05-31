jQuery(document).ready(function ($){
    $('fieldset label[for="comment_order"]').after('<br><p>Minimum characters required for comments is ' +
        '<input id="min_required_characters" name="min_required_characters" type="number" min="5" style="width: 65px" value="'+discussion_obj.minRequiredCharacters+'" /></p>');


    $(document).on('change', '#min_required_characters', function () {
       var min = $(this).val();
        $.ajax({
            type: "post",
            url: discussion_obj.url,
            data: {
                action: 'set_min_required_characters',
                nonce: discussion_obj.nonce,
                min: min
            },
            success: function (res) {
            }
        });
    });
});