@php($testimonials = (new \App\Http\Controllers\HomeController())->getAllTestimonials())
@if(!empty($testimonials))
    <section class="container padding-bottom-70 shortcode testimonials">
        <div class="row">
            <div class="col-xs-12">
                <div class="testimonials-slider-section">
                    @foreach($testimonials as $testimonial)
                        <div class="single-testimonial">
                            <div class="img-title-job fs-0">
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block-top">
                                    @if(empty($testimonial->media_name))
                                        <img data-defer-src="/assets/images/avatar-icon.svg" alt="Avatar icon" itemprop="contentUrl"/>
                                    @else
                                        <img data-defer-src="//dentacoin.com/assets/uploads/{{$testimonial->media_name}}" alt="{{$testimonial->media_alt}}" itemprop="contentUrl"/>
                                    @endif
                                </figure>
                                <div class="title-job inline-block-top">
                                    <div class="title color-black">{{explode(',', $testimonial->name_job)[0]}}</div>
                                    @if(!empty(explode(',', $testimonial->name_job)[1]))
                                        <div class="job">{{explode(',', $testimonial->name_job)[1]}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="description">{!! $testimonial->text !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif