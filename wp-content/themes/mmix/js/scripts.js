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

});