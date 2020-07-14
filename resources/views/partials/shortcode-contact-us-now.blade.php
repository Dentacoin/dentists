<section class="shortcode contact-us">
    <form class="padding-bottom-100 padding-top-60" name="Dentists website contact us" method="post" action="{{route('submit-hubspot-form')}}">
        <h2 class="fs-42 fs-xs-30 dark-blue text-center-xs">CONTACT US NOW</h2>
        <h3 class="fs-26 fs-xs-20 dark-blue text-center-xs lato-light padding-bottom-35">and learn how to become a partner and get:</h3>
        <div class="checks max-width-xs-400 margin-0-auto fs-0">
            <div class="single-check inline-block-top">
                <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                    <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                </figure>
                <div class="left-side inline-block">
                    <h4 class="fs-22 calibri-bold">Free access</h4>
                    <div class="fs-20">to all Dentacoin apps</div>
                </div>
            </div>
            <div class="single-check inline-block-top">
                <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                    <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                </figure>
                <div class="left-side inline-block">
                    <h4 class="fs-22 calibri-bold">Digital rewards</h4>
                    <div class="fs-20">for your patients at no cost</div>
                </div>
            </div>
            <div class="single-check inline-block-top">
                <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                    <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                </figure>
                <div class="left-side inline-block">
                    <h4 class="fs-22 calibri-bold">Innovative payment option</h4>
                    <div class="fs-20">at your practice</div>
                </div>
            </div>
        </div>
        <div class="sliding-fields-container fs-0 padding-top-35" data-current-step="one">
            <div class="steps-container">
                <div class="steps-wrapper">
                    <div class="step one">
                        <div class="padding-bottom-20 field-parent inline-block-top">
                            <div class="custom-google-label-style module" data-input-colorful-border="true">
                                <label for="email">Work Email Address:</label>
                                <input class="full-rounded form-field" name="email" maxlength="100" id="email" type="text"/>
                            </div>
                        </div>
                        <div class="padding-bottom-20 field-parent inline-block-top">
                            <div class="custom-google-label-style module" data-input-colorful-border="true">
                                <label for="firstname">Name:</label>
                                <input class="full-rounded form-field" name="firstname" maxlength="250" id="firstname" type="text"/>
                            </div>
                        </div>
                        <div class="gdpr-checkbox padding-left-10 padding-right-10">
                            <div class="custom-checkbox-style module">
                                <input type="checkbox" class="custom-checkbox-input" id="hs_legal_basis" name="hs_legal_basis" value="Freely given consent from contact"/> <label for="hs_legal_basis" class="text-deco fs-14 padding-left-5">By submitting the form, you agree to our <a href="//dentacoin.com/privacy-policy" target="_blank" class="lato-bold">Privacy Policy</a></label>.
                            </div>
                        </div>
                    </div>
                    <div class="step two">
                        <div class="padding-bottom-20 field-parent inline-block-top">
                            <div class="custom-google-label-style module" data-input-colorful-border="true">
                                <label for="jobtitle">Job position:</label>
                                <input class="full-rounded form-field" name="jobtitle" maxlength="150" id="jobtitle" type="text"/>
                            </div>
                        </div>
                        <div class="padding-bottom-10 field-parent inline-block-top">
                            <div class="custom-google-select-style module">
                                <label>Want to learn more about:</label>
                                <select class="form-field required" name="interested_in_">
                                    <option value="disabled">Please, select</option>
                                    <option>More info/ brochure</option>
                                    <option>Becoming a partner</option>
                                    <option>Having a call to discuss a partnership</option>
                                    <option>Other (please specify)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="step three">
                        <div class="padding-bottom-20 field-parent inline-block-top">
                            <div class="custom-google-label-style module" data-input-colorful-border="true">
                                <label for="website">Website/FB page:</label>
                                <input class="full-rounded form-field" name="website" maxlength="500" id="website" type="text"/>
                            </div>
                        </div>
                        <div class="padding-bottom-20 field-parent inline-block-top">
                            <div class="custom-google-label-style module" data-input-colorful-border="true">
                                <label for="phone">Phone:</label>
                                <input class="full-rounded form-field" name="phone" maxlength="20" id="phone" type="text"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="padding-top-25 text-right padding-left-10 padding-right-10 text-center-xs">
                <div class="inline-block padding-right-15 bullet-navigation display-block-xs padding-bottom-xs-30 padding-right-xs-0">
                    <ul>
                        <li class="inline-block padding-right-5 padding-right-xs-10"><a data-step-bullet="one" href="javascript:void(0);" class="active"></a></li>
                        <li class="inline-block padding-right-5 padding-right-xs-10"><a data-step-bullet="two" href="javascript:void(0);"></a></li>
                        <li class="inline-block padding-right-5 padding-right-xs-10"><a data-step-bullet="three" href="javascript:void(0);"></a></li>
                    </ul>
                </div>
                {{--<a href="javascript:void(0);" class="white-dark-blue-btn padding-left-40 padding-right-40 slide-step inline-block display-block-xs">NEXT >></a>--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="route" value="{{Route::current()->getName()}}">
                <input type="submit" value="NEXT >>" class="white-dark-blue-btn padding-left-40 padding-right-40 inline-block display-block-xs"/>
            </div>
        </div>
        <figure class="absolute-assistant max-width-450" itemscope="" itemtype="http://schema.org/ImageObject">
            <img alt="Assistant" class="width-100" itemprop="contentUrl" src="/assets/uploads/contact.png" />
        </figure>
    </form>
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4097841.js"></script>
    <!-- End of HubSpot Embed Code -->
    <div class="bottom-inner-banner padding-top-60 padding-bottom-30">
        <div class="container-fluid">
            <div class="row fs-0">
                <div class="col-xs-12 col-md-4 padding-bottom-xs-30 padding-bottom-sm-30">
                    <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                        <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                    </figure>
                    <div class="left-side inline-block">
                        <h4 class="fs-22 fs-xs-16 color-white">Free promotion among 200K+ people on Facebook, Instagram, Twitter, Telegram</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 padding-bottom-xs-30 padding-bottom-sm-30">
                    <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                        <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                    </figure>
                    <div class="left-side inline-block">
                        <h4 class="fs-22 fs-xs-16 color-white">Free Google Ad of your profile on Dentacoin Trusted Reviews</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 padding-bottom-xs-30 padding-bottom-sm-30">
                    <figure class="inline-block" itemscope="" itemtype="http://schema.org/ImageObject">
                        <img alt="Green checkmark" class="width-100 max-width-40" itemprop="contentUrl" src="/assets/uploads/green-checkmark.svg" />
                    </figure>
                    <div class="left-side inline-block">
                        <h4 class="fs-22 fs-xs-16 color-white">Onboarding bonus in Dentacoin (DCN) currency</h4>
                    </div>
                </div>
            </div>
        </div>
        <figure class="limited-offer" itemscope="" itemtype="http://schema.org/ImageObject">
            <img alt="Limited offer background" class="width-100 max-width-280" itemprop="contentUrl" src="/assets/uploads/green-box-bg.png"/>
            <figcaption class="calibri-bold fs-30 color-white">LIMITED OFFER:</figcaption>
        </figure>
    </div>
</section>