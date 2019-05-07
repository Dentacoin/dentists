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
    <link rel="stylesheet" type="text/css" href="/dist/css/front-libs-style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <script>
        var HOME_URL = '{{ route("home") }}';
    </script>
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/shell.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97167262-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-97167262-3');
    </script>
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
    @if(\App\Http\Controllers\UserController::instance()->checkSession())
        <div class="logged-mobile-profile-menu">
            <nav class="profile-menu module">
                <a href="javascript:void(0)" class="close-logged-mobile-profile-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                    <li>
                        <a href="{{ route('home') }}" itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Home icon" src="/assets/uploads/home.svg"/>
                            </figure>
                            <span itemprop="name">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my-profile') }}" @if(!empty(Route::current()) && Route::current()->getName() == 'my-profile') class="active" @endif itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Wallet icon" src="/assets/uploads/wallet-icon.svg"/>
                            </figure>
                            <span itemprop="name">My Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('edit-account') }}" @if(!empty(Route::current()) && Route::current()->getName() == 'edit-account') class="active" @endif itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Edit account icon" src="/assets/uploads/edit-account-icon.svg"/>
                            </figure>
                            <span itemprop="name">Edit Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manage-privacy') }}" @if(!empty(Route::current()) && Route::current()->getName() == 'manage-privacy') class="active" @endif itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Privacy icon" src="/assets/uploads/privacy-icon.svg"/>
                            </figure>
                            <span itemprop="name">Manage Privacy</span>
                        </a>
                    </li>
                    <li>
                        <a href="//dentavox.dentacoin.com" target="_blank" itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Dentavox logo" src="/assets/uploads/dentavox--surveys.svg"/>
                            </figure>
                            <span itemprop="name">DentaVox Surveys</span>
                        </a>
                    </li>
                    <li>
                        <a href="//reviews.dentacoin.com" target="_blank" itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Trusted reviews logo" src="/assets/uploads/trusted-reviews-icon.svg"/>
                            </figure>
                            <span itemprop="name">Trusted Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="//assurance.dentacoin.com" target="_blank" itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Assurance logo" src="/assets/uploads/assurance.svg"/>
                            </figure>
                            <span itemprop="name">Dentacoin Assurance</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-logout') }}" itemprop="url">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block">
                                <img alt="Logout icon" src="/assets/uploads/logout-icon.svg"/>
                            </figure>
                            <span itemprop="name">Log out</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @endif
    <header>
        <div class="container">
            <div class="row fs-0">
                <figure itemscope="" itemtype="http://schema.org/Organization" class="col-xs-3 inline-block">
                    <a itemprop="url" @if((new \App\Http\Controllers\UserController())->checkSession()) href="{{ route('logged-home') }}" @else  href="{{ route('home') }}" @endif @if(!empty(Route::current())) @if(Route::current()->getName() == "home") tabindex="=-1" @endif @endif>
                        <img src="@if((new \App\Http\Controllers\UserController())->checkSession() && Route::current()->getName() == 'home') {{URL::asset('assets/images/round-logo-white.svg') }} @else {{URL::asset('assets/images/logo.svg') }} @endif" itemprop="logo" class="max-width-50 max-width-xs-40" alt="Dentacoin logo"/>
                    </a>
                </figure>
                @if(!(new \App\Http\Controllers\UserController())->checkSession())
                    <div class="col-xs-9 inline-block btns-container">
                        <a href="javascript:void(0)" class="white-dark-blue-btn show-login-signin inline-block" tabindex="-1">SIGN IN</a>
                        <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                @else
                    @if(!empty(Route::current()) && in_array(Route::current()->getName(), array('my-profile', 'edit-account', 'manage-privacy', 'my-contracts')))
                        <div class="col-xs-9 inline-block text-right show-on-mobile logged-user-right-nav @if(Route::current()->getName() != 'home' && (new \App\Http\Controllers\UserController())->checkSession()) with-hub @endif">
                            @include('partials.logged-user-header-hidden-box-partial')

                            <a href="javascript:void(0)" class="logged-user-hamburger inline-block padding-left-10"><i class="fa fa-bars fs-32 dark-color" aria-hidden="true"></i></a>
                        </div>
                    @else
                        @include('partials.logged-user-desktop-header-menu', ['profile_pages' => false])
                    @endif
                @endif
            </div>
        </div>
    </header>
    <main class="main-container">@yield("content")</main>
    <footer>
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
                            @php($first_el = false)
                            @foreach($footer_menu as $el)
                                @if($first_el)
                                    <li class="inline-block separator">|</li>
                                @endif
                                <li class="inline-block"><a @if($el->new_window) target="_blank" @endif itemprop="url" href="{{$el->url}}"><span itemprop="name">{{$el->name}}</span></a></li>
                                @if(!$first_el)
                                    @php($first_el = true)
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            @endif
            <div class="row padding-bottom-50 text-center fs-13 bottom-text">
                <div class="col-xs-12 padding-bottom-10">© 2019 Dentacoin Foundation. All rights reserved.</div>
                <div class="col-xs-12">
                    <a href="//dentacoin.com/assets/uploads/dentacoin-foundation.pdf" class="inline-block" target="_blank">Verify Dentacoin Foundation</a>
                    <li class="inline-block separator padding-left-5 padding-right-5">|</li>
                    <a href="//dentacoin.com/privacy-policy" target="_blank" class="inline-block">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
    @if(!\App\Http\Controllers\UserController::instance()->checkSession())
        <div class="hidden-login-form hide">
            <div class="fs-0 popup-header-action">
                <a href="javascript:void(0)" class="inline-block" data-type="patient">I'm a Patient</a>
                <a href="javascript:void(0)" class="inline-block" data-type="dentist">I'm a Dentist</a>
            </div>
            <div class="fs-0 popup-body">
                <div class="patient inline-block">
                    <div class="form-login">
                        <h2>LOG IN</h2>
                        <div class="padding-bottom-10">
                            <a href="javascript:void(0)" class="facebook-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="assurance" data-type="patient">with Facebook</a>
                        </div>
                        <div>
                            <a href="javascript:void(0)"  class="civic-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="assurance" data-type="patient">with Civic</a>
                        </div>
                        <div class="popup-half-footer">
                            Don't have an account? <a href="javascript:void(0)" class="call-sign-up color-white">Sign up</a>
                        </div>
                    </div>
                    <div class="form-register">
                        <h2>SIGN UP</h2>
                        <div class="padding-bottom-10">
                            <a href="javascript:void(0)" class="facebook-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="assurance" data-type="patient" custom-stopper="true">with Facebook</a>
                        </div>
                        <div>
                            <a href="javascript:void(0)"  class="civic-custom-btn social-login-btn calibri-regular fs-20" data-url="//api.dentacoin.com/api/register" data-platform="assurance" data-type="patient" custom-stopper="true">with Civic</a>
                        </div>
                        <div class="privacy-policy-row padding-top-20">
                            <div class="pretty p-svg p-curve dark-blue-style agree-with">
                                <input type="checkbox" id="privacy-policy-registration-patient"/>
                                <div class="state p-success">
                                    <!-- svg path -->
                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                    </svg>
                                    <label class="fs-14">I agree with <a href="//dentacoin.com/privacy-policy" class="color-white" target="_blank">Privacy Policy</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="step-errors-holder"></div>
                        <div class="popup-half-footer">
                            Already have an account? <a href="javascript:void(0)" class="call-log-in">Log in</a>
                        </div>
                    </div>
                </div>
                <div class="dentist inline-block custom-hide">
                    <div class="form-login">
                        <h2>LOG IN</h2>
                        <form method="POST" action="{{ route('dentist-login') }}" id="dentist-login">
                            <div class="padding-bottom-10 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-login-email">Email address:</label>
                                    <input class="full-rounded form-field" name="email" maxlength="100" type="email" id="dentist-login-email" placeholder=""/>
                                </div>
                            </div>
                            <div class="padding-bottom-20 field-parent">
                                <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                    <label for="dentist-login-password">Password:</label>
                                    <input class="full-rounded form-field" name="password" maxlength="50" id="dentist-login-password" type="password"/>
                                </div>
                            </div>
                            <div class="btn-container text-center">
                                <input type="submit" value="Log in" class="white-dark-blue-btn small fs-20"/>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="text-center padding-top-40 fs-16">Don't have an account? <a href="javascript:void(0)" class="call-sign-up fs-20">Sign up</a></div>
                        </form>
                        <div class="popup-half-footer">
                            <a href="{{route('forgotten-password')}}">Forgotten password?</a>
                        </div>
                    </div>
                    <div class="form-register">
                        <h2>Sign Up Now - Quick & Easy!</h2>
                        <form method="POST" enctype="multipart/form-data" id="dentist-register" action="{{ route('dentist-register') }}">
                            <div class="step first visible" data-step="first">
                                <div class="padding-bottom-10 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-email">Work Email Address:</label>
                                        <input class="full-rounded form-field" name="email" maxlength="100" type="email" id="dentist-register-email"/>
                                    </div>
                                </div>
                                <div class="padding-bottom-10 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-password">Password:</label>
                                        <input class="full-rounded form-field password" name="password" minlength="6" maxlength="50" type="password" id="dentist-register-password"/>
                                    </div>
                                </div>
                                <div class="padding-bottom-20 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-repeat-password">Repeat password:</label>
                                        <input class="full-rounded form-field repeat-password" name="repeat-password" minlength="6" maxlength="50" type="password" id="dentist-register-repeat-password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="step second" data-step="second">
                                <div class="padding-bottom-20 user-type-container fs-0">
                                    <input type="hidden" name="user-type" value="dentist"/>
                                    <div class="inline-block-top user-type active padding-right-15" data-type="dentist">
                                        <a href="javascript:void(0)" class="custom-button">
                                            <span class="custom-radio inline-block"><span class="circle"></span></span> <span class="inline-block">Dentist</span>
                                        </a>
                                        <div class="fs-14 light-gray-color">For associate dentists OR independent practitioners</div>
                                    </div>
                                    <div class="inline-block-top user-type padding-left-15" data-type="clinic">
                                        <a href="javascript:void(0)" class="custom-button">
                                            <span class="custom-radio inline-block"><span class="circle"></span></span> <span class="inline-block">Clinic</span>
                                        </a>
                                        <div class="fs-14 light-gray-color">For clinics with more than one dental practitioners</div>
                                    </div>
                                </div>
                                <div class="padding-bottom-25 field-parent">
                                    <div class="custom-google-select-style module">
                                        <label>Title:</label>
                                        <select class="form-field required" name="dentist-title">
                                            @foreach((new \App\Http\Controllers\APIRequestsController())->getAllEnums()->titles as $key => $title)
                                                <option value="{{$key}}">{{$title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="padding-bottom-15 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-latin-name">Your Name (Latin letters):</label>
                                        <input class="full-rounded form-field required" name="latin-name" maxlength="100" type="text" id="dentist-register-latin-name"/>
                                    </div>
                                    <div class="fs-14 light-gray-color">Ex: Vladimir Alexandrovich (First name, Last name)</div>
                                </div>
                                <div class="padding-bottom-30 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-alternative-name">Alternative Spelling (optional):</label>
                                        <input class="full-rounded form-field" name="alternative-name" maxlength="100" type="text" id="dentist-register-alternative-name"/>
                                    </div>
                                    <div class="fs-14 light-gray-color">Ex: Владимир Александрович</div>
                                </div>
                                <div class="privacy-policy-row padding-bottom-20">
                                    <div class="pretty p-svg p-curve on-white-background">
                                        <input type="checkbox" id="privacy-policy-registration"/>
                                        <div class="state p-success">
                                            <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                            </svg>
                                            <label class="fs-14">I've read and agree to the <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy Policy</a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step third address-suggester-wrapper" data-step="third">
                                <div class="padding-bottom-20 field-parent">
                                    <div class="custom-google-select-style module">
                                        <label>Select country:</label>
                                        <select name="country-code" id="dentist-country" class="form-field required country-select">
                                            @php($current_phone_code = '+')
                                            @if(isset($client_ip) && $client_ip != '127.0.0.1')
                                                @php($current_user_country_code = mb_strtolower(trim(file_get_contents('http://ipinfo.io/' . $client_ip . '/country'))))
                                            @endif
                                            @php($countries = (new \App\Http\Controllers\APIRequestsController())->getAllCountries())
                                            @if(!empty($countries))
                                                @foreach($countries as $country)
                                                    @php($selected = '')
                                                    @if(!empty($current_user_country_code))
                                                        @if($current_user_country_code == $country->code)
                                                            @php($current_phone_code = $current_phone_code.$country->phone_code)
                                                            @php($selected = 'selected')
                                                        @endif
                                                    @endif
                                                    <option value="{{$country->code}}" data-code="{{$country->phone_code}}" {{$selected}}>{{$country->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="padding-bottom-15 suggester-parent module field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-address">Address: Start typing street, No, city</label>
                                        <input type="text" name="address" class="full-rounded form-field required address-suggester dont-init" autocomplete="off" id="dentist-register-address">
                                    </div>
                                    <div class="suggester-map-div margin-top-15 margin-bottom-10"></div>
                                    <div class="alert alert-notice geoip-confirmation margin-top-10 margin-bottom-10 hide-this">Please check the map to make sure we got your correct address. If you're not happy - please drag the map to adjust it.</div>
                                    <div class="alert alert-warning geoip-hint margin-top-10 margin-bottom-10">Please enter a valid address for your practice (including street name and number)</div>
                                </div>
                                <div class="padding-bottom-15 field-parent">
                                    <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                        <label for="dentist-register-website">Website: http(s)://:</label>
                                        <input class="full-rounded form-field required" name="website" id="dentist-register-website" maxlength="250" type="url"/>
                                    </div>
                                    <div class="fs-14 light-gray-color">No website? Add your most popular social page.</div>
                                </div>
                                <div class="padding-bottom-10 field-parent">
                                    <div class="phone">
                                        <div class="country-code" name="phone-code">{{$current_phone_code}}</div>
                                        <div class="custom-google-label-style module input-phone" data-input-blue-green-border="true">
                                            <label for="dentist-register-phone">Phone number:</label>
                                            <input class="full-rounded form-field required" name="phone" maxlength="50" type="number" id="dentist-register-phone"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step fourth" data-step="fourth">
                                <div class="padding-bottom-20 fs-0">
                                    <div class="inline-block-top avatar module upload-file">
                                        <input type="file" class="visualise-image inputfile" id="custom-upload-avatar" name="image" accept=".jpg,.png,.jpeg,.svg,.bmp"/>
                                        <div class="btn-wrapper"></div>
                                        <div class="fs-14 padding-top-5 italic">Max size: 2MB</div>
                                    </div>
                                    <div class="inline-block-top specializations">
                                        <h4>Please select your specializations:</h4>
                                        @foreach((new \App\Http\Controllers\APIRequestsController())->getAllEnums()->specialisations as $key => $specialisation)
                                            <div class="pretty p-svg p-curve on-white-background">
                                                <input type="checkbox" name="specializations[]" value="{{$key}}"/>
                                                <div class="state p-success">
                                                    <!-- svg path -->
                                                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                                                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                                    </svg>
                                                    <label class="fs-14">{{$specialisation}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="fs-0 captcha-parent padding-bottom-15 padding-top-20">
                                        <div class="inline-block width-50 width-xs-100 padding-bottom-xs-15">
                                            <div class="captcha-container flex text-center">
                                                <span>{!! captcha_img() !!}</span>
                                                <button type="button" class="refresh-captcha">
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="inline-block fs-14 width-50 width-xs-100 padding-left-10">
                                            <div class="custom-google-label-style module" data-input-blue-green-border="true">
                                                <label for="register-captcha">Enter captcha:</label>
                                                <input type="text" name="captcha" id="register-captcha" maxlength="5" class="full-rounded form-field"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-errors-holder padding-top-10"></div>
                                </div>
                            </div>
                            <div class="btns-container">
                                <div class="inline-block">
                                    <input type="button" value="< back" class="prev-step"/>
                                </div>
                                <div class="inline-block text-right">
                                    <input type="button" value="Next" class="white-dark-blue-btn small fs-20 next-step" data-current-step="first"/>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                </div>
                            </div>
                        </form>
                        <div class="popup-half-footer">
                            Already have an account? <a href="javascript:void(0)" class="call-log-in">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="bottom-fixed-container">
        @if(!empty($privacy_policy_cookie))
            <div class="privacy-policy-cookie">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text inline-block">This site uses cookies. Read more about the use of personal data in our <a href="//dentacoin.com/privacy-policy" class="link" target="_blank">Privacy Policy</a>.</div>
                            <div class="button inline-block"><a href="javascript:void(0);" class="white-dark-blue-btn accept">Accept</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="custom-popup external-form" id="custom-popup">
        <div class="popup-body">
            <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="wrapper">
                <div class="text-center fs-26 padding-bottom-30 lato-black">Send Your Inquiry</div>
                <script>
                    hbspt.forms.create({
                        portalId: "4097841",
                        formId: "0711fe44-e5c7-4536-beda-ac216a2b2b17"
                    });
                </script>
            </div>
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
    <script src="/assets/js/basic.js"></script>
    <script src="/dist/js/front-libs-script.js?v=1.0.22"></script>
    <script src="/assets/js/address.js"></script>
    @yield("script_block"){{--
    <script src="/dist/js/front-script.js?v=1.0.22"></script>--}}
    <script src="/assets/js/index-bundled.js?v=1.0.22"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaVeHq_LOhQndssbmw-aDnlMwUG73yCdk&libraries=places&language=en"></script>

    {{--Load social logging scripts only if user is not logged--}}
    @if(!(new \App\Http\Controllers\UserController())->checkSession())
        <script src="//dentacoin.com/assets/libs/civic-login/civic.js?v=1.0.22"></script>
        <script src="//dentacoin.com/assets/libs/facebook-login/facebook.js?v=1.0.22"></script>
    @endif

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