jQuery(document).ready(function($){
    /****button outside order****/
    $('#posts-filter div.tablenav.top div.tablenav-pages').prepend('<a id="save_all_paypal_orders" style="font-size: 16px;margin-right: 10px" href="/backend/?paypal_orders=save" class="button button-primary">Save as PDF</a>');

    /****button inside order****/
    var postID = $('#post_ID').val();
    $('div#wp-content-media-buttons').append('<a id="save_paypal_order" style="font-size: 13px;margin-right: 10px" href="/backend/?paypal_order_id='+ postID+'" class="button button-primary">Save as PDF</a>');

});