var get_params=basic.getGETParameters(),loadedLibs={};function scrollToContactUsNow(){for(var e=0,t=jQuery("img[data-defer-src]").length;e<t;e+=1)void 0===jQuery("img[data-defer-src]").eq(e).attr("src")&&jQuery("img[data-defer-src]").eq(e).attr("src",jQuery("img[data-defer-src]").eq(e).attr("data-defer-src"));$("html, body").animate({scrollTop:$(".shortcode.contact-us").offset().top-$("header").outerHeight()},300)}function bindScrollToContactUsNowEvent(){$(document).on("click",".scroll-to-contact-us-now",function(){scrollToContactUsNow()})}function optionsDescriptionsEqualHeight(){for(var e=0,t=0,o=$(".options-section .description").length;t<o;t+=1)$(".options-section .description").eq(t).outerHeight()>e&&(e=$(".options-section .description").eq(t).outerHeight());$(".options-section .description").outerHeight(e)}$(window).on("load",function(){scrollToSection()}),$(window).on("load",function(){(!$("body").hasClass("logged-in")&&$("body").hasClass("home")||$("body").hasClass("logged-home")||$("body").hasClass("faq"))&&optionsDescriptionsEqualHeight()}),$(window).on("resize",function(){(!$("body").hasClass("logged-in")&&$("body").hasClass("home")||$("body").hasClass("logged-home")||$("body").hasClass("faq"))&&optionsDescriptionsEqualHeight()}),$(window).on("scroll",function(){projectData.general_logic.data.loadDeferResources(),onDesktopScrollMakeStickySidebarDownloadAssetsPage(),makeHeaderSmallerOnScroll()}),$(document).on("cannotLoginBecauseOfMissingCookies",function(e){basic.showAlert("Please accept the strictly necessary cookies in order to continue with logging in.","",!0)}),bindScrollToContactUsNowEvent();var homepage_video_timer,homepage_video_time_watched=0;function initScrollingToEvents(){$(".scrolling-to-section").length>0&&$(".scrolling-to-section").click(function(){if($("body").hasClass("home")||$("body").hasClass("how-it-works")){$(this).blur();var e=window.location.href.replace("#"+$(this).attr("id"),"");window.history.pushState($(this).find("span").html(),"",e+"#"+$(this).attr("id")),$("html, body").animate({scrollTop:$('[data-scroll-here="'+$(this).attr("id")+'"]').offset().top-$("header").outerHeight()},300)}else $("body").hasClass("logged-in")?window.location="/home#"+$(this).attr("id"):window.location="/#"+$(this).attr("id")})}function scrollToSection(){$("[data-scroll-here]").each(function(){if(-1!=window.location.href.indexOf("#"+$(this).attr("data-scroll-here")))return $("html, body").animate({scrollTop:$(this).offset().top-$("header").outerHeight()},300),!1})}function fixButtonsFocus(){$(document).on("click",".white-dark-blue-btn",function(){$(this).blur()}),$(document).on("click",".dark-blue-white-btn",function(){$(this).blur()})}function hidePopupOnBackdropClick(){$(document).on("click",".bootbox",function(){var e=event.target.className;(e=e.replace(/ /g,"."))&&!$("."+e).parents(".modal-dialog").length&&($(".bootbox.login-signin-popup").length&&$(".hidden-login-form").html(hidden_popup_content),$(".bootbox.login-signin-popup").length&&$(".hidden-login-form").html(hidden_popup_content),bootbox.hideAll())})}$(".open-video-popup").length>0&&($(".open-video-popup").click(function(){$(".custom-popup.video .wrapper").html('<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject"><video controls><source src="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4" type="video/mp4">Your browser does not support HTML5 video.</video><meta itemprop="name" content="Dentacoin Introduction Video"><meta itemprop="description" content="Explainer video: Dentacoin, the Blockchain Solution for the Global Dentistry"><meta itemprop="uploadDate" content="2019-03-19T08:00:00+08:00"><meta itemprop="thumbnailUrl" content="https://dentacoin.com/assets/uploads/video-poster.png"><link itemprop="contentURL" href="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4"></div>'),$(".custom-popup.video").addClass("visible"),$("body").addClass("overflow-hidden"),$(".custom-popup.video .wrapper").find("video").on("play",function(){homepage_video_timer=setInterval(function(){homepage_video_time_watched+=1},1e3)}),$(".custom-popup.video .wrapper").find("video").on("pause",function(){clearInterval(homepage_video_timer),projectData.events.fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched)}),$(".custom-popup.video .wrapper").find("video").get(0).play()}),$(".custom-popup.video .close-btn").unbind().click(function(){$(".custom-popup.video .wrapper").html(""),$(".custom-popup.video").removeClass("visible"),$("body").removeClass("overflow-hidden"),clearInterval(homepage_video_timer),projectData.events.fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched),homepage_video_time_watched=0})),$("body").click(function(e){$(e.target).is("#custom-popup")&&($(".custom-popup").removeClass("visible"),$("body").removeClass("overflow-hidden"),$(".custom-popup.video .wrapper").html(""),clearInterval(homepage_video_timer),projectData.events.fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched),homepage_video_time_watched=0)}),initScrollingToEvents(),$("header .hamburger").click(function(){$("nav.sidenav").addClass("active")}),$("nav.sidenav .close-btn, nav.sidenav ul li a").click(function(){$("nav.sidenav").removeClass("active")}),fixButtonsFocus(),hidePopupOnBackdropClick(),$("body").hasClass("logged-in")||(dcnGateway.init({platform:"dentists",forgotten_password_link:"https://account.dentacoin.com/forgotten-password"}),$(document).on("dentistAuthSuccessResponse",async function(e){console.log("dentistAuthSuccessResponse"),window.location.href=window.location.href+"?cross-login=true"}),$(document).on("patientAuthSuccessResponse",async function(e){console.log("patientAuthSuccessResponse"),window.location.href=window.location.href+"?cross-login=true"}));var appendedMobileStickyScrollUp=!1;function onDesktopScrollMakeStickySidebarDownloadAssetsPage(){$("body").hasClass("download-guides-assets")&&($("body").addClass("overflow-hidden"),$(window).width()>992?$(window).scrollTop()>$(".page-content").offset().top?$(window).scrollTop()+$(window).height()>$("footer").offset().top?($(".navigation-sidebar").css({position:"absolute",left:"0",top:"auto",bottom:"0"}),$(".add-display-flex-and-position-relative").css({display:"flex",position:"relative"}),$(".navigation-sidebar").css({overflow:"visible",height:"auto"})):($(".navigation-sidebar").css({position:"fixed",left:"0",top:$("header").outerHeight()+"px",bottom:"auto"}),$(".add-display-flex-and-position-relative").css({display:"block"}),$(".navigation-sidebar").height($(window).height()-$("header").outerHeight()).css({overflow:"auto"}),$(".page-content").addClass("col-md-offset-3")):($(".navigation-sidebar").css({position:"static",left:"auto",top:"auto"}),$(".navigation-sidebar").css({overflow:"visible",height:"auto"}),$(".page-content").removeClass("col-md-offset-3")):$(window).scrollTop()>300&&!appendedMobileStickyScrollUp?(appendedMobileStickyScrollUp=!0,$(".page-download-assets").append('<button class="sticky-caret"><img alt="Caret icon" src="/assets/images/caret-icon.svg" class="width-100 max-width-20"/></button>'),$(".sticky-caret").click(function(){return $("html, body").animate({scrollTop:0},300),!1})):$(window).scrollTop()<300&&appendedMobileStickyScrollUp&&(appendedMobileStickyScrollUp=!1,$(".sticky-caret").remove()),$("body").removeClass("overflow-hidden"))}function customErrorHandle(e,t){e.append('<div class="error-handle">'+t+"</div>")}function makeHeaderSmallerOnScroll(){$(window).scrollTop()>0?($("header").addClass("on-going-sticky-header"),$(".main-container").addClass("on-going-sticky-header")):($("header").removeClass("on-going-sticky-header"),$(".main-container").removeClass("on-going-sticky-header"))}var projectData={pages:{not_logged_in:function(){projectData.pages.data.homepage(),projectData.pages.data.faq(),projectData.pages.data.downloadGuidesAndAssets(),projectData.pages.data.howItWorks()},logged_in:function(){projectData.pages.data.homepage(),projectData.pages.data.faq(),projectData.pages.data.downloadGuidesAndAssets(),projectData.pages.data.howItWorks()},data:{homepage:async function(){if($("body").hasClass("logged-home")||$("body").hasClass("home")){function e(e){$(".below-options .single-option.active .image-shown-on-hover").addClass("active").offset({top:e.pageY+5,left:e.pageX+5})}projectData.general_logic.data.initSlidingContractFormLogic(),$(".below-options .single-option").hover(function(){$(this).addClass("active"),$(document).bind("mousemove",e)},function(){$(".below-options .single-option.active .image-shown-on-hover").removeClass("active"),$(this).removeClass("active"),$(document).unbind("mousemove",e)}),hasOwnProperty.call(loadedLibs,"slick")||(console.log("slick loaded"),loadedLibs.slick=!0,$("head").append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="/dist/libs/slick/slick.min.css"/>'),await $.getScript("/dist/libs/slick/slick.min.js",function(){})),$(".testimonials-slider-section").slick({slidesToShow:4,slidesToScroll:4,autoplay:!0,autoplaySpeed:8e3,dots:!0,responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2,dots:!1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,dots:!1}}]}),$(".google-map-section iframe").length&&(console.log("iframeHeightListenerInit"),window.addEventListener("message",function(e){if("iframe_size_event"===e.data.event_id){var t=e.data.data.height;console.log(t,"height"),null!=t&&t>0&&$(".google-map-section iframe").height(t+50)}}));for(var t=0,o=0,a=$(".single-testimonial.slick-slide.slick-active").length;o<a;o+=1)$(".single-testimonial.slick-slide.slick-active").eq(o).height()>t&&(t=$(".single-testimonial.slick-slide.slick-active").eq(o).height());if($(".testimonials-slider-section .slick-list").animate({height:t},500),$(".testimonials-slider-section").on("beforeChange",function(e,t,o,a){for(var n=0,s=0,i=$(".single-testimonial.slick-slide.slick-active").length;s<i;s+=1)$(".slick-slide").eq(a+$(".single-testimonial.slick-slide.slick-active").length+s).height()>n&&(n=$(".slick-slide").eq(a+$(".single-testimonial.slick-slide.slick-active").length+s).height());$(".testimonials-slider-section .slick-list").animate({height:n},500)}),$(".testimonials-slider-section").on("afterChange",function(e,t,o,a){$.event.trigger({type:"setHubPosition",time:new Date}),projectData.general_logic.data.loadDeferResources()}),$(".shortcode.contact-us").length&&null!=$(".shortcode.contact-us").attr("data-scroll-to-here")&&scrollToContactUsNow(),$("body").hasClass("logged-in")&&$(".change-on-logged-in-to-scroll-to-contact-us").html("CONTACT US").removeClass("dentist-register open-dentacoin-gateway sign-up-steps-partner-event-tracker").addClass("scroll-to-contact-us-now contact-us-steps-partner-event-tracker"),$("#append-big-hub-dentists").length){var n=!0;async function s(){hasOwnProperty.call(loadedLibs,"bigHubStyle")||(loadedLibs.bigHubStyle=!0,$("head").append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="//dentacoin.com/assets/libs/dentacoin-package/css/styles-big-hub.css?v='+(new Date).getTime()+'"/>')),hasOwnProperty.call(loadedLibs,"dentacoinPackageJs")||(loadedLibs.dentacoinPackageJs=!0,await $.getScript("//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v="+(new Date).getTime(),function(){}));dcnHub.initBigHub({element_id_to_append:"append-big-hub-dentists",type_hub:"dentists",hub_title:"Use for Free with One Profile"})}basic.isInViewport($("#append-big-hub-dentists"))&&(n=!1,s()),$(window).on("scroll",function(){n&&basic.isInViewport($("#append-big-hub-dentists"))&&(n=!1,s())})}}},faq:function(){$("body").hasClass("faq")&&$(".list .question").length>0&&$(".list .question").click(function(){$(this).closest("li").find(".question-content").toggle(300)})},downloadGuidesAndAssets:async function(){if($("body").hasClass("download-guides-assets")){function e(){$(".if-patient").removeClass("hide"),$(".if-dentist").addClass("hide");for(var e=0,t=$(".changeable-html-on-user-type-change").length;e<t;e+=1)$(".changeable-html-on-user-type-change").eq(e).html($(".changeable-html-on-user-type-change").eq(e).attr("data-patient"));for(e=0,t=$(".changeable-src-on-user-type-change").length;e<t;e+=1)$(".changeable-src-on-user-type-change").eq(e).attr("src",$(".changeable-src-on-user-type-change").eq(e).attr("data-patient"));for(e=0,t=$(".changeable-href-on-user-type-change").length;e<t;e+=1)$(".changeable-href-on-user-type-change").eq(e).attr("href",$(".changeable-href-on-user-type-change").eq(e).attr("data-patient"));for(e=0,t=$(".changeable-attr-on-user-type-change").length;e<t;e+=1)$(".changeable-attr-on-user-type-change").eq(e).attr("data-scroll-to",$(".changeable-attr-on-user-type-change").eq(e).attr("data-patient"));window.scrollTo(0,$(window).scrollTop()+10)}$(".active-on-desktop").addClass("active"),$(".hover-on-desktop").addClass("hover"),$(".navigation-sidebar .page-nav a").click(function(){if($(".navigation-sidebar .page-nav a").removeClass("active"),$(this).addClass("active"),"dentists"==$(this).attr("data-type")){$(".if-dentist").removeClass("hide"),$(".if-patient").addClass("hide");for(var t=0,o=$(".changeable-html-on-user-type-change").length;t<o;t+=1)$(".changeable-html-on-user-type-change").eq(t).html($(".changeable-html-on-user-type-change").eq(t).attr("data-dentist"));for(t=0,o=$(".changeable-src-on-user-type-change").length;t<o;t+=1)$(".changeable-src-on-user-type-change").eq(t).attr("src",$(".changeable-src-on-user-type-change").eq(t).attr("data-dentist"));for(t=0,o=$(".changeable-href-on-user-type-change").length;t<o;t+=1)$(".changeable-href-on-user-type-change").eq(t).attr("href",$(".changeable-href-on-user-type-change").eq(t).attr("data-dentist"));for(t=0,o=$(".changeable-attr-on-user-type-change").length;t<o;t+=1)$(".changeable-attr-on-user-type-change").eq(t).attr("data-scroll-to",$(".changeable-attr-on-user-type-change").eq(t).attr("data-dentist"))}else"patients"==$(this).attr("data-type")&&e()}),$(".mobile-nav-opener a").click(function(){$(".nav-holder").fadeToggle(500)}),$(".navigation-sidebar .nav-list button").click(function(){var e=$(this);$(".navigation-sidebar .nav-list h2").removeClass("active"),$(".navigation-sidebar .nav-list li").removeClass("active"),e.closest("li").addClass("active"),e.closest(".nav-list").find("h2").addClass("active"),$("html, body").animate({scrollTop:$("#"+e.attr("data-scroll-to")).offset().top-$("header").outerHeight()},300),$(".clear-hover").removeClass("hover"),null!=e.attr("data-type")&&$("."+e.attr("data-type")).addClass("hover");["scroll-to-how-to-become-dentist","scroll-to-trusted-reviews","scroll-to-dentavox","scroll-to-assurance","scroll-to-dentacoin-wallet","scroll-to-dentacare-app","scroll-to-jawsofbattle-app","scroll-to-badges","scroll-to-banners","scroll-to-covers","scroll-to-promo-banners","scroll-to-dcn-logo"].includes(e.attr("data-scroll-to"))&&($('.navigation-sidebar .page-nav a[data-type="patients"]').hasClass("active")?history.pushState({},"","?type=patient&section="+e.attr("data-scroll-to").replace("scroll-to-","")):history.pushState({},"","?section="+e.attr("data-scroll-to").replace("scroll-to-","")))}),$(".share-video").click(async function(){hasOwnProperty.call(loadedLibs,"clipboard")||(console.log("clipboard loaded"),loadedLibs.clipboard=!0,await $.getScript("/dist/libs/clipboard/clipboard.min.js",function(){}));var e,t=$(this).closest(".section-content").find("iframe").attr("src"),o=encodeURIComponent(t);(basic.showDialog('<div class="fs-18 lato-bold dark-blue">Share</div><div class="padding-top-15 padding-bottom-15 copy-link module"><div class="next-to-copy-btn"><input autocomplete="off" readonly type="text" class="custom-input input-field" id="link-to-be-copied" value="'+t+'"/></div><a href="javascript:void(0)" class="lato-bold fs-20 copy-btn" data-toggle="tooltip" title="" data-clipboard-target="#link-to-be-copied" data-original-title="Copied."><figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block fs-0"><img alt="Copy icon" src="/assets/images/copy-icon.svg" class="width-100 max-width-20"/></figure> COPY</a></div><div class="fs-0"><span class="inline-block fs-16 dark-blue">Or share it via:</span> <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-left-10 margin-bottom-10 margin-right-5"> <a href="https://www.facebook.com/sharer/sharer.php?u='+o+'" target="_blank"> <img alt="Facebook icon" src="/assets/images/facebook-share.svg" class="width-100 max-width-40"/> </a> </figure><figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-bottom-10 margin-right-5"> <a class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text='+o+'"> <img alt="Twitter icon" src="/assets/images/twitter-share.svg" class="width-100 max-width-40"/> </a></figure> <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block margin-bottom-10 margin-right-5"> <a href="https://www.linkedin.com/shareArticle?mini=true&url='+o+'" target="_blank"><img alt="Linkedin icon" src="/assets/images/linkedin-share.svg" class="width-100 max-width-40"/></a> </figure></div>',"share-video-popup",null),$(".copy-btn").length)&&(new ClipboardJS(".copy-btn").on("success",function(t){$(".copy-btn").tooltip("show"),clearInterval(e),e=setTimeout(function(){$(".copy-btn").tooltip("hide")},1500)}),$(".copy-btn").tooltip({trigger:"click"}))}),hasOwnProperty.call(loadedLibs,"slick")||(console.log("slick loaded"),loadedLibs.slick=!0,$("head").append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="/dist/libs/slick/slick.min.css"/>'),await $.getScript("/dist/libs/slick/slick.min.js",function(){})),$(".assets-slider").slick({slidesToShow:3,slidesToScroll:1,arrows:!0,autoplay:!0,autoplaySpeed:8e3,responsive:[{breakpoint:992,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(window).on("load",function(){if(basic.property_exists(get_params,"type")||basic.property_exists(get_params,"section"))for(var t=0,o=jQuery("[data-defer-src]").length;t<o;t+=1)null==jQuery("[data-defer-src]").eq(t).attr("src")&&jQuery("[data-defer-src]").eq(t).attr("src",jQuery("[data-defer-src]").eq(t).attr("data-defer-src"));basic.property_exists(get_params,"type")&&"patient"==get_params.type&&($(".navigation-sidebar .page-nav a").removeClass("active"),$('.navigation-sidebar .page-nav a[data-type="patients"]').addClass("active"),e()),basic.property_exists(get_params,"section")&&("how-to-become-dentist"==get_params.section?$('button[data-scroll-to="scroll-to-how-to-become-dentist"]').click():"trusted-reviews"==get_params.section?$('button[data-scroll-to="scroll-to-trusted-reviews"]').click():"dentavox"==get_params.section?$('button[data-scroll-to="scroll-to-dentavox"]').click():"assurance"==get_params.section?$('button[data-scroll-to="scroll-to-assurance"]').click():"dentacoin-wallet"==get_params.section?$('button[data-scroll-to="scroll-to-dentacoin-wallet"]').click():"dentacare-app"==get_params.section?$('button[data-scroll-to="scroll-to-dentacare-app"]').click():"jawsofbattle-app"==get_params.section?$('button[data-scroll-to="scroll-to-jawsofbattle-app"]').click():"dentist-promo-banners"==get_params.section||basic.property_exists(get_params,"type")&&"badges"==get_params.type?$('button[data-scroll-to="scroll-to-badges"]').click():"banners"==get_params.section?$('button[data-scroll-to="scroll-to-banners"]').click():"covers"==get_params.section?$('button[data-scroll-to="scroll-to-covers"]').click():"promo-banners"==get_params.section?$('button[data-scroll-to="scroll-to-promo-banners"]').click():"dcn-logo"==get_params.section&&$('button[data-scroll-to="scroll-to-dcn-logo"]').click())})}},howItWorks:function(){$("body").hasClass("how-it-works")&&(projectData.general_logic.data.initSlidingContractFormLogic(),$("body").hasClass("logged-in")&&$(".change-on-logged-in-to-scroll-to-contact-us").html("LEARN MORE").removeClass("dentist-register open-dentacoin-gateway learn-more-img-how-it-works-event-tracker").addClass("scroll-to-contact-us-now contact-us-how-it-works-header-event-tracker"))}}},general_logic:{not_logged_in:function(){projectData.general_logic.data.cookie(),projectData.general_logic.data.newsletter(),projectData.general_logic.data.bindGoogleAlikeButtonsEvents()},logged_in:function(){projectData.general_logic.data.cookie(),projectData.general_logic.data.newsletter(),projectData.general_logic.data.bindGoogleAlikeButtonsEvents(),projectData.general_logic.data.miniHub()},data:{showLoader:function(){$(".camping-loader").hasClass("loaded")?$(".camping-loader .response-layer").show():($(".camping-loader").html('<div class="response-layer"><div class="wrapper"><picture itemscope="" itemtype="http://schema.org/ImageObject"><source media="(max-width: 768px)" srcset="//dentacoin.com/assets/uploads/dcn-flipping-coin-logo-loader-v3-mobile.gif"><img itemprop="contentUrl" src="//dentacoin.com/assets/uploads/dcn-flipping-coin-logo-loader-v3_desktop.gif" class="max-width-250 max-width-xs-200" alt="Loader"></picture></div></div>').addClass("loaded"),$(".camping-loader .response-layer").show())},hideLoader:function(){$(".camping-loader .response-layer").hide()},loadDeferResources:function(){for(var e=0,t=jQuery("[data-defer-src]").length;e<t;e+=1)basic.isInViewport(jQuery("[data-defer-src]").eq(e))&&null==jQuery("[data-defer-src]").eq(e).attr("src")&&jQuery("[data-defer-src]").eq(e).attr("src",jQuery("[data-defer-src]").eq(e).attr("data-defer-src"))},cookie:async function(){""==basic.cookies.get("performance_cookies")&&""==basic.cookies.get("performance_cookies")&&""==basic.cookies.get("performance_cookies")&&""==basic.cookies.get("performance_cookies")&&(console.log("dentacoinPackageJs loaded"),loadedLibs.dentacoinPackageJs=!0,$("head").append('<link media="all" rel="preload" as="style" onload="this.rel=\'stylesheet\'" type="text/css" href="//dentacoin.com/assets/libs/dentacoin-package/css/style-cookie.css?v='+(new Date).getTime()+'"/>'),await $.getScript("//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v="+(new Date).getTime(),function(){}),"undefined"!=typeof dcnCookie&&dcnCookie.init({google_app_id:"UA-97167262-3",fb_app_id:"2366034370318681"}))},miniHub:async function(){hasOwnProperty.call(loadedLibs,"dentacoinPackageJs")||(loadedLibs.dentacoinPackageJs=!0,console.log("dentacoinPackageJs loaded"),await $.getScript("//dentacoin.com/assets/libs/dentacoin-package/js/init.js?v="+(new Date).getTime(),function(){}));var e={element_id_to_bind:"header-avatar",platform:"dentists",log_out_link:"https://dentists.dentacoin.com/user-logout",notifications_counter:!0};$("body").hasClass("logged-patient")?(e.type_hub="mini-hub-patients",$("body").hasClass("home")&&(e.without_apps=!0)):$("body").hasClass("logged-dentist")&&(e.type_hub="mini-hub-dentists",$("body").hasClass("home")&&(e.without_apps=!0)),dcnHub.initMiniHub(e)},newsletter:function(){$(".newsletter-register").length&&(basic.initCustomCheckboxes(".newsletter-register"),$(".newsletter-register form").on("submit",function(e){e.preventDefault();var t=$(this),o=!1;t.find(".error-handle").remove(),basic.validateEmail(t.find('input[type="email"]').val().trim())||(o=!0,customErrorHandle(t.find('input[type="email"]').closest(".newsletter-field"),t.find('input[type="email"]').closest(".newsletter-field").attr("data-valid-message"))),t.find("#newsletter-privacy-policy").is(":checked")||(o=!0,customErrorHandle(t.find("#newsletter-privacy-policy").closest(".newsletter-field"),t.find("#newsletter-privacy-policy").closest(".newsletter-field").attr("data-valid-message"))),o||(projectData.events.fireGoogleAnalyticsEvent("Newsletter","Subscribe","Subscribe"),fbq("track","Newsletter"),this.submit(),$(".newsletter-register form .custom-checkbox").html(""),$(".newsletter-register form #newsletter-privacy-policy").prop("checked",!1),t.find('input[type="email"]').val(""),$(".newsletter-register .form-container").append('<div class="alert alert-success fs-16 margin-top-10">Thank you for signing up.</div>'))}))},bindGoogleAlikeButtonsEvents:function(){$("body").on("click",".custom-google-label-style label",function(){$(this).addClass("active-label"),"true"==$(".custom-google-label-style").attr("data-input-colorful-border")&&$(this).parent().find("input").addClass("blue-green-border")}),$("body").on("keyup change focusout",".custom-google-label-style input",function(){$(this).val().trim().length?($(this).closest(".custom-google-label-style").find("label").addClass("active-label"),"true"==$(this).closest(".custom-google-label-style").attr("data-input-colorful-border")&&$(this).addClass("blue-green-border")):($(this).closest(".custom-google-label-style").find("label").removeClass("active-label"),"true"==$(this).closest(".custom-google-label-style").attr("data-input-colorful-border")&&$(this).removeClass("blue-green-border"))})},initSlidingContractFormLogic:function(){if($(".sliding-fields-container").length){function e(){$(".step.one .error-handle").remove();var e=!1;""==$('.step.one [name="firstname"]').val().trim()&&(customErrorHandle($('.step.one [name="firstname"]').closest(".field-parent"),"Please complete this required field."),e=!0),basic.validateEmail($('.step.one [name="email"]').val().trim())||(customErrorHandle($('.step.one [name="email"]').closest(".field-parent"),"Please enter valid email address."),e=!0),$(".step.one #hs_legal_basis").is(":checked")||(customErrorHandle($(".step.one #hs_legal_basis").closest(".gdpr-checkbox"),"Please, accept the Privacy policy to proceed."),e=!0),e||(projectData.events.fireGoogleAnalyticsEvent("Contact Form","Next","Step 1"),fbq("track","ContactForm1"),$(".sliding-fields-container").attr("data-current-step","two").find(".steps-wrapper").addClass("scroll-to-second-step"),$(".bullet-navigation [data-step-bullet]").removeClass("active"),$('.bullet-navigation [data-step-bullet="two"]').addClass("active"))}function t(){$(".step.two .error-handle").remove();var e=!1;""==$('.step.two [name="jobtitle"]').val().trim()&&(customErrorHandle($('.step.two [name="jobtitle"]').closest(".field-parent"),"Please complete this required field."),e=!0),""!=$('.step.two [name="interested_in_"]').val().trim()&&"disabled"!=$('.step.two [name="interested_in_"]').val().trim()||(customErrorHandle($('.step.two [name="interested_in_"]').closest(".field-parent"),"Please complete this required field."),e=!0),$(".step.two #additional_information").length&&""==$(".step.two #additional_information").val().trim()&&(customErrorHandle($(".step.two #additional_information").closest(".field-parent"),"Please complete this required field."),e=!0),e||(projectData.events.fireGoogleAnalyticsEvent("Contact Form","Next","Step 2"),fbq("track","ContactForm2"),$(".sliding-fields-container").attr("data-current-step","three").find(".steps-wrapper").addClass("scroll-to-third-step"),$(".bullet-navigation [data-step-bullet]").removeClass("active"),$('.bullet-navigation [data-step-bullet="three"]').addClass("active"))}basic.initCustomCheckboxes(".sliding-fields-container"),$('.sliding-fields-container .step.two [name="interested_in_"]').on("change",function(){"Other (please specify)"==$(this).val()?($(".step.two").append('<div class="padding-bottom-20 field-parent on-right-side inline-block-top select-other-value"><div class="custom-google-label-style module" data-input-colorful-border="true"><label for="additional_information">Other:</label><input class="full-rounded form-field" name="additional_information" maxlength="100" id="additional_information" type="text"/></div></div>'),$('.step.two label[for="additional_information"]').addClass("active-label"),$(".step.two #additional_information").focus()):$(".step.two .select-other-value").length&&$(".step.two .select-other-value").remove()}),$(".bullet-navigation [data-step-bullet]").click(function(){var o=$(this);switch($(".sliding-fields-container").attr("data-current-step")){case"one":"two"!=o.attr("data-step-bullet")&&"two"!=o.attr("data-step-bullet")||e();break;case"two":"one"==o.attr("data-step-bullet")?($(".sliding-fields-container").attr("data-current-step","one").find(".steps-wrapper").removeClass("scroll-to-second-step"),$(".bullet-navigation [data-step-bullet]").removeClass("active"),$('.bullet-navigation [data-step-bullet="one"]').addClass("active")):"three"==o.attr("data-step-bullet")&&t();break;case"three":"one"==o.attr("data-step-bullet")?($(".sliding-fields-container").attr("data-current-step","one").find(".steps-wrapper").removeClass("scroll-to-second-step scroll-to-third-step"),$(".bullet-navigation [data-step-bullet]").removeClass("active"),$('.bullet-navigation [data-step-bullet="one"]').addClass("active")):"two"==o.attr("data-step-bullet")&&($(".sliding-fields-container").attr("data-current-step","two").find(".steps-wrapper").removeClass("scroll-to-third-step"),$(".bullet-navigation [data-step-bullet]").removeClass("active"),$('.bullet-navigation [data-step-bullet="two"]').addClass("active"))}}),$(".thank-you-message").length&&(projectData.events.fireGoogleAnalyticsEvent("Contact Form","Next","Form Submission"),fbq("track","ContactFormSubmit")),$(".shortcode.contact-us .next-step").click(function(){var o=$(this);switch($(".sliding-fields-container").attr("data-current-step")){case"one":e();break;case"two":t();break;case"three":!function(e,t){$(".step.three .error-handle").remove();var o=!1;""!=$('.step.three [name="website"]').val().trim()&&basic.validateUrl($('.step.three [name="website"]').val().trim())||(customErrorHandle($('.step.three [name="website"]').closest(".field-parent"),"Please enter website URL starting with http:// or https://."),o=!0),o||(t.attr("type","submit"),t.click())}(document.getElementsByClassName("contact-us-form")[0],o)}})}}}},events:{eventTrackers:function(){$(document).on("click",".contact-us-header-event-tracker",function(e){$("body").hasClass("home")||$("body").hasClass("how-it-works"),projectData.events.fireGoogleAnalyticsEvent("Contact Form","Contact Us","Header")}),$(document).on("click",".learn-more-top-banner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Learn More","Banner Up")}),$(document).on("click",".learn-more-homepage-above-the-fold-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Learn More","Hero Img")}),$(document).on("click",".contact-us-menu-event-tracker",function(e){$("body").hasClass("home")||$("body").hasClass("how-it-works"),projectData.events.fireGoogleAnalyticsEvent("Contact Form","Contact Us","Menu")}),$(document).on("click",".contact-us-steps-partner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Contact Us","Steps Partner")}),$(document).on("click",".sign-up-steps-partner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("DentistRegistration","Sign Up","Steps Partner")}),$(document).on("click",".learn-more-above-map-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Learn More","Banner Down")}),$(document).on("click",".open-dentacoin-company-intro-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Intro")}),$(document).on("click",".contact-us-after-video-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Contact Us","Icon Down")}),$(document).on("click",".learn-more-how-it-works-top-banner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contact Form","Learn More","Banner Up")}),$(document).on("click",".dentist-register-how-it-works-top-banner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("DentistRegistration","Sign Up","Hero Img")}),$(document).on("click",".learn-more-img-how-it-works-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contract Form","Learn More","Hero Img")}),$(document).on("click",".start-now-free-promo-how-it-works-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contract Form","Contact us","Free Promo")}),$(document).on("click",".start-now-payments-how-it-works-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Contract Form","Contact us","Payments")}),$(document).on("click",".dentist-download-en-brochure-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Brochure EN")}),$(document).on("click",".dentist-download-de-brochure-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Brochure DE")}),$(document).on("click",".download-all-pdf-guides-event-tracker",function(e){"dentists"==$(".navigation-sidebar .page-nav a.active").attr("data-type")?projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Guides All"):"patients"==$(".navigation-sidebar .page-nav a.active").attr("data-type")&&projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Patient Guides All")}),$(document).on("click",".download-partner-brochure-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Partner Brochure")}),$(document).on("click",".download-badge-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Badge")}),$(document).on("click",".download-banner-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Banner")}),$(document).on("click",".download-all-banners-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Banners All")}),$(document).on("click",".download-facebook-cover-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","FB Cover")}),$(document).on("click",".download-all-facebook-covers-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","FB Covers All")}),$(document).on("click",".download-logo-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Logo")}),$(document).on("click",".patient-download-en-brochure-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Patient Brochure EN")}),$(document).on("click",".patient-download-de-brochure-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Patient Brochure DE")}),$(document).on("click",".download-all-files-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Assets All")}),$(document).on("click",".download-fact-sheet-event-tracker",function(e){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Factsheet EN")}),$(document).on("click",".download-de-fact-sheet-event-tracker",function(){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","DE Factsheet")}),$(document).on("click",".download-patients-brochure-event-tracker",function(){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Patient Brochure")}),$(document).on("click",".download-logo-event-tracker",function(){projectData.events.fireGoogleAnalyticsEvent("Assets","Download","Logo")}),$(document).on("click",".register-on-trp-event-tracker",function(){projectData.events.fireGoogleAnalyticsEvent("Tools","Register","TRP Register")})},fireGoogleAnalyticsEvent:function(e,t,o,a){var n={event_action:t,event_category:e,event_label:o};null!=a&&(n.value=a),gtag("event",o,n)}}};projectData.general_logic.data.loadDeferResources(),$("body").hasClass("logged-in")?(projectData.pages.logged_in(),projectData.general_logic.logged_in()):(projectData.pages.not_logged_in(),projectData.general_logic.not_logged_in()),projectData.events.eventTrackers(),$(".bottom-fixed-promo-banner").length&&$(".bottom-fixed-promo-banner .close-banner").click(function(){$("footer").removeClass("extra-bottom-padding"),$(".bottom-fixed-promo-banner").remove();var e=new Date,t=e.getTime();t+=72e5,e.setTime(t),document.cookie="hide-holiday-calendar-banner=1; expires="+e.toUTCString()+";domain=dentists.dentacoin.com;path=/;"});
