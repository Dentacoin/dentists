checkIfCookie();
var get_params = getGETParameters();

$(document).ready(function() {

});

$(window).on('load', function() {
    scrollToSection();
});

$(window).on("load", function()   {
    if (!$('body').hasClass('logged-in') && $('body').hasClass('home') || $('body').hasClass('logged-home') || $('body').hasClass('faq')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('resize', function(){
    if ((!$('body').hasClass('logged-in') && $('body').hasClass('home')) || $('body').hasClass('logged-home') || $('body').hasClass('faq')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('scroll', function()  {
    //homepageHowToBecomeDentacoinDentistBackgroundParallax();
});

//init cookie events only if exists
function checkIfCookie()    {
    if ($('.privacy-policy-cookie').length > 0)  {
        $('.privacy-policy-cookie .accept-all').click(function()    {
            basic.cookies.set('performance_cookies', 1);
            basic.cookies.set('functionality_cookies', 1);
            basic.cookies.set('marketing_cookies', 1);
            basic.cookies.set('strictly_necessary_policy', 1);

            $('#google-analytics-script').html("window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-97167262-3');");

            $('#facebook-pixel-script').html("!function(f,b,e,v,n,t,s)\n" +
                "{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\n" +
                "\tn.callMethod.apply(n,arguments):n.queue.push(arguments)};\n" +
                "\tif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';\n" +
                "\tn.queue=[];t=b.createElement(e);t.async=!0;\n" +
                "\tt.src=v;s=b.getElementsByTagName(e)[0];\n" +
                "\ts.parentNode.insertBefore(t,s)}(window,document,'script',\n" +
                "\t'https://connect.facebook.net/en_US/fbevents.js');fbq('consent', 'grant');fbq('init', '2366034370318681');fbq('track', 'PageView');");

            $('.privacy-policy-cookie').remove();
        });

        $('.adjust-cookies').click(function() {
            $('.customize-cookies').remove();

            $('.privacy-policy-cookie').append('<div class="customize-cookies"><button class="close-customize-cookies close-customize-cookies-popup">×</button><div class="text-center"><img src="/assets/images/cookie-icon.svg" alt="Cookie icon" class="cookie-icon"/></div><div class="text-center padding-top-10 padding-bottom-20 fs-20">Select cookies to accept:</div><div class="cookies-options-list"><ul><li><div class="pretty p-svg p-curve"><input checked disabled type="checkbox" id="strictly-necessary-cookies"/><div class="state p-success"><svg class="svg svg-icon" viewBox="0 0 20 20"><path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path></svg><label for="strictly-necessary-cookies"><span>Strictly necessary</span> <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="Cookies essential to navigate around the website and use its features. Without them, you wouldn’t be able to use basic services like signup or login."></i></label></div></div></li><li><div class="pretty p-svg p-curve"><input checked type="checkbox" id="functionality-cookies"/><div class="state p-success"><svg class="svg svg-icon" viewBox="0 0 20 20"><path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path></svg><label for="functionality-cookies">Functionality cookies <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="These cookies allow users to customise how a website looks for them; they can remember usernames, preferences, etc."></i></label></div></div></li></ul><ul><li><div class="pretty p-svg p-curve"><input checked type="checkbox" id="performance-cookies"/><div class="state p-success"><svg class="svg svg-icon" viewBox="0 0 20 20"><path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path></svg><label for="performance-cookies">Performance cookies <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="These cookies collect data for statistical purposes on how visitors use a website, they don’t contain personal data and are used to improve user experience."></i></label></div></div></li><li><div class="pretty p-svg p-curve"><input checked type="checkbox" id="marketing-cookies"/><div class="state p-success"><svg class="svg svg-icon" viewBox="0 0 20 20"><path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path></svg><label for="marketing-cookies">Marketing cookies <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="Marketing cookies are used e.g. to deliver advertisements more relevant to you or limit the number of times you see an advertisement."></i></label></div></div></li></ul></div><div class="text-center actions"><a href="javascript:void(0);" class="white-light-blue-btn white-border margin-right-10 close-customize-cookies-popup">CANCEL</a><a href="javascript:void(0);" class="white-dark-blue-btn white-border custom-cookie-save">SAVE</a></div><div class="custom-triangle"></div></div>');

            initTooltips();

            $('.close-customize-cookies-popup').click(function() {
                $('.customize-cookies').remove();
            });

            $('.custom-cookie-save').click(function() {
                basic.cookies.set('strictly_necessary_policy', 1);

                if($('#functionality-cookies').is(':checked')) {
                    basic.cookies.set('functionality_cookies', 1);
                }

                if($('#marketing-cookies').is(':checked')) {
                    basic.cookies.set('marketing_cookies', 1);

                    $('#facebook-pixel-script').html("!function(f,b,e,v,n,t,s)\n" +
                        "{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\n" +
                        "\tn.callMethod.apply(n,arguments):n.queue.push(arguments)};\n" +
                        "\tif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';\n" +
                        "\tn.queue=[];t=b.createElement(e);t.async=!0;\n" +
                        "\tt.src=v;s=b.getElementsByTagName(e)[0];\n" +
                        "\ts.parentNode.insertBefore(t,s)}(window,document,'script',\n" +
                        "\t'https://connect.facebook.net/en_US/fbevents.js');fbq('consent', 'grant');fbq('init', '2366034370318681');fbq('track', 'PageView');");
                }

                if($('#performance-cookies').is(':checked')) {
                    basic.cookies.set('performance_cookies', 1);

                    $('#google-analytics-script').html("window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-97167262-3');");
                }

                $('.privacy-policy-cookie').remove();
            });
        });
    }
}

// camping for event when user didn't accept strictly necessary cookies
$(document).on('cannotLoginBecauseOfMissingCookies', function (event) {
    basic.showAlert('Please accept the strictly necessary cookies in order to continue with logging in.', '', true);
});

function initCaptchaRefreshEvent()  {
//refreshing captcha on trying to log in admin
    if ($('.refresh-captcha').length > 0)    {
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
if (!$('body').hasClass('logged-in')  && $('body').hasClass('home') || $('body').hasClass('logged-home')) {
    $('.below-options .single-option').hover(function () {
        $(this).addClass('active');
        $(document).bind('mousemove', imageFollowingCursorPosition);
    }, function () {
        $('.below-options .single-option.active .image-shown-on-hover').removeClass('active')
        $(this).removeClass('active');
        $(document).unbind('mousemove', imageFollowingCursorPosition);
    });

    function imageFollowingCursorPosition(event) {
        $('.below-options .single-option.active .image-shown-on-hover').addClass('active').offset({top: event.pageY + 5, left: event.pageX + 5});
    }

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
            if ($('.slick-slide').eq((nextSlide + 4) + i).height() > height) {
                height = $('.slick-slide').eq((nextSlide + 4) + i).height();
            }
        }
        $('.testimonials-slider-section .slick-list').animate({height: height}, 500);
    });

    var start_clicking_from_num = 1;
    /*var init_apps_interval_slide;*/
    //logic for open application popup
    $('.single-application').click(function()   {
        singleApplicationClick($(this), true);
    });

    function singleApplicationClick(element, stop_interval_sliding) {
        $('.single-application').removeClass('show-shadow');
        element.addClass('show-shadow');
        var this_btn = element.find('.wrapper');
        var extra_html = '';
        var media_html = '';

        if (this_btn.attr('data-articles') != undefined)    {
            extra_html+='<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><div class="slider-with-tool-data">';
            var articles_arr = $.parseJSON(this_btn.attr('data-articles'));
            for(var i = 0, len = articles_arr.length; i < len; i+=1)    {
                extra_html+='<a target="_blank" href="'+articles_arr[i]['link']+'"><div class="single-slide text-left fs-0"><figure class="inline-block-top" itemscope="" itemtype="http://schema.org/ImageObject"><img src="'+articles_arr[i]['thumb']+'" alt="" itemprop="contentUrl"/></figure><div class="content inline-block-top"><div class="slide-title">'+articles_arr[i]['post_title']+'</div><time>'+dateObjToFormattedDate(new Date(parseInt(articles_arr[i]['date']) * 1000))+'</time></div></div></a>';
            }
            extra_html+='</div><div class="text-center padding-top-15"><a href="//blog.dentacoin.com/" class="white-dark-blue-btn" target="_blank">GO TO ALL</a></div></div>';
        }

        var description = '';
        if (this_btn.attr('data-description') != '') {
            description = $.parseJSON(this_btn.attr('data-description'));
        }

        var html = '<div class="container-fluid"><div class="row">'+media_html+'<div class="col-sm-12 content"><figure class="logo"><img src="'+this_btn.attr('data-popup-logo')+'" alt="'+this_btn.attr('data-popup-logo-alt')+'"/></figure><div class="title">'+this_btn.find('figcaption').html()+'</div><div class="description">'+description+'</div>'+extra_html+'</div></div></div>';

        $('.applications-section .info-section .html-content').html(html);

        if (extra_html != '') {
            initToolsPostsSlider();
        }

        $('.applications-section .info-section video').removeAttr('controls');

        $('body').addClass('overflow-hidden');
        if ($(window).width() > 992) {
            /*clearInterval(init_apps_interval_slide);

            if (stop_interval_sliding == undefined) {
                start_clicking_from_num = element.index() + 1;
                if (start_clicking_from_num == 8) {
                    start_clicking_from_num = 0;
                }

                init_apps_interval_slide = setTimeout(function () {
                    singleApplicationClick($('.applications-section .single-application').eq(start_clicking_from_num));
                }, 10000);
            }*/
        } else {
            $('.applications-section .apps-list').hide();
            $('.applications-section .info-section').fadeIn(500);
        }

        $('.applications-section .info-section .close-application').click(function() {
            $('.applications-section .apps-list').fadeIn(500);
            $('.applications-section .info-section').hide();
        });

        $('body').removeClass('overflow-hidden');
    }

    $('body').addClass('overflow-hidden');
    if ($(window).width() > 992) {
        singleApplicationClick($('.applications-section .single-application').eq(0));
    }
    $('body').removeClass('overflow-hidden');
} else if ($('body').hasClass('faq')) {
    if ($('.list .question').length > 0) {
        $('.list .question').click(function()   {
            $(this).closest('li').find('.question-content').toggle(300);
        });
    }
} else if ($('body').hasClass('download-assets')) {
    $('.assets-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 8000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}

//make equal height for all descriptions in options section
function optionsDescriptionsEqualHeight() {
    var descriptions_height = 0;
    for(var i = 0, len = $('.options-section .description').length; i < len; i+=1)  {
        if ($('.options-section .description').eq(i).outerHeight() > descriptions_height) {
            descriptions_height = $('.options-section .description').eq(i).outerHeight();
        }
    }
    $('.options-section .description').outerHeight(descriptions_height);
}

//homepage parallax background
/*function homepageHowToBecomeDentacoinDentistBackgroundParallax() {
    if ($('body').hasClass('home') && $('section.how-to-become-dentacoin-dentist-section').isInViewport() && !basic.isMobile()) {
        var current = $(window).scrollTop();
        var start = $('section.how-to-become-dentacoin-dentist-section').offset().top - $('section.how-to-become-dentacoin-dentist-section').outerHeight();
        var max = $('section.how-to-become-dentacoin-dentist-section').offset().top;

        var percentage = (((current - start) / (max - start)) * 100) / 2 + 30;
        if (percentage > 0 && percentage < 100) {
            $('section.how-to-become-dentacoin-dentist-section').css({'background-position' : 'center ' + (100 - percentage) + '%'});
        }
        //$('.stella-artois-and-wimbledon .custom-widget').eq(i).css({'top' : (10 + 50 * (percentage / 100)) + '%'});
    }
}*/

//external generated form
if ($('.show-external-form-button').length > 0) {
    $('.show-external-form-button').click(function() {
        $('.custom-popup.external-form').addClass('visible');

        $('.custom-popup.external-form .wrapper').html('<div class="text-center fs-26 padding-bottom-30 lato-black">Send Your Inquiry</div><iframe src="//dentacoin.ariticapp.com/ma/form/7"><p>Your browser does not support iframes.</p></iframe>');
        $('body').addClass('overflow-hidden');
    });

    $('.custom-popup.external-form .close-btn').unbind().click(function()    {
        $('.custom-popup.external-form').removeClass('visible');
        $('body').removeClass('overflow-hidden');

        $('.custom-popup.external-form .wrapper').html('');
    });
}
var homepage_video_time_watched = 0;
var homepage_video_timer;

if ($('.open-video-popup').length > 0) {
    $('.open-video-popup').click(function() {
        $('.custom-popup.video .wrapper').html('<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject"><video controls><source src="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4" type="video/mp4">Your browser does not support HTML5 video.</video><meta itemprop="name" content="Dentacoin Introduction Video"><meta itemprop="description" content="Explainer video: Dentacoin, the Blockchain Solution for the Global Dentistry"><meta itemprop="uploadDate" content="2019-03-19T08:00:00+08:00"><meta itemprop="thumbnailUrl" content="https://dentacoin.com/assets/uploads/video-poster.png"><link itemprop="contentURL" href="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4"></div>');
        $('.custom-popup.video').addClass('visible');
        $('body').addClass('overflow-hidden');

        $('.custom-popup.video .wrapper').find('video').on('play', function() {
            homepage_video_timer = setInterval(function() {
                homepage_video_time_watched+=1;
            }, 1000);
        });

        $('.custom-popup.video .wrapper').find('video').on('pause', function() {
            clearInterval(homepage_video_timer);
            fireGoogleAnalyticsEvent('Video', 'Play', 'Dentacoin Explainer', homepage_video_time_watched);
        });

        $('.custom-popup.video .wrapper').find('video').get(0).play();
    });

    $('.custom-popup.video .close-btn').unbind().click(function()    {
        $('.custom-popup.video .wrapper').html('');
        $('.custom-popup.video').removeClass('visible');
        $('body').removeClass('overflow-hidden');

        clearInterval(homepage_video_timer);
        fireGoogleAnalyticsEvent('Video', 'Play', 'Dentacoin Explainer', homepage_video_time_watched);

        homepage_video_time_watched = 0;
    });
}

$('body').click(function(event) {
    if ($(event.target).is('#custom-popup')) {
        $('.custom-popup').removeClass('visible');
        $('body').removeClass('overflow-hidden');
        $('.custom-popup.video .wrapper').html('');

        clearInterval(homepage_video_timer);
        fireGoogleAnalyticsEvent('Video', 'Play' , 'Dentacoin Explainer', homepage_video_time_watched);

        homepage_video_time_watched = 0;
    }
});

/*

//change images src on different resolutions (only the ones with data attributes for this)
function setLargeImages() {
    if ($('img[data-large-screen-src]').length > 0) {
        $('body').addClass('overflow-hidden');
        if ($(window).width() > 1400) {
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
    if ($('body').hasClass('logged-home') || (!$('body').hasClass('logged-in')  && $('body').hasClass('home'))) {
        if ($('.scrolling-to-section').length > 0) {
            $('.scrolling-to-section').click(function() {
                $(this).blur();
                window.history.pushState($(this).find('span').html(), '', '/#'+$(this).attr('id'));
                $("html, body").animate({scrollTop: $('[data-scroll-here="'+$(this).attr('id')+'"]').offset().top - $('header').outerHeight()}, 300);
                return false;
            });
        }
    } else if ($('body').hasClass('logged-in')) {
        $('.scrolling-to-section').click(function() {
            window.location = '/home#' + $(this).attr('id');
        });
    }
}
initScrollingToEvents();

//on page load if we have #parameter in the URL scroll down to section
function scrollToSection(){
    $('[data-scroll-here]').each(function() {
        if (window.location.href.indexOf('#' + $(this).attr('data-scroll-here')) != -1){
            $("html, body").animate({scrollTop: $(this).offset().top - $('header').outerHeight()}, 300);
            return false;
        }
    })
}

function getGETParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

//mobile menu events
/*
function initMobileMenuActions()    {
    if (basic.isMobile)    {
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
    $(document).on('click', '.white-dark-blue-btn', function() {
        $(this).blur();
    });
    $(document).on('click', '.dark-blue-white-btn', function() {
        $(this).blur();
    });
}
fixButtonsFocus();

//checking if submitted email is valid
function newsletterRegisterValidation() {
    $('.newsletter-register form').on('submit', function(event)  {
        var this_form = $(this);
        var error = false;
        if (!basic.validateEmail(this_form.find('input[type="email"]').val().trim()))    {
            error = true;
        }else if (!this_form.find('#newsletter-privacy-policy').is(':checked'))  {
            error = true;
        }

        if (!error) {
            fireGoogleAnalyticsEvent('Subscription', 'Sign-up', 'Newsletter');
        }
    });
}
newsletterRegisterValidation();

function hidePopupOnBackdropClick() {
    $(document).on('click', '.bootbox', function(){
        var classname = event.target.className;
        classname = classname.replace(/ /g, '.');

        if (classname && !$('.' + classname).parents('.modal-dialog').length) {
            if ($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            if ($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            bootbox.hideAll();
        }
    });
}
hidePopupOnBackdropClick();

if (!$('body').hasClass('logged-in')) {
    dcnGateway.init({
        'platform' : 'dentists',
        /*'environment' : 'staging',*/
        'forgotten_password_link' : 'https://account.dentacoin.com/forgotten-password'
    });

    $(document).on('dentistAuthSuccessResponse', async function (event) {
        console.log('dentistAuthSuccessResponse');
        window.location.reload();
    });

    $(document).on('patientAuthSuccessResponse', async function (event) {
        console.log('patientAuthSuccessResponse');
        window.location.reload();
    });
}

async function loggedOrNotLogic() {
    if ($('body').hasClass('logged-in')) {
        var add_overflow_hidden_on_hidden_box_show = false;
        var sm_screen_width = false;
        $('body').addClass('overflow-hidden');
        if ($(window).width() < 992) {
            add_overflow_hidden_on_hidden_box_show = true;
            if ($(window).width() > 767) {
                sm_screen_width = true;
            }
        }
        $('body').removeClass('overflow-hidden');

        if (sm_screen_width) {
            $(document).on('click', 'body', function(){
                if (!$('.hidden-box-parent').find(event.target).length) {
                    $('.logged-user-right-nav .hidden-box').removeClass('show-this');
                    $('.logged-user-right-nav .up-arrow').removeClass('show-this');
                }
            });
        }

        if (add_overflow_hidden_on_hidden_box_show) {
            $('.logged-user-right-nav .user-name, .logged-user-right-nav .header-avatar').click(function() {
                $('.logged-user-right-nav .hidden-box').toggleClass('show-this');
                if (sm_screen_width) {
                    $('.logged-user-right-nav .up-arrow').toggleClass('show-this');
                } else {
                    $('body').toggleClass('overflow-hidden');
                }
            });
        } else {
            $('.logged-user-right-nav > .hidden-box-parent').hover(function () {
                $('.logged-user-right-nav .hidden-box').addClass('show-this');
                $('.logged-user-right-nav .up-arrow').addClass('show-this');
            }, function () {
                $('.logged-user-right-nav .hidden-box').removeClass('show-this');
                $('.logged-user-right-nav .up-arrow').removeClass('show-this');
            });
        }

        $('.logged-user-right-nav .close-btn a').click(function() {
            $('.logged-user-right-nav .hidden-box').removeClass('show-this');
            if (add_overflow_hidden_on_hidden_box_show) {
                $('body').removeClass('overflow-hidden');

                if (sm_screen_width) {
                    $('.logged-user-right-nav .up-arrow').removeClass('show-this');
                }
            }
        });
    }
}
loggedOrNotLogic();

function bindGoogleAlikeButtonsEvents() {
    //google alike style for label/placeholders
    $('body').on('click', '.custom-google-label-style label', function() {
        $(this).addClass('active-label');
        if ($('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
            $(this).parent().find('input').addClass('blue-green-border');
        }
    });

    $('body').on('keyup change focusout', '.custom-google-label-style input', function() {
        var value = $(this).val().trim();
        if (value.length) {
            $(this).closest('.custom-google-label-style').find('label').addClass('active-label');
            if ($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).addClass('blue-green-border');
            }
        } else {
            $(this).closest('.custom-google-label-style').find('label').removeClass('active-label');
            if ($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).removeClass('blue-green-border');
            }
        }
    });
}
bindGoogleAlikeButtonsEvents();

function initToolsPostsSlider()   {
    //init slider for most popular posts
    jQuery('.slider-with-tool-data').slick({
        slidesToShow: 2,
        infinite: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
}

function dateObjToFormattedDate(object) {
    if (object.getDate() < 10) {
        var date = '0' + object.getDate();
    } else {
        var date = object.getDate();
    }

    if (object.getMonth() + 1 < 10) {
        var month = '0' + (object.getMonth() + 1);
    } else {
        var month = object.getMonth() + 1;
    }
    return date + '/' + month + '/' + object.getFullYear();
}

// =================================== GOOGLE ANALYTICS TRACKING LOGIC ======================================

/*function bindTrackerClickDentistsBtnEvent() {
    $(document).on('click', '.init-dentists-click-event', function() {
        fireGoogleAnalyticsEvent('Tools', 'Click', 'Dentists');
    });
}
bindTrackerClickDentistsBtnEvent();*/

function bindTrackerClickDownloadBrochure() {
    $(document).on('click', '.download-brochure-event-tracker', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Assets', 'Download', 'Brochure');

        window.open($(this).attr('href'));
    });
}
bindTrackerClickDownloadBrochure();

function bindTrackerClickDownloadDEBrochure() {
    $(document).on('click', '.download-de-brochure-event-tracker', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Assets', 'Download', 'DE Brochure');

        window.open($(this).attr('href'));
    });
}
bindTrackerClickDownloadDEBrochure();

function bindTrackerClickDownloadFactsheet() {
    $(document).on('click', '.download-fact-sheet-event-tracker', function(event) {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Assets', 'Download', 'Factsheet');

        window.open($(this).attr('href'));
    });
}
bindTrackerClickDownloadFactsheet();

function bindTrackerClickDownloadDEFactsheet() {
    $(document).on('click', '.download-de-fact-sheet-event-tracker', function() {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Assets', 'Download', 'DE Factsheet');

        window.open($(this).attr('href'));
    });
}
bindTrackerClickDownloadDEFactsheet();

function bindTrackerClickDownloadBrochureForPatients() {
    $(document).on('click', '.download-patients-brochure-event-tracker', function() {
        event.preventDefault();
        fireGoogleAnalyticsEvent('Assets', 'Download', 'Patient Brochure');

        window.open($(this).attr('href'));
    });
}
bindTrackerClickDownloadBrochureForPatients();

function bindTrackerClickDownloadLogo() {
    $(document).on('click', '.download-logo-event-tracker', function() {
        fireGoogleAnalyticsEvent('Assets', 'Download', 'Logo');
    });
}
bindTrackerClickDownloadLogo();

function bindTrackerTRPRegister() {
    $(document).on('click', '.register-on-trp-event-tracker', function() {
        fireGoogleAnalyticsEvent('Tools', 'Register', 'TRP Register');
    });
}
bindTrackerTRPRegister();

function bindTrackerClickFooterPlatforms() {
    $(document).on('click', 'footer .init-event-tracker', function() {
        var this_btn = $(this);
        fireGoogleAnalyticsEvent('Tools', 'Click', this_btn.find('span').html().trim());
    });
}
bindTrackerClickFooterPlatforms();

$(document).on('click', '.logged-user-right-nav .application, .dentacoin-ecosystem-section .single-application, .applications-section .single-application', function() {
    var this_btn = $(this);

    fireGoogleAnalyticsEvent('Tools', 'Click', this_btn.attr('data-platform'))
});

function fireGoogleAnalyticsEvent(category, action, label, value) {
    var event_obj = {
        'event_action' : action,
        'event_category': category,
        'event_label': label
    };

    if (value != undefined) {
        event_obj.value = value;
    }

    gtag('event', label, event_obj);
}

// =================================== /GOOGLE ANALYTICS TRACKING LOGIC ======================================

// init bootstrap tooltips
function initTooltips() {
    if($('[data-toggle="tooltip"]')) {
        $('[data-toggle="tooltip"]').tooltip();
    }
}