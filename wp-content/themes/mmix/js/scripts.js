jQuery(document).ready(function($) {

    $(".fancybox").fancybox({
        padding    : 0,
        margin     : 15,
        fitToView: true,
        loop : false
    });


    //window height
    var vh = $( window ).height();
    $('.sub_page_container').css('min-height', vh);
    $('.sub_page_content').css('min-height', vh);

    /**
     * Scroll to any element (sariha 2014)
     * @param selector
     * @param time
     * @param verticalOffset
     */
    function scrollToElement(selector, time, verticalOffset) {
        time = typeof(time) != 'undefined' ? time : 1000;
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $(selector);
        offset = element.offset();
        offsetTop = offset.top + verticalOffset;

        $('html, body').animate({
            scrollTop: offsetTop
        }, time);
    }

    $('#main-nav a').live('click', function(){
        scrollToElement($(this).attr('href'));
    })

});