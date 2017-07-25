jQuery(document).ready(function($){
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if(scroll > 1){
        $(".m-header").addClass("active");
    }
    else{
        $(".m-header").removeClass("active");
    }
});
});