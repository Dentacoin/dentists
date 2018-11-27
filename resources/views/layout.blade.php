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
                <figure itemscope="" itemtype="http://schema.org/Organization" class="col-xs-2 inline-block">
                    <a itemprop="url" href="{{ route('home') }}" @if(!empty(Route::current())) @if(Route::current()->getName() == "home") tabindex="=-1" @endif @endif>
                        <img src="{{URL::asset('assets/images/dentists-logo.svg') }}" itemprop="logo" class="max-width-220" alt="Dentacoin logo"/>
                    </a>
                </figure>
                <nav class="col-xs-8 inline-block">
                    <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                        @foreach(\App\Http\Controllers\Controller::instance()->getMenu('header') as $menu_el)
                            <li class="inline-block"><a @if($menu_el->new_window) target="_blank" @endif itemprop="url" href="{{$menu_el->url}}" class="{{$menu_el->class_attribute}}" @if(!empty($menu_el->id_attribute)) id="{{$menu_el->id_attribute}}" @endif><span itemprop="name">{{$menu_el->name}}</span></a></li>
                        @endforeach
                    </ul>
                </nav>
                <div class="col-xs-2 inline-block">
                    <a href="javascript:void(0)" onclick="return alert('COMING SOON')" class="white-dark-blue-btn">REGISTER</a>
                </div>
            </div>
        </div>
    </header>
    <main class="main-container">@yield("content")</main>
    <footer>
        <div class="container padding-top-50">
            <div class="row">
                <h2 class="fs-50 lato-light dark_blue text-center col-xs-12 padding-bottom-50">Subscribe</h2>
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
            @php($footer_menu = \App\Http\Controllers\Controller::instance()->getMenu('footer'))
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
    <div class="hidden-external-form">
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
    <script src="/assets/js/basic.js"></script>
    <script src="/dist/js/front-libs-script.js?v=1.0.13"></script>
    @yield("script_block")
    {{--<script src="/dist/js/front-script.js?v=1.0.13"></script>--}}
    <script src="/assets/js/index.js"></script>
</body>
</html>