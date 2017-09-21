jQuery(document).ready(function($){
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if(scroll > 123){
        $(".m-header, #search").addClass("active");
        $(".m-header").removeClass("m-h--wrapper-nofixed");
        $(".m-header").css({"top":"-123px"});
    }
    else{
        $(".m-header, #search").removeClass("active");
        $(".m-header").addClass("m-h--wrapper-nofixed");
        $(".m-header").css({"top":""});
    }
});
});