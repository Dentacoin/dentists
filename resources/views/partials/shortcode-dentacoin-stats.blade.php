@php($dcnStatsCombinedData = (new \App\Http\Controllers\APIRequestsController())->getMapData(array('action' => 'combined-count-data')))
@php($dcnSubscribers = (new \App\Http\Controllers\APIRequestsController())->getDCNSubscribers())
@php($dcnTransactions = (new \App\Http\Controllers\APIRequestsController())->getDCNTransactionsCount())
@php($labs = (new \App\Http\Controllers\Controller())->getDentacoinLocations(2))
@php($suppliers = (new \App\Http\Controllers\Controller())->getDentacoinLocations(3))
@php($industryPartners = (new \App\Http\Controllers\Controller())->getDentacoinLocations(4))
@if ($dcnStatsCombinedData && property_exists($dcnStatsCombinedData, 'success') && $dcnStatsCombinedData->success)
    @php($dentistsCount = $dcnStatsCombinedData->data->non_partners + $dcnStatsCombinedData->data->partners)
    @php($usersCount = substr($dcnStatsCombinedData->data->patients + $dcnSubscribers, 0, -3) . 'K+')
    @php($locations = sizeof($labs) + sizeof($suppliers) + sizeof($industryPartners) + $dcnStatsCombinedData->data->partners)
@else
    @php($dentistsCount = '1.9K+')
    @php($usersCount = '300K+')
    @php($locations = sizeof($labs) + sizeof($suppliers) + sizeof($industryPartners))
@endif
@if ($dcnTransactions && property_exists($dcnTransactions, 'success') && $dcnTransactions->success)
    @php($dcnTransactionsCount = substr($dcnTransactions->success, 0, -3) . 'K+')
@else
    @php($dcnTransactionsCount = '260K+')
@endif
<section class="section-dentacoin-stats padding-top-100 padding-bottom-70 padding-top-xs-50 padding-bottom-xs-50 hide-on-hub-open">
    <div class="container">
        <div class="row fs-0 text-center">
            <div class="col-xs-12">
                <div class="single inline-block-top">
                    <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Dentacoin Dentists icon" class="max-width-60 margin-bottom-5" itemprop="contentUrl" src="/assets/uploads/stats1.svg" /></figure>
                    <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">{{$dentistsCount}}</div>
                    <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Dentacoin Dentists</div>
                </div>
                <div class="single inline-block-top">
                    <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Partner Locations icon" class="max-width-50" itemprop="contentUrl" src="/assets/uploads/stats2.svg" /></figure>
                    <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">{{$locations}}</div>
                    <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Partner Locations Accepting DCN</div>
                </div>
                <div class="single inline-block-top">
                    <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Active Users &amp; Subscribers icon" class="max-width-80 margin-bottom-20" itemprop="contentUrl" src="/assets/uploads/stats3.svg" /></figure>
                    <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">{{$usersCount}}</div>
                    <div class="fs-20 fs-xs-18 lato-semibold padding-bottom-xs-25">Active Users &amp; Subscribers</div>
                </div>

                <div class="single inline-block-top">
                    <figure class="text-center" itemscope="" itemtype="http://schema.org/ImageObject"><img alt="Transactions icon" class="max-width-60 margin-bottom-10" itemprop="contentUrl" src="/assets/uploads/stats5.svg" /></figure>
                    <div class="fs-50 fs-lg-40 fs-md-40 fs-sm-40 fs-xs-40 lato-light padding-top-10">{{$dcnTransactionsCount}}</div>
                    <div class="fs-20 fs-xs-18 lato-semibold ">Transactions in DCN currency</div>
                </div>
            </div>
        </div>
    </div>
</section>