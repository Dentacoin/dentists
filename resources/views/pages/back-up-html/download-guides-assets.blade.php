@extends("layout")
@section("content")
    <div class="page-download-assets container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="padding-left-15 padding-right-15 lato-black fs-xs-28 fs-50 padding-top-20 padding-bottom-30 dark-blue">DENTACOIN GUIDES AND ASSETS</h1>
            </div>
        </div>
        <section class="row">
            <div class="col-xs-12 col-md-3 navigation-sidebar padding-left-0 padding-right-0">
                <div class="page-nav text-center fs-0">
                    <a href="javascript:void(0);" data-type="dentists" class="inline-block active calibri-bold fs-20">DENTISTS</a>
                    <a href="javascript:void(0);" data-type="patients"
                       class="inline-block calibri-bold fs-20">PATIENTS</a>
                </div>
                <div class="mobile-nav-opener text-center">
                    <a href="javascript:void(0);" class="fs-20 dark-blue">Choose from list ▼</a>
                </div>
                <div class="padding-top-30 padding-bottom-30 padding-left-20 padding-right-20 nav-holder">
                    <div class="nav-list padding-bottom-30">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10 active-on-desktop">BROCHURES</h2>
                        <ul>
                            <li class="active-on-desktop">
                                <button data-scroll-to="scroll-to-dentist-en-brochure" data-dentist="scroll-to-dentist-en-brochure" data-patient="scroll-to-patient-en-brochure" class="changeable-attr-on-user-type-change" data-type="en-brochure"><span class="inline-block-top">English</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-dentist-de-brochure" data-dentist="scroll-to-dentist-de-brochure" data-patient="scroll-to-patient-de-brochure" class="changeable-attr-on-user-type-change" data-type="de-brochure"><span class="inline-block-top">German</span></button>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-list padding-bottom-30">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10">GUIDES</h2>
                        <ul>
                            <li>
                                <button data-scroll-to="scroll-to-how-to-become-dentist"><span class="inline-block-top changeable-html-on-user-type-change" data-dentist="How to Become a Partner" data-patient="How to earn DCN rewards">How to Become a Partner</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-trusted-reviews"><span class="inline-block-top">Trusted Reviews</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-dentavox"><span class="inline-block-top">DentaVox</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-dentacoin-wallet"><span class="inline-block-top">Dentacoin Wallet</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-dentacare-app"><span class="inline-block-top">Dentacare App</span></button>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-list if-dentist">
                        <h2 class="fs-24 lato-bold padding-left-10 padding-left-xs-0 margin-bottom-10">FOR PARTNERS</h2>
                        <ul>
                            <li>
                                <button data-scroll-to="scroll-to-badges"><span class="inline-block-top">Partner Badge</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-banners"><span class="inline-block-top">Partner Banners</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-covers"><span class="inline-block-top">Facebook Covers</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-promo-banners"><span class="inline-block-top">Promo Banners</span></button>
                            </li>
                            <li>
                                <button data-scroll-to="scroll-to-dcn-logo"><span class="inline-block-top">Dentacoin Logo</span></button>
                            </li>
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
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="Tablet icon" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/assets-icon1.svg">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Brochures: What is Dentacoin?</h4>
                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="How is Dentacoin beneficial for your practice? What are the first steps to take? Choose your language and check out the brochures below to get an overview." data-patient="How is Dentacoin beneficial for you as a patient? How to start earning rewards? Choose your language and check out the brochures below to get an overview.">How is Dentacoin beneficial for your practice? What are the first steps to take? Choose your language and check out the brochures below to get an overview.</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row brochures-row padding-top-30 if-dentist">
                                <figure class="col-xs-12 col-sm-6 clear-hover en-brochure hover-on-desktop" id="scroll-to-dentist-en-brochure" itemscope="" itemtype="http://schema.org/ImageObject">
                                    <img alt="Brochure dentists EN" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-dentists-en.png">
                                    <a class="overlay-on-hover" href="https://dentacoin.com/assets/uploads/dentacoin-dentists-brochure.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (EN)</span></a>
                                </figure>
                                <figure class="col-xs-12 col-sm-6 clear-hover de-brochure" id="scroll-to-dentist-de-brochure" itemscope="" itemtype="http://schema.org/ImageObject">
                                    <img alt="Brochure dentists DE" itemprop="contentUrl"
                                         src="https://dentists.dentacoin.com/assets/uploads/brochure-dentists-de.png">
                                    <a class="overlay-on-hover" href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-zahnaerzte.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (DE)</span> </a>
                                </figure>
                            </div>
                            <div class="row brochures-row padding-top-20 if-patient hide">
                                <figure class="col-xs-12 col-sm-6 clear-hover en-brochure hover-on-desktop" id="scroll-to-patient-en-brochure" itemscope="" itemtype="http://schema.org/ImageObject">
                                    <img alt="Brochure patients EN" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-patients-en.png">
                                    <a class="overlay-on-hover" href="https://dentacoin.com/assets/uploads/dentacoin-patient-brochure.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (EN)</span> </a>
                                </figure>
                                <figure class="col-xs-12 col-sm-6 clear-hover de-brochure" id="scroll-to-patient-de-brochure" itemscope="" itemtype="http://schema.org/ImageObject">
                                    <img alt="Brochure patients DE" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/brochure-patients-de.png">
                                    <a class="overlay-on-hover" href="https://dentacoin.com/assets/uploads/dentacoin-broschuere-patienten.pdf" target="_blank"> <span class="lato-bold fs-16 dark-blue">Download Brochure (DE)</span> </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-to-section guides-section">
                    <div class="heading-line with-button">
                        <h3 class="fs-34 fs-xs-22 changeable-html-on-user-type-change" data-dentist="Guides for Dentists" data-patient="Guides for Patients">Guides for Dentists</h3>
                        <div class="download-all">
                            <a href="https://dentists.dentacoin.com/assets/uploads/guides-for-dentists.zip" data-dentist="https://dentists.dentacoin.com/assets/uploads/guides-for-dentists.zip" data-patient="https://dentists.dentacoin.com/assets/uploads/guides-for-patients.zip" download="" class="white-dark-blue-btn fs-16 white-border changeable-href-on-user-type-change">DOWNLOAD ALL PDF GUIDES</a>
                        </div>
                    </div>
                    <div class="section-content" id="scroll-to-how-to-become-dentist">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="Dentacoin rounded icon" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/rounded-logo.svg">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold changeable-html-on-user-type-change" data-dentist="How to Become Dentacoin Partner?" data-patient="How to earn DCN rewards">How to Become Dentacoin Partner?</h4>
                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Learn how to become a Dentacoin partner dentist. Boost patient relations and prevention via smart apps and a digital currency at no charge!" data-patient="Learn how to earn Dentacoin (DCN) rewards for taking surveys, writing reviews, using oral health apps, referrals, and more... Crypto faucet made easy!">Learn how to become a Dentacoin partner dentist. Boost patient relations and prevention via smart apps and a digital currency at no charge!</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <a href="https://dentists.dentacoin.com/assets/uploads/become-dentacoin-partner-preview.pdf" data-dentist="https://dentists.dentacoin.com/assets/uploads/become-dentacoin-partner-preview.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/earn-dentacoin-crypto-rewards-preview.pdf" target="_blank" class="changeable-href-on-user-type-change col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                        <img alt="Become partner or earn dcn" itemprop="contentUrl"
                                             src="https://dentists.dentacoin.com/assets/uploads/how-to-become-partner-dentist.png" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/how-to-become-partner-dentist.png" data-patient="https://dentists.dentacoin.com/assets/uploads/how-to-earn-dcn-thumg.png">
                                    </figure>
                                    <div class="padding-top-20 text-center btn-container">
                                        <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span>
                                    </div>
                                </a>
                                <div class="col-xs-12 col-sm-6">
                                    <iframe src="https://www.youtube.com/embed/069iE0JZNbA" class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/069iE0JZNbA" data-patient="https://www.youtube.com/embed/sblWhuc3amQ"></iframe>
                                    <div class="padding-top-20 text-center btn-container">
                                        <a href="javascript:void(0);" class="dark-blue-white-btn blue-border fs-16 share-video"><i class="fa fa-share-alt" aria-hidden="true"></i> SHARE VIDEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" id="scroll-to-trusted-reviews">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="Trusted reviews app icon" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/trusted-reviews-app-icon.png">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold" data-dentist="Dentist’s brochures" data-patient="Patient’s brochures">Dentacoin Trusted Reviews</h4>
                                <p class="fs-18 fs-xs-16 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Get valuable patient feedback and reward your patients at no cost! Dentacoin Trusted Reviews makes your practice available to 200,000 potential patients." data-patient="Make your feedback count with the one and only trusted reviews platform that rewards you for input. Help your dentist improve!">Get valuable patient feedback and reward your patients at no cost! Dentacoin Trusted Reviews makes your practice available to 200,000 potential patients.</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <a href="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-dentists-preview.pdf" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-dentists-preview.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-trusted-reviews-patients-preview.pdf" target="_blank" class="changeable-href-on-user-type-change col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                        <img alt="Trusted reviews guide" itemprop="contentUrl" class="changeable-src-on-user-type-change" src="https://dentists.dentacoin.com/assets/uploads/trusted-reviews-dentists.png" data-dentist="https://dentists.dentacoin.com/assets/uploads/trusted-reviews-dentists.png" data-patient="https://dentists.dentacoin.com/assets/uploads/trusted-reviews-patients.png">
                                    </figure>
                                    <div class="padding-top-20 text-center btn-container">
                                        <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span>
                                    </div>
                                </a>
                                <div class="col-xs-12 col-sm-6">
                                    <iframe src="https://www.youtube.com/embed/osKBgdDKO0s" class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/osKBgdDKO0s" data-patient="https://www.youtube.com/embed/00aQuj2bz3A"></iframe>
                                    <div class="padding-top-20 text-center btn-container">
                                        <a href="javascript:void(0);" class="dark-blue-white-btn blue-border fs-16 share-video"><i class="fa fa-share-alt" aria-hidden="true"></i> SHARE VIDEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" id="scroll-to-dentavox">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="DentaVox logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/pop-up-dentavox-app-icon.svg">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">DentaVox</h4>
                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Learn how to access free up-to-date dental market statistics and engage your patients with paid surveys and interesting social media content!" data-patient="Learn how to sign up on DentaVox, take hundreds of paid surveys on oral health topics, have fun with daily polls, and get rewarded in Dentacoin. ">Learn how to access free up-to-date dental market statistics and engage your patients with paid surveys and interesting social media content!</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <a href="https://dentists.dentacoin.com/assets/uploads/dentavox-free-dental-research-preview.pdf" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentavox-free-dental-research-preview.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentavox-paid-online-surveys-preview.pdf" target="_blank" class="changeable-href-on-user-type-change col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                        <img alt="DentaVox guide" itemprop="contentUrl" class="changeable-src-on-user-type-change" src="https://dentists.dentacoin.com/assets/uploads/dentavox-dentists.png" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentavox-dentists.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentavox-patients.png">
                                    </figure>
                                    <div class="padding-top-20 text-center btn-container">
                                        <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span>
                                    </div>
                                </a>
                                <div class="col-xs-12 col-sm-6">
                                    <iframe src="https://www.youtube.com/embed/gJKNNw4WxHo" class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/gJKNNw4WxHo" data-patient="https://www.youtube.com/embed/J2LyV-QtjDk"></iframe>
                                    <div class="padding-top-20 text-center btn-container">
                                        <a href="javascript:void(0);" class="dark-blue-white-btn blue-border fs-16 share-video"><i class="fa fa-share-alt" aria-hidden="true"></i> SHARE VIDEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" id="scroll-to-dentacoin-wallet">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="Dentacoin Wallet logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/wallet-background.svg">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Dentacoin Wallet</h4>
                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Dental payments simplified! See how to accept payments in the one and only digital dental coin. Stay on top of industry trends with DCN! " data-patient="Learn how to store, send, and receive Dentacoin tokens! Use your DCN wallet to receive rewards, pay for dental services, or buy Dentacoin with no fees.">Dental payments simplified! See how to accept payments in the one and only digital dental coin. Stay on top of industry trends with DCN!</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <a href="https://dentists.dentacoin.com/assets/uploads/accept-dentacoin-payments-wallet-preview.pdf" data-dentist="https://dentists.dentacoin.com/assets/uploads/accept-dentacoin-payments-wallet-preview.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacoin-wallet-instructions-preview.pdf" target="_blank" class="changeable-href-on-user-type-change col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <figure itemscope="" itemtype="http://schema.org/ImageObject">
                                        <img alt="Dentacoin Wallet guide" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/wallet-dentists.png" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/wallet-dentists.png" data-patient="https://dentists.dentacoin.com/assets/uploads/wallet-patients.png">
                                    </figure>
                                    <div class="padding-top-20 text-center btn-container">
                                        <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span>
                                    </div>
                                </a>
                                <div class="col-xs-12 col-sm-6">
                                    <iframe src="https://www.youtube.com/embed/stGTpVOaQiM" class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/stGTpVOaQiM" data-patient="https://www.youtube.com/embed/dBYm5qUIjP8"></iframe>
                                    <div class="padding-top-20 text-center btn-container">
                                        <a href="javascript:void(0);" class="dark-blue-white-btn blue-border fs-16 share-video"><i class="fa fa-share-alt" aria-hidden="true"></i> SHARE VIDEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" id="scroll-to-dentacare-app">
                        <div class="fs-0 text-center-xs padding-bottom-20">
                            <figure itemscope="" itemtype="http://schema.org/ImageObject" class="inline-block max-width-100 width-100">
                                <img alt="Dentacare logo" class="width-100" itemprop="contentUrl" src="https://dentacoin.com/assets/uploads/pop-up-dentacare-app-icon.svg">
                            </figure>
                            <div class="inline-block next-to-icon padding-left-20 padding-left-xs-0">
                                <h4 class="fs-28 fs-xs-20 padding-top-xs-15 padding-top-xs-15 lato-bold">Dentacare app</h4>
                                <p class="fs-18 fs-xs-16 changeable-html-on-user-type-change" data-dentist="Dentacare Mobile App is here to help your patients build and maintain proper oral care in a 90-day journey. Good results are rewarded with Dentacoin!" data-patient="Have fun taking care of your teeth by joining a 90-day oral health challenge! Brush, floss, and rinse twice a day to get rewarded at the end of period!">Dentacare Mobile App is here to help your patients build and maintain proper oral care in a 90-day journey. Good results are rewarded with Dentacoin!</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row videos-row padding-top-30">
                                <a href="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-dentists-preview.pdf" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-dentists-preview.pdf" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacare-oral-health-app-patients-preview.pdf" target="_blank" class="changeable-href-on-user-type-change col-xs-12 col-sm-6 padding-bottom-xs-15">
                                    <figure class="" itemscope="" itemtype="http://schema.org/ImageObject">
                                        <img alt="Dentacare guide" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentists-dentacare.png" class="changeable-src-on-user-type-change" data-dentist="https://dentists.dentacoin.com/assets/uploads/dentists-dentacare.png" data-patient="https://dentists.dentacoin.com/assets/uploads/dentacare-patients.png">
                                    </figure>
                                    <div class="padding-top-20 text-center btn-container">
                                        <span class="dark-blue-white-btn blue-border fs-16"> DOWNLOAD PDF GUIDE</span>
                                    </div>
                                </a>
                                <div class="col-xs-12 col-sm-6">
                                    <iframe src="https://www.youtube.com/embed/L0gsFuEqUzk" class="changeable-src-on-user-type-change" data-dentist="https://www.youtube.com/embed/L0gsFuEqUzk" data-patient="https://www.youtube.com/embed/G3hxcSxAi8I"></iframe>
                                    <div class="padding-top-20 text-center btn-container">
                                        <a href="javascript:void(0);" class="dark-blue-white-btn blue-border fs-16 share-video"><i class="fa fa-share-alt" aria-hidden="true"></i> SHARE VIDEO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-to-section for-partners if-dentist">
                    <div class="heading-line with-button">
                        <h3 class="fs-34 fs-xs-22">Assets for Partners</h3>
                        <div class="download-all">
                            <a href="https://dentists.dentacoin.com/assets/uploads/dentacoin-all-files.zip" download="" class="white-dark-blue-btn fs-16 white-border">DOWNLOAD ALL FILES</a>
                        </div>
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
                                        <a class="white-dark-blue-btn fs-18 max-width-260 width-100 text-center" download="" href="/assets/uploads/dentacoin-accepted-here.png">DOWNLOAD BADGE</a></div>
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

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="dark-blue-white-btn fs-18 blue-border text-center" download="" href="/assets/uploads/all-banners.zip">DOWNLOAD ALL BANNERS</a></div>
                                </div>
                                <div class="row banners-row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 padding-bottom-100">
                                        <div class="assets-slider">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner1.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-banner1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner2.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-banner2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner3.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-banner3.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner4.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-banner4.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin banner" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-banner5.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-banner5.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD BANNER</span> </a></figure>
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

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="dark-blue-white-btn fs-18 blue-border text-center" download="" href="/assets/uploads/all-covers.zip">DOWNLOAD ALL COVERS</a></div>
                                </div>
                                <div class="row covers-row">
                                    <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-0 col-md-12 padding-bottom-60">
                                        <div class="assets-slider">
                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-1.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-fb-cover-1.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-2.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-fb-cover-2.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>

                                            <figure itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Facebook cover image" class="width-100" itemprop="contentUrl" src="https://dentists.dentacoin.com/assets/uploads/dentacoin-fb-cover-3.jpg" /> <a class="overlay-on-hover" download="" href="/assets/uploads/dentacoin-fb-cover-3.jpg"> <span class="lato-bold fs-16 dark-blue">DOWNLOAD FACEBOOK COVER</span> </a></figure>
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

                                    <div class="col-xs-12 col-sm-4 col-lg-4 text-right inline-block text-center-xs padding-top-xs-25"><a class="white-dark-blue-btn fs-18 max-width-260 width-100 text-center" target="_blank" href="https://dentists.dentacoin.com/assets/uploads/dentacoin-logo.zip">DOWNLOAD LOGO</a></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection