basic.init();
$(document).ready(function() {

});

$(window).on('load', function() {

});

$(window).on("load", function()   {
    if($('.homepage-container').length > 0) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('resize', function(){
    if($('.homepage-container').length > 0) {
        optionsDescriptionsEqualHeight();
        setLargeImages();
    }
});

$(window).on('scroll', function()  {
    homepageHowToBecomeDentacoinDentistBackgroundParallax();
});
setLargeImages();

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

function generateUrl(str)  {
    var str_arr = str.split("");
    var cyr = [
        'Ð°','Ð±','Ð²','Ð³','Ð´','Ðµ','Ñ‘','Ð¶','Ð·','Ð¸','Ð¹','Ðº','Ð»','Ð¼','Ð½','Ð¾','Ð¿',
        'Ñ€','Ñ','Ñ‚','Ñƒ','Ñ„','Ñ…','Ñ†','Ñ‡','Ñˆ','Ñ‰','ÑŠ','Ñ‹','ÑŒ','Ñ','ÑŽ','Ñ',
        'Ð','Ð‘','Ð’','Ð“','Ð”','Ð•','Ð','Ð–','Ð—','Ð˜','Ð™','Ðš','Ð›','Ðœ','Ð','Ðž','ÐŸ',
        'Ð ','Ð¡','Ð¢','Ð£','Ð¤','Ð¥','Ð¦','Ð§','Ð¨','Ð©','Ðª','Ð«','Ð¬','Ð­','Ð®','Ð¯',' '
    ];
    var lat = [
        'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
        'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
        'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
        'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya','-'
    ];
    for(var i = 0; i < str_arr.length; i+=1)  {
        for(var y = 0; y < cyr.length; y+=1)    {
            if(str_arr[i] == cyr[y])    {
                str_arr[i] = lat[y];
            }
        }
    }
    return str_arr.join("").toLowerCase();
}

//init cookie events only if exists
function checkIfCookie()    {
    if($('.privacy-policy-cookie').length > 0)  {
        $('.privacy-policy-cookie .accept').click(function()    {
            basic.cookies.set('privacy_policy', 1);
            $('.privacy-policy-cookie').hide();
        });
    }
}
checkIfCookie();

function initCaptchaRefreshEvent()  {
//refreshing captcha on trying to log in admin
    if($('.refresh-captcha').length > 0)    {
        $('.refresh-captcha').click(function()  {
            $.ajax({
                type: 'GET',
                url: '/refresh-captcha',
                dataType: 'json',
                success: function (response) {
                    $('.captcha-container span').html(response.captcha);
                }
            });
        });
    }
} 
initCaptchaRefreshEvent();

if($('.homepage-container').length > 0) {
    jQuery('.homepage-container .testimonials-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        adaptiveHeight: true
    });

    jQuery('.homepage-container .testimonials-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        var height = 0;
        for(var i = 0, len = 4; i < len; i+=1)  {
            if($('.slick-slide').eq((nextSlide + 4) + i).height() > height) {
                height = $('.slick-slide').eq((nextSlide + 4) + i).height();
            }
        }
        $('.homepage-container .slick-list').animate({height: height}, 500);
    });

    //logic for open application popup
    $('.single-application').click(function()   {
        var this_btn = $(this).find('.wrapper');
        var extra_html = '';
        if(this_btn.attr('data-articles') != undefined)    {
            extra_html+='<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><ul>';
            var articles_arr = $.parseJSON(this_btn.attr('data-articles'));
            for(var i = 0, len = articles_arr.length; i < len; i+=1)    {
                extra_html+='<li class="link"><a href="https://blog.dentacoin.com/'+articles_arr[i]['post_name']+'" target="_blank">'+articles_arr[i]['post_title']+'</a></li>';
            }
            extra_html+='</ul><div class="see-all"><a href="https://blog.dentacoin.com/" class="white-blue-rounded-btn" target="_blank">GO TO ALL</a></div></div>';
        }
        var description = this_btn.attr('data-description');
        if(description != '') {
            description = $.parseJSON(description);
        }
        var html = '<div class="container-fluid"><div class="row"><figure class="col-sm-6 gif"><img src="'+this_btn.attr('data-image')+'?'+new Date().getTime()+'" alt="'+this_btn.attr('data-image-alt')+'"/></figure><div class="col-sm-6 col-xs-12 content"><figure class="logo"><img src="'+this_btn.attr('data-popup-logo')+'" alt="'+this_btn.attr('data-popup-logo-alt')+'"/></figure><div class="title">'+this_btn.find('figcaption').html()+'</div><div class="description">'+description+'</div>'+extra_html+'</div></div></div>';
        basic.showDialog(html, 'application-popup', this_btn.attr('data-slug'));
    });
}

//make equal height for all descriptions in options section
function optionsDescriptionsEqualHeight() {
    var descriptions_height = 0;
    for(var i = 0, len = $('.options .description').length; i < len; i+=1)  {
        if($('.options .description').eq(i).outerHeight() > descriptions_height) {
            descriptions_height = $('.options .description').eq(i).outerHeight();
        }
    }
    $('.options .description').outerHeight(descriptions_height);
}

//homepage parallax background
function homepageHowToBecomeDentacoinDentistBackgroundParallax() {
    if($('section.how-to-become-dentacoin-dentist').isInViewport() && !basic.isMobile()) {
        var current = $(window).scrollTop();
        var start = $('section.how-to-become-dentacoin-dentist').offset().top - $('section.how-to-become-dentacoin-dentist').outerHeight();
        var max = $('section.how-to-become-dentacoin-dentist').offset().top;

        var percentage = (((current - start) / (max - start)) * 100) / 2 + 30;
        if(percentage > 0 && percentage < 100) {
            $('section.how-to-become-dentacoin-dentist').css({'background-position' : 'center ' + (100 - percentage) + '%'});
        }
        //$('.stella-artois-and-wimbledon .custom-widget').eq(i).css({'top' : (10 + 50 * (percentage / 100)) + '%'});
    }
}

//external generated form
if($('.show-external-form-button').length > 0) {
    $('.show-external-form-button').click(function() {
        $('.hidden-external-form').addClass('visible');
        $('body').addClass('overflow-hidden');
    });

    $('.hidden-external-form .close-btn').click(function()    {
        $('.hidden-external-form').removeClass('visible');
        $('body').removeClass('overflow-hidden');
    });
}

//change images src on different resolutions (only the ones with data attributes for this)
function setLargeImages() {
    if($('img[data-large-screen-src]').length > 0) {
        $('body').addClass('overflow-hidden');
        if($(window).width() > 1400) {
            for(var i = 0, len = $('img[data-large-screen-src]').length; i < len; i+=1) {
                $('img[data-large-screen-src]').eq(i).attr('src', $('img[data-large-screen-src]').attr('data-large-screen-src'));
            }
        }else {
            for(var i = 0, len = $('img[data-large-screen-src]').length; i < len; i+=1) {
                $('img[data-large-screen-src]').eq(i).attr('src', $('img[data-large-screen-src]').attr('data-original-src'));
            }
        }
        $('body').removeClass('overflow-hidden');
    }
}

function initScrollingToEvents() {
    if($('.scrolling-to-section').length > 0) {

    }
}
initScrollingToEvents();