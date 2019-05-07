@extends("layout")
@section("content")
    <section class="dentacoin-ecosystem-section">
        <div class="container list">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="container-fluid">
                        <div class="row fs-0">
                            @foreach($applications as $application)
                                <a @if(!empty($application->link)) href="{{$application->link}}" target="_blank" @else href="javascript:alert('Coming soon!');" @endif class="col-md-3 col-xs-4 inline-block-top single-application">
                                    <figure class="wrapper" itemtype="http://schema.org/ImageObject">
                                        @if($application->logo_url)
                                            <img src="//dentacoin.com/assets/uploads/{{$application->logo_url}}" itemprop="contentUrl" alt=""/>
                                        @endif
                                        <figcaption>{{$application->title}}</figcaption>
                                    </figure>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection