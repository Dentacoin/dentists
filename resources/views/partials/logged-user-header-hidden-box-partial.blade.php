<div class="hidden-box-parent">
    <span class="fs-14 padding-right-10 user-name">{{(new \App\Http\Controllers\APIRequestsController())->getUserData(session('logged_user')['id'])->name}}</span>
    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block header-avatar">
        @php($avatar_url = (new \App\Http\Controllers\APIRequestsController())->getUserData(session('logged_user')['id'])->avatar_url)
        @if(!empty($avatar_url))
            <img alt="" itemprop="contentUrl" src="{{$avatar_url}}"/>
        @else
            <img alt="" itemprop="contentUrl" src="/assets/images/avatar-icon.svg"/>
        @endif
    </figure>
    <span class="up-arrow">▲</span>
    <div class="hidden-box">
        @if(!empty(Route::current()))
            @if(Route::current()->getName() != 'home' && (new \App\Http\Controllers\UserController())->checkSession())
                <div class="hidden-box-hub container-fluid">
                    <div class="row close-btn">
                        <div class="col-xs-12"><a href="javascript:void(0)">Close <span>X</span></a></div>
                    </div>
                    <div class="row">
                        @foreach((new \App\Http\Controllers\HomeController())->getDentacoinHubApplications() as $application)
                            <a @if(!empty($application->link)) href="{{$application->link}}" target="_blank" @else href="javascript:alert('Coming soon!');" @endif class="col-md-3 col-xs-4 inline-block-top">
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
            <div class="row">
                <div class="col-xs-6 inline-block">
                    <a href="{{ route('user-logout') }}" class="logout"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
                </div>
                <div class="col-xs-6 inline-block">
                    <a href="{{ route('my-profile') }}" class="fs-16 white-dark-blue-btn">My profile</a>
                </div>
            </div>
        </div>
    </div>
</div>