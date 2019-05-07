<div class="col-xs-9 logged-user-right-nav inline-block text-right @if(Route::current()->getName() != 'home' && (new \App\Http\Controllers\UserController())->checkSession()) with-hub @endif">
    @include('partials.logged-user-header-hidden-box-partial')
    <a href="javascript:void(0)" class="hamburger inline-block"><i class="fa fa-bars" aria-hidden="true"></i></a>
</div>