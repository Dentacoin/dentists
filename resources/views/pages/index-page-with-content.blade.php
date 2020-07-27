@extends("layout")
@section("content")
    {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}

    {{--<div class="page-download-assets container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="padding-left-15 padding-right-15 lato-black fs-xs-28 fs-50 padding-top-20 padding-bottom-30 dark-blue">DENTACOIN GUIDES AND ASSETS</h1>
            </div>
        </div>

        <section class="row add-display-flex-and-position-relative">
            <div class="col-xs-12 col-md-3 navigation-sidebar padding-left-0 padding-right-0">
                <div class="page-nav text-center fs-0"><a class="inline-block active calibri-bold fs-20" data-type="dentists" href="javascript:void(0);">DENTISTS</a> <a class="inline-block calibri-bold fs-20" data-type="patients" href="javascript:void(0);">PATIENTS</a></div>

                <div class="mobile-nav-opener text-center"><a class="fs-20 dark-blue" href="javascript:void(0);">Choose from list ▼</a></div>

                <div class="padding-top-30 padding-bottom-30 padding-left-20 padding-right-20 nav-holder">
                    <div class="nav-list padding-bottom-30">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10 active-on-desktop">BROCHURES</h2>

                        <ul>
                            <li class="active-on-desktop"><button class="changeable-attr-on-user-type-change" data-dentist="scroll-to-dentist-en-brochure" data-patient="scroll-to-patient-en-brochure" data-scroll-to="scroll-to-dentist-en-brochure" data-type="en-brochure"><span class="inline-block-top">English</span></button></li>
                            <li><button class="changeable-attr-on-user-type-change" data-dentist="scroll-to-dentist-de-brochure" data-patient="scroll-to-patient-de-brochure" data-scroll-to="scroll-to-dentist-de-brochure" data-type="de-brochure"><span class="inline-block-top">German</span></button></li>
                        </ul>
                    </div>

                    <div class="nav-list padding-bottom-30">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10">GUIDES</h2>

                        <ul>
                            <li><button data-scroll-to="scroll-to-how-to-become-dentist"><span class="inline-block-top changeable-html-on-user-type-change" data-dentist="How to Become a Partner" data-patient="How to earn DCN rewards">How to Become a Partner</span></button></li>
                            <li><button data-scroll-to="scroll-to-trusted-reviews"><span class="inline-block-top">Trusted Reviews</span></button></li>
                            <li><button data-scroll-to="scroll-to-dentavox"><span class="inline-block-top">DentaVox</span></button></li>
                            <li><button data-scroll-to="scroll-to-assurance"><span class="inline-block-top">Dentacoin Assurance</span></button></li>
                            <li><button data-scroll-to="scroll-to-dentacoin-wallet"><span class="inline-block-top">Dentacoin Wallet</span></button></li>
                            <li><button data-scroll-to="scroll-to-dentacare-app"><span class="inline-block-top">Dentacare App</span></button></li>
                            <li><button data-scroll-to="scroll-to-jawsofbattle-app">Jaws of Battle</button></li>
                        </ul>
                    </div>

                    <div class="nav-list if-dentist">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10">FOR PARTNERS</h2>

                        <ul>
                            <li><button data-scroll-to="scroll-to-badges"><span class="inline-block-top">Partner Badge</span></button></li>
                            <li><button data-scroll-to="scroll-to-banners"><span class="inline-block-top">Partner Banners</span></button></li>
                            <li><button data-scroll-to="scroll-to-covers"><span class="inline-block-top">Facebook Covers</span></button></li>
                            <li><button data-scroll-to="scroll-to-promo-banners"><span class="inline-block-top">Promo Banners</span></button></li>
                            <li><button data-scroll-to="scroll-to-dcn-logo"><span class="inline-block-top">Dentacoin Logo</span></button></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-9 page-content padding-left-0 padding-right-0">
                <div class="scroll-to-section" id="scroll-to-brochures">
                    <div class="heading-line">
                        <h3 class="fs-34 fs-xs-22 changeable-html-on-user-type-change" data-dentist="Brochures for Dentists" data-patient="Brochures for Patients">Brochures for Dentists</h3>
                    </div>

                    <div class="section-content">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Tablet icon" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon1.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Brochures: What is Dentacoin?</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="How is Dentacoin beneficial for your practice? What are the first steps to take? Choose your language and check out the brochures below to get an overview." data-patient="How is Dentacoin beneficial for you as a patient? How to start earning rewards? Choose your language and check out the brochures below to get an overview.">How is Dentacoin beneficial for your practice? What are the first steps to take? Choose your language and check out the brochures below to get an overview.</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row brochures-row padding-top-30 if-dentist">
                                <figure class="col-xs-12 col-sm-6 clear-hover en-brochure hover-on-desktop" id="scroll-to-dentist-en-brochure" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Brochure dentists EN" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-dentists-en.png" /> <a class="overlay-on-hover dentist-download-en-brochure-event-tracker" href="https://dentacoin.com/assets/uploads/dentacoin-dentists-brochure.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (EN)</span></a></figure>

                                <figure class="col-xs-12 col-sm-6 clear-hover de-brochure" id="scroll-to-dentist-de-brochure" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Brochure dentists DE" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-dentists-de.png" /> <a class="overlay-on-hover dentist-download-de-brochure-event-tracker" href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-zahnaerzte.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (DE)</span> </a></figure>
                            </div>

                            <div class="row brochures-row padding-top-20 if-patient hide">
                                <figure class="col-xs-12 col-sm-6 clear-hover en-brochure hover-on-desktop" id="scroll-to-patient-en-brochure" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Brochure patients EN" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-patients-en.png" /> <a class="overlay-on-hover patient-download-en-brochure-event-tracker" href="https://dentacoin.com/assets/uploads/dentacoin-patient-brochure.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (EN)</span> </a></figure>

                                <figure class="col-xs-12 col-sm-6 clear-hover de-brochure" id="scroll-to-patient-de-brochure" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Brochure patients DE" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-patients-de.png" /> <a class="overlay-on-hover patient-download-de-brochure-event-tracker" href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-patienten.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (DE)</span> </a></figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scroll-to-section guides-section">
                    <div class="heading-line with-button">
                        <h3 class="fs-34 fs-xs-22 changeable-html-on-user-type-change" data-dentist="Guides for Dentists" data-patient="Guides for Patients">Guides for Dentists</h3>

                        <div class="download-all"><a class="white-dark-blue-btn fs-16 white-border changeable-href-on-user-type-change download-all-pdf-guides-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentists-tools-guide-kit.zip" data-patient="https://dentists.dentacoin.com/assets/uploads/patients-tools-guide-kit.zip" download="" href="https://dentists.dentacoin.com/assets/uploads/dentists-tools-guide-kit.zip">DOWNLOAD ALL PDF GUIDES</a></div>
                    </div>

                    <div class="section-content" id="scroll-to-how-to-become-dentist">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin rounded icon" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/rounded-logo.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold changeable-html-on-user-type-change" data-dentist="How to Become Dentacoin Partner?" data-patient="How to earn DCN rewards">How to Become Dentacoin Partner?</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Learn how to become a Dentacoin partner dentist. Boost patient relations and prevention via smart apps and a digital currency at no charge!" data-patient="Learn how to earn Dentacoin (DCN) rewards for taking surveys, writing reviews, using oral health apps, referrals, and more... Crypto faucet made easy!">Learn how to become a Dentacoin partner dentist. Boost patient relations and prevention via smart apps and a digital currency at no charge!</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-partner-dentist-guide.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/earn-dentacoin-rewards-patient-guide.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-partner-dentist-guide.pdf" target="_blank"><img alt="Become dcn partner or earn dcn" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/become-dentacoin-partner-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/earn-dentacoin-crypto-rewards-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/become-dentacoin-partner-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/069iE0JZNbA" data-patient="https://www.youtube.com/embed/sblWhuc3amQ" src="https://www.youtube.com/embed/069iE0JZNbA"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-trusted-reviews">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin Trusted Reviews logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/trusted-reviews-app-icon.png" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold" data-dentist="Dentist’s brochures" data-patient="Patient’s brochures">Dentacoin Trusted Reviews</h4>

                                <p class="fs-18 fs-xs-16 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Get valuable patient feedback and reward your patients at no cost! Dentacoin Trusted Reviews makes your practice available to 200,000 potential patients." data-patient="Make your feedback count with the one and only trusted reviews platform that rewards you for input. Help your dentist improve!">Get valuable patient feedback and reward your patients at no cost! Dentacoin Trusted Reviews makes your practice available to 200,000 potential patients.</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-tutorial-dentists.pdf" target="_blank"><img alt="Dentacoin Trusted Reviews guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-dentists-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-patients-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-dentists-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/osKBgdDKO0s" data-patient="https://www.youtube.com/embed/00aQuj2bz3A" src="https://www.youtube.com/embed/osKBgdDKO0s"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-dentavox">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="DentaVox logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/pop-up-dentavox-app-icon.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">DentaVox</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Learn how to access free up-to-date dental market statistics and engage your patients with paid surveys and interesting social media content!" data-patient="Learn how to sign up on DentaVox, take hundreds of paid surveys on oral health topics, have fun with daily polls, and get rewarded in Dentacoin. ">Learn how to access free up-to-date dental market statistics and engage your patients with paid surveys and interesting social media content!</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentavox-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentavox-paid-surveys-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentavox-tutorial-dentists.pdf" target="_blank"><img alt="DentaVox guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentavox-free-dental-research-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentavox-paid-online-surveys-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentavox-free-dental-research-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/gJKNNw4WxHo" data-patient="https://www.youtube.com/embed/J2LyV-QtjDk" src="https://www.youtube.com/embed/gJKNNw4WxHo"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-assurance">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="DentaVox logo" class="width-100" itemprop="contentUrl" src="https://assurance.dentacoin.com/assets/uploads/assurance-logo.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Dentacoin Assurance</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Set up your own membership plan with no intermediates! Get paid for prevention and build solid patients relations. See how it works here." data-patient="Get preventive services and basic dental care covered by paying an affordable monthly fee to your dentist directly. See how it works here.">Set up your own membership plan with no intermediates! Get paid for prevention and build solid patients relations. See how it works here.</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-tutorial-dentists.pdf" target="_blank"><img alt="DentaVox guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-dentists-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-patients-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-assurance-dentists-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/u5k3PPXGmOY" data-patient="https://www.youtube.com/embed/5IhNTiFchRs" src="https://www.youtube.com/embed/u5k3PPXGmOY"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-dentacoin-wallet">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin Wallet logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/wallet-background.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Dentacoin Wallet</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Dental payments simplified! See how to accept payments in the one and only digital dental coin. Stay on top of industry trends with DCN! " data-patient="Learn how to store, send, and receive Dentacoin tokens! Use your DCN wallet to receive rewards, pay for dental services, or buy Dentacoin with no fees.">Dental payments simplified! See how to accept payments in the one and only digital dental coin. Stay on top of industry trends with DCN!</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-wallet-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-wallet-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-wallet-tutorial-dentists.pdf" target="_blank"><img alt="Dentacoin Wallet guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/accept-dentacoin-payments-wallet-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-wallet-instructions-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/accept-dentacoin-payments-wallet-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/stGTpVOaQiM" data-patient="https://www.youtube.com/embed/dBYm5qUIjP8" src="https://www.youtube.com/embed/stGTpVOaQiM"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-dentacare-app">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacare app logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/pop-up-dentacare-app-icon.svg" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Dentacare app</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Dentacare Mobile App is here to help your patients build and maintain proper oral care in a 90-day journey. Good results are rewarded with Dentacoin!" data-patient="Have fun taking care of your teeth by joining a 90-day oral health challenge! Brush, floss, and rinse twice a day to get rewarded at the end of period!">Dentacare Mobile App is here to help your patients build and maintain proper oral care in a 90-day journey. Good results are rewarded with Dentacoin!</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-tutorial-dentists.pdf" target="_blank"><img alt="Dentacare app guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-dentists-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-patients-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-dentists-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/L0gsFuEqUzk" data-patient="https://www.youtube.com/embed/G3hxcSxAi8I" src="https://www.youtube.com/embed/L0gsFuEqUzk"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-content" id="scroll-to-jawsofbattle-app">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure class="inline-block max-width-100 width-100" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacare app logo" class="width-100" itemprop="contentUrl" src="https://jawsofbattle.dentacoin.com/assets/uploads/dentacare-jaws-of-battle-logo.png" /></figure>

                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Jaws of Battle app</h4>

                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Promote oral health learning in children and young adults through Jaws of Battle interactive game! See how to make oral hygiene fun." data-patient="Have fun while building healthy oral hygiene habits with Jaws of Battle trading card game! See how it works and start fighting for your teeth.">Promote oral health learning in children and young adults through Jaws of Battle interactive game! See how to make oral hygiene fun.</p>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><a class="changeable-href-on-user-type-change download-partner-brochure-event-tracker" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-jaws-of-battle-tutorial-dentists.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-jaws-of-battle-tutorial-patients.pdf" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-dentacare-jaws-of-battle-tutorial-dentists.pdf" target="_blank"><img alt="Dentacare app guide" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacare-jaws-of-battle-dentists-preview.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacare-jaws-of-battle-patients-preview.png" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacare-jaws-of-battle-dentists-preview.png" /> <span class="padding-top-20 text-center btn-container display-block"> <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span> </span> </a></figure>

                                <div class="col-xs-12 col-sm-6"><iframe class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/vbXdXhI1PZU" data-patient="https://www.youtube.com/embed/Nqz6dkts0XU" src="https://www.youtube.com/embed/vbXdXhI1PZU"></iframe>

                                    <div class="padding-top-20 text-center btn-container"><a class="dark-blue-white-btn blue-border fs-16 share-video" href="javascript:void(0);"><i aria-hidden="true" class="fa fa-share-alt"></i> SHARE VIDEO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scroll-to-section for-partners if-dentist">
                    <div class="heading-line with-button">
                        <h3 class="fs-34 fs-xs-22">Assets for Partners</h3>

                        <div class="download-all"><a class="white-dark-blue-btn fs-16 white-border" download="" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-all-files.zip">DOWNLOAD ALL FILES</a></div>
                    </div>

                    <div class="section-content">
                        <section class="beige-bg" id="scroll-to-badges">
                            <div class="container-fluid">
                                <div class="row fs-0 padding-top-50 padding-bottom-50">
                                    <div class="col-xs-12 col-sm-8 col-lg-7 padding-left-30 padding-left-xs-15 inline-block text-center-xs">
                                        <div class="inline-block padding-bottom-xs-20">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Badge icon" class="width-100 max-width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon2.svg" /></figure>
                                        </div>

                                        <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                                            <h2 class="fs-28 fs-xs-20 lato-bold padding-bottom-10">Dentacoin Partner Website Badge</h2>

                                            <div class="lato-regular fs-18 fs-xs-16">Please add one of the badges below to the footer or the header of your official website. You can also use the badge in other print or digital materials as well as on other pages of your website.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25">
                                        <figure class="padding-bottom-10" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin accepted here icon" class="width-100 max-width-260" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-accepted-here.png" /></figure>
                                        <a class="white-dark-blue-btn fs-18 max-width-260 width-100 text-center download-badge-event-tracker" download="" href="/assets/uploads/dentacoin-accepted-here.png">DOWNLOAD BADGE</a></div>
                                </div>
                            </div>
                        </section>

                        <section id="scroll-to-banners">
                            <div class="container-fluid">
                                <div class="row fs-0 padding-top-50 padding-bottom-50">
                                    <div class="col-xs-12 col-sm-8 col-lg-7 padding-left-30 padding-left-xs-15 inline-block text-center-xs">
                                        <div class="inline-block padding-bottom-xs-20">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Tablet icon" class="width-100 max-width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon3.svg" /></figure>
                                        </div>

                                        <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                                            <h2 class="fs-28 fs-xs-20 lato-bold padding-bottom-10">Dentacoin Partner Banner</h2>

                                            <div class="lato-regular fs-18 fs-xs-16">Please publish this banner to your social media channels and/or on a dedicated page on your website. If you need any personalization of the banners, please feel free to contact us.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="dark-blue-white-btn fs-18 blue-border text-center download-all-banners-event-tracker" download="" href="/assets/uploads/all-banners.zip">DOWNLOAD ALL BANNERS</a></div>
                                </div>

                                <div class="row banners-row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 padding-bottom-100">
                                        <div class="assets-slider">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner1.jpg" /> <a class="overlay-on-hover download-banner-event-tracker" download="" href="/assets/uploads/dentacoin-banner1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner2.jpg" /> <a class="overlay-on-hover download-banner-event-tracker" download="" href="/assets/uploads/dentacoin-banner2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner3.jpg" /> <a class="overlay-on-hover download-banner-event-tracker" download="" href="/assets/uploads/dentacoin-banner3.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner4.jpg" /> <a class="overlay-on-hover download-banner-event-tracker" download="" href="/assets/uploads/dentacoin-banner4.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner5.jpg" /> <a class="overlay-on-hover download-banner-event-tracker" download="" href="/assets/uploads/dentacoin-banner5.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="beige-bg" id="scroll-to-covers">
                            <div class="container-fluid">
                                <div class="row fs-0 padding-top-50 padding-bottom-100">
                                    <div class="col-xs-12 col-sm-8 col-lg-7 padding-left-30 padding-left-xs-15 inline-block text-center-xs">
                                        <div class="inline-block padding-bottom-xs-20">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Tablet icon" class="width-100 max-width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon4.svg" /></figure>
                                        </div>

                                        <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                                            <h2 class="fs-28 fs-xs-20 lato-bold padding-bottom-10">Facebook Cover Images</h2>

                                            <div class="lato-regular fs-18 fs-xs-16">As a proud Dentacoin partner, you may also add some of those cover images to your Facebook Business page.</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="dark-blue-white-btn fs-18 blue-border text-center download-all-facebook-covers-event-tracker" download="" href="/assets/uploads/all-covers.zip">DOWNLOAD ALL COVERS</a></div>
                                </div>

                                <div class="row covers-row">
                                    <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-0 col-md-12 padding-bottom-60">
                                        <div class="assets-slider">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-1.jpg" /> <a class="overlay-on-hover download-facebook-cover-event-tracker" download="" href="/assets/uploads/dentacoin-fb-cover-1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-2.jpg" /> <a class="overlay-on-hover download-facebook-cover-event-tracker" download="" href="/assets/uploads/dentacoin-fb-cover-2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-3.jpg" /> <a class="overlay-on-hover download-facebook-cover-event-tracker" download="" href="/assets/uploads/dentacoin-fb-cover-3.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="section-social-promo-banners" id="scroll-to-promo-banners">
                            <div class="container-fluid">
                                <div class="row fs-0 padding-top-100 padding-bottom-50">
                                    <div class="col-xs-12 col-sm-8 col-lg-7 padding-left-30 padding-left-xs-15 inline-block text-center-xs">
                                        <div class="inline-block padding-bottom-xs-20">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Tablet icon" class="width-100 max-width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon5.svg" /></figure>
                                        </div>

                                        <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                                            <h2 class="fs-28 fs-xs-20 lato-bold padding-bottom-10">Dentacoin Tools: Promo Banners</h2>

                                            <div class="lato-regular fs-18 fs-xs-16">Promoting Dentacoin tools on your social pages helps engage your patients, position yourself and your practice as forward-thinking, and improves your onlinea presence!</div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="dark-blue-white-btn fs-18 blue-border text-center" download="" href="/assets/uploads/all-promo-banners.zip">DOWNLOAD ALL PROMO BANNERS</a></div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook example" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/facebook-post-exmpl.png" /></figure>
                                            </div>

                                            <div class="col-xs-12 col-sm-8">
                                                <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Instagram example" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/instagram-post-exmpl.png" /></figure>
                                            </div>
                                        </div>

                                        <ul class="padding-top-100 padding-left-60">
                                            <li class="padding-bottom-100 padding-bottom-xs-50 fs-50 fs-xs-35 lato-bold dark-blue">
                                                <figure class="padding-bottom-20" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentavox logo" class="width-100 max-width-200" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dv.svg" /></figure>

                                                <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>

                                                <div class="lato-regular main-color fs-18 padding-bottom-30">Sign up on DentaVox to take surveys on dental health topics and get rewards in Dentacoin (DCN) digital currency ! You can use your rewards to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>

                                                <div class="row banners-row">
                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentavox promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentavox-promo-banner1.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentavox-promo-banner1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>

                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentavox promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentavox-promo-banner2.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentavox-promo-banner2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>
                                                </div>
                                            </li>
                                            <li class="padding-bottom-100 padding-bottom-xs-50 fs-50 fs-xs-35 lato-bold dark-blue">
                                                <figure class="padding-bottom-20" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Trusted reviews logo" class="width-100 max-width-200" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/tr3.svg" /></figure>

                                                <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>

                                                <div class="lato-regular main-color fs-18 padding-bottom-30">Have you been our patient? Join Dentacoin Trusted Reviews, request a review invite from us and get rewarded for your valuable feedback! :bulb: You can use your rewards in Dentacoin (DCN) digital currency to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>

                                                <div class="row banners-row">
                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Trusted reviews promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/trusted-reviews-promo-banner-4.png" /> <a class="overlay-on-hover" download="" href="/assets/uploads/trusted-reviews-promo-banner-4.png"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>

                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Trusted reviews promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/trusted-reviews-promo-banner-3.png" /> <a class="overlay-on-hover" download="" href="/assets/uploads/trusted-reviews-promo-banner-3.png"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>
                                                </div>
                                            </li>
                                            <li class="padding-bottom-150 padding-bottom-xs-50 fs-50 fs-xs-35 lato-bold dark-blue">
                                                <figure class="padding-bottom-20" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacare logo" class="width-100 max-width-200" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dc.svg" /></figure>

                                                <h3 class="lato-bold main-color padding-bottom-5 fs-18">Sample text description:</h3>

                                                <div class="lato-regular main-color fs-18 padding-bottom-30">Download Dentacare - the app that helps you form oral hygiene habits in a 90-day journey and rewards good results! You can use your rewards in Dentacoin (DCN) digital currency to: cover your dental expenses in our clinic, buy various gift cards, or exchange it to any crypto or national currency.</div>

                                                <div class="row banners-row">
                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacare promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacare-promo-banner1.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacare-promo-banner1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>

                                                    <figure class="col-xs-12 col-sm-6 padding-bottom-xs-15" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacare promo banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacare-promo-banner2.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacare-promo-banner2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD PROMO BANNER</span> </a></figure>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="beige-bg" id="scroll-to-dcn-logo">
                            <div class="container-fluid">
                                <div class="row fs-0 padding-top-50 padding-bottom-50">
                                    <div class="col-xs-12 col-sm-8 col-lg-7 padding-left-30 padding-left-xs-15 inline-block text-center-xs">
                                        <div class="inline-block padding-bottom-xs-20">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin logo icon" class="width-100 max-width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon6.svg" /></figure>
                                        </div>

                                        <div class="inline-block title-and-description padding-left-30 padding-left-xs-0">
                                            <h2 class="fs-28 fs-xs-20 lato-bold padding-bottom-10">Dentacoin Logo</h2>

                                            <div class="lato-regular fs-18 fs-xs-16">The logo is an integral part of our visual identity and should, therefore, be used thoughtfully and consistently. Every company or individual must follow <a href="https://dentacoin.com/corporate-design/" style="color: #0898f4" target="_blank">these guidelines here when using the Dentacoin logo</a></div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="white-dark-blue-btn fs-18 max-width-260 width-100 text-center download-logo-event-tracker" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-logo.zip" target="_blank">DOWNLOAD LOGO</a></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>--}}







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
