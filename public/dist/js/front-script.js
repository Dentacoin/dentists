var basic={init:function(e){},cookies:{set:function(e,t){null==e&&(e="cookieLaw"),null==t&&(t=1);var i=new Date;i.setTime(i.getTime()+864e6);var o="expires="+i.toUTCString();document.cookie=e+"="+t+"; "+o+";path=/","cookieLaw"==e&&$(".cookies_popup").slideUp()},erase:function(e){document.cookie=e+"=;expires=Thu, 01 Jan 1970 00:00:01 GMT;"},get:function(e){if(null==e)e="cookieLaw";e+="=";for(var t=document.cookie.split(";"),i=0;i<t.length;i++){for(var o=t[i];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(e))return o.substring(e.length,o.length)}return""}},fixPlaceholders:function(){$("input[data-placeholder]").each(function(){null==$(this).data("placeholders-fixed")&&($(this).data("placeholders-fixed",!0),basic.setInputsPlaceholder($(this)),$focus_function="if($(this).val()=='"+$(this).data("placeholder")+"'){ $(this).val(''); }",null!=$(this).attr("onkeydown")&&($focus_function=$(this).attr("onkeydown")+"; "+$focus_function),$(this).attr("onkeydown",$focus_function),$blur_function="if($(this).val()==''){ $(this).val('"+$(this).data("placeholder")+"'); }",null!=$(this).attr("onblur")&&($blur_function=$(this).attr("onblur")+"; "+$blur_function),$(this).attr("onblur",$blur_function))})},clearPlaceholders:function(e){null==e&&(e=""),$("input[data-placeholder]"+e).each(function(){$(this).val()==$(this).data("placeholder")&&$(this).val("")})},setPlaceholders:function(){$("input[data-placeholder]").each(function(){basic.setInputsPlaceholder($(this))})},setInputsPlaceholder:function(e){""==$(e).val()&&$(e).val($(e).data("placeholder"))},fixBodyModal:function(){$(".modal-dialog").length>0&&!$("body").hasClass("modal-open")&&$("body").addClass("modal-open")},fixZIndexBackdrop:function(){if(jQuery(".bootbox").length>1){var e=jQuery(".bootbox").eq(jQuery(".bootbox").length-2).css("z-index");jQuery(".bootbox").last().css({"z-index":e+2}).next(".modal-backdrop").css({"z-index":e+1})}},showAlert:function(e,t,i){basic.realShowDialog(e,"alert",t,null,null,i)},showConfirm:function(e,t,i,o){basic.realShowDialog(e,"confirm",t,i,null,o)},showDialog:function(e,t,i,o){void 0===i&&(i=null),basic.realShowDialog(e,"dialog",t,null,i,o)},realShowDialog:function(message,dialog_type,class_name,params,type,vertical_center){void 0===class_name&&(class_name=""),void 0===type&&(type=null),void 0===vertical_center&&(vertical_center=null);var atrs={message:message,animate:!1,show:!1,className:class_name};if("confirm"==dialog_type&&null!=params&&null==params.buttons&&(atrs.buttons={confirm:{label:"Yes",className:"btn-success"},cancel:{label:"No",className:"btn-danger"}}),null!=params)for(var key in params)atrs[key]=params[key];var dialog=eval("bootbox."+dialog_type)(atrs);dialog.on("hidden.bs.modal",function(){basic.fixBodyModal(),null!=type&&$('.single-application figure[data-slug="'+type+'"]').parent().focus()}),dialog.on("shown.bs.modal",function(){null!=vertical_center&&basic.verticalAlignModal(),basic.fixZIndexBackdrop()}),dialog.modal("show")},verticalAlignModal:function(e){$("body .modal-dialog").each(function(){$(this).css("margin-top",Math.max(20,($(window).height()-$(this).height())/2))})},closeDialog:function(){bootbox.hideAll()},validateEmail:function(e){return/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e)},validatePhone:function(e){return/^[\d\.\-]+$/.test(e)},validateUrl:function(e){return/(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(e)},isInViewport:function(e){var t=$(e).offset().top,i=t+$(e).outerHeight(),o=$(window).scrollTop(),n=o+$(window).height();return i>o&&t<n},isMobile:function(){var e=!1;return(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)))&&(e=!0),e},objHasKey:function(e,t){return!!e&&hasOwnProperty.call(e,t)},addCsrfTokenToAllAjax:function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})},stopMaliciousInspect:function(){document.addEventListener("contextmenu",function(e){e.preventDefault()}),document.onkeydown=function(e){return 123!=event.keyCode&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="I".charCodeAt(0))&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="C".charCodeAt(0))&&((!e.ctrlKey||!e.shiftKey||e.keyCode!="J".charCodeAt(0))&&((!e.ctrlKey||e.keyCode!="U".charCodeAt(0))&&void 0))))}}},initAddressSuggesters,checkAddress,setupMap,mapsLoaded=!0,mapsWaiting=[],prepareMapFunction=function(e){mapsLoaded?e():mapsWaiting.push(e)};$(document).ready(function(e){setupMap=function(e,t){if(e.find(".suggester-map-div").show(),e.find(".suggester-map-div").attr("inited"))e.find(".suggester-map-div").data("map").panTo(t),e.find(".suggester-map-div").data("marker").setPosition(t);else{var i=new google.maps.Map(e.find(".suggester-map-div")[0],{center:t,zoom:14,backgroundColor:"none"}),o=new google.maps.Marker({map:i,icon:"/assets/images/map-pin-inactive.png",draggable:!0,position:t});o.addListener("dragend",function(t){this.map.panTo(this.getPosition()),(new google.maps.Geocoder).geocode({location:this.getPosition()},function(e,t){if("OK"==t){var i=e[0].formatted_address,o=this.find(".country-select option:selected").text();i=i.replace(", "+o,""),this.find(".address-suggester").val(i).blur()}else checkAddress(null,this)}.bind(e))}),e.find(".suggester-map-div").attr("inited",1),e.find(".suggester-map-div").data("map",i),e.find(".suggester-map-div").data("marker",o)}},initAddressSuggesters=function(){prepareMapFunction(function(){e(".address-suggester").each(function(){if(e(this).hasClass("dont-init"))return!1;var t=e(this).closest(".address-suggester-wrapper");if(t.find(".country-select").change(function(){var t=e(this).find("option:selected").val();s.setComponentRestrictions({country:t})}),t.find(".suggester-map-div").attr("lat")){var i={lat:parseFloat(t.find(".suggester-map-div").attr("lat")),lng:parseFloat(t.find(".suggester-map-div").attr("lon"))};setupMap(t,i)}var o=e(this)[0],n={componentRestrictions:{country:t.find(".country-select option:selected").val()},types:["address"]},s=new google.maps.places.Autocomplete(o,n);s.suggester_container=t,google.maps.event.addListener(s,"place_changed",function(){var e=this.getPlace();this.suggester_container.find(".address-suggester").val(e.formatted_address?e.formatted_address:e.name).blur()}.bind(s)),e(this).blur(function(t){var i=e(this).closest(".address-suggester-wrapper"),o=(i.find(".country-select option:selected").text(),i.find(".country-select option:selected").val()),n=new google.maps.Geocoder,s=e(this).val();n.geocode({address:s,region:o},function(e,t){checkAddress("OK"==t?e[0]:null,this)}.bind(i))})})}),e(".address-suggester").on("keyup keypress",function(e){if(13===(e.keyCode||e.which))return e.preventDefault(),!1})},checkAddress=function(e,t){if(t.find(".geoip-hint").hide(),t.find(".geoip-confirmation").hide(),t.find(".suggester-map-div").hide(),e&&e.geometry){var i=t.find(".address-suggester").val(),o=t.find(".country-select option:selected").text();i=i.replace(", "+o,""),t.find(".address-suggester").val(i);var n={lat:e.geometry.location.lat(),lng:e.geometry.location.lng()};return setupMap(t,n),void t.find(".geoip-confirmation").show()}t.find(".geoip-hint").show()},e(".address-suggester").length&&initAddressSuggesters()});var get_params=getGETParameters();function checkIfCookie(){$(".privacy-policy-cookie").length>0&&$(".privacy-policy-cookie .accept").click(function(){basic.cookies.set("privacy_policy",1),$(".privacy-policy-cookie").hide()})}function initCaptchaRefreshEvent(){$(".refresh-captcha").length>0&&$(".refresh-captcha").click(function(){$.ajax({type:"GET",url:"/refresh-captcha",dataType:"json",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},success:function(e){$(".captcha-container span").html(e.captcha)}})})}if($(document).ready(function(){basic.objHasKey(get_params,"show-login")&&!$("body").hasClass("logged-in")&&openLoginSigninPopup()}),$(window).on("load",function(){scrollToSection()}),$(window).on("load",function(){!$("body").hasClass("logged-in")&&$("body").hasClass("home")&&optionsDescriptionsEqualHeight()}),$(window).on("resize",function(){(!$("body").hasClass("logged-in")&&$("body").hasClass("home")||$("body").hasClass("logged-home"))&&optionsDescriptionsEqualHeight()}),$(window).on("scroll",function(){}),checkIfCookie(),initCaptchaRefreshEvent(),!$("body").hasClass("logged-in")&&$("body").hasClass("home")||$("body").hasClass("logged-home")){function imageFollowingCursorPosition(e){$(".below-options .single-option.active .image-shown-on-hover").addClass("active").offset({top:e.pageY+5,left:e.pageX+5})}$(".below-options .single-option").hover(function(){$(this).addClass("active"),$(document).bind("mousemove",imageFollowingCursorPosition)},function(){$(".below-options .single-option.active .image-shown-on-hover").removeClass("active"),$(this).removeClass("active"),$(document).unbind("mousemove",imageFollowingCursorPosition)}),$(".testimonials-slider-section").slick({slidesToShow:4,slidesToScroll:4,autoplay:!0,autoplaySpeed:8e3,dots:!0,adaptiveHeight:!0,responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2,dots:!1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,dots:!1}}]}),$(".testimonials-slider-section").on("beforeChange",function(e,t,i,o){for(var n=0,s=0;s<4;s+=1)$(".slick-slide").eq(o+4+s).height()>n&&(n=$(".slick-slide").eq(o+4+s).height());$(".testimonials-slider-section .slick-list").animate({height:n},500)});var start_clicking_from_num=1,init_apps_interval_slide;function singleApplicationClick(e,t){$(".single-application").removeClass("show-shadow"),e.addClass("show-shadow");var i=e.find(".wrapper"),o="";if(null!=i.attr("data-articles")){o+='<div class="extra-html"><div class="extra-title">Latest Blog articles:</div><div class="slider-with-tool-data">';for(var n=$.parseJSON(i.attr("data-articles")),s=0,a=n.length;s<a;s+=1)o+='<a target="_blank" href="'+n[s].link+'"><div class="single-slide text-left fs-0"><figure class="inline-block-top" itemscope="" itemtype="http://schema.org/ImageObject"><img src="'+n[s].thumb+'" alt="" itemprop="contentUrl"/></figure><div class="content inline-block-top"><div class="slide-title">'+n[s].post_title+"</div><time>"+dateObjToFormattedDate(new Date(1e3*parseInt(n[s].date)))+"</time></div></div></a>";o+='</div><div class="text-center padding-top-15"><a href="//blog.dentacoin.com/" class="white-dark-blue-btn" target="_blank">GO TO ALL</a></div></div>'}var r="";""!=i.attr("data-description")&&(r=$.parseJSON(i.attr("data-description")));var l='<div class="container-fluid"><div class="row"><div class="col-sm-12 content"><figure class="logo"><img src="'+i.attr("data-popup-logo")+'" alt="'+i.attr("data-popup-logo-alt")+'"/></figure><div class="title">'+i.find("figcaption").html()+'</div><div class="description">'+r+"</div>"+o+"</div></div></div>";$(".applications-section .info-section .html-content").html(l),""!=o&&initToolsPostsSlider(),$(".applications-section .info-section video").removeAttr("controls"),$("body").addClass("overflow-hidden"),$(window).width()>992?(clearInterval(init_apps_interval_slide),null==t&&(8==(start_clicking_from_num=e.index()+1)&&(start_clicking_from_num=0),init_apps_interval_slide=setTimeout(function(){singleApplicationClick($(".applications-section .single-application").eq(start_clicking_from_num))},1e4))):($(".applications-section .apps-list").hide(),$(".applications-section .info-section").fadeIn(500)),$(".applications-section .info-section .close-application").click(function(){$(".applications-section .apps-list").fadeIn(500),$(".applications-section .info-section").hide()}),$("body").removeClass("overflow-hidden")}$(".single-application").click(function(){singleApplicationClick($(this),!0)}),$("body").addClass("overflow-hidden"),$(window).width()>992&&singleApplicationClick($(".applications-section .single-application").eq(0)),$("body").removeClass("overflow-hidden")}else $("body").hasClass("faq")&&$(".list .question").length>0&&$(".list .question").click(function(){$(this).closest("li").find(".question-content").toggle(300)});function optionsDescriptionsEqualHeight(){console.log("asd");for(var e=0,t=0,i=$(".options-section .description").length;t<i;t+=1)$(".options-section .description").eq(t).outerHeight()>e&&(e=$(".options-section .description").eq(t).outerHeight());$(".options-section .description").outerHeight(e)}$(".show-external-form-button").length>0&&($(".show-external-form-button").click(function(){$(".custom-popup.external-form").addClass("visible"),$("body").addClass("overflow-hidden")}),$(".custom-popup.external-form .close-btn").unbind().click(function(){$(".custom-popup.external-form").removeClass("visible"),$("body").removeClass("overflow-hidden")}));var homepage_video_time_watched=0,homepage_video_timer;function initScrollingToEvents(){$("body").hasClass("logged-home")||!$("body").hasClass("logged-in")&&$("body").hasClass("home")?$(".scrolling-to-section").length>0&&$(".scrolling-to-section").click(function(){return $(this).blur(),window.history.pushState($(this).find("span").html(),"","/#"+$(this).attr("id")),$("html, body").animate({scrollTop:$('[data-scroll-here="'+$(this).attr("id")+'"]').offset().top-$("header").outerHeight()},300),!1}):$("body").hasClass("logged-in")&&$(".scrolling-to-section").click(function(){window.location="/home#"+$(this).attr("id")})}function scrollToSection(){$("[data-scroll-here]").each(function(){if(-1!=window.location.href.indexOf("#"+$(this).attr("data-scroll-here")))return $("html, body").animate({scrollTop:$(this).offset().top-$("header").outerHeight()},300),!1})}function getGETParameters(){var e=window.location.search.substr(1);return null!=e&&""!=e?transformToAssocArray(e):{}}function transformToAssocArray(e){for(var t={},i=e.split("&"),o=0;o<i.length;o++){var n=i[o].split("=");t[n[0]]=n[1]}return t}function fixButtonsFocus(){$(document).on("click",".white-dark-blue-btn",function(){$(this).blur()}),$(document).on("click",".dark-blue-white-btn",function(){$(this).blur()})}function newsletterRegisterValidation(){$(".newsletter-register form").on("submit",function(e){var t=$(this),i=!1;basic.validateEmail(t.find('input[type="email"]').val().trim())&&t.find("#newsletter-privacy-policy").is(":checked")||(i=!0),i||fireGoogleAnalyticsEvent("Subscription","Sign-up","Newsletter")})}function hidePopupOnBackdropClick(){$(document).on("click",".bootbox",function(){var e=event.target.className;(e=e.replace(/ /g,"."))&&!$("."+e).parents(".modal-dialog").length&&($(".bootbox.login-signin-popup").length&&$(".hidden-login-form").html(hidden_popup_content),$(".bootbox.login-signin-popup").length&&$(".hidden-login-form").html(hidden_popup_content),bootbox.hideAll())})}$(".open-video-popup").length>0&&($(".open-video-popup").click(function(){$(".custom-popup.video .wrapper").html('<div itemprop="video" itemscope="" itemtype="http://schema.org/VideoObject"><video controls><source src="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4" type="video/mp4">Your browser does not support HTML5 video.</video><meta itemprop="name" content="Dentacoin Introduction Video"><meta itemprop="description" content="Explainer video: Dentacoin, the Blockchain Solution for the Global Dentistry"><meta itemprop="uploadDate" content="2019-03-19T08:00:00+08:00"><link itemprop="contentURL" href="//dentacoin.com/assets/videos/dentacoin-explainer-video.mp4"></div>'),$(".custom-popup.video").addClass("visible"),$("body").addClass("overflow-hidden"),$(".custom-popup.video .wrapper").find("video").on("play",function(){homepage_video_timer=setInterval(function(){homepage_video_time_watched+=1},1e3)}),$(".custom-popup.video .wrapper").find("video").on("pause",function(){clearInterval(homepage_video_timer),fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched)}),$(".custom-popup.video .wrapper").find("video").get(0).play()}),$(".custom-popup.video .close-btn").unbind().click(function(){$(".custom-popup.video .wrapper").html(""),$(".custom-popup.video").removeClass("visible"),$("body").removeClass("overflow-hidden"),clearInterval(homepage_video_timer),fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched),homepage_video_time_watched=0})),$("body").click(function(e){$(e.target).is("#custom-popup")&&($(".custom-popup").removeClass("visible"),$("body").removeClass("overflow-hidden"),$(".custom-popup.video .wrapper").html(""),clearInterval(homepage_video_timer),fireGoogleAnalyticsEvent("Video","Play","Dentacoin Explainer",homepage_video_time_watched),homepage_video_time_watched=0)}),initScrollingToEvents(),$("header .hamburger").click(function(){$("nav.sidenav").addClass("active")}),$("nav.sidenav .close-btn, nav.sidenav ul li a").click(function(){$("nav.sidenav").removeClass("active")}),fixButtonsFocus(),newsletterRegisterValidation(),hidePopupOnBackdropClick();var hidden_popup_content=$(".hidden-login-form").html();function bindLoginSigninPopupShow(){$(document).on("click",".show-login-signin",function(){openLoginSigninPopup()})}function openLoginSigninPopup(){return basic.closeDialog(),$(".hidden-login-form").html(""),basic.showDialog(hidden_popup_content,"login-signin-popup",null,!0),$(".login-signin-popup .dentist .form-register .address-suggester").removeClass("dont-init"),initAddressSuggesters(),$(".login-signin-popup .popup-header-action a").click(function(){$(".login-signin-popup .popup-body > .inline-block").addClass("custom-hide"),$(".login-signin-popup .popup-body ."+$(this).attr("data-type")).removeClass("custom-hide")}),$(".login-signin-popup .call-sign-up").click(function(){$(".login-signin-popup .form-login").hide(),$(".login-signin-popup .form-register").show()}),$(".login-signin-popup .call-log-in").click(function(){$(".login-signin-popup .form-login").show(),$(".login-signin-popup .form-register").hide()}),$(".login-signin-popup .patient .form-register #privacy-policy-registration-patient").on("change",function(){$(this).is(":checked")?($(".login-signin-popup .patient .form-register .facebook-custom-btn").removeAttr("custom-stopper"),$(".login-signin-popup .patient .form-register .civic-custom-btn").removeAttr("custom-stopper")):($(".login-signin-popup .patient .form-register .facebook-custom-btn").attr("custom-stopper","true"),$(".login-signin-popup .patient .form-register .civic-custom-btn").attr("custom-stopper","true"))}),$(document).on("civicCustomBtnClicked",function(e){$(".login-signin-popup .patient .form-register .step-errors-holder").html("")}),$(document).on("civicRead",async function(e){$(".response-layer").show()}),$(document).on("receivedFacebookToken",async function(e){$(".response-layer").show()}),$(document).on("facebookCustomBtnClicked",function(e){$(".login-signin-popup .patient .form-register .step-errors-holder").html("")}),$(document).on("customCivicFbStopperTriggered",function(e){customErrorHandle($(".login-signin-popup .patient .form-register .step-errors-holder"),"Please agree with our privacy policy.")}),$(".login-signin-popup form#dentist-login").on("submit",async function(e){var t=$(this);e.preventDefault(),$(".login-signin-popup form#dentist-login .error-handle").length&&$(".login-signin-popup form#dentist-login .error-handle").remove();for(var i=t.find(".form-field"),o=!0,n=0,s=i.length;n<s;n+=1)"email"!=i.eq(n).attr("type")||basic.validateEmail(i.eq(n).val().trim())?"password"==i.eq(n).attr("type")&&i.eq(n).val().length<6&&(customErrorHandle(i.eq(n).closest(".field-parent"),"Passwords must be min length 6."),o=!1):(customErrorHandle(i.eq(n).closest(".field-parent"),"Please use valid email address."),o=!1),""==i.eq(n).val().trim()&&(customErrorHandle(i.eq(n).closest(".field-parent"),"This field is required."),o=!1);var a=await $.ajax({type:"POST",url:"/check-dentist-account",dataType:"json",data:{email:$('.login-signin-popup form#dentist-login input[name="email"]').val().trim(),password:$('.login-signin-popup form#dentist-login input[name="password"]').val().trim()},headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}});o&&a.success?(fireGoogleAnalyticsEvent("DentistLogin","Click","Dentist Login"),this.submit()):a.error&&customErrorHandle(t.find('input[name="password"]').closest(".field-parent"),a.message)}),$(".login-signin-popup .dentist .form-register .prev-step").click(function(){var e=$(".login-signin-popup .dentist .form-register .step.visible"),t=e.prev();e.removeClass("visible"),t.hasClass("first")&&$(this).hide(),t.addClass("visible"),$(".login-signin-popup .dentist .form-register .next-step").val("Next"),$(".login-signin-popup .dentist .form-register .next-step").attr("data-current-step",t.attr("data-step"))}),$(".login-signin-popup .step.second .user-type-container .user-type").click(function(){$(".login-signin-popup .step.second .user-type-container .user-type").removeClass("active"),$(this).addClass("active"),$('.login-signin-popup .step.second .user-type-container [name="user-type"]').val($(this).attr("data-type"))}),$(".login-signin-popup #dentist-country").on("change",function(){$(".login-signin-popup .step.third .phone .country-code").html("+"+$(this).find("option:selected").attr("data-code"))}),styleAvatarUploadButton(".bootbox.login-signin-popup .dentist .form-register .step.fourth .avatar .btn-wrapper label"),initCaptchaRefreshEvent(),$(".login-signin-popup .dentist .form-register .next-step").click(async function(){var e=$(this);switch(e.attr("data-current-step")){case"first":var t=$(".login-signin-popup .dentist .form-register .step.first .form-field"),i=!1;$(".login-signin-popup .dentist .form-register .step.first").parent().find(".error-handle").remove();for(var o=0,n=t.length;o<n;o+=1){if("email"!=t.eq(o).attr("type")||basic.validateEmail(t.eq(o).val().trim())){if("email"==t.eq(o).attr("type")&&basic.validateEmail(t.eq(o).val().trim())){(await checkIfFreeEmail(t.eq(o).val().trim())).error&&(customErrorHandle(t.eq(o).closest(".field-parent"),"The email has already been taken."),i=!0)}}else customErrorHandle(t.eq(o).closest(".field-parent"),"Please use valid email address."),i=!0;"password"==t.eq(o).attr("type")&&t.eq(o).val().length<6&&(customErrorHandle(t.eq(o).closest(".field-parent"),"Passwords must be min length 6."),i=!0),""==t.eq(o).val().trim()&&(customErrorHandle(t.eq(o).closest(".field-parent"),"This field is required."),i=!0)}$(".login-signin-popup .dentist .form-register .step.first .form-field.password").val().trim()!=$(".login-signin-popup .step.first .form-field.repeat-password").val().trim()&&(customErrorHandle($(".login-signin-popup .step.first .form-field.repeat-password").closest(".field-parent"),"Both passwords don't match."),i=!0),i||(fireGoogleAnalyticsEvent("DentistRegistration","ClickNext","DentistRegistrationStep1"),$(".login-signin-popup .dentist .form-register .step").removeClass("visible"),$(".login-signin-popup .dentist .form-register .step.second").addClass("visible"),$(".login-signin-popup .prev-step").show(),e.attr("data-current-step","second"),e.val("Next"));break;case"second":var s=$(".login-signin-popup .dentist .form-register .step.second .form-field.required");i=!1;$(".login-signin-popup .dentist .form-register .step.second").find(".error-handle").remove();for(o=0,n=s.length;o<n;o+=1)s.eq(o).is("select")?""==s.eq(o).val().trim()&&(customErrorHandle(s.eq(o).closest(".field-parent"),"This field is required."),i=!0):s.eq(o).is("input")&&""==s.eq(o).val().trim()&&(customErrorHandle(s.eq(o).closest(".field-parent"),"This field is required."),i=!0);/^[a-z A-Z]+$/.test($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').val().trim())||(customErrorHandle($('.login-signin-popup .dentist .form-register .step.second input[name="latin-name"]').closest(".field-parent"),"This field should contain only latin characters."),i=!0),$(".login-signin-popup .dentist .form-register .step.second #privacy-policy-registration").is(":checked")||(customErrorHandle($(".login-signin-popup .dentist .form-register .step.second .privacy-policy-row"),'Please agree with our <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy policy</a>.'),i=!0),i||(fireGoogleAnalyticsEvent("DentistRegistration","ClickNext","DentistRegistrationStep2"),$(".login-signin-popup .dentist .form-register .step").removeClass("visible"),$(".login-signin-popup .dentist .form-register .step.third").addClass("visible"),e.attr("data-current-step","third"),e.val("Next"));break;case"third":var a=$(".login-signin-popup .dentist .form-register .step.third .form-field.required");i=!1;$(".login-signin-popup .dentist .form-register .step.third").find(".error-handle").remove();for(o=0,n=a.length;o<n;o+=1)a.eq(o).is("select")?""==a.eq(o).val().trim()&&(customErrorHandle(a.eq(o).closest(".field-parent"),"This field is required."),i=!0):a.eq(o).is("input")&&(""==a.eq(o).val().trim()&&(customErrorHandle(a.eq(o).closest(".field-parent"),"This field is required."),i=!0),"url"!=a.eq(o).attr("type")||basic.validateUrl(a.eq(o).val().trim())?"number"!=a.eq(o).attr("type")||basic.validatePhone(a.eq(o).val().trim())||(customErrorHandle(a.eq(o).closest(".field-parent"),"Please use valid numbers."),i=!0):(customErrorHandle(a.eq(o).closest(".field-parent"),"Please enter your website URL starting with http:// or https://."),i=!0));var r=await validatePhone($('.login-signin-popup .dentist .form-register .step.third input[name="phone"]').val().trim(),$('.login-signin-popup .dentist .form-register .step.third select[name="country-code"]').val());basic.objHasKey(r,"success")&&!r.success&&(customErrorHandle($('.login-signin-popup .dentist .form-register .step.third input[name="phone"]').closest(".field-parent"),"Please use valid phone."),i=!0),i||(fireGoogleAnalyticsEvent("DentistRegistration","ClickNext","DentistRegistrationStep3"),$(".login-signin-popup .dentist .form-register .step").removeClass("visible"),$(".login-signin-popup .dentist .form-register .step.fourth").addClass("visible"),e.attr("data-current-step","fourth"),e.val("Create account"));break;case"fourth":$(".login-signin-popup .dentist .form-register .step.fourth").find(".error-handle").remove();i=!1;if(""==$(".dentist .form-register .step.fourth #custom-upload-avatar").val().trim()&&(customErrorHandle($(".step.fourth .step-errors-holder"),"Please select avatar."),i=!0),null==$('.login-signin-popup .dentist .form-register .step.fourth [name="specializations[]"]:checked').val()&&(customErrorHandle($(".login-signin-popup .step.fourth .step-errors-holder"),"Please select specialization/s."),i=!0),$(".login-signin-popup .dentist .form-register .step.fourth .captcha-parent").length&&$(".login-signin-popup .dentist .form-register .step.fourth #register-captcha").length)(await checkCaptcha($(".login-signin-popup .dentist .form-register .step.fourth #register-captcha").val().trim())).error&&(customErrorHandle($(".login-signin-popup .step.fourth .step-errors-holder"),"Please enter correct captcha."),i=!0);else i=!0,window.location.reload();i||(fireGoogleAnalyticsEvent("DentistRegistration","ClickNext","DentistRegistrationComplete"),$(".response-layer").show(),$(".login-signin-popup form#dentist-register").submit())}}),!1}function customErrorHandle(e,t){e.append('<div class="error-handle">'+t+"</div>")}function styleAvatarUploadButton(e){jQuery(".upload-file.avatar").length&&jQuery(".upload-file.avatar").each(function(t,i){var o=jQuery(this);o.attr("data-current-user-avatar")?o.find(".btn-wrapper").append('<label for="custom-upload-avatar" role="button" style="background-image:url('+o.attr("data-current-user-avatar")+');"><div class="inner"><i class="fa fa-plus fs-0" aria-hidden="true"></i><div class="inner-label fs-0">Add profile photo</div></div></label>'):o.find(".btn-wrapper").append('<label for="custom-upload-avatar" role="button"><div class="inner"><i class="fa fa-plus" aria-hidden="true"></i><div class="inner-label">Add profile photo</div></div></label>');var n=document.querySelectorAll(".inputfile");Array.prototype.forEach.call(n,function(t){t.nextElementSibling.innerHTML;t.addEventListener("change",function(t){readURL(this,e);this.files&&this.files.length>1?(this.getAttribute("data-multiple-caption")||"").replace("{count}",this.files.length):t.target.value.split("\\").pop()}),t.addEventListener("focus",function(){t.classList.add("has-focus")}),t.addEventListener("blur",function(){t.classList.remove("has-focus")})})})}function readURL(e,t){if(e.files&&e.files[0]){var i=new FileReader;i.onload=function(e){$(t).css({"background-image":'url("'+e.target.result+'")'}),$(t).find(".inner i").addClass("fs-0"),$(t).find(".inner .inner-label").addClass("fs-0")},i.readAsDataURL(e.files[0])}}function initComboboxes(){$(select.combobox).each(function(){$(this).combobox()})}async function checkIfFreeEmail(e){return await $.ajax({type:"POST",url:"/check-email",dataType:"json",data:{email:e},headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}async function checkCaptcha(e){return await $.ajax({type:"POST",url:"/check-captcha",dataType:"json",data:{captcha:e},headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}async function validatePhone(e,t){return await $.ajax({type:"POST",url:"https://api.dentacoin.com/api/phone/",dataType:"json",data:{phone:e,country_code:t}})}function apiEventsListeners(){$(document).on("successResponseCoreDBApi",async function(e){if(e.response_data.token){var t={token:e.response_data.token,id:e.response_data.data.id,_token:$('meta[name="csrf-token"]').attr("content")};$('input[type="hidden"][name="route"]').length&&$('input[type="hidden"][name="slug"]').length&&(t.route=$('input[type="hidden"][name="route"]').val(),t.slug=$('input[type="hidden"][name="slug"]').val()),e.response_data.new_account?"facebook"==e.platform_type?fireGoogleAnalyticsEvent("PatientRegistration","ClickFB","Patient Registration FB"):"civic"==e.platform_type&&fireGoogleAnalyticsEvent("PatientRegistration","ClickNext","Patient Registration Civic"):"facebook"==e.platform_type?fireGoogleAnalyticsEvent("PatientLogin","Click","Login FB"):"civic"==e.platform_type&&fireGoogleAnalyticsEvent("PatientLogin","Click","Login Civic"),customJavascriptForm("/patient-login",t,"post")}}),$(document).on("errorResponseCoreDBApi",function(e){var t="";if(e.response_data.errors)for(var i in e.response_data.errors)t+=e.response_data.errors[i]+"<br>";$(".response-layer").hide(),basic.showAlert(t,"",!0)})}function customJavascriptForm(e,t,i){i=i||"post";var o=document.createElement("form");for(var n in o.setAttribute("method",i),o.setAttribute("action",e),t)if(t.hasOwnProperty(n)){var s=document.createElement("input");s.setAttribute("type","hidden"),s.setAttribute("name",n),s.setAttribute("value",t[n]),o.appendChild(s)}document.body.appendChild(o),o.submit()}async function loggedOrNotLogic(){if($("body").hasClass("logged-in")){var e=!1;$("body").addClass("overflow-hidden"),$(window).width()<992&&(e=!0),$("body").removeClass("overflow-hidden"),$(".logged-user-right-nav > .hidden-box-parent").hover(function(){$(".logged-user-right-nav .hidden-box").addClass("show-this"),e&&$(".logged-user-right-nav").hasClass("with-hub")||$(".logged-user-right-nav .up-arrow").addClass("show-this")},function(){$(".logged-user-right-nav .hidden-box").removeClass("show-this"),e&&$(".logged-user-right-nav").hasClass("with-hub")||$(".logged-user-right-nav .up-arrow").removeClass("show-this")}),$(".logged-user-right-nav .close-btn a").click(function(){$(".logged-user-right-nav .hidden-box").removeClass("show-this"),e?($("body").removeClass("overflow-hidden"),$(".logged-user-right-nav").hasClass("with-hub")||$(".logged-user-right-nav .up-arrow").removeClass("show-this")):$(".logged-user-right-nav .up-arrow").removeClass("show-this")})}}function initDataTable(){$("table.table.table-without-reorder").length>0&&$("table.table.table-without-reorder").DataTable({ordering:!0,order:[],columnDefs:[{orderable:!1,targets:"no-sort"}],aaSorting:[]})}function bindGoogleAlikeButtonsEvents(){$("body").on("click",".custom-google-label-style label",function(){$(this).addClass("active-label"),"true"==$(".custom-google-label-style").attr("data-input-blue-green-border")&&$(this).parent().find("input").addClass("blue-green-border")}),$("body").on("keyup change focusout",".custom-google-label-style input",function(){$(this).val().trim().length?($(this).closest(".custom-google-label-style").find("label").addClass("active-label"),"true"==$(this).closest(".custom-google-label-style").attr("data-input-blue-green-border")&&$(this).addClass("blue-green-border")):($(this).closest(".custom-google-label-style").find("label").removeClass("active-label"),"true"==$(this).closest(".custom-google-label-style").attr("data-input-blue-green-border")&&$(this).removeClass("blue-green-border"))})}function initToolsPostsSlider(){jQuery(".slider-with-tool-data").slick({slidesToShow:2,infinite:!1,responsive:[{breakpoint:1200,settings:{slidesToShow:1}}]})}function dateObjToFormattedDate(e){if(e.getDate()<10)var t="0"+e.getDate();else t=e.getDate();if(e.getMonth()+1<10)var i="0"+(e.getMonth()+1);else i=e.getMonth()+1;return t+"/"+i+"/"+e.getFullYear()}function onEnrichProfileFormSubmit(){$(document).on("submit",".enrich-profile-container #enrich-profile",function(e){var t=!1,i=$(this);i.find(".error-handle").remove(),""==i.find('[name="description"]').val().trim()&&(t=!0,customErrorHandle(i.find('[name="description"]').parent(),"Please enter short description.")),t?e.preventDefault():"dentist"==$(".enrich-profile-container").attr("data-type")?fireGoogleAnalyticsEvent("DentistRegistration","ClickSave","DentistDescr"):"clinic"==$(".enrich-profile-container").attr("data-type")&&fireGoogleAnalyticsEvent("DentistRegistration","ClickSave","ClinicDescr")})}function bindTrackerClickDownloadBrochure(){$(document).on("click",".download-brochure-event-tracker",function(e){e.preventDefault(),fireGoogleAnalyticsEvent("Assets","Download","Brochure"),window.open($(this).attr("href"))})}function bindTrackerClickDownloadDEBrochure(){$(document).on("click",".download-de-brochure-event-tracker",function(e){e.preventDefault(),fireGoogleAnalyticsEvent("Assets","Download","DE Brochure"),window.open($(this).attr("href"))})}function bindTrackerClickDownloadFactsheet(){$(document).on("click",".download-fact-sheet-event-tracker",function(e){e.preventDefault(),fireGoogleAnalyticsEvent("Assets","Download","Factsheet"),window.open($(this).attr("href"))})}function bindTrackerClickDownloadDEFactsheet(){$(document).on("click",".download-de-fact-sheet-event-tracker",function(){event.preventDefault(),fireGoogleAnalyticsEvent("Assets","Download","DE Factsheet"),window.open($(this).attr("href"))})}function bindTrackerClickDownloadBrochureForPatients(){$(document).on("click",".download-patients-brochure-event-tracker",function(){event.preventDefault(),fireGoogleAnalyticsEvent("Assets","Download","Patient Brochure"),window.open($(this).attr("href"))})}function bindTrackerClickDownloadLogo(){$(document).on("click",".download-logo-event-tracker",function(){fireGoogleAnalyticsEvent("Assets","Download","Logo")})}function bindTrackerTRPRegister(){$(document).on("click",".register-on-trp-event-tracker",function(){fireGoogleAnalyticsEvent("Tools","Register","TRP Register")})}function bindTrackerClickFooterPlatforms(){$(document).on("click","footer .init-event-tracker",function(){fireGoogleAnalyticsEvent("Tools","Click",$(this).find("span").html().trim())})}function fireGoogleAnalyticsEvent(e,t,i,o){var n={event_action:t,event_category:e,event_label:i};null!=o&&(n.value=o),gtag("event",i,n)}bindLoginSigninPopupShow(),apiEventsListeners(),loggedOrNotLogic(),bindGoogleAlikeButtonsEvents(),onEnrichProfileFormSubmit(),bindTrackerClickDownloadBrochure(),bindTrackerClickDownloadDEBrochure(),bindTrackerClickDownloadFactsheet(),bindTrackerClickDownloadDEFactsheet(),bindTrackerClickDownloadBrochureForPatients(),bindTrackerClickDownloadLogo(),bindTrackerTRPRegister(),bindTrackerClickFooterPlatforms(),$(document).on("click",".logged-user-right-nav .application, .dentacoin-ecosystem-section .single-application, .applications-section .single-application",function(){fireGoogleAnalyticsEvent("Tools","Click",$(this).attr("data-platform"))});
