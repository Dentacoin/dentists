<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if(!empty($meta_data))
        <title>{{$meta_data->title}}</title>
        <meta name="description" content="{{$meta_data->description}}" />
        <meta name="keywords" content="{{$meta_data->keywords}}" />
        <meta property="og:url" content="{{Request::url()}}"/>
        <meta property="og:title" content="{{$meta_data->social_title}}"/>
        <meta property="og:description" content="{{$meta_data->social_description}}"/>
        @if(!empty($meta_data->media))
            <meta property="og:image" content="{{URL::asset('assets/uploads/'.$meta_data->media->name)}}"/>
            <meta property="og:image:width" content="1200"/>
            <meta property="og:image:height" content="630"/>
        @endif
    @endif
    @if(!empty(Route::current()) && Route::current()->getName() == 'home')
        <link rel="canonical" href="{{route('home')}}" />
    @endif
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="/dist/css/front-libs-style.css?v=1.0.64">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1.0.64">
    <link rel="stylesheet" type="text/css" href="https://dentacoin.com/assets/libs/dentacoin-login-gateway/css/dentacoin-login-gateway-style.css?v=1.0.64"/>
    <script>
        var HOME_URL = '{{ route("home") }}';
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97167262-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        @if(empty($_COOKIE['performance_cookies']))
            gtag('config', 'UA-97167262-3', {'anonymize_ip': true});
        @else
            gtag('config', 'UA-97167262-3');
        @endif
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        @if(empty($_COOKIE['marketing_cookies']))
            fbq('consent', 'revoke');
        @else
            fbq('consent', 'grant');
        @endif
        fbq('init', '2366034370318681');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=2366034370318681&ev=PageView
&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body class="@if(!empty(Route::current())) {{Route::current()->getName()}} @else class-404 @endif @if((new \App\Http\Controllers\UserController())->checkSession()) logged-in @endif">
    @if(!empty(Route::current()))
        @php($header_menu = \App\Http\Controllers\Controller::instance()->getMenu('header'))
        @if(\App\Http\Controllers\UserController::instance()->checkSession())
            @php($route = 'logged-home')
        @else
            @php($route = 'home')
        @endif
        <nav class="sidenav">
            <div class="wrapper">
                <a href="javascript:void(0)" class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                    @foreach($header_menu as $menu_el)
                        <li><a itemprop="url" class="{{$menu_el->class_attribute}}" @if(!empty($menu_el->id_attribute)) id="{{$menu_el->id_attribute}}" @endif @if(!empty(Route::current()) && Route::current()->getName() != 'home' && strpos($menu_el->class_attribute, 'scrolling-to-section') !== false) href="{{route($route)}}#{{$menu_el->id_attribute}}" @else @if($menu_el->new_window) target="_blank" @endif href="{{$menu_el->url}}" @endif><span itemprop="name">{{$menu_el->name}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    @endif
    <header>
        <div class="container">
            <div class="row fs-0">
                <figure itemscope="" itemtype="http://schema.org/Organization" class="col-xs-3 inline-block padding-left-xs-10">
                    <a itemprop="url" @if((new \App\Http\Controllers\UserController())->checkSession()) href="{{ route('logged-home') }}" @else  href="{{ route('home') }}" @endif @if(!empty(Route::current())) @if(Route::current()->getName() == "home") tabindex="=-1" @endif @endif>
                        <img src="@if((new \App\Http\Controllers\UserController())->checkSession() && Route::current()->getName() == 'home') {{URL::asset('assets/images/round-logo-white.svg') }} @else {{URL::asset('assets/images/logo.svg') }} @endif" itemprop="logo" class="max-width-40" alt="Dentacoin logo"/>
                    </a>
                </figure>
                @if(!(new \App\Http\Controllers\UserController())->checkSession())
                    <div class="col-xs-9 inline-block btns-container padding-right-xs-10">
                        <a href="javascript:void(0)" class="white-dark-blue-btn open-dentacoin-gateway dentist-login inline-block" tabindex="-1">SIGN IN</a>
                        <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                @else
                    @include('partials.logged-user-desktop-header-menu', ['profile_pages' => false])
                @endif
            </div>
        </div>
    </header>
    <main class="main-container">@yield("content")</main>
    <footer class="padding-bottom-100 padding-bottom-sm-50 padding-bottom-xs-50">
        <div class="container padding-top-50">
            <div class="row">
                <h2 class="fs-50 lato-light dark-blue text-center col-xs-12 padding-bottom-50">Subscribe for Our Newsletter</h2>
            </div>
            <div class="row newsletter-register">
                <div class="col-xs-12 text-center">
                    <div id="mc_embed_signup">
                        <form action="https://dentacoin.us16.list-manage.com/subscribe/post?u=61ace7d2b009198ca373cb213&amp;id=cd60f60a48" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                            <div id="mc_embed_signup_scroll">
                                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your email" required>
                                <input type="hidden" name="b_61ace7d2b009198ca373cb213_cd60f60a48" tabindex="-1" value="">
                                <div class="clear btn-container"><input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                            <div class="checkbox-row text-center"><input type="checkbox" required id="newsletter-privacy-policy"/><label for="newsletter-privacy-policy">I agree with <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy Policy</a></label></div>
                        </form>
                    </div>
                </div>
            </div>
            {{--<div class="email-octopus-form-wrapper row newsletter-register">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <p class="email-octopus-success-message"></p>
                    <p class="email-octopus-error-message"></p>
                    <form method="post" action="https://emailoctopus.com/lists/398a309b-ef00-11e8-a3c9-06b79b628af2/members/embedded/1.3s/add" class="email-octopus-form" data-sitekey="6LdYsmsUAAAAAPXVTt-ovRsPIJ_IVhvYBBhGvRV6" data-success-message="Thank you for signing up!">
                        <div class="form-row fs-0 flex email-octopus-form-row" data-valid-email-message="Please enter valid email.">
                            <input id="field_0" name="field_0" type="email" placeholder="Enter your email">
                            <button type="submit">Subscribe</button>
                            <input type="hidden" name="successRedirectUrl" value="">
                        </div>
                        <div class="email-octopus-form-row-consent form-row fs-0">
                            <div class="inline-block-top checkbox-wrapper">
                                <input type="checkbox" id="consent" name="consent">
                            </div>
                            <label for="consent"><span>By submitting the form, you agree to our <a href="//dentacoin.com/privacy-policy">Privacy Policy</a></span></label>
                        </div>
                        <div class="email-octopus-form-row-hp" aria-hidden="true">
                            <!-- Do not remove this field, otherwise you risk bot sign-ups -->
                            <input type="text" name="hp398a309b-ef00-11e8-a3c9-06b79b628af2" tabindex="-1" autocomplete="nope"/>
                        </div>
                    </form>
                </div>
            </div>--}}
            @if(!empty($socials))
                <div class="row socials">
                    <div class="col-xs-12" itemscope="" itemtype="http://schema.org/Organization">
                        <link itemprop="url" href="{{ route('home') }}">
                        <ul>
                            @foreach($socials as $social)
                                <li class="inline-block">
                                    <a itemprop="sameAs" target="_blank" href="{{$social->link}}">
                                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                            <img src="//dentacoin.com/assets/uploads/{{$social->media_name}}" alt="{{$social->media_alt}}" itemprop="contentUrl"/>
                                        </figure>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(!empty(Route::current()))
                @php($footer_menu = \App\Http\Controllers\Controller::instance()->getMenu('footer'))
            @endif
            @if(!empty($footer_menu))
                <div class="row menu">
                    <nav class="col-xs-12">
                        <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                            @php($show_separator = false)
                            @foreach($footer_menu as $el)
                                @if($show_separator)
                                    <li class="inline-block separator">|</li>
                                @endif
                                <li class="inline-block @if(!empty($el->class_attribute)) {{$el->class_attribute}} @endif @if($el->url == '//dentacoin.com/assets/uploads/dentacoin-fact-sheet.pdf') has-submenu padding-right-xs-20 @endif">
                                    <a @if($el->new_window) target="_blank" @endif itemprop="url" href="{{$el->url}}"><span itemprop="name">{{$el->name}}</span></a>
                                    @if($el->url == '//dentacoin.com/assets/uploads/dentacoin-fact-sheet.pdf')
                                        <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement" class="submenu">
                                            <li>
                                                <a href="//dentacoin.com/assets/uploads/was-ist-dentacoin.pdf" itemprop="url" target="_blank"  class="download-de-fact-sheet-event-tracker"><span itemprop="name">Fact Sheet DE</span></a>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                                @if(!$show_separator)
                                    @php($show_separator = true)
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            @endif
            <div class="row padding-bottom-50 text-center fs-13 bottom-text">
                <div class="col-xs-12 padding-bottom-10">© {{date('Y')}} Dentacoin Foundation. All rights reserved.</div>
                <div class="col-xs-12">
                    <a href="//dentacoin.com/assets/uploads/dentacoin-foundation.pdf" class="inline-block" target="_blank">Verify Dentacoin Foundation</a>
                    <li class="inline-block separator padding-left-5 padding-right-5">|</li>
                    <a href="//dentacoin.com/privacy-policy" target="_blank" class="inline-block">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
    @if(!\App\Http\Controllers\UserController::instance()->checkSession())
        @if(!empty(session('logout_token')))
            <img src="//dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
            <img src="//assurance.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
            <img src="//reviews.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
            <img src="//dentavox.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
            <img src="//account.dentacoin.com/custom-cookie?logout-token={{ urlencode(session('logout_token')) }}" class="hide"/>
        @endif
    @else
        @php($slug = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['id'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
        @php($type = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['type'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
        @php($token = (new \App\Http\Controllers\Controller())->encrypt(session('logged_user')['token'], getenv('API_ENCRYPTION_METHOD'), getenv('API_ENCRYPTION_KEY')))
        <img src="//dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
        <img src="//assurance.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
        <img src="//dentists.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
        <img src="//reviews.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
        <img src="//dentavox.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
        <img src="//account.dentacoin.com/custom-cookie?slug={{ urlencode($slug) }}&type={{ urlencode($type) }}&token={{ urlencode($token) }}" class="hide"/>
    @endif
    <div class="bottom-fixed-container">
        {{--<a href="https://dentacoin.com/holiday-calendar-2019" target="_blank" class="display-block banner">
            <picture itemscope="" itemtype="http://schema.org/ImageObject">
                <source media="(max-width: 992px)" srcset="//dentacoin.com/assets/uploads/mobile-christmas-banner-small.gif"/>
                <img src="//dentacoin.com/assets/uploads/christmas-banner.gif" alt="Holiday calendar banner" class="width-100" itemprop="contentUrl"/>
            </picture>
        </a>--}}
        @if(empty($_COOKIE['performance_cookies']) && empty($_COOKIE['functionality_cookies']) && empty($_COOKIE['marketing_cookies']) && empty($_COOKIE['strictly_necessary_policy']))
            <div class="privacy-policy-cookie">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text inline-block">This site uses cookies. Find out more on how we use cookies in our <a href="https://dentacoin.com/privacy-policy" class="link" target="_blank">Privacy Policy</a>. | <a href="javascript:void(0);" class="link adjust-cookies">Adjust cookies</a></div>
                            <div class="button inline-block"><a href="javascript:void(0);" class="white-dark-blue-btn white-border accept-all">Accept all cookies</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="custom-popup external-form" id="custom-popup">
        <div class="popup-body">
            <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="wrapper"></div>
        </div>
    </div>
    <div class="custom-popup video" id="custom-popup">
        <div class="popup-body">
            <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="wrapper">

            </div>
        </div>
    </div>
    <div class="response-layer">
        <div class="wrapper">
            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                <img src="/assets/images/loader.gif" class="max-width-160" alt="Loader">
            </figure>
        </div>
    </div>
    <script src="https://dentacoin.com/assets/js/basic.js?v=1.0.64"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaVeHq_LOhQndssbmw-aDnlMwUG73yCdk&libraries=places&language=en"></script>
    <script src="/dist/js/front-libs-script.js?v=1.0.64"></script>
    <script src="https://dentacoin.com/assets/libs/dentacoin-login-gateway/js/init.js?v=1.0.64"></script>
    {{--<script src="/assets/js/address.js"></script>--}}
    @yield("script_block")
    <script src="/dist/js/front-script.js?v=1.0.64"></script>
    {{--<script src="/assets/js/index.js"></script>--}}

    {{--Multiple errors from laravel validation--}}
    @if(!empty($errors) && count($errors) > 0)
        <script>
            var errors = '';
            @foreach($errors->all() as $error)
                errors+="{{ $error }}" + '<br>';
            @endforeach
            basic.showAlert(errors, '', true);
        </script>
    @endif

    {{--Single error from controller response--}}
    @if (session('error'))
        <script>
            basic.showAlert("{!! session('error') !!}", '', true);
        </script>
    @endif

    {{--Multiple errors from controller response--}}
    @if(session('errors_response') && count(session('errors_response')) > 0)
        <script>
            var errors = '';
            @foreach(session('errors_response') as $error)
                errors+="{{ $error }}" + '<br>';
            @endforeach
            basic.showAlert(errors, '', true);
        </script>
    @endif

    {{--Success from controller response--}}
    @if(session('success'))
        @if(session('popup-html'))
            <script>
                basic.showDialog('{!! session('popup-html') !!}', 'popup-html', null, true);
                $('.close-popup').click(function() {
                    basic.closeDialog();
                });
            </script>
        @else
            <script>
                basic.showAlert("{!! session('success') !!}", '', true);
            </script>
        @endif
    @endif
</body>
</html>