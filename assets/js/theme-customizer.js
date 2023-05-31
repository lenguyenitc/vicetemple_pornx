jQuery(function() {
    wp.customize( 'background_color', function(value) {
        value.bind( function(newval) {
            jQuery('body').css('background-color', newval);
        });
    } );
});
