$(document).ready(function(){   
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 1) {
            $(".navbar").addClass("fixed-top");
        } else {
            $(".navbar").removeClass("fixed-top");
        }
    });
});

