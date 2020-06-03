@extends("layout")
@section("content")
    {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}
    {{--<section class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                <h1 class="fs-50 fs-xs-32 lato-black dark-blue text-center padding-top-50 padding-top-xs-30">Download assets</h1>
                <hr />
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row fs-0 padding-top-30 padding-bottom-30">
                <div class="col-xs-12 col-sm-8 col-lg-6 col-lg-offset-1 inline-block text-center-xs">
                    <div class="inline-block padding-bottom-xs-20">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Tablet icon" itemprop="contentUrl" src="/assets/uploads/assets-icon1.svg" class="width-100 max-width-100"/>
                        </figure>
                    </div>
                    <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                        <h2 class="fs-28 lato-bold padding-bottom-10">Brochures: What is Dentacoin?</h2>
                        <div class="lato-regular fs-18">Download brochures for both patients and dentists and feel free to print them out if needed.</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                    <a href="/assets/uploads/brochure-pdfs.rar" download="" class="dark-blue-white-btn fs-18 blue-border text-center">DOWNLOAD ALL BROCHURES</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1 padding-bottom-80">
                    <div class="row">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-3">
                            <img alt="Brochure patients EN" itemprop="contentUrl" src="/assets/uploads/brochure-patients-en.png"/>
                            <a href="https://dentacoin.com/assets/uploads/dentacoin-patient-brochure.pdf" target="_blank" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">Brochure for Patients (EN)</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-3">
                            <img alt="Brochure patients EN" itemprop="contentUrl" src="/assets/uploads/brochure-dentists-en.png"/>
                            <a href="https://dentacoin.com/assets/uploads/dentacoin-dentists-brochure.pdf" target="_blank" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">Brochure for Dentists (EN)</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-3">
                            <img alt="Brochure patients EN" itemprop="contentUrl" src="/assets/uploads/brochure-dentists-de.png"/>
                            <a href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-patienten.pdf" class="overlay-on-hover" target="_blank">
                                <span class="lato-bold fs-16 dark-blue">Brochure for Patients (DE)</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-3">
                            <img alt="Brochure patients EN" itemprop="contentUrl" src="/assets/uploads/brochure-dentists-de.png"/>
                            <a href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-zahnaerzte.pdf" target="_blank" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">Brochure for Dentists (DE)</span>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="beige-bg">
        <div class="container">
            <div class="row fs-0 padding-top-30 padding-bottom-30">
                <div class="col-xs-12 col-sm-8 col-lg-6 col-lg-offset-1 inline-block text-center-xs">
                    <div class="inline-block padding-bottom-xs-20">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Badge icon" itemprop="contentUrl" src="/assets/uploads/assets-icon2.svg" class="width-100 max-width-100"/>
                        </figure>
                    </div>
                    <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                        <h2 class="fs-28 lato-bold padding-bottom-10">Dentacoin Partner Website Badge</h2>
                        <div class="lato-regular fs-18">Please add one of the badges below to the footer or the header of your official website. You can also use the badge in other print or digital materials as well as on other pages of your website.</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject" class="padding-bottom-10">
                        <img alt="Dentacoin accepted here icon" itemprop="contentUrl" src="/assets/uploads/dentacoin-accepted-here.png" class="width-100 max-width-260"/>
                    </figure>
                    <a href="/assets/uploads/dentacoin-accepted-here.png" download="" class="white-dark-blue-btn fs-18 max-width-260 width-100 text-center">DOWNLOAD BADGE</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row fs-0 padding-top-30 padding-bottom-50">
                <div class="col-xs-12 col-sm-8 col-lg-6 col-lg-offset-1 inline-block text-center-xs">
                    <div class="inline-block padding-bottom-xs-20">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Tablet icon" itemprop="contentUrl" src="/assets/uploads/assets-icon3.svg" class="width-100 max-width-100"/>
                        </figure>
                    </div>
                    <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                        <h2 class="fs-28 lato-bold padding-bottom-10">Dentacoin Partner Banner</h2>
                        <div class="lato-regular fs-18">Please publish this banner to your social media channels and/or on a dedicated page on your website. If you need any personalization of the banners, please feel free to contact us.</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                    <a href="/assets/uploads/all-banners.rar" download="" class="dark-blue-white-btn fs-18 blue-border text-center">DOWNLOAD ALL BANNERS</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 padding-bottom-50">
                    <div class="assets-slider">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Dentacoin banner" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner1.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-banner1.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Dentacoin banner" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner2.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-banner2.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Dentacoin banner" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner3.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-banner3.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Dentacoin banner" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner4.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-banner4.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Dentacoin banner" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner5.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-banner5.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="beige-bg">
        <div class="container">
            <div class="row fs-0 padding-top-30 padding-bottom-50">
                <div class="col-xs-12 col-sm-8 col-lg-6 col-lg-offset-1 inline-block text-center-xs">
                    <div class="inline-block padding-bottom-xs-20">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Tablet icon" itemprop="contentUrl" src="/assets/uploads/assets-icon4.svg" class="width-100 max-width-100"/>
                        </figure>
                    </div>
                    <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                        <h2 class="fs-28 lato-bold padding-bottom-10">Facebook Cover Images</h2>
                        <div class="lato-regular fs-18">As a proud Dentacoin partner, you may also add some of those cover images to your Facebook Business page.</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                    <a href="/assets/uploads/all-covers.rar" download="" class="dark-blue-white-btn fs-18 blue-border text-center">DOWNLOAD ALL COVERS</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 padding-bottom-30">
                    <div class="assets-slider">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Facebook cover image" itemprop="contentUrl" src="/assets/uploads/dentacoin-fb-cover-1.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-fb-cover-1.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Facebook cover image" itemprop="contentUrl" src="/assets/uploads/dentacoin-fb-cover-2.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-fb-cover-2.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span>
                            </a>
                        </figure>
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Facebook cover image" itemprop="contentUrl" src="/assets/uploads/dentacoin-fb-cover-3.jpg" class="width-100"/>
                            <a href="/assets/uploads/dentacoin-fb-cover-3.jpg" download="" class="overlay-on-hover">
                                <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-social-promo-banners">
        <div class="container">
            <div class="row fs-0 padding-top-70 padding-bottom-50">
                <div class="col-xs-12 col-sm-8 col-lg-6 col-lg-offset-1 inline-block text-center-xs">
                    <div class="inline-block padding-bottom-xs-20">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject">
                            <img alt="Tablet icon" itemprop="contentUrl" src="/assets/uploads/assets-icon5.svg" class="width-100 max-width-100"/>
                        </figure>
                    </div>
                    <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                        <h2 class="fs-28 lato-bold padding-bottom-10">Dentacoin Tools: Promo Banners</h2>
                        <div class="lato-regular fs-18">Promoting Dentacoin tools on your social pages helps engage your patients, position yourself and your practice as forward-thinking, and improves your onlinea presence!</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                    <a href="/assets/uploads/all-promo-banners.rar" download="" class="dark-blue-white-btn fs-18 blue-border text-center">DOWNLOAD ALL PROMO BANNERS</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                <img alt="Facebook example" itemprop="contentUrl" src="/assets/uploads/facebook-post-exmpl.png" />
                            </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                <img alt="Instagram example" itemprop="contentUrl" src="/assets/uploads/instagram-post-exmpl.png" />
                            </figure>
                        </div>
                    </div>
                    <ul class="padding-top-70 padding-left-60">
                        <li class="padding-bottom-100 fs-50 fs-xs-35 lato-bold dark-blue">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="padding-bottom-20">
                                <img alt="Dentavox logo" itemprop="contentUrl" src="/assets/uploads/dv.svg" class="width-100 max-width-200"/>
                            </figure>
                            <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>
                            <div class="lato-regular main-color fs-18 padding-bottom-30">Sign up on DentaVox to take surveys on dental health topics and get rewards in Dentacoin (DCN) digital currency ! You can use your rewards to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>
                            <div class="row">
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Dentavox promo banner" itemprop="contentUrl" src="/assets/uploads/dentavox-promo-banner1.jpg" class="width-100"/>
                                    <a href="/assets/uploads/dentavox-promo-banner1.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Dentavox promo banner" itemprop="contentUrl" src="/assets/uploads/dentavox-promo-banner2.jpg" class="width-100"/>
                                    <a href="/assets/uploads/dentavox-promo-banner2.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                            </div>
                        </li>
                        <li class="padding-bottom-100 fs-50 fs-xs-35 lato-bold dark-blue">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="padding-bottom-20">
                                <img alt="Trusted reviews logo" itemprop="contentUrl" src="/assets/uploads/tr3.svg" class="width-100 max-width-200"/>
                            </figure>
                            <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>
                            <div class="lato-regular main-color fs-18 padding-bottom-30">Have you been our patient? Join Dentacoin Trusted Reviews, request a review invite from us and get rewarded for your valuable feedback! :bulb: You can use your rewards in Dentacoin (DCN) digital currency to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>
                            <div class="row">
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Trusted reviews promo banner" itemprop="contentUrl" src="/assets/uploads/trusted-reviews-promo-banner1.jpg" class="width-100"/>
                                    <a href="/assets/uploads/trusted-reviews-promo-banner1.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Trusted reviews promo banner" itemprop="contentUrl" src="/assets/uploads/trusted-reviews-promo-banner2.jpg" class="width-100"/>
                                    <a href="/assets/uploads/trusted-reviews-promo-banner2.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                            </div>
                        </li>
                        <li class="padding-bottom-100 fs-50 fs-xs-35 lato-bold dark-blue">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="padding-bottom-20">
                                <img alt="Dentacare logo" itemprop="contentUrl" src="/assets/uploads/dc.svg" class="width-100 max-width-200"/>
                            </figure>
                            <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>
                            <div class="lato-regular main-color fs-18 padding-bottom-30">Download Dentacare - the app that helps you form oral hygiene habits in a 90-day journey and rewards good results! You can use your rewards in Dentacoin (DCN) digital currency to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>
                            <div class="row">
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Dentacare promo banner" itemprop="contentUrl" src="/assets/uploads/dentacare-promo-banner1.jpg" class="width-100"/>
                                    <a href="/assets/uploads/dentacare-promo-banner1.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                                <figure itemscope="" itemtype="http://schema.org/ImageObject" class="col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <img alt="Dentacare promo banner" itemprop="contentUrl" src="/assets/uploads/dentacare-promo-banner2.jpg" class="width-100"/>
                                    <a href="/assets/uploads/dentacare-promo-banner2.jpg" download="" class="overlay-on-hover">
                                        <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span>
                                    </a>
                                </figure>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>--}}
@endsection
