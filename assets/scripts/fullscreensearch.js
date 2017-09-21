jQuery(document).ready(function($){
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('.navbar-nav__search__icon').addClass('hidden');
        $('.navbar-nav__search__close-icon').removeClass('hidden');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('.navbar-nav__search__close-icon').on('click', function(event) {
        event.preventDefault();
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $('#search').removeClass('open');
            $('.navbar-nav__search__icon').removeClass('hidden');
            $('.navbar-nav__search__close-icon').addClass('hidden');
        }
    });
    
    $('form').submit(function(event) {
        event.preventDefault();
        return false;
    })
});