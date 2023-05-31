jQuery(document).ready(function($) {
    var link = '';
    var aStyle = '';
    var agreeBtn = '';
    if(cookie_obj.privacyLink !== null) {
        link = cookie_obj.privacyLink;
        aStyle = 'style="display: inline"';
    } else {
        link = '#';
        aStyle = 'style="display: none"';
    }
    if(cookie_obj.agreeBtnPos == 'fixed') {
        agreeBtn = 'style="position: absolute;right: 60px;"';
    } else if(cookie_obj.agreeBtnPos == 'afterText'){
        agreeBtn = 'style="position: relative;right: 0;"';
    } else agreeBtn = 'style="position: absolute;right: 60px;"';
    if(cookie_obj.agreeBtnPos == 'fixed' && cookie_obj.cookiePos == 'rightPos') {
        agreeBtn = 'style="position: inherit !important;right: 60px;"';
    }
    $('body').append('<div id="cookie-notice" class="cookie ' + cookie_obj.cookiePos + '">' +
        '<div class="cookie-notice-container" style="display: inline-flex;padding-left: 62px;flex-wrap: wrap;">' + cookie_obj.cookieText  +
        '<p id="cn-notice-buttons" class="cn-buttons-container">' +
        '<a href="' + link + '" target="_blank" id="cn-more-info" '+ aStyle +'>'+ cookie_obj.privacyText +'</a>' +
        '<a href="#" id="cn-accept-cookie" class="button" ' + agreeBtn + '>'+ cookie_obj.btnText +'</a>' +
        '</p>' +
        '<span aria-hidden="true" class="closeCookie"><svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">' +
        '<line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>' +
        '<line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>' +
        '</svg></span>' +
        '</div>' +
        '</div>');
});