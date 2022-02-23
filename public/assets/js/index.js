var get_params = basic.getGETParameters();
var loadedLibs = {};

$(window).on('load', function() {
    scrollToSection();

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
    projectData.general_logic.data.loadDeferResources();

    onDesktopScrollMakeStickySidebarDownloadAssetsPage();

    makeHeaderSmallerOnScroll();
});

// camping for event when user didn't accept strictly necessary cookies
$(document).on('cannotLoginBecauseOfMissingCookies', function (event) {
    basic.showAlert('Please accept the strictly necessary cookies in order to continue with logging in.', '', true);
});

function scrollToContactUsNow() {
    for(var i = 0, len = jQuery('img[data-defer-src]').length; i < len; i+=1) {
        if(jQuery('img[data-defer-src]').eq(i).attr('src') === undefined) {
            jQuery('img[data-defer-src]').eq(i).attr('src', jQuery('img[data-defer-src]').eq(i).attr('data-defer-src'));
        }
    }

    $('html, body').animate({
        scrollTop: $('.shortcode.contact-us').offset().top - $('header').outerHeight()
    }, 300);
}

function bindScrollToContactUsNowEvent() {
    $(document).on('click', '.scroll-to-contact-us-now', function() {
        scrollToContactUsNow();
    });
}
bindScrollToContactUsNowEvent();

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
            projectData.events.fireGoogleAnalyticsEvent('Video', 'Play', 'Dentacoin Explainer', homepage_video_time_watched);
        });

        $('.custom-popup.video .wrapper').find('video').get(0).play();
    });

    $('.custom-popup.video .close-btn').unbind().click(function()    {
        $('.custom-popup.video .wrapper').html('');
        $('.custom-popup.video').removeClass('visible');
        $('body').removeClass('overflow-hidden');

        clearInterval(homepage_video_timer);
        projectData.events.fireGoogleAnalyticsEvent('Video', 'Play', 'Dentacoin Explainer', homepage_video_time_watched);

        homepage_video_time_watched = 0;
    });
}

$('body').click(function(event) {
    if ($(event.target).is('#custom-popup')) {
        $('.custom-popup').removeClass('visible');
        $('body').removeClass('overflow-hidden');
        $('.custom-popup.video .wrapper').html('');

        clearInterval(homepage_video_timer);
        projectData.events.fireGoogleAnalyticsEvent('Video', 'Play' , 'Dentacoin Explainer', homepage_video_time_watched);

        homepage_video_time_watched = 0;
    }
});

//scroll to sections events
function initScrollingToEvents() {
    if ($('.scrolling-to-section').length > 0) {
        $('.scrolling-to-section').click(function() {
            if ($('body').hasClass('home') || $('body').hasClass('how-it-works')) {

                $(this).blur();
                var currentHref = window.location.href.replace('#'+ $(this).attr('id'), '');
                window.history.pushState($(this).find('span').html(), '', currentHref + '#'+ $(this).attr('id'));
                $('html, body').animate({scrollTop: $('[data-scroll-here="'+$(this).attr('id')+'"]').offset().top - $('header').outerHeight()}, 300);
            } else {
                if ($('body').hasClass('logged-in')) {
                    window.location = '/home#' + $(this).attr('id');
                } else {
                    window.location = '/#' + $(this).attr('id');
                }
            }
        });
    }
}
initScrollingToEvents();

//on page load if we have #parameter in the URL scroll down to section
function scrollToSection(){
    $('[data-scroll-here]').each(function() {
        if (window.location.href.indexOf('#' + $(this).attr('data-scroll-here')) != -1){
            $('html, body').animate({scrollTop: $(this).offset().top - $('header').outerHeight()}, 300);
            return false;
        }
    })
}

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
        window.location.href = window.location.href + '?cross-login=true';
    });

    $(document).on('patientAuthSuccessResponse', async function (event) {
        console.log('patientAuthSuccessResponse');
        window.location.href = window.location.href + '?cross-login=true';
    });
}

var appendedMobileStickyScrollUp = false;
function onDesktopScrollMakeStickySidebarDownloadAssetsPage() {
    if ($('body').hasClass('download-guides-assets')) {
        $('body').addClass('overflow-hidden');
        if ($(window).width() > 992) {
            if ($(window).scrollTop() > $('.page-content').offset().top) {
                if ($(window).scrollTop() + $(window).height() > $('footer').offset().top) {
                    $('.navigation-sidebar').css({'position' : 'absolute', 'left' : '0', 'top' : 'auto', 'bottom' : '0'});
                    $('.add-display-flex-and-position-relative').css({'display' : 'flex', 'position' : 'relative'});
                    $('.navigation-sidebar').css({'overflow' : 'visible', 'height' : 'auto'});
                } else {
                    $('.navigation-sidebar').css({'position' : 'fixed', 'left' : '0', 'top' : $('header').outerHeight() + 'px', 'bottom' : 'auto'});
                    $('.add-display-flex-and-position-relative').css({'display' : 'block'});
                    $('.navigation-sidebar').height($(window).height() - $('header').outerHeight()).css({'overflow' : 'auto'});
                    $('.page-content').addClass('col-md-offset-3');
                }
            } else {
                $('.navigation-sidebar').css({'position' : 'static', 'left' : 'auto', 'top' : 'auto'});
                $('.navigation-sidebar').css({'overflow' : 'visible', 'height' : 'auto'});
                $('.page-content').removeClass('col-md-offset-3');
            }
        } else {
            if ($(window).scrollTop() > 300 && !appendedMobileStickyScrollUp) {
                appendedMobileStickyScrollUp = true;
                $('.page-download-assets').append('<button class="sticky-caret"><img alt="Caret icon" src="/assets/images/caret-icon.svg" class="width-100 max-width-20"/></button>');

                $('.sticky-caret').click(function() {
                    $('html, body').animate({scrollTop: 0}, 300);
                    return false;
                })
            } else if ($(window).scrollTop() < 300 && appendedMobileStickyScrollUp) {
                appendedMobileStickyScrollUp = false;
                $('.sticky-caret').remove();
            }
        }
        $('body').removeClass('overflow-hidden');
    }
}

function customErrorHandle(el, string) {
    el.append('<div class="error-handle">'+string+'</div>');
}

function makeHeaderSmallerOnScroll() {
    if ($(window).scrollTop() > 0) {
        $('header').addClass('on-going-sticky-header');
        $('.main-container').addClass('on-going-sticky-header');
    } else {
        $('header').removeClass('on-going-sticky-header');
        $('.main-container').removeClass('on-going-sticky-header');
    }
}

var projectData = {
    pages: {
        not_logged_in: function () {
            projectData.pages.data.homepage();
            projectData.pages.data.faq();
            projectData.pages.data.downloadGuidesAndAssets();
            projectData.pages.data.howItWorks();
        },
        logged_in: function () {
            projectData.pages.data.homepage();
            projectData.pages.data.faq();
            projectData.pages.data.downloadGuidesAndAssets();
            projectData.pages.data.howItWorks();
        },
        data: {
            homepage: async function () {
                if ($('body').hasClass('logged-home') || $('body').hasClass('home')) {
                    projectData.general_logic.data.initSlidingContractFormLogic();

                    $('.below-options .single-option').hover(function () {
                        $(this).addClass('active');
                        $(document).bind('mousemove', imageFollowingCursorPosition);
                    }, function () {
                        $('.below-options .single-option.active .image-shown-on-hover').removeClass('active');
                        $(this).removeClass('active');
                        $(document).unbind('mousemove', imageFollowingCursorPosition);
                    });

                    function imageFollowingCursorPosition(event) {
                        $('.below-options .single-option.active .image-shown-on-hover').addClass('active').offset({top: event.pageY + 5, left: event.pageX + 5});
                    }

                    // load slick lib
                    if (!hasOwnProperty.call(loadedLibs, 'slick')) {
                        console.log('slick loaded');
                        loadedLibs.slick = true;
                        $('head').append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="/dist/libs/slick/slick.min.css"/>');
                        await $.getScript('/dist/libs/slick/slick.min.js', function() {});
                    }

                    $('.testimonials-slider-section').slick({
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        autoplay: true,
                        autoplaySpeed: 8000,
                        dots: true,
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

                    if ($('.google-map-section iframe').length) {
                        console.log('iframeHeightListenerInit');
                        window.addEventListener('message', function(event) {
                            if(event.data.event_id === 'iframe_size_event'){
                                var height = event.data.data.height;
                                console.log(height, 'height');
                                if (height != undefined && height > 0) {
                                    $('.google-map-section iframe').height(height + 50);
                                }
                            }
                        });
                    }

                    // set initial slider height
                    var initialHeight = 0;
                    for(var i = 0, len = $('.single-testimonial.slick-slide.slick-active').length; i < len; i+=1)  {
                        if ($('.single-testimonial.slick-slide.slick-active').eq(i).height() > initialHeight) {
                            initialHeight = $('.single-testimonial.slick-slide.slick-active').eq(i).height();
                        }
                    }
                    $('.testimonials-slider-section .slick-list').animate({height: initialHeight}, 500);

                    $('.testimonials-slider-section').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                        var height = 0;
                        for(var i = 0, len = $('.single-testimonial.slick-slide.slick-active').length; i < len; i+=1)  {
                            if ($('.slick-slide').eq((nextSlide + $('.single-testimonial.slick-slide.slick-active').length) + i).height() > height) {
                                height = $('.slick-slide').eq((nextSlide + $('.single-testimonial.slick-slide.slick-active').length) + i).height();
                            }
                        }
                        $('.testimonials-slider-section .slick-list').animate({height: height}, 500);
                    });

                    $('.testimonials-slider-section').on('afterChange', function(event, slick, currentSlide, nextSlide){
                        $.event.trigger({
                            type: 'setHubPosition',
                            time: new Date()
                        });

                        projectData.general_logic.data.loadDeferResources();
                    });

                    if ($('.shortcode.contact-us').length && $('.shortcode.contact-us').attr('data-scroll-to-here') != undefined) {
                        scrollToContactUsNow();
                    }

                    if ($('body').hasClass('logged-in')) {
                        $('.change-on-logged-in-to-scroll-to-contact-us').html('CONTACT US').removeClass('dentist-register open-dentacoin-gateway sign-up-steps-partner-event-tracker').addClass('scroll-to-contact-us-now contact-us-steps-partner-event-tracker');
                    }

                    if ($('#append-big-hub-dentists').length) {
                        var bigHubInit = true;
                        // if on load the view is scrolled to the twitter section
                        if (basic.isInViewport($('#append-big-hub-dentists'))) {
                            bigHubInit = false;
                            initBigHub();
                        }

                        $(window).on('scroll', function() {
                            if (bigHubInit && basic.isInViewport($('#append-big-hub-dentists'))) {
                                bigHubInit = false;
                                initBigHub();
                            }
                        });

                        async function initBigHub() {
                            if (!hasOwnProperty.call(loadedLibs, 'bigHubStyle')) {
                                loadedLibs.bigHubStyle = true;
                                $('head').append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="//dentacoin.com/assets/libs/dentacoin-package/css/styles-big-hub.css?v='+new Date().getTime()+'"/>');
                            }

                            if (!hasOwnProperty.call(loadedLibs, 'dentacoinPackageJs')) {
                                loadedLibs.dentacoinPackageJs = true;
                                await $.getScript('//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v='+new Date().getTime(), function() {});
                            }

                            var bigHubParams = {
                                'element_id_to_append' : 'append-big-hub-dentists',
                                'type_hub' : 'dentists',
                                'hub_title' : 'Use for Free with One Profile'
                            };

                            dcnHub.initBigHub(bigHubParams);
                        }
                    }
                }
            },
            faq: function() {
                if ($('body').hasClass('faq')) {
                    if ($('.list .question').length > 0) {
                        $('.list .question').click(function()   {
                            $(this).closest('li').find('.question-content').toggle(300);
                        });
                    }
                }
            },
            downloadGuidesAndAssets: async function() {
                if ($('body').hasClass('download-guides-assets')) {
                    /*$('body').addClass('overflow-hidden');
                    if ($(window).width() > 992) {*/
                    $('.active-on-desktop').addClass('active');
                    $('.hover-on-desktop').addClass('hover');
                    /*}
                    $('body').removeClass('overflow-hidden');*/

                    $('.navigation-sidebar .page-nav a').click(function() {
                        $('.navigation-sidebar .page-nav a').removeClass('active');
                        $(this).addClass('active');

                        if ($(this).attr('data-type') == 'dentists') {
                            $('.if-dentist').removeClass('hide');
                            $('.if-patient').addClass('hide');

                            for (var i = 0, len = $('.changeable-html-on-user-type-change').length; i < len; i+=1) {
                                $('.changeable-html-on-user-type-change').eq(i).html($('.changeable-html-on-user-type-change').eq(i).attr('data-dentist'));
                            }

                            for (var i = 0, len = $('.changeable-src-on-user-type-change').length; i < len; i+=1) {
                                $('.changeable-src-on-user-type-change').eq(i).attr('src', $('.changeable-src-on-user-type-change').eq(i).attr('data-dentist'));
                            }

                            for (var i = 0, len = $('.changeable-href-on-user-type-change').length; i < len; i+=1) {
                                $('.changeable-href-on-user-type-change').eq(i).attr('href', $('.changeable-href-on-user-type-change').eq(i).attr('data-dentist'));
                            }

                            for (var i = 0, len = $('.changeable-attr-on-user-type-change').length; i < len; i+=1) {
                                $('.changeable-attr-on-user-type-change').eq(i).attr('data-scroll-to', $('.changeable-attr-on-user-type-change').eq(i).attr('data-dentist'));
                            }
                        } else if ($(this).attr('data-type') == 'patients') {
                            ifPatient();
                        }
                    });

                    function ifPatient() {
                        $('.if-patient').removeClass('hide');
                        $('.if-dentist').addClass('hide');

                        for (var i = 0, len = $('.changeable-html-on-user-type-change').length; i < len; i+=1) {
                            $('.changeable-html-on-user-type-change').eq(i).html($('.changeable-html-on-user-type-change').eq(i).attr('data-patient'));
                        }

                        for (var i = 0, len = $('.changeable-src-on-user-type-change').length; i < len; i+=1) {
                            $('.changeable-src-on-user-type-change').eq(i).attr('src', $('.changeable-src-on-user-type-change').eq(i).attr('data-patient'));
                        }

                        for (var i = 0, len = $('.changeable-href-on-user-type-change').length; i < len; i+=1) {
                            $('.changeable-href-on-user-type-change').eq(i).attr('href', $('.changeable-href-on-user-type-change').eq(i).attr('data-patient'));
                        }

                        for (var i = 0, len = $('.changeable-attr-on-user-type-change').length; i < len; i+=1) {
                            $('.changeable-attr-on-user-type-change').eq(i).attr('data-scroll-to', $('.changeable-attr-on-user-type-change').eq(i).attr('data-patient'));
                        }

                        window.scrollTo(0, $(window).scrollTop() + 10);
                    }

                    $('.mobile-nav-opener a').click(function() {
                        $('.nav-holder').fadeToggle(500);
                    });

                    $('.navigation-sidebar .nav-list button').click(function() {
                        var this_btn = $(this);

                        $('.navigation-sidebar .nav-list h2').removeClass('active');
                        $('.navigation-sidebar .nav-list li').removeClass('active');
                        this_btn.closest('li').addClass('active');
                        this_btn.closest('.nav-list').find('h2').addClass('active');

                        $('html, body').animate({
                            scrollTop: $('#'+this_btn.attr('data-scroll-to')).offset().top - $('header').outerHeight()
                        }, 300);

                        $('.clear-hover').removeClass('hover');
                        if (this_btn.attr('data-type') != undefined) {
                            $('.'+this_btn.attr('data-type')).addClass('hover');
                        }

                        var whitelistedButtons = ['scroll-to-how-to-become-dentist', 'scroll-to-trusted-reviews', 'scroll-to-hubapp', 'scroll-to-dcn-payments', 'scroll-to-dentavox', 'scroll-to-assurance', 'scroll-to-dentacoin-wallet', 'scroll-to-dentacare-app', 'scroll-to-jawsofbattle-app', 'scroll-to-badges', 'scroll-to-banners', 'scroll-to-covers', 'scroll-to-promo-banners', 'scroll-to-dcn-logo'];
                        if (whitelistedButtons.includes(this_btn.attr('data-scroll-to'))) {
                            if ($('.navigation-sidebar .page-nav a[data-type="patients"]').hasClass('active')) {
                                history.pushState({},'', '?type=patient&section=' + this_btn.attr('data-scroll-to').replace('scroll-to-', ''));
                            } else {
                                history.pushState({},'', '?section=' + this_btn.attr('data-scroll-to').replace('scroll-to-', ''));
                            }
                        }
                    });

                    $('.share-video').click(async function() {
                        // load slick lib
                        if (!hasOwnProperty.call(loadedLibs, 'clipboard')) {
                            console.log('clipboard loaded');
                            loadedLibs.clipboard = true;
                            await $.getScript('/dist/libs/clipboard/clipboard.min.js', function() {});
                        }

                        var videoLinkRaw = $(this).closest('.section-content').find('iframe').attr('src');
                        var videoLink = encodeURIComponent(videoLinkRaw);

                        basic.showDialog('<div class="fs-18 lato-bold dark-blue">Share</div><div class="padding-top-15 padding-bottom-15 copy-link module"><div class="next-to-copy-btn"><input autocomplete="off" readonly type="text" class="custom-input input-field" id="link-to-be-copied" value="'+videoLinkRaw+'"/></div><a href="javascript:void(0)" class="lato-bold fs-20 copy-btn" data-toggle="tooltip" title="" data-clipboard-target="#link-to-be-copied" data-original-title="Copied."><figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block fs-0"><img alt="Copy icon" src="/assets/images/copy-icon.svg" class="width-100 max-width-20"/></figure> COPY</a></div><div class="fs-0"><span class="inline-block fs-16 dark-blue">Or share it via:</span> <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-left-10 margin-bottom-10 margin-right-5"> <a href="https://www.facebook.com/sharer/sharer.php?u='+videoLink+'" target="_blank"> <img alt="Facebook icon" src="/assets/images/facebook-share.svg" class="width-100 max-width-40"/> </a> </figure><figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-bottom-10 margin-right-5"> <a class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text='+videoLink+'"> <img alt="Twitter icon" src="/assets/images/twitter-share.svg" class="width-100 max-width-40"/> </a></figure> <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-bottom-10 margin-right-5"> <a href="https://www.linkedin.com/shareArticle?mini=true&url='+videoLink+'" target="_blank"><img alt="Linkedin icon" src="/assets/images/linkedin-share.svg" class="width-100 max-width-40"/></a> </figure></div>', 'share-video-popup', null);

                        if ($('.copy-btn').length) {
                            var clipboard = new ClipboardJS('.copy-btn');
                            var clipboard_timer;
                            clipboard.on('success', function(e) {
                                $('.copy-btn').tooltip('show');

                                clearInterval(clipboard_timer);

                                clipboard_timer = setTimeout(function()   {
                                    $('.copy-btn').tooltip('hide');
                                }, 1500);
                            });

                            $('.copy-btn').tooltip({
                                trigger: 'click'
                            });
                        }
                    });

                    // load slick lib
                    if (!hasOwnProperty.call(loadedLibs, 'slick')) {
                        console.log('slick loaded');
                        loadedLibs.slick = true;
                        $('head').append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="/dist/libs/slick/slick.min.css"/>');
                        await $.getScript('/dist/libs/slick/slick.min.js', function() {});
                    }

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

                    $(window).on('load', function() {
                        if (basic.property_exists(get_params, 'type') || basic.property_exists(get_params, 'section')) {
                            for (var i = 0, len = jQuery('[data-defer-src]').length; i < len; i+=1) {
                                if (jQuery('[data-defer-src]').eq(i).attr('src') == undefined) {
                                    jQuery('[data-defer-src]').eq(i).attr('src', jQuery('[data-defer-src]').eq(i).attr('data-defer-src'));
                                }
                            }
                        }

                        if (basic.property_exists(get_params, 'type')) {
                            if (get_params.type == 'patient') {
                                $('.navigation-sidebar .page-nav a').removeClass('active');
                                $('.navigation-sidebar .page-nav a[data-type="patients"]').addClass('active');
                                ifPatient(true);
                            }
                        }

                        if (basic.property_exists(get_params, 'section')) {
                            if (get_params.section == 'how-to-become-dentist') {
                                $('button[data-scroll-to="scroll-to-how-to-become-dentist"]').click();
                            } else if (get_params.section == 'trusted-reviews') {
                                $('button[data-scroll-to="scroll-to-trusted-reviews"]').click();
                            } else if (get_params.section == 'hubapp') {
                                $('button[data-scroll-to="scroll-to-hubapp"]').click();
                            } else if (get_params.section == 'dcn-payments') {
                                $('button[data-scroll-to="scroll-to-dcn-payments"]').click();
                            } else if (get_params.section == 'dentavox') {
                                $('button[data-scroll-to="scroll-to-dentavox"]').click();
                            } else if (get_params.section == 'assurance') {
                                $('button[data-scroll-to="scroll-to-assurance"]').click();
                            } else if (get_params.section == 'dentacoin-wallet') {
                                $('button[data-scroll-to="scroll-to-dentacoin-wallet"]').click();
                            } else if (get_params.section == 'dentacare-app') {
                                $('button[data-scroll-to="scroll-to-dentacare-app"]').click();
                            } else if (get_params.section == 'jawsofbattle-app') {
                                $('button[data-scroll-to="scroll-to-jawsofbattle-app"]').click();
                            } else if (get_params.section == 'dentist-promo-banners' || (basic.property_exists(get_params, 'type') && get_params.type == 'badges')) {
                                $('button[data-scroll-to="scroll-to-badges"]').click();
                            } else if (get_params.section == 'banners') {
                                $('button[data-scroll-to="scroll-to-banners"]').click();
                            } else if (get_params.section == 'covers') {
                                $('button[data-scroll-to="scroll-to-covers"]').click();
                            } else if (get_params.section == 'promo-banners') {
                                $('button[data-scroll-to="scroll-to-promo-banners"]').click();
                            } else if (get_params.section == 'dcn-logo') {
                                $('button[data-scroll-to="scroll-to-dcn-logo"]').click();
                            }
                        }
                    });
                }
            },
            howItWorks: function() {
                if ($('body').hasClass('how-it-works')) {
                    projectData.general_logic.data.initSlidingContractFormLogic();

                    if ($('body').hasClass('logged-in')) {
                        $('.change-on-logged-in-to-scroll-to-contact-us').html('LEARN MORE').removeClass('dentist-register open-dentacoin-gateway learn-more-img-how-it-works-event-tracker').addClass('scroll-to-contact-us-now contact-us-how-it-works-header-event-tracker');
                    }
                }
            }
        }
    },
    general_logic: {
        not_logged_in: function () {
            projectData.general_logic.data.cookie();
            projectData.general_logic.data.newsletter();
            projectData.general_logic.data.bindGoogleAlikeButtonsEvents();
        },
        logged_in: function () {
            projectData.general_logic.data.cookie();
            projectData.general_logic.data.newsletter();
            projectData.general_logic.data.bindGoogleAlikeButtonsEvents();
            projectData.general_logic.data.miniHub();
        },
        data: {
            showLoader: function() {
                if (!$('.camping-loader').hasClass('loaded')) {
                    $('.camping-loader').html('<div class="response-layer"><div class="wrapper"><picture itemscope="" itemtype="http://schema.org/ImageObject"><source media="(max-width: 768px)" srcset="//dentacoin.com/assets/uploads/dcn-flipping-coin-logo-loader-v3-mobile.gif"><img itemprop="contentUrl" src="//dentacoin.com/assets/uploads/dcn-flipping-coin-logo-loader-v3_desktop.gif" class="max-width-250 max-width-xs-200" alt="Loader"></picture></div></div>').addClass('loaded');
                    $('.camping-loader .response-layer').show();
                } else {
                    $('.camping-loader .response-layer').show();
                }
            },
            hideLoader: function() {
                $('.camping-loader .response-layer').hide();
            },
            loadDeferResources: function () {
                // lazy load images
                for (var i = 0, len = jQuery('[data-defer-src]').length; i < len; i += 1) {
                    if (basic.isInViewport(jQuery('[data-defer-src]').eq(i)) && jQuery('[data-defer-src]').eq(i).attr('src') == undefined) {
                        jQuery('[data-defer-src]').eq(i).attr('src', jQuery('[data-defer-src]').eq(i).attr('data-defer-src'));
                    }
                }
            },
            cookie: async function () {
                if (basic.cookies.get('performance_cookies') == '' && basic.cookies.get('performance_cookies') == '' && basic.cookies.get('performance_cookies') == '' && basic.cookies.get('performance_cookies') == '') {
                    console.log('dentacoinPackageJs loaded');
                    loadedLibs.dentacoinPackageJs = true;
                    $('head').append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="//dentacoin.com/assets/libs/dentacoin-package/css/style-cookie.css?v=' + new Date().getTime() + '"/>');
                    await $.getScript('//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v=' + new Date().getTime(), function () {
                    });

                    if (typeof(dcnCookie) != 'undefined') {
                        dcnCookie.init({
                            'google_app_id': 'UA-97167262-3',
                            'fb_app_id': '2366034370318681'
                        });
                    }
                }
            },
            miniHub: async function () {
                // initialization of the mini hub located below user avatars
                if (!hasOwnProperty.call(loadedLibs, 'dentacoinPackageJs')) {
                    loadedLibs.dentacoinPackageJs = true;
                    console.log('dentacoinPackageJs loaded');
                    await $.getScript('//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v=' + new Date().getTime(), function () {
                    });
                }

                var miniHubParams = {
                    'element_id_to_bind': 'header-avatar',
                    'platform': 'dentists',
                    'log_out_link': 'https://dentists.dentacoin.com/user-logout',
                    'notifications_counter': true
                };

                if ($('body').hasClass('logged-patient')) {
                    miniHubParams.type_hub = 'mini-hub-patients';
                    if ($('body').hasClass('home')) {
                        miniHubParams.without_apps = true;
                    }
                } else if ($('body').hasClass('logged-dentist')) {
                    miniHubParams.type_hub = 'mini-hub-dentists';
                    if ($('body').hasClass('home')) {
                        miniHubParams.without_apps = true;
                    }
                }

                dcnHub.initMiniHub(miniHubParams);
            },
            newsletter: function() {
                // newslettor form located in the footer
                if ($('.newsletter-register').length) {
                    basic.initCustomCheckboxes('.newsletter-register');

                    $('.newsletter-register form').on('submit', function (event) {
                        event.preventDefault();
                        var this_form_native = this;
                        var this_form = $(this_form_native);

                        var error = false;
                        this_form.find('.error-handle').remove();

                        if (!basic.validateEmail(this_form.find('input[type="email"]').val().trim())) {
                            error = true;
                            customErrorHandle(this_form.find('input[type="email"]').closest('.newsletter-field'), this_form.find('input[type="email"]').closest('.newsletter-field').attr('data-valid-message'));
                        }

                        if (!this_form.find('#newsletter-privacy-policy').is(':checked')) {
                            error = true;
                            customErrorHandle(this_form.find('#newsletter-privacy-policy').closest('.newsletter-field'), this_form.find('#newsletter-privacy-policy').closest('.newsletter-field').attr('data-valid-message'));
                        }

                        if (!error) {
                            projectData.events.fireGoogleAnalyticsEvent('Newsletter', 'Subscribe', 'Subscribe');
                            fbq('track', 'Newsletter');

                            this_form_native.submit();

                            $('.newsletter-register form .custom-checkbox').html('');
                            $('.newsletter-register form #newsletter-privacy-policy').prop('checked', false);
                            this_form.find('input[type="email"]').val('');
                            $('.newsletter-register .form-container').append('<div class="alert alert-success fs-16 margin-top-10">Thank you for signing up.</div>');
                        }
                    });
                }
            },
            bindGoogleAlikeButtonsEvents: function() {
                //google alike style for label/placeholders
                $('body').on('click', '.custom-google-label-style label', function() {
                    $(this).addClass('active-label');
                    if ($('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
                        $(this).parent().find('input').addClass('blue-green-border');
                    }
                });

                $('body').on('keyup change focusout', '.custom-google-label-style input', function() {
                    var value = $(this).val().trim();
                    if (value.length) {
                        $(this).closest('.custom-google-label-style').find('label').addClass('active-label');
                        if ($(this).closest('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
                            $(this).addClass('blue-green-border');
                        }
                    } else {
                        $(this).closest('.custom-google-label-style').find('label').removeClass('active-label');
                        if ($(this).closest('.custom-google-label-style').attr('data-input-colorful-border') == 'true') {
                            $(this).removeClass('blue-green-border');
                        }
                    }
                });
            },
            initSlidingContractFormLogic: function() {
                if ($('.sliding-fields-container').length) {
                    basic.initCustomCheckboxes('.sliding-fields-container');

                    $('.sliding-fields-container .step.two [name="interested_in_"]').on('change', function() {
                        if ($(this).val() == 'Other (please specify)') {
                            $('.step.two').append('<div class="padding-bottom-20 field-parent on-right-side inline-block-top select-other-value"><div class="custom-google-label-style module" data-input-colorful-border="true"><label for="additional_information">Other:</label><input class="full-rounded form-field" name="additional_information" maxlength="100" id="additional_information" type="text"/></div></div>');

                            $('.step.two label[for="additional_information"]').addClass('active-label');
                            $('.step.two #additional_information').focus();
                        } else {
                            if ($('.step.two .select-other-value').length) {
                                $('.step.two .select-other-value').remove();
                            }
                        }
                    });

                    $('.bullet-navigation [data-step-bullet]').click(function() {
                        var this_btn = $(this);
                        switch($('.sliding-fields-container').attr('data-current-step')) {
                            case 'one':
                                if (this_btn.attr('data-step-bullet') == 'two' || this_btn.attr('data-step-bullet') == 'two') {
                                    validateFirstStep();
                                }
                                break;
                            case 'two':
                                if (this_btn.attr('data-step-bullet') == 'one') {
                                    $('.sliding-fields-container').attr('data-current-step', 'one').find('.steps-wrapper').removeClass('scroll-to-second-step');

                                    $('.bullet-navigation [data-step-bullet]').removeClass('active');
                                    $('.bullet-navigation [data-step-bullet="one"]').addClass('active');
                                } else if (this_btn.attr('data-step-bullet') == 'three') {
                                    validateSecondStep();
                                }
                                break;
                            case 'three':
                                if (this_btn.attr('data-step-bullet') == 'one') {
                                    $('.sliding-fields-container').attr('data-current-step', 'one').find('.steps-wrapper').removeClass('scroll-to-second-step scroll-to-third-step');

                                    $('.bullet-navigation [data-step-bullet]').removeClass('active');
                                    $('.bullet-navigation [data-step-bullet="one"]').addClass('active');
                                } else if (this_btn.attr('data-step-bullet') == 'two') {
                                    $('.sliding-fields-container').attr('data-current-step', 'two').find('.steps-wrapper').removeClass('scroll-to-third-step');

                                    $('.bullet-navigation [data-step-bullet]').removeClass('active');
                                    $('.bullet-navigation [data-step-bullet="two"]').addClass('active');
                                }
                                break;
                        }
                    });

                    function validateFirstStep() {
                        $('.step.one .error-handle').remove();
                        var errors = false;

                        if ($('.step.one [name="firstname"]').val().trim() == '') {
                            customErrorHandle($('.step.one [name="firstname"]').closest('.field-parent'), 'Please complete this required field.');
                            errors = true;
                        }

                        if (!basic.validateEmail($('.step.one [name="email"]').val().trim())) {
                            customErrorHandle($('.step.one [name="email"]').closest('.field-parent'), 'Please enter valid email address.');
                            errors = true;
                        }

                        if (!$('.step.one #hs_legal_basis').is(':checked')) {
                            customErrorHandle($('.step.one #hs_legal_basis').closest('.gdpr-checkbox'), 'Please, accept the Privacy policy to proceed.');
                            errors = true;
                        }

                        if (!errors) {
                            projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Next', 'Step 1');
                            fbq('track', 'ContactForm1');

                            $('.sliding-fields-container').attr('data-current-step', 'two').find('.steps-wrapper').addClass('scroll-to-second-step');

                            $('.bullet-navigation [data-step-bullet]').removeClass('active');
                            $('.bullet-navigation [data-step-bullet="two"]').addClass('active');
                        }
                    }

                    function validateSecondStep() {
                        $('.step.two .error-handle').remove();
                        var errors = false;

                        if ($('.step.two [name="jobtitle"]').val().trim() == '') {
                            customErrorHandle($('.step.two [name="jobtitle"]').closest('.field-parent'), 'Please complete this required field.');
                            errors = true;
                        }

                        if ($('.step.two [name="interested_in_"]').val().trim() == '' || $('.step.two [name="interested_in_"]').val().trim() == 'disabled') {
                            customErrorHandle($('.step.two [name="interested_in_"]').closest('.field-parent'), 'Please complete this required field.');
                            errors = true;
                        }

                        if ($('.step.two #additional_information').length && $('.step.two #additional_information').val().trim() == '') {
                            customErrorHandle($('.step.two #additional_information').closest('.field-parent'), 'Please complete this required field.');
                            errors = true;
                        }

                        if (!errors) {
                            projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Next', 'Step 2');
                            fbq('track', 'ContactForm2');

                            $('.sliding-fields-container').attr('data-current-step', 'three').find('.steps-wrapper').addClass('scroll-to-third-step');

                            $('.bullet-navigation [data-step-bullet]').removeClass('active');
                            $('.bullet-navigation [data-step-bullet="three"]').addClass('active');
                        }
                    }

                    function validateThirdStep(form, btn) {
                        $('.step.three .error-handle').remove();
                        var errors = false;

                        if ($('.step.three [name="website"]').val().trim() == '' || !basic.validateUrl($('.step.three [name="website"]').val().trim())) {
                            customErrorHandle($('.step.three [name="website"]').closest('.field-parent'), 'Please enter website URL starting with http:// or https://.');
                            errors = true;
                        }

                        if (!errors) {
                            btn.attr('type', 'submit');
                            btn.click();
                        }
                    }

                    if ($('.thank-you-message').length) {
                        projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Next', 'Form Submission');
                        fbq('track', 'ContactFormSubmit');
                    }

                    $('.shortcode.contact-us .next-step').click(function() {
                        var this_btn = $(this);
                        switch($('.sliding-fields-container').attr('data-current-step')) {
                            case 'one':
                                validateFirstStep();

                                break;
                            case 'two':
                                validateSecondStep();

                                break;
                            case 'three':
                                validateThirdStep(document.getElementsByClassName('contact-us-form')[0], this_btn);

                                break;
                        }
                    });
                }
            }
        }
    },
    events: {
        eventTrackers: function() {
            $(document).on('click', '.contact-us-header-event-tracker', function(event) {
                if ($('body').hasClass('home') || $('body').hasClass('how-it-works')) {
                    projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Header');
                } else {
                    projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Header');
                }
            });

            $(document).on('click', '.learn-more-top-banner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Learn More', 'Banner Up');
            });

            $(document).on('click', '.learn-more-homepage-above-the-fold-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Learn More', 'Hero Img');
            });

            $(document).on('click', '.contact-us-menu-event-tracker', function(event) {
                if ($('body').hasClass('home') || $('body').hasClass('how-it-works')) {
                    projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Menu');
                } else {
                    projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Menu');
                }
            });

            $(document).on('click', '.contact-us-steps-partner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Steps Partner');
            });

            $(document).on('click', '.sign-up-steps-partner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('DentistRegistration', 'Sign Up', 'Steps Partner');
            });

            $(document).on('click', '.learn-more-above-map-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Learn More', 'Banner Down');
            });

            $(document).on('click', '.open-dentacoin-company-intro-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Intro');
            });

            $(document).on('click', '.contact-us-after-video-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Contact Us', 'Icon Down');
            });

            $(document).on('click', '.learn-more-how-it-works-top-banner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contact Form', 'Learn More', 'Banner Up');
            });

            $(document).on('click', '.dentist-register-how-it-works-top-banner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('DentistRegistration', 'Sign Up', 'Hero Img');
            });

            $(document).on('click', '.learn-more-img-how-it-works-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contract Form', 'Learn More', 'Hero Img');
            });

            $(document).on('click', '.start-now-free-promo-how-it-works-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contract Form', 'Contact us', 'Free Promo');
            });

            $(document).on('click', '.start-now-payments-how-it-works-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Contract Form', 'Contact us', 'Payments');
            });

            $(document).on('click', '.dentist-download-en-brochure-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Brochure EN');
            });

            $(document).on('click', '.dentist-download-de-brochure-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Brochure DE');
            });

            $(document).on('click', '.download-all-pdf-guides-event-tracker', function(event) {
                if ($('.navigation-sidebar .page-nav a.active').attr('data-type') == 'dentists') {
                    projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Guides All');
                } else if ($('.navigation-sidebar .page-nav a.active').attr('data-type') == 'patients') {
                    projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Patient Guides All');
                }
            });

            $(document).on('click', '.download-partner-brochure-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Partner Brochure');
            });

            $(document).on('click', '.download-badge-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Badge');
            });

            $(document).on('click', '.download-banner-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Banner');
            });

            $(document).on('click', '.download-all-banners-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Banners All');
            });

            $(document).on('click', '.download-facebook-cover-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'FB Cover');
            });

            $(document).on('click', '.download-all-facebook-covers-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'FB Covers All');
            });

            $(document).on('click', '.download-logo-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Logo');
            });

            $(document).on('click', '.patient-download-en-brochure-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Patient Brochure EN');
            });

            $(document).on('click', '.patient-download-de-brochure-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Patient Brochure DE');
            });

            $(document).on('click', '.download-all-files-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Assets All');
            });

            $(document).on('click', '.download-fact-sheet-event-tracker', function(event) {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Factsheet EN');
            });

            $(document).on('click', '.download-de-fact-sheet-event-tracker', function() {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'DE Factsheet');
            });

            $(document).on('click', '.download-patients-brochure-event-tracker', function() {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Patient Brochure');
            });

            $(document).on('click', '.download-logo-event-tracker', function() {
                projectData.events.fireGoogleAnalyticsEvent('Assets', 'Download', 'Logo');
            });

            $(document).on('click', '.register-on-trp-event-tracker', function() {
                projectData.events.fireGoogleAnalyticsEvent('Tools', 'Register', 'TRP Register');
            });
        },
        fireGoogleAnalyticsEvent: function (category, action, label, value) {
            var event_obj = {
                'event_action': action,
                'event_category': category,
                'event_label': label
            };

            if (value != undefined) {
                event_obj.value = value;
            }

            gtag('event', label, event_obj);
        }
    }
};

projectData.general_logic.data.loadDeferResources();

if ($('body').hasClass('logged-in')) {
    projectData.pages.logged_in();
    projectData.general_logic.logged_in();
} else {
    projectData.pages.not_logged_in();
    projectData.general_logic.not_logged_in();
}

projectData.events.eventTrackers();

/*
// banner promoting the holiday calendar campaign
if ($('.bottom-fixed-promo-banner').length) {
    $('.bottom-fixed-promo-banner .close-banner').click(function() {
        $('footer').removeClass('extra-bottom-padding');
        $('.bottom-fixed-promo-banner').remove();

        var now = new Date();
        var time = now.getTime();
        time += 7200 * 1000;
        now.setTime(time);
        document.cookie = 'hide-holiday-calendar-banner=1; expires=' + now.toUTCString() + ';domain=dentists.dentacoin.com;path=/;';
    });
}*/
