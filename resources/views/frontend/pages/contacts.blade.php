@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

@section('title', __('frontend.contacts.contacts'))
@section('og_title', __('frontend.contacts.contacts'))

@section('content')

  <!-- Start Breadcrumb Area  -->
  <div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="/">{{__('frontend.home')}}</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">{{__('frontend.contacts.contacts')}}</li>
                    </ul>
                    <h1 class="title">{{__('frontend.contacts.contacts')}}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('assets/img/contacts.png')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start Contact Area  -->
<div class="axil-contact-page-area axil-section-gap">
    <div class="container">
        <div class="axil-contact-page">
            <div class="row row--30">
                <div class="col-12">
                    @livewire('show-contacts-form')
                </div>

            </div>
        </div>
        <!-- Start Google Map Area  -->
        <div class="axil-google-map-wrap axil-section-gap pb--0">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Alba%20Birojam%20un%20Skolai+(ALBA%20-%20Birojam%20un%20skolai)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
        <!-- End Google Map Area  -->
    </div>
</div>
<!-- End Contact Area  -->


@endsection

