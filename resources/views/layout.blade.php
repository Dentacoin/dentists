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
</head>
<body class="@if(!empty(Route::current())) {{Route::current()->getName()}} @else class-404 @endif">
    @if(!empty(Route::current()))
        @php($header_menu = \App\Http\Controllers\Controller::instance()->getMenu('header'))
        <nav class="sidenav">
            <div class="wrapper">
                <a href="javascript:void(0)" class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                    @foreach($header_menu as $menu_el)
                        <li><a itemprop="url" class="{{$menu_el->class_attribute}}" @if(!empty($menu_el->id_attribute)) id="{{$menu_el->id_attribute}}" @endif @if(!empty(Route::current()) && Route::current()->getName() != 'home' && strpos($menu_el->class_attribute, 'scrolling-to-section') !== false) href="{{route('home')}}#{{$menu_el->id_attribute}}" @else @if($menu_el->new_window) target="_blank" @endif href="{{$menu_el->url}}" @endif><span itemprop="name">{{$menu_el->name}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    @endif
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
    <header>
        <div class="container">
            <div class="row fs-0">
                <figure itemscope="" itemtype="http://schema.org/Organization" class="col-xs-3 inline-block">
                    <a itemprop="url" href="{{ route('home') }}" @if(!empty(Route::current())) @if(Route::current()->getName() == "home") tabindex="=-1" @endif @endif>
                        <img src="{{URL::asset('assets/images/logo.svg') }}" itemprop="logo" class="max-width-50 max-width-xs-40" alt="Dentacoin logo"/>
                    </a>
                </figure>
                {{--<nav class="col-xs-8 inline-block">
                    @if(!empty($header_menu))
                        <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                            @foreach($header_menu as $menu_el)
                                <li class="inline-block"><a itemprop="url" class="{{$menu_el->class_attribute}}" @if(!empty($menu_el->id_attribute)) id="{{$menu_el->id_attribute}}" @endif @if(!empty(Route::current()) && Route::current()->getName() != 'home' && strpos($menu_el->class_attribute, 'scrolling-to-section') !== false) href="{{route('home')}}#{{$menu_el->id_attribute}}" @else @if($menu_el->new_window) target="_blank" @endif href="{{$menu_el->url}}" @endif><span itemprop="name">{{$menu_el->name}}</span></a></li>
                            @endforeach
                        </ul>
                    @endif
                </nav>--}}
                @if(isset($mobile))
                    @if($mobile)
                        <div class="col-xs-6 inline-block btns-container center-important">
                            <a href="javascript:void(0)" class="white-dark-blue-btn show-external-form-button register inline-block">INQUIRY</a>
                        </div>
                        <div class="col-xs-3 inline-block btns-container">
                            <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </div>
                    @else
                        <div class="col-xs-9 inline-block btns-container">
                            <a href="javascript:void(0)" class="white-dark-blue-btn show-external-form-button register inline-block">SEND AN INQUIRY</a>
                            <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </header>
    <main class="main-container">@yield("content")</main>
    <footer>
        <div class="container padding-top-50">
            <div class="row">
                <h2 class="fs-50 lato-light dark-blue text-center col-xs-12 padding-bottom-50">Subscribe</h2>
            </div>
            <div class="row newsletter-register">
                <div class="">
                    <form action="//dentacoin.us15.list-manage.com/subscribe/post?u=2db886e44db15e869246f6964&amp;id=6906b05278" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" target="_blank" data-success-message="Thank you for signing up!">
                        <div class="form-row fs-0 flex" data-valid-email-message="Please enter valid email.">
                            <input type="email" name="EMAIL" id="input-email" placeholder="Enter your email" aria-label="Email" aria-required="true">
                            <button type="submit" name="subscribe">Subscribe</button>
                            <input type="hidden" name="b_2db886e44db15e869246f6964_6906b05278" tabindex="-1" value="">
                        </div>
                        <div class="form-row fs-0" data-valid-message="Please agree with our Privacy Policy.">
                            <div class="inline-block-top checkbox-wrapper"><input type="checkbox" id="agree-with-privacy-policy" aria-required="true"/></div>
                            <label for="agree-with-privacy-policy" class="inline-block-top">By submitting the form, you agree to our <a href="//dentacoin.com/privacy-policy" target="_blank">Privacy Policy</a>.</label>
                        </div>
                    </form>
                </div>
            </div>
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
            <div class="row padding-bottom-50 text-center fs-14">
                <div class="col-xs-12">© 2018 Dentacoin Foundation. All rights reserved.</div>
                <div class="col-xs-12"><a href="//dentacoin.com/assets/uploads/dentacoin-foundation.pdf" target="_blank">Verify Dentacoin Foundation</a> </div>
            </div>
        </div>
    </footer>
    <div class="custom-popup external-form" id="custom-popup">
        <div class="popup-body">
            <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="wrapper">
                <script>
                    hbspt.forms.create({
                        portalId: "4097841",
                        formId: "0711fe44-e5c7-4536-beda-ac216a2b2b17"
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="custom-popup video" id="custom-popupcustom-popup">
        <div class="popup-body">
            <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="wrapper">

            </div>
        </div>
    </div>
    <script src="/assets/js/basic.js"></script>
    <script src="/dist/js/front-libs-script.js?v=1.0.16"></script>
    @yield("script_block")
{{--<script src="/dist/js/front-script.js?v=1.0.13"></script>--}}
    <script src="/assets/js/index.js"></script>
</body>
</html>