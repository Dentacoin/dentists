var basic = {
    options: {
        alert: null
    },
    init: function init(opt) {
        basic.addCsrfTokenToAllAjax();
        //basic.stopMaliciousInspect();
    },
    cookies: {
        set: function set(name, value) {
            if (name == undefined) {
                name = "cookieLaw";
            }
            if (value == undefined) {
                value = 1;
            }
            var d = new Date();
            d.setTime(d.getTime() + 10 * 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + "; " + expires + ";path=/";
            if (name == "cookieLaw") {
                $(".cookies_popup").slideUp();
            }
        },
        erase: function erase(name) {
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        },
        get: function get(name) {
            if (name == undefined) {
                var name = "cookieLaw";
            }
            name = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }
    },
    fixPlaceholders: function fixPlaceholders() {
        $("input[data-placeholder]").each(function () {
            if ($(this).data("placeholders-fixed") == undefined) {
                $(this).data("placeholders-fixed", true);

                basic.setInputsPlaceholder($(this));

                $focus_function = "if($(this).val()=='" + $(this).data("placeholder") + "'){ $(this).val(''); }";
                if ($(this).attr("onkeydown") != undefined) {
                    $focus_function = $(this).attr("onkeydown") + "; " + $focus_function;
                }
                $(this).attr("onkeydown", $focus_function);

                $blur_function = "if($(this).val()==''){ $(this).val('" + $(this).data("placeholder") + "'); }";
                if ($(this).attr("onblur") != undefined) {
                    $blur_function = $(this).attr("onblur") + "; " + $blur_function;
                }
                $(this).attr("onblur", $blur_function);
            }
        });
    },
    clearPlaceholders: function clearPlaceholders(extra_filter) {
        if (extra_filter == undefined) {
            extra_filter = "";
        }
        $("input[data-placeholder]" + extra_filter).each(function () {
            if ($(this).val() == $(this).data("placeholder")) {
                $(this).val('');
            }
        });
    },
    setPlaceholders: function setPlaceholders() {
        $("input[data-placeholder]").each(function () {
            basic.setInputsPlaceholder($(this));
        });
    },
    setInputsPlaceholder: function setInputsPlaceholder(input) {
        if ($(input).val() == "") {
            $(input).val($(input).data("placeholder"));
        }
    },
    fixBodyModal: function fixBodyModal() {
        if ($(".modal-dialog").length > 0 && !$("body").hasClass('modal-open')) {
            $("body").addClass('modal-open');
        }
    },
    fixZIndexBackdrop: function fixZIndexBackdrop() {
        if (jQuery('.bootbox').length > 1) {
            var last_z = jQuery('.bootbox').eq(jQuery('.bootbox').length - 2).css("z-index");
            jQuery('.bootbox').last().css({ 'z-index': last_z + 2 }).next('.modal-backdrop').css({ 'z-index': last_z + 1 });
        }
    },
    showAlert: function showAlert(message, class_name, vertical_center) {
        basic.realShowDialog(message, "alert", class_name, null, null, vertical_center);
    },
    showConfirm: function showConfirm(message, class_name, params, vertical_center) {
        basic.realShowDialog(message, "confirm", class_name, params, null, vertical_center);
    },
    showDialog: function showDialog(message, class_name, type, vertical_center) {
        if (type === undefined) {
            type = null;
        }
        basic.realShowDialog(message, "dialog", class_name, null, type, vertical_center);
    },
    realShowDialog: function realShowDialog(message, dialog_type, class_name, params, type, vertical_center) {
        if (class_name === undefined) {
            class_name = "";
        }
        if (type === undefined) {
            type = null;
        }
        if (vertical_center === undefined) {
            vertical_center = null;
        }

        var atrs = {
            "message": message,
            "animate": false,
            "show": false,
            "className": class_name
        };

        if (dialog_type == "confirm" && params != undefined && params.buttons == undefined) {
            atrs.buttons = {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            };
        }
        if (params != undefined) {
            for (var key in params) {
                atrs[key] = params[key];
            }
        }

        var dialog = eval("bootbox." + dialog_type)(atrs);
        dialog.on('hidden.bs.modal', function () {
            basic.fixBodyModal();
            if (type != null) {
                $('.single-application figure[data-slug="' + type + '"]').parent().focus();
            }
        });
        dialog.on('shown.bs.modal', function () {
            if (vertical_center != null) {
                basic.verticalAlignModal();
            }
            basic.fixZIndexBackdrop();
        });
        dialog.modal('show');
    },
    verticalAlignModal: function verticalAlignModal(message) {
        $("body .modal-dialog").each(function () {
            $(this).css("margin-top", Math.max(20, ($(window).height() - $(this).height()) / 2));
        });
    },
    closeDialog: function closeDialog() {
        bootbox.hideAll();
    },
    request: {
        initialize: false,
        result: null,
        submit: function submit(url, data, options, callback, curtain) {
            options = $.extend({
                type: 'POST',
                dataType: 'json',
                async: true
            }, options);
            if (basic.request.initialize && options.async == false) {
                console.log(['Please wait for parent request']);
            } else {
                basic.request.initialize = true;
                return $.ajax({
                    url: url,
                    data: data,
                    type: options.type,
                    dataType: options.dataType,
                    async: options.async,
                    beforeSend: function beforeSend() {
                        if (curtain !== null) {
                            basic.addCurtain();
                        }
                    },
                    success: function success(response) {
                        basic.request.result = response;
                        if (curtain !== null) {
                            basic.removeCurtain();
                        }
                        basic.request.initialize = false;
                        if (typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function error() {
                        basic.request.initialize = false;
                    }
                });
            }
        },
        validate: function validate(form, callback, data) {
            //if data is passed skip clearing all placeholders and removing messages. it's done inside the calling function
            if (data == undefined) {
                basic.clearPlaceholders();
                $(".input-error-message").remove();
                data = form.serialize();
            }
            return basic.request.submit(SITE_URL + "validate/", data, { async: false }, function (res) {
                if (typeof callback === 'function') {
                    callback();
                }
            }, null);
        },
        markValidationErrors: function markValidationErrors(validation_result, form) {
            basic.setPlaceholders();
            if (typeof validation_result.all_errors == "undefined") {
                if (typeof validation_result.message != "undefined") {
                    basic.showAlert(validation_result.message);
                    return true;
                }
            } else {
                var all_errors = JSON.parse(validation_result.all_errors);
                for (var param_name in all_errors) {
                    //if there is error, but no name for it, pop it in alert
                    if (Object.keys(all_errors).length == 1 && $('[name="' + param_name + '"]').length == 0) {
                        basic.showAlert(all_errors[param_name]);
                        return false;
                    }

                    if (form == undefined) {
                        var input = $('[name="' + param_name + '"]');
                    } else {
                        var input = form.find('[name="' + param_name + '"]');
                    }
                    basic.request.removeValidationErrors(input);
                    if (input.closest('.input-error-message-holder')) {
                        input.closest('.input-error-message-holder').append('<div class="input-error-message">' + all_errors[param_name] + '</div>');
                    } else {
                        input.after('<div class="input-error-message">' + all_errors[param_name] + '</div>');
                    }
                    //basic.setInputsPlaceholder(input);
                }
            }
        },
        removeValidationErrors: function removeValidationErrors(input) {
            input.closest('.input-error-message-holder').find(".input-error-message").remove();
            input.parent().remove(".input-error-message");
        }
    },
    alert: function alert(message) {
        basic.options.alert(message);
    },
    addCurtain: function addCurtain() {
        $("body").prepend('<div class="curtain"></div>');
    },
    removeCurtain: function removeCurtain() {
        $("body .curtain").remove();
    },
    validateEmail: function validateEmail(email) {
        return (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)
        );
    },
    isInViewport: function isInViewport(el) {
        var elementTop = $(el).offset().top;
        var elementBottom = elementTop + $(el).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    },
    isMobile: function isMobile() {
        var isMobile = false; //initiate as false
        // device detection
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
            isMobile = true;
        }
        return isMobile;
    },
    addCsrfTokenToAllAjax: function addCsrfTokenToAllAjax() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    stopMaliciousInspect: function stopMaliciousInspect() {
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });

        document.onkeydown = function (e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        };
    }
};
basic.init();
$(document).ready(function () {});

$(window).on('load', function () {
    scrollToSection();
});

$(window).on("load", function () {
    if ($('body').hasClass('home')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('resize', function () {
    if ($('body').hasClass('home')) {
        optionsDescriptionsEqualHeight();
    }
});

$(window).on('scroll', function () {
    homepageHowToBecomeDentacoinDentistBackgroundParallax();
});

$.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

function generateUrl(str) {
    var str_arr = str.split("");
    var cyr = ['Ð°', 'Ð±', 'Ð²', 'Ð³', 'Ð´', 'Ðµ', 'Ñ‘', 'Ð¶', 'Ð·', 'Ð¸', 'Ð¹', 'Ðº', 'Ð»', 'Ð¼', 'Ð½', 'Ð¾', 'Ð¿', 'Ñ€', 'Ñ', 'Ñ‚', 'Ñƒ', 'Ñ„', 'Ñ…', 'Ñ†', 'Ñ‡', 'Ñˆ', 'Ñ‰', 'ÑŠ', 'Ñ‹', 'ÑŒ', 'Ñ', 'ÑŽ', 'Ñ', 'Ð', 'Ð‘', 'Ð’', 'Ð“', 'Ð”', 'Ð•', 'Ð', 'Ð–', 'Ð—', 'Ð˜', 'Ð™', 'Ðš', 'Ð›', 'Ðœ', 'Ð', 'Ðž', 'ÐŸ', 'Ð ', 'Ð¡', 'Ð¢', 'Ð£', 'Ð¤', 'Ð¥', 'Ð¦', 'Ð§', 'Ð¨', 'Ð©', 'Ðª', 'Ð«', 'Ð¬', 'Ð­', 'Ð®', 'Ð¯', ' '];
    var lat = ['a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'sht', 'a', 'i', 'y', 'e', 'yu', 'ya', 'A', 'B', 'V', 'G', 'D', 'E', 'Io', 'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Ch', 'Sh', 'Sht', 'A', 'I', 'Y', 'e', 'Yu', 'Ya', '-'];
    for (var i = 0; i < str_arr.length; i += 1) {
        for (var y = 0; y < cyr.length; y += 1) {
            if (str_arr[i] == cyr[y]) {
                str_arr[i] = lat[y];
            }
        }
    }
    return str_arr.join("").toLowerCase();
}

//init cookie events only if exists
function checkIfCookie() {
    if ($('.privacy-policy-cookie').length > 0) {
        $('.privacy-policy-cookie .accept').click(function () {
            basic.cookies.set('privacy_policy', 1);
            $('.privacy-policy-cookie').hide();
        });
    }
}
checkIfCookie();

function initCaptchaRefreshEvent() {
    //refreshing captcha on trying to log in admin
    if ($('.refresh-captcha').length > 0) {
        $('.refresh-captcha').click(function () {
            $.ajax({
                type: 'GET',
                url: '/refresh-captcha',
                dataType: 'json',
                success: function success(response) {
                    $('.captcha-container span').html(response.captcha);
                }
            });
        });
    }
}
initCaptchaRefreshEvent();

// ================== PAGES ==================
if ($('body').hasClass('home')) {
    $('.testimonials-slider-section').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false
            }
        }]
    });

    $('.testimonials-slider-section').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var height = 0;
        for (var i = 0, len = 4; i < len; i += 1) {
            if ($('.slick-slide').eq(nextSlide + 4 + i).height() > height) {
                height = $('.slick-slide').eq(nextSlide + 4 + i).height();
            }
        }
        $('.testimonials-slider-section .slick-list').animate({ height: height }, 500);
    });

    //logic for open application popup
    $('.single-application').click(function () {
        var this_btn = $(this).find('.wrapper');
        var extra_html = '';
        if (this_btn.attr('data-articles') != undefined) {
            extra_html += '<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><ul>';
            var articles_arr = $.parseJSON(this_btn.attr('data-articles'));
            for (var i = 0, len = articles_arr.length; i < len; i += 1) {
                extra_html += '<li class="link"><a href="https://blog.dentacoin.com/' + articles_arr[i]['post_name'] + '" target="_blank">' + articles_arr[i]['post_title'] + '</a></li>';
            }
            extra_html += '</ul><div class="see-all"><a href="https://blog.dentacoin.com/" class="white-blue-rounded-btn" target="_blank">GO TO ALL</a></div></div>';
        }
        var description = this_btn.attr('data-description');
        if (description != '') {
            description = $.parseJSON(description);
        }
        var html = '<div class="container-fluid"><div class="row"><figure class="col-sm-6 gif"><img src="' + this_btn.attr('data-image') + '?' + new Date().getTime() + '" alt="' + this_btn.attr('data-image-alt') + '"/></figure><div class="col-sm-6 col-xs-12 content"><figure class="logo"><img src="' + this_btn.attr('data-popup-logo') + '" alt="' + this_btn.attr('data-popup-logo-alt') + '"/></figure><div class="title">' + this_btn.find('figcaption').html() + '</div><div class="description">' + description + '</div>' + extra_html + '</div></div></div>';
        basic.showDialog(html, 'application-popup', this_btn.attr('data-slug'));
    });
} else if ($('body').hasClass('faq')) {
    if ($('.list .question').length > 0) {
        $('.list .question').click(function () {
            $(this).closest('li').find('.question-content').toggle(300);
        });
    }
}

//make equal height for all descriptions in options section
function optionsDescriptionsEqualHeight() {
    var descriptions_height = 0;
    for (var i = 0, len = $('.options .description').length; i < len; i += 1) {
        if ($('.options .description').eq(i).outerHeight() > descriptions_height) {
            descriptions_height = $('.options .description').eq(i).outerHeight();
        }
    }
    $('.options .description').outerHeight(descriptions_height);
}

//homepage parallax background
function homepageHowToBecomeDentacoinDentistBackgroundParallax() {
    if ($('body').hasClass('home') && $('section.how-to-become-dentacoin-dentist-section').isInViewport() && !basic.isMobile()) {
        var current = $(window).scrollTop();
        var start = $('section.how-to-become-dentacoin-dentist-section').offset().top - $('section.how-to-become-dentacoin-dentist-section').outerHeight();
        var max = $('section.how-to-become-dentacoin-dentist-section').offset().top;

        var percentage = (current - start) / (max - start) * 100 / 2 + 30;
        if (percentage > 0 && percentage < 100) {
            $('section.how-to-become-dentacoin-dentist-section').css({ 'background-position': 'center ' + (100 - percentage) + '%' });
        }
        //$('.stella-artois-and-wimbledon .custom-widget').eq(i).css({'top' : (10 + 50 * (percentage / 100)) + '%'});
    }
}

//external generated form
if ($('.show-external-form-button').length > 0) {
    $('.show-external-form-button').click(function () {
        $('.hidden-external-form').addClass('visible');
        $('body').addClass('overflow-hidden');
    });

    $('.hidden-external-form .close-btn').click(function () {
        $('.hidden-external-form').removeClass('visible');
        $('body').removeClass('overflow-hidden');
    });
} /*
  
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
    if ($('.scrolling-to-section').length > 0 && $('body').hasClass('home')) {
        $('.scrolling-to-section').click(function () {
            $(this).blur();
            window.history.pushState($(this).find('span').html(), '', '/#' + $(this).attr('id'));
            $("html, body").animate({ scrollTop: $('[data-scroll-here="' + $(this).attr('id') + '"]').offset().top - $('header').outerHeight() }, 300);
            return false;
        });
    }
}
initScrollingToEvents();

//on page load if we have #parameter in the URL scroll down to section
function scrollToSection() {
    $('[data-scroll-here]').each(function () {
        if (window.location.href.indexOf('/#' + $(this).attr('data-scroll-here')) != -1) {
            $("html, body").animate({ scrollTop: $(this).offset().top - $('header').outerHeight() }, 300);
            return false;
        }
    });
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
$('header .hamburger').click(function () {
    $('nav.sidenav').addClass('active');
});

$('nav.sidenav .close-btn').click(function () {
    $('nav.sidenav').removeClass('active');
});

//on button click next time when you hover the button the color is bugged until you click some other element (until you move out the focus from this button)
function fixButtonsFocus() {
    if ($('.white-dark-blue-btn').length > 0) {
        $('.white-dark-blue-btn').click(function () {
            $(this).blur();
        });
    }
    if ($('.dark-blue-white-btn').length > 0) {
        $('.dark-blue-white-btn').click(function () {
            $(this).blur();
        });
    }
}
fixButtonsFocus();

//checking if submitted email is valid
function newsletterRegisterValidation() {
    $('.newsletter-register form').on('submit', function (event) {
        var this_form = $(this);
        var errors = [];
        if (!basic.validateEmail(this_form.find('input[type="email"]').val().trim())) {
            this_form.addClass('not-valid').append('<div class="alert alert-danger">' + this_form.find('input[type="email"]').closest('.form-row').attr('data-valid-email-message') + '</div>');
            errors.push(this_form.find('input[type="email"]').closest('.form-row').attr('data-valid-email-message'));
        }
        if (!this_form.find('#agree-with-privacy-policy').is(':checked')) {
            errors.push(this_form.find('#agree-with-privacy-policy').closest('.form-row').attr('data-valid-message'));
        }

        if (errors.length > 0) {
            event.preventDefault();
            this_form.addClass('not-valid').find('.alert').remove();
            for (var i = 0, len = errors.length; i < len; i += 1) {
                this_form.append('<div class="alert alert-danger">' + errors[i] + '</div>');
            }
        } else {
            this_form.removeClass('not-valid').find('.alert').remove();
            //this_form.find('input[type="email"]').val('');
            //this_form.find('#agree-with-privacy-policy').prop('checked', false);
            this_form.append('<div class="alert alert-success">' + this_form.attr('data-success-message') + '</div>');
        }
    });
}
newsletterRegisterValidation();