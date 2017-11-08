jQuery(document).ready(function($){
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if(scroll > 123){
        $(".m-header, #n-search").addClass("active");
        $(".m-header").removeClass("m-h--wrapper-nofixed");
        $(".m-header").css({"top":"-123px"});
    }
    else{
        $(".m-header, #n-search").removeClass("active");
        $(".m-header").addClass("m-h--wrapper-nofixed");
        $(".m-header").css({"top":""});
    }
});
});