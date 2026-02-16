$(document).ready(function() {
    if ("ontouchstart" in document.documentElement) {
        $("#ini-carousel").swiperight(function() {
            $(this).carousel('prev');
        });
        $("#ini-carousel").swipeleft(function() {
            $(this).carousel('next');
        });
    }
});