jQuery(document).ready(function($) {
    let flag = false;
    if(window.innerWidth >= 992) {
        $('div#favorite-content').height($('div#content').height() + 40);
    }

    window.addEventListener("orientationchange", function() {
            $('#favorite-content').css('height', 'auto');
            flag =  true;
    }, false);

    $(window).on('resize', function() {
        if (!flag) {
            $('#favorite-content').css('height', 'auto');
        }
    });
});



















































