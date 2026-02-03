$(function() {
    $(document).ready(function() {
        var headerImages = $('#top-image img');
        if (headerImages.length > 1) {
            var images = new Array();
            for (var i = 0; i < headerImages.length; i++) {
                var img = $(headerImages[i]);
                images.push(img);
                if (i != 0) {
                    img.css({opacity: 0});
                }
            }
            var currentIndex = 0;
            setTimeout( function() {
                fadeOver();
            }, 3000);
            function fadeOver() {

                var nextIndex = currentIndex + 1 >= images.length ? 0 : currentIndex + 1;

                images[currentIndex].animate({
                    opacity: 0
                }, 10000, function() {
                });
                images[nextIndex].animate({
                    opacity: 1
                }, 10000, function() {
                    currentIndex = nextIndex;
                    fadeOver();
                });
            }
        }
    });
});
