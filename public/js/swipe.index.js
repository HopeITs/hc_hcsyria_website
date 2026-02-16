$(document).ready(function() {
    if ("ontouchstart" in document.documentElement) {
        $('.swipe-arrows').css('display','block');
        $(".home-pattern").swiperight(function() {
            $("#main-carousel").carousel('prev');
        });
        $(".home-pattern").swipeleft(function() {
            $("#main-carousel").carousel('next');
        });
        $("#projects-carousel").swiperight(function() {
            $(this).carousel('prev');
        });
        $("#projects-carousel").swipeleft(function() {
            $(this).carousel('next');
        });
        $("#testimonies-carousel").swiperight(function() {
            $(this).carousel('prev');
        });
        $("#testimonies-carousel").swipeleft(function() {
            $(this).carousel('next');
        });
        $(".touch-slide").swiperight(function() {
            $(this).carousel('prev');
        });
        $(".touch-slide").swipeleft(function() {
            $(this).carousel('next');
        });
        $("#swipe-to-close-0").on('swipeup',function() {
            $("#close-0").click();
        });
        $("#swipe-to-close-1").on('swipeup',function() {
            $("#close-1").click();
        });
        $("#swipe-to-close-2").on('swipeup',function() {
            $("#close-2").click();
        });
        $("#swipe-to-close-NF-0").on('swipeup',function() {
            $("#close-NF-0").click();
        });
        $("#swipe-to-close-NF-1").on('swipeup',function() {
            $("#close-NF-1").click();
        });
        $("#swipe-to-close-NF-2").on('swipeup',function() {
            $("#close-NF-2").click();
        });
        $(".btn-primary").click(function() {
            $('body').css({overflow: 'hidden'});
        });
    }
});
