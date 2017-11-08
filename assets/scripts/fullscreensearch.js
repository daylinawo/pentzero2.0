jQuery(document).ready(function($){
    $('.navbar-nav__search__icon').on('click', function(event) {
        event.preventDefault();
        $('#n-search').addClass('open');
        $('.navbar-nav__search__icon').addClass('hidden');
        $('.navbar-nav__search__close-icon').removeClass('hidden');
    });
    $('.navbar-nav__search__close-icon').on('click', function(event) {
        event.preventDefault();
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $('#n-search').removeClass('open');
            $('.navbar-nav__search__icon').removeClass('hidden');
            $('.navbar-nav__search__close-icon').addClass('hidden');
        }
    });
});