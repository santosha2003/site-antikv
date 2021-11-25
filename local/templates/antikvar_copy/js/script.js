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

    $("#mycarousel li").not('.one_photo').click(function(){
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

// ������ fancybox �� ��� ������-��������
$(function(){
    var image_link_reg = /^(.*)\.jpg$|\.png$|\.jpeg$/;
    var link_arr = $('a');

    link_arr.each(function(){
        if(image_link_reg.test(this.href)){
            if(!$(this).attr('data-fancybox') && $(this).attr('rel')){
                $(this).attr('data-fancybox', $(this).attr('rel'));
            } else if(!$(this).attr('data-fancybox') && !$(this).attr('rel')){
                $(this).fancybox({
                    'titleShow': false,
                    'type': "image"
                });
            }

            /*if(!$(this).hasClass('fancy')){
                $(this).fancybox({
                    'titleShow': false,
                    'type': "image"
                });
            }*/
        }
    })
});
$('a.gallery1').fancybox({
    afterShow: function () {
                // вначале картинка маленькая - назначим курсор zoom-in
                $("img.fancybox-image").css('cursor', 'zoom-in');
                // уменьшим области листания, чтоб не мешали нашему курсору
                $(".fancybox-nav").css('width', '15%');
                $("img.fancybox-image").click(function () {
                  var h = $(this).height();
                  var w = $(this).width();
                  if ($(this).hasClass('enlarged')) {
                    // картинка уже увеличена. уменьшить в два раза. или не в два?  
                    h = Math.round(h / 2); w = Math.round(w/2);
                    $(this).removeClass('enlarged');
                    $(this).css('cursor', 'zoom-in');
                  } else {
                    // еще не увеличена. увеличить в два раза. 
                    h = h*2; w = w*2;
                    $(this).addClass('enlarged');
                    $(this).css('max-height', h + 'px');
                    $(this).css('cursor', 'zoom-out');
                  }
                  // меняем размеры картинки
                  $(this).css('width', w + 'px');
                  $(this).css('height', h + 'px');
                  $(this).css('max-width', w + 'px');
                  $(this).css('max-height', h + 'px');
                  // меняем размеры окна fancybox
                  $('div.fancybox-wrap').css('width', w + 30 + 'px');
                  $('div.fancybox-wrap').css('height', h + 30 + 'px');
                  $('div.fancybox-skin').css('height', h + 'px');
                  // двигаем fancybox так, чтоб он оставался по центру
                  $('div.fancybox-wrap').css('left', Math.round(($(document).width()-w)/2));
                });
    }
});

// Make ajax visit from Site to Forum for statistics
jQuery(document).ready(function($) {
    // mark with cookie ajax forum visit
    var forumVisitedCookie = 'phpbb3_forumVisited';
    // forum visit cookie cache time
    var cacheHours = 4;

    if (typeof Cookies.get(forumVisitedCookie) === 'undefined') {
        jQuery.ajax({
            url: "/forum/ajax_visit.php",
            method: "GET",
            cache: false,
            complete: function(jqXHR, textStatus) {
                let expireDate = new Date(new Date().getTime() + cacheHours * 60 * 60 * 1000);
                Cookies.set(forumVisitedCookie, 1, { expires: expireDate });
            },
        });
    }
});
