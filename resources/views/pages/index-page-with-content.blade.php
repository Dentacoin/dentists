@extends("layout")
@section("content")
    {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}
    {{--<div class="header-banner module text-center">
        <h3 class="fs-21 color-white">Request your FREE, non-obligatory demo <a class="margin-left-20 dark-blue-light-blue-btn scroll-to-contact-us-now learn-more-how-it-works-top-banner-event-tracker" href="javascript:void(0);">LEARN MORE</a></h3>
    </div>

    <section class="section-how-it-works-above-the-fold padding-top-210 padding-bottom-270 padding-top-lg-110 padding-bottom-lg-170  padding-top-md-110 padding-bottom-md-170 padding-top-sm-110 padding-bottom-sm-170 padding-top-xs-15 padding-bottom-xs-15">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-sm-offset-7 col-md-6 col-md-offset-6 col-lg-5 color-white text-center-xs above-the-fold-content">
                    <h1 class="fs-46 fs-sm-36 fs-xs-28 lato-black">HOW IT WORKS</h1>

                    <p class="fs-36 fs-sm-26 fs-xs-20 padding-bottom-15">Learn how to take your practice to the next level with Dentacoin</p>
                    <a class="white-dark-blue-btn open-dentacoin-gateway dentist-register change-on-logged-in-to-scroll-to-contact-us padding-left-30 padding-right-30 hide-xs dentist-register-how-it-works-top-banner-event-tracker" href="javascript:void(0);">SIGN UP FREE</a></div>
            </div>
        </div>

        <figure class="mobile-dentist padding-top-25" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentist icon" class="width-100" data-defer-src="/assets/uploads/mobile-dentist-inside.png" itemprop="contentUrl" /></figure>

        <div class="mobile-sign-up text-center"><a class="margin-top-15 white-dark-blue-btn open-dentacoin-gateway dentist-register change-on-logged-in-to-scroll-to-contact-us padding-left-30 padding-right-30 " href="javascript:void(0);">SIGN UP FREE</a></div>
    </section>

    <section class="section-become-dcn-partner padding-top-30">
        <div class="container-fluid text-center padding-bottom-40">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="fs-42 fs-xs-26 dark-blue">Become Dentacoin Partner</h2>

                    <div class="fs-28 fs-xs-20 calibri-light dark-blue">Join Dentacoin partner network in 3 simple steps:</div>
                </div>
            </div>
        </div>

        <div class="container-for-line-crossing-circles">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-xs-12 col-md-4 padding-bottom-xs-35 padding-bottom-sm-40">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Create free account icon" class="max-width-150 width-100" data-defer-src="/assets/uploads/create-free-account.svg" itemprop="contentUrl" /></figure>

                        <div class="lato-black dark-blue fs-46">01</div>

                        <div class="fs-22 lato-bold dark-blue padding-bottom-5">Create FREE account</div>

                        <div class="fs-18 max-width-280 margin-0-auto">Registering is quick and easy, and gives you access to all Dentacoin tools.</div>
                    </div>

                    <div class="col-xs-12 col-md-4 padding-bottom-xs-35 padding-bottom-sm-40">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Get contacted icon" class="max-width-150 width-100" data-defer-src="/assets/uploads/get-contacted.svg" itemprop="contentUrl" /></figure>

                        <div class="lato-black dark-blue fs-46">02</div>

                        <div class="fs-22 lato-bold dark-blue padding-bottom-5">Get contacted by our team</div>

                        <div class="fs-18 max-width-280 margin-0-auto">Our Customer care specialists will provide full assistance for a quick start.</div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Accept DCN payments icon" class="max-width-150 width-100" data-defer-src="/assets/uploads/accept-dentacoin-payments.svg" itemprop="contentUrl" /></figure>

                        <div class="lato-black dark-blue fs-46">03</div>

                        <div class="fs-22 lato-bold dark-blue padding-bottom-5">Accept Dentacoin payments</div>

                        <div class="fs-18 max-width-280 margin-0-auto">Inform patients about the new payment option on your website and social pages.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-why-dcn-is-good padding-top-50">
        <div class="fs-0 single-row padding-top-30 padding-bottom-10">
            <figure class="inline-block-top" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Get FREE promotion icon" class="width-100" data-defer-src="/assets/uploads/get-free-promotion.png" itemprop="contentUrl" /></figure>

            <div class="row-content fs-18 inline-block-top padding-top-25 padding-right-65 padding-top-md-10 padding-left-md-25 padding-right-md-25 padding-left-sm-25 padding-right-sm-25 padding-top-sm-10 padding-bottom-xs-40 padding-left-xs-15 padding-right-xs-15 get-free-promotion">
                <h2 class="fs-46 fs-sm-36 fs-xs-26 dark-blue">Get FREE Promotion</h2>

                <div class="padding-top-10 padding-bottom-25 line-height-30 fs-xs-16 line-height-xs-24">Our Marketing team will launch a promotional campaign without any charges for you. We will announce you as a new Dentacoin partner in a special article and promote you to our community of 200K users, followers on social media followers (Facebook, Instagram, Twitter, LinkedIn, Telegram) and subscribers. As a special bonus for limited time, you will get free advertising campaigns on Facebook and Google Ads.</div>
                <a class="white-dark-blue-btn scroll-to-contact-us-now start-now-free-promo-how-it-works-event-tracker" href="javascript:void(0);">START NOW</a></div>
        </div>

        <div class="fs-0 display-flex single-row padding-top-10 padding-bottom-10">
            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Engage Patients icon" class="width-100" data-defer-src="/assets/uploads/engage-patients.png" itemprop="contentUrl" /></figure>

            <div class="row-content fs-18 padding-left-65 padding-right-25 padding-top-160 padding-top-lg-80 padding-left-md-25 padding-top-md-60 padding-left-sm-25 padding-top-sm-40 padding-left-xs-15 padding-right-xs-15 padding-top-xs-10 padding-bottom-xs-40 engage-patients">
                <h2 class="fs-46 fs-sm-36 fs-xs-26 dark-blue">Engage Patients &amp; Let them Earn Rewards</h2>

                <div class="padding-top-10 padding-bottom-25 line-height-30 fs-xs-16 line-height-xs-24">Ask patients to rate your practice on Dentacoin Trusted Reviews, help them improve oral hygiene habits with DentaCare mobile app, and enable them to participate in paid online surveys on various dental topics on DentaVox.<br />
                    <br />
                    Patients will get DCN tokens as a reward for their valuable actions on Dentacoin tools, which can be redeemed for payments of dental services.</div>
            </div>
        </div>

        <div class="fs-0 single-row padding-top-10 padding-bottom-10">
            <figure class="inline-block-top" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Receive Crypto Payments icon" class="width-100" data-defer-src="/assets/uploads/receive-crypto-payments.png" itemprop="contentUrl" /></figure>

            <div class="row-content fs-18 inline-block-top padding-left-50 padding-right-65 padding-top-160 padding-top-lg-100 padding-left-md-25 padding-right-md-25 padding-top-md-80 padding-left-sm-25 padding-right-sm-25 padding-top-sm-50 padding-left-xs-15 padding-right-xs-15 padding-top-xs-10 padding-bottom-xs-40 receive-crypto-payments">
                <h2 class="fs-46 fs-sm-36 fs-xs-26 dark-blue">Receive Crypto Payments</h2>

                <div class="padding-top-10 padding-bottom-25 line-height-30 fs-xs-16 line-height-xs-24">Be among the pioneers and take advantage of a future-proof payment option in Dentacoin crypto currency. Receive payments from patients directly on your virtual wallet, without intermediaries or hidden costs.</div>
                <a class="white-dark-blue-btn scroll-to-contact-us-now start-now-payments-how-it-works-event-tracker" href="javascript:void(0);">START NOW</a></div>
        </div>
    </section>
    [shortcode type=&quot;contact-us-now&quot;]

    <section class="section-above-footer-options padding-top-80 padding-bottom-120 padding-bottom-xs-0 beige-bg" data-scroll-here="contacts">
        <div class="container">
            <div class="row text-center fs-0">
                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block" download="" href="//dentacoin.com/assets/uploads/dentacoin-fact-sheet.pdf" target="_blank"><img alt="Document icon" class="max-width-60 max-width-xs-60 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets1.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block" href="/download-guides-assets">See all guides</a></figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block open-video-popup" href="javascript:void(0);"><img alt="Video icon" class="max-width-120 max-width-xs-70 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets2.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18">Watch Video</figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block scroll-to-contact-us-now" href="javascript:void(0)"><img alt="Contact us icon" class="max-width-110 max-width-xs-80 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets3.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block scroll-to-contact-us-now" href="javascript:void(0)">Contact us</a></figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block" href="/faq"><img alt="FAQ icon" class="max-width-100 max-width-xs-80 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets4.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block" href="/faq">FAQ</a></figcaption>
                        <a class="display-block" href="/faq"> </a></figure>
                </div>
            </div>
        </div>
    </section>--}}






    {{--<section class="section-homepage-above-the-fold">
        <div class="header-banner module text-center">
            <h3 class="fs-21 color-white">Request your FREE, non-obligatory demo <a class="margin-left-20 dark-blue-light-blue-btn scroll-to-contact-us-now learn-more-top-banner-event-tracker" href="javascript:void(0);">LEARN MORE</a></h3>
        </div>

        <div class="container-fluid upper-box">
            <div class="row">
                <div class="col-xs-12 col-md-5 col-lg-4 col-md-offset-6">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Text logo dark blue" class="max-width-310 max-width-xs-200" itemprop="contentUrl" src="/assets/uploads/text-logo-dark-blue.svg" /></figure>

                    <h1 class="fs-40 fs-lg-30 fs-md-30 fs-sm-30 fs-xs-28 lato-medium padding-bottom-40 padding-bottom-lg-25 padding-bottom-md-25 padding-bottom-sm-25 padding-bottom-xs-0 padding-top-15 line-height-50 line-height-lg-40 line-height-md-40 line-height-sm-40 line-height-xs-30">Boost patient loyalty and prevention with FREE apps and a digital dental currency</h1>

                    <figure class="visible-on-mobile" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentist transperant background" itemprop="contentUrl" src="/assets/uploads/dentist-mobile.png" /></figure>

                    <div class="fs-25 fs-lg-21 fs-md-21 fs-sm-21 fs-xs-16 padding-left-xs-15 padding-right-xs-15 line-height-30 line-height-xs-25 lato dark-blue padding-bottom-40 padding-bottom-xs-10 mobile-white-bg">&ldquo;I am paid for prevention and my patients get rewards for better oral health. All at no cost for me.&rdquo;</div>

                    <div class="inline-block-top mobile-white-bg display-block-xs display-block-sm"><a class="white-dark-blue-btn scroll-to-contact-us-now learn-more-homepage-above-the-fold-event-tracker" href="javascript:void(0);">LEARN MORE</a></div>
                </div>
            </div>
        </div>

        <div class="container-fluid down-box padding-bottom-sm-20 padding-bottom-xs-30" data-scroll-here="bitcoin-dentistry">
            <div class="fs-30 fs-md-22 fs-sm-22 fs-xs-22 lato-bold color-black">
                <figure class="inline-block max-width-30 margin-right-5 fs-0" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Text logo dark blue" class="width-100" itemprop="contentUrl" src="/assets/images/logo.svg" /></figure>
                <span class="inline-block">&ldquo;The Bitcoin of Dentistry&rdquo;</span></div>

            <div class="fs-20 fs-md-16 fs-sm-16 fs-xs-16 padding-bottom-20 padding-top-20 color-black text-left text-center-xs">Dentacoin is a digital dental currency used to reward your patients for taking oral health surveys, submitting reviews to you, improving their at-home hygiene. Your practice implements a digital patient loyalty program, gets additional payments, and is promoted among 200K+ patients free of charge.</div>
        </div>
        <picture> <source media="(min-width: 1400px)" srcset="/assets/uploads/dentist-large-screen-image.png" /> <img alt="Dentist" src="/assets/uploads/dentist-image.png" /> </picture></section>

    <section class="section-dentists-report text-center padding-top-40 padding-bottom-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="fs-42 fs-xs-26 dark-blue padding-bottom-xs-10">Dentacoin Dentists Report*</h2>

                    <p class="fs-16" style="color: #555555">* Research among 1800 dentists using Dentacoin tools and currency.</p>
                </div>
            </div>

            <div class="row padding-top-40">
                <div class="col-xs-12 fs-0">
                    <figure class="inline-block-top padding-left-10 padding-right-10 single-report padding-bottom-xs-35 padding-bottom-sm-35" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Happier and healthier patients" class="width-100 max-width-120" data-defer-src="/assets/uploads/report1.svg" itemprop="contentUrl" />
                        <figcaption class="fs-20 padding-top-10 max-width-280 margin-0-auto">Happier and healthier<br />
                            patients</figcaption>
                    </figure>

                    <figure class="inline-block-top padding-left-10 padding-right-10 single-report padding-bottom-xs-35 padding-bottom-sm-35" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Improved online presence and search rank" class="width-100 max-width-120" data-defer-src="/assets/uploads/report2.svg" itemprop="contentUrl" />
                        <figcaption class="fs-20 padding-top-10 max-width-280 margin-0-auto">Improved online presence<br />
                            and search rank</figcaption>
                    </figure>

                    <figure class="inline-block-top padding-left-10 padding-right-10 single-report padding-bottom-xs-35 padding-bottom-sm-35" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Additional income and innovative payments" class="width-100 max-width-120" data-defer-src="/assets/uploads/report3.svg" itemprop="contentUrl" />
                        <figcaption class="fs-20 padding-top-10 max-width-280 margin-0-auto">Additional income and<br />
                            innovative payments</figcaption>
                    </figure>

                    <figure class="inline-block-top padding-left-10 padding-right-10 single-report padding-bottom-xs-35 padding-bottom-sm-35" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Мarket overview via free DentaVox stats" class="width-100 max-width-120" data-defer-src="/assets/uploads/report4.svg" itemprop="contentUrl" />
                        <figcaption class="fs-20 padding-top-10 max-width-280 margin-0-auto">Мarket overview via<br />
                            free DentaVox stats</figcaption>
                    </figure>

                    <figure class="inline-block-top padding-left-10 padding-right-10 single-report padding-bottom-xs-35 padding-bottom-sm-35" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Valuable feedback via Trusted Reviews" class="width-100 max-width-120" data-defer-src="/assets/uploads/report5.svg" itemprop="contentUrl" />
                        <figcaption class="fs-20 padding-top-10 max-width-280 margin-0-auto">Valuable feedback via<br />
                            Trusted Reviews</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    [shortcode type="contact-us-now"]
    <section class="section-how-to-become-dcn-partner">
        <div class="container-fluid text-center padding-top-70 padding-bottom-30 dark-blue">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="fs-42 fs-xs-26">How to Become a Dentacoin Partner</h2>

                    <div class="fs-28 fs-xs-20 lato-light">Free of charge. No obligations.</div>
                </div>
            </div>
        </div>

        <div class="dentist-and-assistant-background">
            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentist and assistent" class="width-100" data-defer-src="/assets/uploads/dentist-with-assistent.png" itemprop="contentUrl" /></figure>

            <div class="left-side-content">
                <ul class="padding-bottom-15">
                    <li class="fs-18 padding-bottom-15">
                        <div class="fs-44 fs-lg-35 fs-md-35 fs-sm-35 fs-xs-35 lato-black dark-blue">01</div>
                        <b class="lato-bold">Sign up for free</b>

                        <div class="color-light-blue">(up to 2 minutes)</div>

                        <div class="padding-top-5">It&rsquo;s simple and gives you access to all apps.</div>
                    </li>
                    <li class="fs-18 padding-bottom-15">
                        <div class="fs-44 fs-lg-35 fs-md-35 fs-sm-35 fs-xs-35 lato-black dark-blue">02</div>
                        <b class="lato-bold">Wait for approval &amp; email</b>

                        <div class="color-light-blue">(up to 72 hours)</div>

                        <div class="padding-top-5">Our representatives will send you more info.</div>
                    </li>
                    <li class="fs-18">
                        <div class="fs-44 fs-lg-35 fs-md-35 fs-sm-35 fs-xs-35 lato-black dark-blue">03</div>
                        <b class="lato-bold">Accept Dentacoin payments</b>

                        <div class="color-light-blue">(up to 2 minutes)</div>

                        <div class="padding-top-5">All you need is to open a virtual wallet.</div>
                    </li>
                </ul>

                <div class="padding-top-15 sign-up-now-and-text"><a class="white-dark-blue-btn open-dentacoin-gateway dentist-register sign-up-steps-partner-event-tracker change-on-logged-in-to-scroll-to-contact-us" href="javascript:void(0);">SIGN UP NOW</a>

                    <div class="padding-top-10 fs-16 padding-bottom-10">Our onboarding team will guide you through the process and coordinate your free promotion!</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-dentacoin-stats padding-top-100 padding-bottom-70 padding-top-xs-50 padding-bottom-xs-50">
        <div class="container">
            <div class="row fs-0 text-center">
                <div class="col-xs-12">
                    <div class="single inline-block-top">
                        <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin Dentists icon" class="max-width-60 margin-bottom-5" data-defer-src="/assets/uploads/stats1.svg" itemprop="contentUrl" /></figure>

                        <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">1.9K+</div>

                        <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Dentacoin Dentists</div>
                    </div>

                    <div class="single inline-block-top">
                        <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Partner Locations icon" class="max-width-50" data-defer-src="/assets/uploads/stats2.svg" itemprop="contentUrl" /></figure>

                        <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">115+</div>

                        <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Partner Locations Accepting DCN</div>
                    </div>

                    <div class="single inline-block-top">
                        <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Active Users &amp; Subscribers icon" class="max-width-80 margin-bottom-20" data-defer-src="/assets/uploads/stats3.svg" itemprop="contentUrl" /></figure>

                        <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">200K+</div>

                        <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Active Users &amp; Subscribers</div>
                    </div>

                    <div class="single inline-block-top">
                        <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Transactions icon" class="max-width-60 margin-bottom-10" data-defer-src="/assets/uploads/stats5.svg" itemprop="contentUrl" /></figure>

                        <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">230K+</div>

                        <div class="fs-20 fs-xs-18 lato-semibold ">Transactions in DCN currency</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    [shortcode type="applications"]
    <section class="google-map-section padding-top-70 padding-top-xs-50" data-scroll-here="partners">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="fs-42 fs-xs-26 dark-blue text-center padding-bottom-50">Join The Largest Global Dental Community</h2>
                </div>
            </div>
        </div>
        [shortcode type="testimonials"]
        <div class="header-banner module text-center">
            <h3 class="fs-21 color-white">Request your FREE, non-obligatory demo <a class="margin-left-20 dark-blue-light-blue-btn scroll-to-contact-us-now learn-more-above-map-event-tracker" href="javascript:void(0);">LEARN MORE</a></h3>
        </div>
    </section>

    <section class="section-partners-google-map padding-top-40"><iframe src="https://dentacoin.com/google-map-iframe"></iframe></section>

    <section class="section-above-footer-options padding-top-80 padding-bottom-120 padding-bottom-xs-0 beige-bg" data-scroll-here="contacts">
        <div class="container">
            <div class="row text-center fs-0">
                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block" download="" href="//dentacoin.com/assets/uploads/dentacoin-fact-sheet.pdf" target="_blank"><img alt="Document icon" class="max-width-60 max-width-xs-60 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets1.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block" href="/download-guides-assets">See all guides</a></figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block open-video-popup" href="javascript:void(0);"><img alt="Video icon" class="max-width-120 max-width-xs-70 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets2.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18">Watch Video</figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block scroll-to-contact-us-now contact-us-after-video-event-tracker" href="javascript:void(0)"><img alt="Contact us icon" class="max-width-110 max-width-xs-80 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets3.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block scroll-to-contact-us-now" href="javascript:void(0)">Contact us</a></figcaption>
                    </figure>
                </div>

                <div class="col-xs-12 col-sm-3 inline-block-bottom padding-bottom-xs-50 single-option">
                    <figure itemscope="" itemtype="http://schema.org/ImageObject"><a class="display-block" href="/faq"><img alt="FAQ icon" class="max-width-100 max-width-xs-80 margin-bottom-15 margin-0-auto display-block" data-defer-src="/assets/uploads/assets4.svg" itemprop="contentUrl" /> </a>

                        <figcaption class="lato-semibold fs-18"><a class="display-block" href="/faq">FAQ</a></figcaption>
                        <a class="display-block" href="/faq"> </a></figure>
                </div>
            </div>
        </div>
    </section>--}}

@endsection
