basic.init();
$(document).ready(function() {

});

$(window).on('load', function() {
    scrollToSection();
});

$(window).on("load", function()   {
    if($('body').hasClass('home')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('resize', function(){
    if($('body').hasClass('home')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('scroll', function()  {
    //homepageHowToBecomeDentacoinDentistBackgroundParallax();
});

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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('.captcha-container span').html(response.captcha);
                }
            });
        });
    }
} 
initCaptchaRefreshEvent();

// ================== PAGES ==================
if($('body').hasClass('home')) {
    $('.testimonials-slider-section').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                }
            }
        ]
    });

    $('.testimonials-slider-section').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        var height = 0;
        for(var i = 0, len = 4; i < len; i+=1)  {
            if($('.slick-slide').eq((nextSlide + 4) + i).height() > height) {
                height = $('.slick-slide').eq((nextSlide + 4) + i).height();
            }
        }
        $('.testimonials-slider-section .slick-list').animate({height: height}, 500);
    });

    //logic for open application popup
    $('.single-application').click(function()   {
        var this_btn = $(this).find('.wrapper');
        var extra_html = '';
        var media_html = '';
        if(this_btn.attr('data-articles') != undefined)    {
            extra_html+='<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><ul>';
            var articles_arr = $.parseJSON(this_btn.attr('data-articles'));
            for(var i = 0, len = articles_arr.length; i < len; i+=1)    {
                extra_html+='<li class="link"><a href="https://blog.dentacoin.com/'+articles_arr[i]['post_name']+'" target="_blank">'+articles_arr[i]['post_title']+'</a></li>';
            }
            extra_html+='</ul><div class="see-all"><a href="https://blog.dentacoin.com/" class="white-dark-blue-btn" target="_blank">GO TO ALL</a></div></div>';
        }
        var description = this_btn.attr('data-description');
        if(description != '') {
            description = $.parseJSON(description);
        }

        if(['mp4', 'avi'].indexOf(this_btn.attr('data-image-type')) > -1) {
            media_html+='<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject" class="col-sm-6 video"><video autoplay loop muted controls="false"><source src="'+this_btn.attr('data-image')+'" type="video/'+this_btn.attr('data-image-type')+'"></video><meta itemprop="name" content="'+this_btn.attr('data-title')+'"><meta itemprop="uploadDate" content="'+this_btn.attr('data-upload-date')+'"></div>';
        }else {
            media_html+='<figure class="col-sm-6 gif"><img src="'+this_btn.attr('data-image')+'?'+new Date().getTime()+'" alt="'+this_btn.attr('data-image-alt')+'"/></figure>';
        }

        var html = '<div class="container-fluid"><div class="row">'+media_html+'<div class="col-sm-6 col-xs-12 content"><figure class="logo"><img src="'+this_btn.attr('data-popup-logo')+'" alt="'+this_btn.attr('data-popup-logo-alt')+'"/></figure><div class="title">'+this_btn.find('figcaption').html()+'</div><div class="description">'+description+'</div>'+extra_html+'</div></div></div>';
        basic.showDialog(html, 'application-popup', this_btn.attr('data-slug'));
        $('.application-popup video').removeAttr('controls');
    });
}else if($('body').hasClass('faq')) {
    if($('.list .question').length > 0) {
        $('.list .question').click(function()   {
            $(this).closest('li').find('.question-content').toggle(300);
        });
    }
}

//make equal height for all descriptions in options section
function optionsDescriptionsEqualHeight() {
    var descriptions_height = 0;
    for(var i = 0, len = $('.options-section .description').length; i < len; i+=1)  {
        if($('.options-section .description').eq(i).outerHeight() > descriptions_height) {
            descriptions_height = $('.options-section .description').eq(i).outerHeight();
        }
    }
    $('.options-section .description').outerHeight(descriptions_height);
}

//homepage parallax background
/*function homepageHowToBecomeDentacoinDentistBackgroundParallax() {
    if($('body').hasClass('home') && $('section.how-to-become-dentacoin-dentist-section').isInViewport() && !basic.isMobile()) {
        var current = $(window).scrollTop();
        var start = $('section.how-to-become-dentacoin-dentist-section').offset().top - $('section.how-to-become-dentacoin-dentist-section').outerHeight();
        var max = $('section.how-to-become-dentacoin-dentist-section').offset().top;

        var percentage = (((current - start) / (max - start)) * 100) / 2 + 30;
        if(percentage > 0 && percentage < 100) {
            $('section.how-to-become-dentacoin-dentist-section').css({'background-position' : 'center ' + (100 - percentage) + '%'});
        }
        //$('.stella-artois-and-wimbledon .custom-widget').eq(i).css({'top' : (10 + 50 * (percentage / 100)) + '%'});
    }
}*/

//external generated form
if($('.show-external-form-button').length > 0) {
    $('.show-external-form-button').click(function() {
        $('.custom-popup.external-form').addClass('visible');
        $('body').addClass('overflow-hidden');
    });

    $('.custom-popup.external-form .close-btn').unbind().click(function()    {
        $('.custom-popup.external-form').removeClass('visible');
        $('body').removeClass('overflow-hidden');
    });
}

if($('.open-video-popup').length > 0) {
    $('.open-video-popup').click(function() {
        $('.custom-popup.video .wrapper').html('<iframe src="https://www.youtube.com/embed/GntlhUrzqSw"></iframe>');
        $('.custom-popup.video').addClass('visible');
        $('body').addClass('overflow-hidden');
    });

    $('.custom-popup.video .close-btn').unbind().click(function()    {
        $('.custom-popup.video .wrapper').html('');
        $('.custom-popup.video').removeClass('visible');
        $('body').removeClass('overflow-hidden');
    });
}
$('body').click(function(event) {
    if($(event.target).is('#custom-popup')) {
        $('.custom-popup').removeClass('visible');
        $('body').removeClass('overflow-hidden');
    }
});


/*

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
}*/

//scroll to sections events
function initScrollingToEvents() {
    if($('.scrolling-to-section').length > 0 && $('body').hasClass('home')) {
        $('.scrolling-to-section').click(function() {
            $(this).blur();
            window.history.pushState($(this).find('span').html(), '', '/#'+$(this).attr('id'));
            $("html, body").animate({scrollTop: $('[data-scroll-here="'+$(this).attr('id')+'"]').offset().top - $('header').outerHeight()}, 300);
            return false;
        });
    }
}
initScrollingToEvents();

//on page load if we have #parameter in the URL scroll down to section
function scrollToSection(){
    $('[data-scroll-here]').each(function(){
        if(window.location.href.indexOf('/#' + $(this).attr('data-scroll-here')) != -1){
            $("html, body").animate({scrollTop: $(this).offset().top - $('header').outerHeight()}, 300);
            return false;
        }
    })
}

//mobile menu events
/*
function initMobileMenuActions()    {
    if(basic.isMobile)    {
        $('header .mobile-ham').click(function()   {
            $('.mobile-nav').addClass('active');
        });

        $('.mobile-nav .close-btn').click(function()   {
            $('.mobile-nav').removeClass('active');
        });
    }
}
initMobileMenuActions();
*/

//header menu events
$('header .hamburger').click(function()    {
    $('nav.sidenav').addClass('active');
});

$('nav.sidenav .close-btn, nav.sidenav ul li a').click(function()    {
    $('nav.sidenav').removeClass('active');
});

//on button click next time when you hover the button the color is bugged until you click some other element (until you move out the focus from this button)
function fixButtonsFocus() {
    if($('.white-dark-blue-btn').length > 0) {
        $('.white-dark-blue-btn').click(function() {
            $(this).blur();
        });
    }
    if($('.dark-blue-white-btn').length > 0) {
        $('.dark-blue-white-btn').click(function() {
            $(this).blur();
        });
    }
}
fixButtonsFocus();

//checking if submitted email is valid
/*
function newsletterRegisterValidation() {
    $('.newsletter-register form').on('submit', function(event)  {
        var this_form = $(this);
        var errors = [];
        if(!basic.validateEmail(this_form.find('input[type="email"]').val().trim()))    {
            this_form.addClass('not-valid').append('<div class="alert alert-danger">'+this_form.find('input[type="email"]').closest('.form-row').attr('data-valid-email-message')+'</div>');
            errors.push(this_form.find('input[type="email"]').closest('.form-row').attr('data-valid-email-message'));
        }
        if(!this_form.find('#agree-with-privacy-policy').is(':checked'))  {
            errors.push(this_form.find('#agree-with-privacy-policy').closest('.form-row').attr('data-valid-message'));
        }

        if(errors.length > 0)   {
            event.preventDefault();
            this_form.addClass('not-valid').find('.alert').remove();
            for(var i = 0, len = errors.length; i < len; i+=1)  {
                this_form.append('<div class="alert alert-danger">'+errors[i]+'</div>');
            }
        }else {
            this_form.removeClass('not-valid').find('.alert').remove();
            //this_form.find('input[type="email"]').val('');
            //this_form.find('#agree-with-privacy-policy').prop('checked', false);
            this_form.append('<div class="alert alert-success">'+this_form.attr('data-success-message')+'</div>');
        }
    });
}
newsletterRegisterValidation();*/