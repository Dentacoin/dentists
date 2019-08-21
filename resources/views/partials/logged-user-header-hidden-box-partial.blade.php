<div class="hidden-box-parent">
    @php($user_data = (new \App\Http\Controllers\APIRequestsController())->getUserData(session('logged_user')['id']))
    <div class="inline-block fs-14 padding-right-10 color-white-on-hub">
        <span class="user-name">{{$user_data->name}}</span>
        @php($dcn_balance = (new \App\Http\Controllers\APIRequestsController())->getDCNBalance()->data)
        @php($dentacoin_data = (new \App\Http\Controllers\APIRequestsController())->getCurrentDcnRateByCoingecko())
        @php($usd_balance = $dentacoin_data['USD'] * $dcn_balance)
        <div>{{$dcn_balance}} DCN | ${{number_format((float)$usd_balance, 2, '.', '')}}</div>
    </div>
    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block header-avatar">
        @if(!empty($user_data->thumbnail_url))
            <img alt="" itemprop="contentUrl" src="{{$user_data->thumbnail_url}}"/>
        @else
            <img alt="" itemprop="contentUrl" src="/assets/images/avatar-icon.svg"/>
        @endif
    </figure>
    <span class="up-arrow">▲</span>
    <div class="hidden-box">
        @if(!empty(Route::current()))
            @if(Route::current()->getName() != 'home')
                <div class="hidden-box-hub container-fluid">
                    <div class="row close-btn">
                        <div class="col-xs-12"><a href="javascript:void(0)">Close <span>X</span></a></div>
                    </div>
                    <div class="row">
                        @foreach((new \App\Http\Controllers\HomeController())->getDentacoinHubApplications() as $application)
                            <a @if(!empty($application->link)) href="{{$application->link}}" target="_blank" @else href="javascript:alert('Coming soon!');" @endif class="col-md-3 col-xs-4 inline-block-top application" data-platform="{{$application->title}}">
                                <figure class="text-center" itemtype="http://schema.org/ImageObject">
                                    @if($application->logo_url)
                                        <img src="//dentacoin.com/assets/uploads/{{$application->logo_url}}" itemprop="contentUrl" alt=""/>
                                    @endif
                                    <figcaption class="color-white fs-14 fs-xs-20 padding-bottom-15">{{$application->title}}</figcaption>
                                </figure>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        <div class="container-fluid text-center hidden-box-footer">
            @if(!empty(Route::current()) && Route::current()->getName() == 'home')
                <div class="row hub-page-menu">
                    <ul itemscope="" itemtype="http://schema.org/SiteNavigationElement" class="col-xs-12">
                        @foreach($header_menu as $menu_el)
                            <li><a itemprop="url" class="{{$menu_el->class_attribute}}" @if(!empty($menu_el->id_attribute)) id="{{$menu_el->id_attribute}}" @endif @if(!empty(Route::current()) && Route::current()->getName() != 'home' && strpos($menu_el->class_attribute, 'scrolling-to-section') !== false) href="{{route($route)}}#{{$menu_el->id_attribute}}" @else @if($menu_el->new_window) target="_blank" @endif href="{{$menu_el->url}}" @endif><span itemprop="name">{{$menu_el->name}}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-6 inline-block">
                    <a href="{{ route('user-logout') }}" class="logout"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
                </div>
                <div class="col-xs-6 inline-block">
                    {{--<a href="{{ route('my-profile') }}" class="fs-16 white-dark-blue-btn">My account</a>--}}
                    <a href="//account.dentacoin.com?platform=dentists" class="fs-16 white-dark-blue-btn">My Account</a>
                </div>
            </div>
        </div>
    </div>
</div>