<div class="col-xs-9 padding-left-xs-0 padding-right-xs-10 logged-user-right-nav inline-block text-right @if(Route::current()->getName() != 'home') with-hub @endif">
    <a href="/how-it-works" class="hide-xs fs-18 color-black calibri-bold inline-block padding-left-10 padding-right-10 @if (Route::current()->getName() == 'how-it-works') active-link @endif">How it works</a>
    <span class="hide-xs inline-block padding-left-10 padding-right-10 fs-18 color-black">|</span>
    <a @if (Route::current()->getName() != 'home' && Route::current()->getName() != 'how-it-works') href="/home#contact-us" @else href="javascript:void(0);" id="contact-us" @endif class="hide-xs fs-18 color-black calibri-bold inline-block padding-left-10 padding-right-10 @if (Route::current()->getName() == 'home' || Route::current()->getName() == 'how-it-works') scrolling-to-section @endif margin-right-20">Contact us</a>
    <div class="hidden-box-parent">
        @php($user_data = (new \App\Http\Controllers\APIRequestsController())->getUserData(session('logged_user')['id']))
        <div class="inline-block fs-14 padding-right-10 color-white-on-hub">
            <span class="user-name">{{$user_data->name}}</span>
            @php($dcn_balance = (new \App\Http\Controllers\APIRequestsController())->getDCNBalance()->data)
            @php($dentacoin_data = (new \App\Http\Controllers\APIRequestsController())->getDentacoinDataByExternalProvider())
            @if(!empty($dentacoin_data))
                @php($usd_balance = $dentacoin_data['USD'] * $dcn_balance)
                <div>{{$dcn_balance}} DCN | ${{number_format((float)$usd_balance, 2, '.', '')}}</div>
            @else
                <div>{{$dcn_balance}} DCN</div>
            @endif
        </div>
        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block header-avatar" id="header-avatar">
            @if(!empty($user_data->thumbnail_url))
                <img alt="" itemprop="contentUrl" src="{{$user_data->thumbnail_url}}"/>
            @else
                <img alt="" itemprop="contentUrl" src="/assets/images/avatar-icon.svg"/>
            @endif
        </figure>
    </div>
    <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <figure itemscope="" itemtype="http://schema.org/Organization" class="inline-block margin-left-15 hamburger-icon">
        <a href="javascript:void(0)" class="hamburger display-block">
            <img src="{{URL::asset('assets/images/burger-menu.png') }}" itemprop="logo" class="width-100" alt="Hamburger icon"/>
        </a>
    </figure>
</div>