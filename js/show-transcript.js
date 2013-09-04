(function ($) {
    "use strict";
    $(function () {
        $('.transcript-toggle').click(function() {
            $(this).toggleClass('active');
            $('#sht-show-transcript').slideToggle();
        });
    });
}(jQuery));