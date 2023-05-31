jQuery(document).ready(function($) {
    var firstHeading = (disc_obj.firstHeading !== "") ? disc_obj.firstHeading : 'Are you 18 or older?';
    var firstDesc = (disc_obj.firstDesc !== "") ? disc_obj.firstDesc : 'You must verify that you are 18 years of age or older to enter this site.';
    var yesBtn = (disc_obj.yesBtn !== "") ? disc_obj.yesBtn : 'YES';
    var noBtn = (disc_obj.noBtn !== "") ? disc_obj.noBtn : 'NO';

    var firstHeadingNope = (disc_obj.firstHeadingNope !== "") ? disc_obj.firstHeadingNope : 'We\'re sorry!';
    var secondHeadingNope = (disc_obj.secondHeadingNope !== "") ? disc_obj.secondHeadingNope : 'I HIT THE WRONG BUTTON!';
    var descNope = (disc_obj.descNope !== "") ? disc_obj.descNope : 'You must be 18 years of age or older to enter this site.';
    var nopeBtn = (disc_obj.nopeBtn !== "") ? disc_obj.nopeBtn : 'I\'m old enough!';

    var redirectOn = (disc_obj.redirectOn !== "") ? disc_obj.redirectOn : '';
    /*!
    * Simple Age Verification (https://github.com/Herudea/age-verification))
    */
    var modal_content,
        modal_screen;

// Start Working ASAP.
    $(document).ready(function() {
        av_legality_check();
    });

    av_legality_check = function() {
        av_showmodal();
        // Make sure the prompt stays in the middle.
        $(window).on('resize', av_positionPrompt);
    };
    $('body .bx-wrapper').css('display', 'none');
    $('body div#cookie-notice').css('display', 'none');
    $('body #back-to-top').css('display', 'none');
    $('body #masthead').css('display', 'none');
    av_showmodal = function() {
        $('body').attr('data-rsssl', '1');
        $('body').prepend('<div id="some_div"></div>');
        $('body').removeClass('custom-background');
        $('body').wrapInner('<div id="dclm-blur" />');
        modal_screen = $('<div id="dclm_modal_screen"></div>');
        modal_content = $('<div id="dclm_modal_content" style="display:block"></div>');
        var modal_content_wrapper = $('<div id="dclm_modal_content_wrapper" class="content_wrapper"></div>');
        var modal_regret_wrapper = $('<div id="dclm_modal_regret_wrapper" class="content_wrapper" style="display:none;"></div>');

        // Logo content
        if(disc_obj.logoShow == '1' && disc_obj.logo !== ''){
            var content_logo = $('<div id="dclm-logo"><img src="' + disc_obj.logo + '" width="50%"></div>');
        }

        // Question Content
        var content_heading = $('<h2 id="first_heading">' + firstHeading +'</h2>');
        var content_buttons = $('<nav><ul><li><a href="#nothing" class="av_btn av_go" rel="yes" id="yes">' + yesBtn + '</a></li><li><a href="#nothing" class="av_btn av_no" rel="no" id="no">' + noBtn + '</a></li></nav>');
        var content_text = $('<div id="first_desc">' + firstDesc + '</div>');

        // Regret Content
        var regret_heading = $('<h2 id="first_heading_nope">' + firstHeadingNope + '</h2>');
        var regret_buttons = $('<nav id="nope_nav"><small id="second_heading_nope">' + secondHeadingNope + '</small><ul><li><a href="#nothing" class="av_btn av_go" rel="yes" id="nope">' + nopeBtn +'</a></li></ul></nav>');
        var regret_text = $('<div id="first_desc_nope">' + descNope + '</div>');

        modal_content_wrapper.append(content_logo, content_heading, content_buttons, content_text);
        modal_regret_wrapper.append(regret_heading, regret_buttons, regret_text);
        modal_content.append(modal_content_wrapper, modal_regret_wrapper);

        // Append the prompt to the end of the document
        $('body').append(modal_screen, modal_content);

        // Center the box
        av_positionPrompt();

        // Condition option administrator
        modal_content.find('a.av_btn').on('click', av_setCookie);
    };
    av_setCookie = function(e) {
        e.preventDefault();
        av_showRegret();
    };

    av_closeModal = function() {
        modal_content.fadeOut();
        modal_screen.fadeOut();
    };

    av_showRegret = function() {
        modal_screen.addClass('nope');
        modal_content.find('#dclm_modal_content_wrapper').hide();
        modal_content.find('#dclm_modal_regret_wrapper').show();
    };

    av_positionPrompt = function() {
        var top = ($(window).outerHeight() - $('#dclm_modal_content').outerHeight()) / 2;
        var left = ($(window).outerWidth() - $('#dclm_modal_content').outerWidth()) / 2;
        modal_content.css({
            'top': top,
            'left': left
        });
    };
});