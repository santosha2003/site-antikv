$(document).ready(function () {
    transportForumLink();
    $(window).on('resize', function () {
        transportForumLink();
    });

    $('.list-advice-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('#mycarousel').slick({
        dots: false,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        verticalSwiping: true,
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 574,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    vertical: false
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    vertical: false
                }
            }
        ]
    });

    $("a.fancy").fancybox({
        'titleShow': false,
        'type': "image"
    });

    $(".kabinet").hover(
        function () {
            $(".authDown").slideDown("fast");
        },
        function () {
            $(".authDown").slideUp("fast");
    });

    $("#mycarousel li").click(function(){
        var id = $(this).attr("data-id-photo-thumb");
        $(".bigFOTO a.fancy.active").removeClass('active');
        $(".bigFOTO a.fancy[data-id-photo="+id+"]").addClass('active');

        $("#mycarousel li span").removeClass("active");
        $("#mycarousel li > div").removeClass("active");

        $("> div", $(this)).addClass("active");
        $("span", $(this)).addClass("active");
    });

});

function transportForumLink() {

    var forumlink = $('li.forum');
    var menu = $('.header-menu > ul');
    var widthWindow = window.innerWidth;
    var diff = 25;

    if (widthWindow > 991) {
        if (menu.outerWidth(true) + forumlink.outerWidth(true) > (widthWindow - ((widthWindow - menu.outerWidth(true)) / 2))) {
            diff = menu.outerWidth(true) + forumlink.outerWidth(true) - (widthWindow - ((widthWindow - menu.outerWidth(true)) / 2));
        }
        if (diff > 0) {

            menu.css({
                "width": "calc(100% - " + (40 + diff) + "px)",
                "padding": "0 " + (15 + diff) + "px 0 25px",
            });

        }
    } else {
        menu.css({
            "width": "calc(100% - " + (25 + diff) + "px)",
            "padding": "0 " + (diff) + "px 0 25px",
        });
    }

}

$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});

// Вешаем fancybox на все ссылки-картинки
$(function(){
    var image_link_reg = /^(.*)\.jpg$|\.png$|\.jpeg$/;
    var link_arr = $('a');

    link_arr.each(function(){
        if(image_link_reg.test(this.href)){
            if(!$(this).hasClass('fancy')){
                $(this).fancybox({
                    'titleShow': false,
                    'type': "image"
                });
            }
        }
    })
});