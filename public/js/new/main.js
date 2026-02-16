// jQuery(function($) {'use strict',
//     //Pretty Photo
//     $("a[data-gallery^='prettyPhoto']").prettyPhoto({
//         social_tools: false
//     });
// });

jQuery(window).on(function() {
    'use strict';
    //TESTIMONIES height
    if ($(window).width() < 480) {
        var divHeight = $('#fixed-height').height();
        divHeight = divHeight + 30;
        $('#fixed-height').css('height', divHeight + 'px');
    }
});

$(document).click(function (event) {
    var clickover = $(event.target);
    var $navbar = $(".navbar-collapse");
    var _opened = $navbar.hasClass("in");
    if (_opened === true && !clickover.hasClass("navbar-toggle")) {
        $navbar.collapse('hide');
    }
});

$(document).ready(function() {
    if ("ontouchstart" in document.documentElement) {
        if ($(window).width() < 768) {
            $(".carousel-control").css('display','none');
        }
    }
});

// jQuery(window).load(function(){'use strict';
//     $(".preloader").delay(1600).fadeOut("slow").remove();
// });

$('.modal').on('hidden.bs.modal', function () {
    if ("ontouchstart" in document.documentElement) {
        $('body').css({overflow: 'auto'});
    }
});

$('.navbar .dropdown_big_screen').hover(function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});

//
// $('.dropdown_small_screen').on('show.bs.dropdown', function() {
//     $(this).find('.dropdown_menu_small').first().stop(true, true).slideDown();
// });
//
// $('.dropdown_small_screen').on('hide.bs.dropdown', function() {
//     $(this).find('.dropdown_menu_small').first().stop(true, true).slideUp();
// });

