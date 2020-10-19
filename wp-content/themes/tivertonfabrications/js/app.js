jQuery( document ).ready( function( $ ) {

    $('.header.with-sticky').stickybits({useStickyClasses: true});


    $('.nav__sub-nav__link').on('click', function(e) {

        e.preventDefault();

        var clicked = $(this);

        var relativeSubMenu = clicked.parent().next();

        relativeSubMenu.addClass('active');

    });


    $('.nav__sub-nav__back-link').on('click', function(e) {

        e.preventDefault();

        var clicked = $(this);

        var relativeSubMenu = clicked.parent().parent();

        relativeSubMenu.removeClass('active');

    });

});