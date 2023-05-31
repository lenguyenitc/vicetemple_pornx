jQuery(document).ready(function($) {
    let flag = false;
    if(window.innerWidth >= 992) {
        $('div#watchlist-content').height($('div#content').height() + 40);
    }

    window.addEventListener("orientationchange", function() {
        $('#watchlist-content').css('height', 'auto');
        flag =  true;
    }, false);

    $(window).on('resize', function() {
        if (!flag) {
            $('#watchlist-content').css('height', 'auto');
        }
    });

});