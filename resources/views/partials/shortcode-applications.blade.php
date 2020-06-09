<section class="applications-section" data-scroll-here="tools"><div id="append-big-hub-dentists"></div></section>
{{--@php($applications = (new \App\Http\Controllers\HomeController())->getDentacoinHubApplications())
@if(!empty($applications))
    @php($latest_blog_articles = (new \App\Http\Controllers\HomeController())->getBlogLatestPosts())
    <section class="applications-section" data-scroll-here="tools">
        <div class="row">
            <div class="apps-list fullpage-section two col-xs-12 col-md-6">
                <div class="list">
                    <div class="row">
                        <div class="col-xs-12"><h3 class="rotated-text padding-bottom-50 text-center">DENTACOIN ECOSYSTEM</h3></div>
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                            <div class="container-fluid">
                                <div class="row fs-0">
                                    @foreach($applications as $application)
                                        @if(!empty($application->media_url))
                                            @php($type = pathinfo($application->media_url, PATHINFO_EXTENSION))
                                            @php($date = new DateTime($application->media_created_at))
                                        @endif
                                        <button class="col-xs-4 inline-block-top single-application" data-platform="{{$application->title}}">
                                            <figure class="wrapper" @if(!empty($application->media_url)) data-image="//dentacoin.com/assets/uploads/{{$application->media_url}}" data-image-alt="" data-image-type="{{$type}}" data-upload-date="{{$date->format('c')}}" @endif @if($application->popup_logo_url) data-popup-logo="//dentacoin.com/assets/uploads/{{$application->popup_logo_url}}" data-popup-logo-alt="" @endif data-title="{{$application->title}}" data-description="@if($application->dentists_text){{ json_encode($application->dentists_text) }}@endif" @if($application->slug == 'blog-intro') @if(!empty($latest_blog_articles)) data-articles="{{json_encode($latest_blog_articles)}}" @endif @endif itemscope="" data-title="{{$application->title}}" data-slug="{{$application->slug}}" itemtype="http://schema.org/ImageObject">
                                                @if($application->logo_url)
                                                    <img src="//dentacoin.com/assets/uploads/{{$application->logo_url}}" itemprop="contentUrl" alt=""/>
                                                @endif
                                                <figcaption>{{$application->title}}</figcaption>
                                            </figure>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-section col-xs-12 col-md-6">
                <a href="javascript:void(0)" class="close-application">×</a>
                <div class="html-content"></div>
            </div>
        </div>
    </section>
@endif--}}
