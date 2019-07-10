@extends("layout")
@section("content")
    {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}
    {{--<div class="faq-container">
        <section class="title container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                    <h1 class="fs-50 fs-xs-32 lato-black dark-blue text-center padding-top-50 padding-top-xs-30">Download assets</h1>

                    <hr /></div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <section class="padding-top-50 padding-bottom-50 row">
                        <div class="col-xs-12 col-sm-8 col-md-6">
                            <div class="color-black fs-30 lato-bold">Brochures: What is Dentacoin?</div>

                            <div class="fs-18 color-black padding-top-20 padding-bottom-20">Download brochures for both patients and dentists and feel free to print them out if needed.</div>

                            <div><a class="white-dark-blue-btn download-fact-sheet-event-tracker" href="//dentacoin.com/assets/uploads/dentacoin-fact-sheet.pdf" target="_blank">FACT SHEET</a></div>

                            <p>&nbsp;</p>

                            <div><a class="white-dark-blue-btn download-patients-brochure-event-tracker" href="//dentists.dentacoin.com/assets/uploads/dentacoin-patient-brochure.pdf" target="_blank">BROCHURE FOR PATIENTS</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="beige-bg banners">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <section class="padding-top-50 padding-bottom-50 row">
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                <div class="color-black fs-30 lato-bold">Dentacoin Partner Website Badge</div>

                                <div class="fs-18 color-black padding-top-20 padding-bottom-20">Please add one of the badges below to the footer or the header of your official website. You can also use the badge in other print or digital materials as well as on other pages of your website.</div>

                                <figure itemscope="" itemtype="http://schema.org/ImageObject"><a download="" href="/assets/uploads/dentacoin-partner-website-badge-white.jpg"><img alt="Dentacoin partner website badge" itemprop="contentUrl" src="/assets/uploads/dentacoin-partner-website-badge.png" /> </a></figure>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <section class="padding-top-50 padding-bottom-50 row">
                        <div class="col-xs-12 col-sm-8 col-md-6">
                            <div class="color-black fs-30 lato-bold">Dentacoin Partner Banner</div>

                            <div class="fs-18 color-black padding-top-20 padding-bottom-20">Please publish this banner to your social media channels and/or on a dedicated page on your website. If you need any personalization of the banners, please feel free to contact us.</div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="banners clearfix">
            <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="col-xs-12 col-md-4 padding-bottom-20 display-block" download="" href="/assets/uploads/dentacoin-banner1.jpg"><img alt="Dentacoin partner website badge" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner1.jpg" /> </a></figure>

            <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="col-xs-12 col-md-4 padding-bottom-xs-20 display-block" download="" href="/assets/uploads/dentacoin-banner2.jpg"><img alt="Dentacoin partner website badge" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner2.jpg" /> </a></figure>

            <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="col-xs-12 col-md-4 padding-bottom-xs-20 display-block" download="" href="/assets/uploads/dentacoin-banner3.jpg"><img alt="Dentacoin partner website badge" itemprop="contentUrl" src="/assets/uploads/dentacoin-banner3.jpg" /> </a></figure>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <section class="padding-top-50 padding-bottom-50 row">
                        <div class="col-xs-12 col-sm-8 col-md-6">
                            <div class="color-black fs-30 lato-bold">Dentacoin Logo</div>

                            <div class="fs-18 color-black padding-top-20 padding-bottom-20">The logo is an integral part of our visual identity and should, therefore, be used thoughtfully and consistently. Every company or individual must follow <a href="//dentacoin.com/corporate-design/one-line-logo" style="color: #0898f4;" target="_blank">these guidelines here when using the Dentacoin logo</a>.</div>

                            <div><a class="white-dark-blue-btn download-logo-event-tracker" download="" href="//dentacoin.com/assets/uploads/dentacoin-logos-rar.zip">DOWNLOAD LOGO</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
