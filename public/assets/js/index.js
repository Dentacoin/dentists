var {getWeb3} = require('./helper');

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
    if($('body').hasClass('home') || $('body').hasClass('logged-home')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('scroll', function()  {
    //homepageHowToBecomeDentacoinDentistBackgroundParallax();
});

var dApp = {
    infura_node: 'https://rinkeby.infura.io/v3/c3a8017424324e47be615fb4028275bb',
    web3Provider: null,
    web3_0_2: null,
    web3_1_0: null,
    init: function () {
        return dApp.initWeb3();
    },
    initWeb3: async function () {
        dApp.web3_1_0 = getWeb3(new Web3.providers.HttpProvider(dApp.infura_node));
    }
};

dApp.init();

//checking if passed address is valid
function innerAddressCheck(address)    {
    return dApp.web3_1_0.utils.isAddress(address);
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
if($('body').hasClass('home') || $('body').hasClass('logged-home')) {

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
            if($('.slick-slide').eq((nextSlide + 4) + i).height() > height) {
                height = $('.slick-slide').eq((nextSlide + 4) + i).height();
            }
        }
        $('.testimonials-slider-section .slick-list').animate({height: height}, 500);
    });

    //logic for open application popup
    /*$('.single-application').click(function()   {
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
    });*/

    var start_clicking_from_num = 1;
    var init_apps_interval_slide;
    //logic for open application popup
    $('.single-application').click(function()   {
        $('.single-application').removeClass('show-shadow');
        $(this).addClass('show-shadow');
        var this_btn = $(this).find('.wrapper');
        var extra_html = '';
        var media_html = '';

        if(this_btn.attr('data-articles') != undefined)    {
            extra_html+='<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><div class="slider-with-tool-data">';
            var articles_arr = $.parseJSON(this_btn.attr('data-articles'));
            for(var i = 0, len = articles_arr.length; i < len; i+=1)    {
                extra_html+='<a target="_blank" href="'+articles_arr[i]['link']+'"><div class="single-slide text-left fs-0"><figure class="inline-block-top" itemscope="" itemtype="http://schema.org/ImageObject"><img src="'+articles_arr[i]['thumb']+'" alt="" itemprop="contentUrl"/></figure><div class="content inline-block-top"><div class="slide-title">'+articles_arr[i]['post_title']+'</div><time>'+dateObjToFormattedDate(new Date(parseInt(articles_arr[i]['date']) * 1000))+'</time></div></div></a>';
            }
            extra_html+='</div><div class="text-center padding-top-15"><a href="//blog.dentacoin.com/" class="white-dark-blue-btn" target="_blank">GO TO ALL</a></div></div>';
        }

        /*if(['mp4', 'avi'].indexOf(this_btn.attr('data-image-type')) > -1) {
            media_html+='<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject" class="col-sm-6 video"><video autoplay loop muted controls="false"><source src="'+this_btn.attr('data-image')+'" type="video/'+this_btn.attr('data-image-type')+'"></video><meta itemprop="name" content="'+this_btn.attr('data-title')+'"><meta itemprop="uploadDate" content="'+this_btn.attr('data-upload-date')+'"></div>';
        }else {
            media_html+='<figure class="col-sm-6 gif"><img src="'+this_btn.attr('data-image')+'?'+new Date().getTime()+'" alt="'+this_btn.attr('data-image-alt')+'"/></figure>';
        }*/

        var description = '';
        if(this_btn.attr('data-description') != '') {
            description = $.parseJSON(this_btn.attr('data-description'));
        }

        var html = '<div class="container-fluid"><div class="row">'+media_html+'<div class="col-sm-12 content"><figure class="logo"><img src="'+this_btn.attr('data-popup-logo')+'" alt="'+this_btn.attr('data-popup-logo-alt')+'"/></figure><div class="title">'+this_btn.find('figcaption').html()+'</div><div class="description">'+description+'</div>'+extra_html+'</div></div></div>';

        $('.applications-section .info-section .html-content').html(html);

        if(extra_html != '') {
            initToolsPostsSlider();
        }

        $('.applications-section .info-section video').removeAttr('controls');

        $('body').addClass('overflow-hidden');
        if($(window).width() > 992) {
            clearInterval(init_apps_interval_slide);

            start_clicking_from_num = $(this).index() + 1;
            if(start_clicking_from_num == 8) {
                start_clicking_from_num = 0;
            }

            init_apps_interval_slide = setTimeout(function() {
                $('.applications-section .single-application').eq(start_clicking_from_num).click();
            }, 15000);
        } else {
            $('.applications-section .apps-list').hide();
            $('.applications-section .info-section').fadeIn(500);
        }

        $('.applications-section .info-section .close-application').click(function() {
            $('.applications-section .apps-list').fadeIn(500);
            $('.applications-section .info-section').hide();
        });

        $('body').removeClass('overflow-hidden');
    });

    $('body').addClass('overflow-hidden');
    if($(window).width() > 992) {
        $('.applications-section .single-application').eq(0).click();
    }
    $('body').removeClass('overflow-hidden');
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
        $('.custom-popup.video .wrapper').html('<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject"><video controls><source src="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4" type="video/mp4">Your browser does not support HTML5 video.</video><meta itemprop="name" content="Dentacoin Introduction Video"><meta itemprop="description" content="Explainer video: Dentacoin, the Blockchain Solution for the Global Dentistry"><meta itemprop="uploadDate" content="2019-03-19T08:00:00+08:00"><link itemprop="contentURL" href="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4"></div>');
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
    if($('body').hasClass('logged-home') || (!$('body').hasClass('logged-in')  && $('body').hasClass('home'))) {
        if($('.scrolling-to-section').length > 0) {
            $('.scrolling-to-section').click(function() {
                $(this).blur();
                window.history.pushState($(this).find('span').html(), '', '/#'+$(this).attr('id'));
                $("html, body").animate({scrollTop: $('[data-scroll-here="'+$(this).attr('id')+'"]').offset().top - $('header').outerHeight()}, 300);
                return false;
            });
        }
    } else if($('body').hasClass('logged-in')) {
        $('.scrolling-to-section').click(function() {
            window.location = '/home#' + $(this).attr('id');
        });
    }
}
initScrollingToEvents();

//on page load if we have #parameter in the URL scroll down to section
function scrollToSection(){
    $('[data-scroll-here]').each(function() {
        if(window.location.href.indexOf('#' + $(this).attr('data-scroll-here')) != -1){
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
    $(document).on('click', '.white-dark-blue-btn', function() {
        $(this).blur();
    });
    $(document).on('click', '.dark-blue-white-btn', function() {
        $(this).blur();
    });
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

function hidePopupOnBackdropClick() {
    $(document).on('click', '.bootbox', function(){
        var classname = event.target.className;
        classname = classname.replace(/ /g, '.');

        if(classname && !$('.' + classname).parents('.modal-dialog').length) {
            if($('.bootbox.login-signin-popup').length) {
                $('.hidden-login-form').html(hidden_popup_content);
            }
            bootbox.hideAll();
        }
    });
}
hidePopupOnBackdropClick();

var hidden_popup_content = $('.hidden-login-form').html();
//call the popup for login/sign for patient and dentist
function bindLoginSigninPopupShow() {
    $(document).on('click', '.show-login-signin', function() {
        basic.closeDialog();
        $('.hidden-login-form').html('');
        basic.showDialog(hidden_popup_content, 'login-signin-popup', null, true);

        $('.login-signin-popup .dentist .form-register .address-suggester').removeClass('dont-init');

        initAddressSuggesters();

        $('.login-signin-popup .popup-header-action a').click(function() {
            $('.login-signin-popup .popup-body > .inline-block').addClass('custom-hide');
            $('.login-signin-popup .popup-body .'+$(this).attr('data-type')).removeClass('custom-hide');
        });

        $('.login-signin-popup .call-sign-up').click(function() {
            $('.login-signin-popup .form-login').hide();
            $('.login-signin-popup .form-register').show();
        });

        $('.login-signin-popup .call-log-in').click(function() {
            $('.login-signin-popup .form-login').show();
            $('.login-signin-popup .form-register').hide();
        });

        // ====================== PATIENT LOGIN/SIGNUP LOGIC ======================

        //login
        $('.login-signin-popup .patient .form-register #privacy-policy-registration-patient').on('change', function() {
            if($(this).is(':checked')) {
                $('.login-signin-popup .patient .form-register .facebook-custom-btn').removeAttr('custom-stopper');
                $('.login-signin-popup .patient .form-register .civic-custom-btn').removeAttr('custom-stopper');
            } else {
                $('.login-signin-popup .patient .form-register .facebook-custom-btn').attr('custom-stopper', 'true');
                $('.login-signin-popup .patient .form-register .civic-custom-btn').attr('custom-stopper', 'true');
            }
        });

        $(document).on('civicCustomBtnClicked', function (event) {
            $('.login-signin-popup .patient .form-register .step-errors-holder').html('');
        });

        $(document).on('civicRead', async function (event) {
            $('.response-layer').show();
        });

        $(document).on('receivedFacebookToken', async function (event) {
            $('.response-layer').show();
        });

        $(document).on('facebookCustomBtnClicked', function (event) {
            $('.login-signin-popup .patient .form-register .step-errors-holder').html('');
        });

        $(document).on('customCivicFbStopperTriggered', function (event) {
            customErrorHandle($('.login-signin-popup .patient .form-register .step-errors-holder'), 'Please agree with our privacy policy.');
        });
        // ====================== /PATIENT LOGIN/SIGNUP LOGIC ======================

        // ====================== DENTIST LOGIN/SIGNUP LOGIC ======================
        //DENTIST LOGIN
        $('.login-signin-popup form#dentist-login').on('submit', async function(event) {
            var this_form_native = this;
            var this_form = $(this_form_native);
            event.preventDefault();
            //clear prev errors
            if($('.login-signin-popup form#dentist-login .error-handle').length) {
                $('.login-signin-popup form#dentist-login .error-handle').remove();
            }

            var form_fields = this_form.find('.form-field');
            var submit_form = true;
            for(var i = 0, len = form_fields.length; i < len; i+=1) {
                if(form_fields.eq(i).attr('type') == 'email' && !basic.validateEmail(form_fields.eq(i).val().trim())) {
                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'Please use valid email address.');
                    submit_form = false;
                } else if(form_fields.eq(i).attr('type') == 'password' && form_fields.eq(i).val().length < 6) {
                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'Passwords must be min length 6.');
                    submit_form = false;
                }

                if(form_fields.eq(i).val().trim() == '') {
                    customErrorHandle(form_fields.eq(i).closest('.field-parent'), 'This field is required.');
                    submit_form = false;
                }
            }

            //check if existing account
            var check_account_response = await $.ajax({
                type: 'POST',
                url: '/check-dentist-account',
                dataType: 'json',
                data: {
                    email: $('.login-signin-popup form#dentist-login input[name="email"]').val().trim(),
                    password: $('.login-signin-popup form#dentist-login input[name="password"]').val().trim()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(submit_form && check_account_response.success) {
                this_form_native.submit();
            } else if(check_account_response.error) {
                customErrorHandle(this_form.find('input[name="password"]').closest('.field-parent'), check_account_response.message);
            }
        });

        //DENTIST REGISTER
        $('.login-signin-popup .dentist .form-register .prev-step').click(function() {
            var current_step = $('.login-signin-popup .dentist .form-register .step.visible');
            var current_prev_step = current_step.prev();
            current_step.removeClass('visible');
            if(current_prev_step.hasClass('first')) {
                $(this).hide();
            }
            current_prev_step.addClass('visible');

            $('.login-signin-popup .dentist .form-register .next-step').val('Next');
            $('.login-signin-popup .dentist .form-register .next-step').attr('data-current-step', current_prev_step.attr('data-step'));
        });

        //SECOND STEP INIT LOGIC
        $('.login-signin-popup .step.second .user-type-container .user-type').click(function() {
            $('.login-signin-popup .step.second .user-type-container .user-type').removeClass('active');
            $(this).addClass('active');
            $('.login-signin-popup .step.second .user-type-container [name="user-type"]').val($(this).attr('data-type'));
        });

        //THIRD STEP INIT LOGIC
        $('.login-signin-popup #dentist-country').on('change', function() {
            $('.login-signin-popup .step.second .phone .country-code').html('+'+$(this).find('option:selected').attr('data-code'));
        });

        //FOURTH STEP INIT LOGIC
        styleAvatarUploadButton('.bootbox.login-signin-popup .dentist .form-register .step.fourth .avatar .btn-wrapper label');
        initCaptchaRefreshEvent();

        //DENTIST REGISTERING FORM
        $('.login-signin-popup .dentist .form-register .next-step').click(async function() {
            var this_btn = $(this);

            switch(this_btn.attr('data-current-step')) {
                case 'first':
                    var first_step_inputs = $('.login-signin-popup .dentist .form-register .step.first .form-field');
                    var errors = false;
                    $('.login-signin-popup .dentist .form-register .step.first').parent().find('.error-handle').remove();
                    for(var i = 0, len = first_step_inputs.length; i < len; i+=1) {
                        if(first_step_inputs.eq(i).attr('type') == 'email' && !basic.validateEmail(first_step_inputs.eq(i).val().trim())) {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'Please use valid email address.');
                            errors = true;
                        } else if(first_step_inputs.eq(i).attr('type') == 'email' && basic.validateEmail(first_step_inputs.eq(i).val().trim())) {
                            //coredb check if email is free
                            var check_email_if_free_response = await checkIfFreeEmail(first_step_inputs.eq(i).val().trim());
                            if(check_email_if_free_response.error) {
                                customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'The email has already been taken.');
                                errors = true;
                            }
                        }

                        if(first_step_inputs.eq(i).attr('type') == 'password' && first_step_inputs.eq(i).val().length < 6) {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'Passwords must be min length 6.');
                            errors = true;
                        }

                        if(first_step_inputs.eq(i).val().trim() == '') {
                            customErrorHandle(first_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                            errors = true;
                        }
                    }

                    if($('.login-signin-popup .dentist .form-register .step.first .form-field.password').val().trim() != $('.login-signin-popup .step.first .form-field.repeat-password').val().trim()) {
                        customErrorHandle($('.login-signin-popup .step.first .form-field.repeat-password').closest('.field-parent'), 'Both passwords don\'t match.');
                        errors = true;
                    }

                    if(!errors) {
                        $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                        $('.login-signin-popup .dentist .form-register .step.second').addClass('visible');
                        $('.login-signin-popup .prev-step').show();

                        this_btn.attr('data-current-step', 'second');
                        this_btn.val('Next');
                    }
                    break;
                case 'second':
                    var second_step_inputs = $('.login-signin-popup .dentist .form-register .step.second .form-field.required');
                    var errors = false;
                    $('.login-signin-popup .dentist .form-register .step.second').find('.error-handle').remove();

                    //check form-field fields
                    for(var i = 0, len = second_step_inputs.length; i < len; i+=1) {
                        if(second_step_inputs.eq(i).is('select')) {
                            //IF SELECT TAG
                            if(second_step_inputs.eq(i).val().trim() == '') {
                                customErrorHandle(second_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                errors = true;
                            }
                        } else if(second_step_inputs.eq(i).is('input')) {
                            //IF INPUT TAG
                            if(second_step_inputs.eq(i).val().trim() == '') {
                                customErrorHandle(second_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                errors = true;
                            }
                        }
                    }

                    //check if latin name accepts only LATIN characters
                    if(!/^[a-z A-Z]+$/.test($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').val().trim())) {

                        customErrorHandle($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').closest('.field-parent'), 'This field should contain only latin characters.');
                        errors = true;
                    }

                    //check if privacy policy checkbox is checked
                    if(!$('.login-signin-popup .dentist .form-register .step.second #privacy-policy-registration').is(':checked')) {
                        customErrorHandle($('.login-signin-popup .dentist .form-register .step.second .privacy-policy-row'), 'Please agree with our <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy policy</a>.');
                        errors = true;
                    }

                    if(!errors) {
                        $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                        $('.login-signin-popup .dentist .form-register .step.third').addClass('visible');

                        this_btn.attr('data-current-step', 'third');
                        this_btn.val('Next');
                    }
                    break;
                case 'third':
                    var third_step_inputs = $('.login-signin-popup .dentist .form-register .step.third .form-field.required');
                    var errors = false;
                    $('.login-signin-popup .dentist .form-register .step.third').find('.error-handle').remove();

                    for(var i = 0, len = third_step_inputs.length; i < len; i+=1) {
                        if(third_step_inputs.eq(i).is('select')) {
                            //IF SELECT TAG
                            if(third_step_inputs.eq(i).val().trim() == '') {
                                customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                errors = true;
                            }
                        } else if(third_step_inputs.eq(i).is('input')) {
                            //IF INPUT TAG
                            if(third_step_inputs.eq(i).val().trim() == '') {
                                customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'This field is required.');
                                errors = true;
                            }
                            if(third_step_inputs.eq(i).attr('type') == 'url' && !basic.validateUrl(third_step_inputs.eq(i).val().trim())) {
                                customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'Please enter your website URL starting with http:// or https://.');
                                errors = true;
                            }else if(third_step_inputs.eq(i).attr('type') == 'number' && !basic.validatePhone(third_step_inputs.eq(i).val().trim())) {
                                customErrorHandle(third_step_inputs.eq(i).closest('.field-parent'), 'Please use valid numbers.');
                                errors = true;
                            }
                        }
                    }

                    if(!errors) {
                        $('.login-signin-popup .dentist .form-register .step').removeClass('visible');
                        $('.login-signin-popup .dentist .form-register .step.fourth').addClass('visible');

                        this_btn.attr('data-current-step', 'fourth');
                        this_btn.val('Create account');
                    }
                    break;
                case 'fourth':
                    $('.login-signin-popup .dentist .form-register .step.fourth').find('.error-handle').remove();
                    var errors = false;
                    //checking if empty avatar
                    if($('.dentist .form-register .step.fourth #custom-upload-avatar').val().trim() == '') {
                        customErrorHandle($('.step.fourth .step-errors-holder'), 'Please select avatar.');
                        errors = true;
                    }

                    //checking if no specialization checkbox selected
                    if($('.login-signin-popup .dentist .form-register .step.fourth [name="specializations[]"]:checked').val() == undefined) {
                        customErrorHandle($('.login-signin-popup .step.fourth .step-errors-holder'), 'Please select specialization/s.');
                        errors = true;
                    }

                    //check captcha
                    if(!$('.login-signin-popup .dentist .form-register .step.fourth .captcha-parent').length || !$('.login-signin-popup .dentist .form-register .step.fourth #register-captcha').length) {
                        errors = true;
                        window.location.reload();
                    } else {
                        var check_captcha_response = await checkCaptcha($('.login-signin-popup .dentist .form-register .step.fourth #register-captcha').val().trim());
                        if(check_captcha_response.error) {
                            customErrorHandle($('.login-signin-popup .step.fourth .step-errors-holder'), 'Please enter correct captcha.');
                            errors = true;
                        }
                    }

                    if(!errors) {
                        //submit the form
                        $('.response-layer').show();
                        $('.login-signin-popup form#dentist-register').submit();
                    }
                    break;
            }
        });
        return false;
        // ====================== /DENTIST LOGIN/SIGNUP LOGIC ======================
    });
}
bindLoginSigninPopupShow();

//INIT LOGIC FOR ALL STEPS
function customErrorHandle(el, string) {
    el.append('<div class="error-handle">'+string+'</div>');
}

function styleAvatarUploadButton(label_el)    {
    if(jQuery(".upload-file.avatar").length) {
        jQuery(".upload-file.avatar").each(function(key, form){
            var this_file_btn_parent = jQuery(this);
            if(this_file_btn_parent.attr('data-current-user-avatar')) {
                this_file_btn_parent.find('.btn-wrapper').append('<label for="custom-upload-avatar" role="button" style="background-image:url('+this_file_btn_parent.attr('data-current-user-avatar')+');"><div class="inner"><i class="fa fa-plus fs-0" aria-hidden="true"></i><div class="inner-label fs-0">Add profile photo</div></div></label>');
            } else {
                this_file_btn_parent.find('.btn-wrapper').append('<label for="custom-upload-avatar" role="button"><div class="inner"><i class="fa fa-plus" aria-hidden="true"></i><div class="inner-label">Add profile photo</div></div></label>');
            }

            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function(input) {
                var label    = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function(e) {
                    readURL(this, label_el);

                    var fileName = '';
                    if(this.files && this.files.length > 1)
                        fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    /*if(fileName) {
                        if(load_filename_to_other_el)    {
                            $(this).closest('.form-row').find('.file-name').html('<i class="fa fa-file-text-o" aria-hidden="true"></i>' + fileName);
                        }else {
                            label.querySelector('span').innerHTML = fileName;
                        }
                    }else{
                        label.innerHTML = labelVal;
                    }*/
                });
                // Firefox bug fix
                input.addEventListener('focus', function(){ input.classList.add('has-focus'); });
                input.addEventListener('blur', function(){ input.classList.remove('has-focus'); });
            });
        });
    }
}

function readURL(input, label_el) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //SHOW THE IMAGE ON LOAD
            $(label_el).css({'background-image' : 'url("'+e.target.result+'")'});
            $(label_el).find('.inner i').addClass('fs-0');
            $(label_el).find('.inner .inner-label').addClass('fs-0');
        };
        reader.readAsDataURL(input.files[0]);
    }
}


//transfer all selects to bootstrap combobox
function initComboboxes() {
    $(select.combobox).each(function () {
        $(this).combobox();
    });
}

//return from CoreDB if email is taken
async function checkIfFreeEmail(email) {
    return await $.ajax({
        type: 'POST',
        url: '/check-email',
        dataType: 'json',
        data: {
            email: email
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

async function checkCaptcha(captcha) {
    return await $.ajax({
        type: 'POST',
        url: '/check-captcha',
        dataType: 'json',
        data: {
            captcha: captcha
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function apiEventsListeners() {
    //login
    $(document).on('successResponseCoreDBApi', async function (event) {
        if(event.response_data.token) {
            var custom_form_obj = {
                token: event.response_data.token,
                id: event.response_data.data.id,
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            if($('input[type="hidden"][name="route"]').length && $('input[type="hidden"][name="slug"]').length) {
                custom_form_obj.route = $('input[type="hidden"][name="route"]').val();
                custom_form_obj.slug = $('input[type="hidden"][name="slug"]').val();
            }

            //check if CoreDB returned address for this user and if its valid one
            if(basic.objHasKey(custom_form_obj, 'address') != null && innerAddressCheck(custom_form_obj.address)) {
                //var current_dentists_for_logging_user = await App.assurance_methods.getWaitingContractsForPatient(custom_form_obj.address);
                //if(current_dentists_for_logging_user.length > 0) {
                //custom_form_obj.have_contracts = true;
                //}
            }

            customJavascriptForm('/patient-login', custom_form_obj, 'post');
        }
    });

    $(document).on('errorResponseCoreDBApi', function (event) {
        var error_popup_html = '';
        if(event.response_data.errors) {
            for(var key in event.response_data.errors) {
                error_popup_html += event.response_data.errors[key]+'<br>';
            }
        }

        $('.response-layer').hide();
        basic.showAlert(error_popup_html, '', true);
    });
}
apiEventsListeners();

function customJavascriptForm(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

async function loggedOrNotLogic() {
    if($('body').hasClass('logged-in')) {
        var add_overflow_hidden_on_hidden_box_show = false;
        $('body').addClass('overflow-hidden');
        if($(window).width() < 992) {
            add_overflow_hidden_on_hidden_box_show = true;
        }
        $('body').removeClass('overflow-hidden');

        //IF NOT LOGGED LOGIC
        $('.logged-user-right-nav > .hidden-box-parent').hover(function () {
            $('.logged-user-right-nav .hidden-box').addClass('show-this');
            if(add_overflow_hidden_on_hidden_box_show) {
                if(!$('.logged-user-right-nav').hasClass('with-hub')) {
                    $('.logged-user-right-nav .up-arrow').addClass('show-this');
                }
            } else {
                $('.logged-user-right-nav .up-arrow').addClass('show-this');
            }
        }, function () {
            $('.logged-user-right-nav .hidden-box').removeClass('show-this');
            if(add_overflow_hidden_on_hidden_box_show) {
                if(!$('.logged-user-right-nav').hasClass('with-hub')) {
                    $('.logged-user-right-nav .up-arrow').removeClass('show-this');
                }
            } else {
                $('.logged-user-right-nav .up-arrow').removeClass('show-this');
            }
        });

        $('.logged-user-right-nav .close-btn a').click(function() {
            $('.logged-user-right-nav .hidden-box').removeClass('show-this');
            if(add_overflow_hidden_on_hidden_box_show) {
                $('body').removeClass('overflow-hidden');
                if(!$('.logged-user-right-nav').hasClass('with-hub')) {
                    $('.logged-user-right-nav .up-arrow').removeClass('show-this');
                }
            } else {
                $('.logged-user-right-nav .up-arrow').removeClass('show-this');
            }
        });

        if($('.logged-user-hamburger').length) {
            $('.logged-user-hamburger').click(function() {
                $('.logged-mobile-profile-menu').addClass('active');
            });

            $('.close-logged-mobile-profile-menu').click(function() {
                $('.logged-mobile-profile-menu').removeClass('active');
            });
        }

        //LOGGED USER LOGIC BY PAGES
        if ($('body').hasClass('edit-account')) {
            styleAvatarUploadButton('form#patient-update-profile .avatar .btn-wrapper label');

            $('form#patient-update-profile').on('submit', function (event) {
                var this_form = $(this);
                var errors = false;
                //clear prev errors
                if (this_form.find('.error-handle').length) {
                    this_form.find('.error-handle').remove();
                }

                var form_fields = this_form.find('.custom-input.required');
                for (var i = 0, len = form_fields.length; i < len; i += 1) {
                    if (form_fields.eq(i).hasClass('bootstrap-select')) {
                        continue;
                    }

                    if (form_fields.eq(i).attr('type') == 'email' && !basic.validateEmail(form_fields.eq(i).val().trim())) {
                        customErrorHandle(form_fields.eq(i).parent(), 'Please use valid email address.');
                        errors = true;
                    }

                    if (form_fields.eq(i).val().trim() == '') {
                        customErrorHandle(form_fields.eq(i).parent(), 'This field is required.');
                        errors = true;
                    }
                }

                if (this_form.find('[name="dcn_address"]').val().trim().length > 0 && !innerAddressCheck(this_form.find('[name="dcn_address"]').val().trim())) {
                    customErrorHandle(this_form.find('[name="dcn_address"]').parent(), 'Please enter valid Wallet Address.');
                    errors = true;
                }

                if (errors) {
                    event.preventDefault();
                }
            });
        } else if ($('body').hasClass('manage-privacy')) {
            $('.download-gdpr-data').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '/download-gdpr-data',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            window.open(response.success, '_blank');
                        } else if (response.error) {
                            basic.showAlert(response.error, '', true);
                        }
                    }
                });
            });
        } else if($('body').hasClass('my-profile')) {
            $('.my-profile-page-content .dropdown-hidden-menu button').click(function () {
                var this_btn = $(this);
                $('.my-profile-page-content .current-converted-price .amount').html((parseFloat($('.current-dcn-amount').html()) * parseFloat(this_btn.attr('data-multiple-with'))).toFixed(2));
                $('.my-profile-page-content .current-converted-price .symbol span').html(this_btn.html());
            });

            initDataTable();

            if ($('form#withdraw').length) {
                $('form#withdraw').on('submit', function (event) {
                    var this_form_native = this;
                    var this_form = $(this);
                    var form_errors = false;
                    this_form.find('.error-handle').remove();

                    for (var i = 0, len = this_form.find('.required').length; i < len; i += 1) {
                        if (this_form.find('.required').eq(i).val().trim() == '') {
                            customErrorHandle(this_form.find('.required').eq(i).parent(), 'This field is required.');
                            event.preventDefault();
                            form_errors = true;
                        } else if (this_form.find('.required').eq(i).hasClass('address') && !innerAddressCheck(this_form.find('.required').eq(i).val().trim())) {
                            customErrorHandle(this_form.find('.required').eq(i).parent(), 'Please enter valid wallet address.');
                            event.preventDefault();
                            form_errors = true;
                        }
                    }

                    event.preventDefault();
                    if (!form_errors) {
                        $('.response-layer').show();
                        this_form_native.submit();
                        this_form.unbind();
                    }
                });
            }

            if ($('form#add-dcn-address').length) {
                $('form#add-dcn-address').on('submit', function (event) {
                    var this_form = $(this);
                    this_form.find('.error-handle').remove();
                    if (this_form.find('.address').val().trim() == '') {
                        customErrorHandle(this_form.find('.address').parent(), 'Please enter your wallet address.');
                        event.preventDefault();
                    } else if (!innerAddressCheck(this_form.find('.address').val().trim())) {
                        customErrorHandle(this_form.find('.address').parent(), 'Please enter valid wallet address.');
                        event.preventDefault();
                    }
                });
            }

            //loading address logic
            await $.getScript('//dentacoin.com/assets/libs/civic-login/civic-kyc.js', function() {});

            $(document).on('civicRead', async function (event) {
                $('.response-layer').show();
            });

            $(document).on('receivedKYCCivicToken', async function (event) {
                if(event.response_data) {
                    $.ajax({
                        type: 'POST',
                        url: 'https://civic.dentacoin.net/civic',
                        dataType: 'json',
                        data: {
                            jwtToken: event.response_data
                        },
                        success: function (response) {
                            if(response.data && has(response, 'userId') && response.userId != '') {
                                $.ajax({
                                    type: 'POST',
                                    url: '/validate-civic-kyc',
                                    dataType: 'json',
                                    data: {
                                        token: event.response_data
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (inner_response) {
                                        if(inner_response.success) {
                                            basic.showAlert('Civic KYC authentication passed successfully.', '', true);
                                            setTimeout(function() {
                                                window.location.reload();
                                            }, 2000);
                                        } else if(inner_response.error) {
                                            $('.response-layer').hide();
                                            var error_html = '';
                                            for (var key in inner_response.error) {
                                                error_html += inner_response.error[key] + '<br>';
                                            }
                                            basic.showAlert(error_html, '', true);
                                        }
                                    }
                                });
                            }
                        }
                    });
                } else {
                    $('.response-layer').hide();
                    basic.showAlert('Something went wrong with Civic authentication. Please try again later.', '', true);
                }
            });
        }
    } else {
        //IF NOT LOGGED LOGIC
        /*if($('body').hasClass('home') || $('body').hasClass('logged-home')) {
            $('.info-section .show-login-signin').offset({left: $('header .show-login-signin').offset().left});
        }*/
    }
}
loggedOrNotLogic();

function initDataTable()    {
    if($('table.table.table-without-reorder').length > 0) {
        $('table.table.table-without-reorder').DataTable({
            ordering: true,
            order: [],
            columnDefs: [{
                orderable: false,
                targets: 'no-sort'
            }],
            aaSorting: []
        });
    }
}

function bindGoogleAlikeButtonsEvents() {
    //google alike style for label/placeholders
    $('body').on('click', '.custom-google-label-style label', function() {
        $(this).addClass('active-label');
        if($('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
            $(this).parent().find('input').addClass('blue-green-border');
        }
    });

    $('body').on('keyup change focusout', '.custom-google-label-style input', function() {
        var value = $(this).val().trim();
        if (value.length) {
            $(this).closest('.custom-google-label-style').find('label').addClass('active-label');
            if($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).addClass('blue-green-border');
            }
        } else {
            $(this).closest('.custom-google-label-style').find('label').removeClass('active-label');
            if($(this).closest('.custom-google-label-style').attr('data-input-blue-green-border') == 'true') {
                $(this).removeClass('blue-green-border');
            }
        }
    });
}
bindGoogleAlikeButtonsEvents();

//check if object has property
function has(object, key) {
    return object ? hasOwnProperty.call(object, key) : false;
}

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
    if(object.getDate() < 10) {
        var date = '0' + object.getDate();
    } else {
        var date = object.getDate();
    }

    if(object.getMonth() + 1 < 10) {
        var month = '0' + (object.getMonth() + 1);
    } else {
        var month = object.getMonth() + 1;
    }
    return date + '/' + month + '/' + object.getFullYear();
}