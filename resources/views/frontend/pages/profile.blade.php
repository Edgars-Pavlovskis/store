@extends('layouts.frontend')

@include('layouts.header-without-catalog')
@include('layouts.footer')

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
                        <li class="axil-breadcrumb-item active" aria-current="page">{{__('frontend.profile.profile')}}</li>
                    </ul>
                    <h1 class="title">{{__('frontend.profile.profile')}}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img src="{{asset('assets/img/profile.png')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->


<!-- Start My Account Area  -->
<div class="axil-dashboard-area axil-section-gap">
    <div class="container">
        <div class="axil-dashboard-warp">
            <div class="axil-dashboard-author">
                <div class="media">
                    <div class="media-body">
                        <h5 class="title mb-0">{{__('frontend.user.greeting')}}, {{ Auth::user()->name }}</h5>
                        <span class="joining-date">{{config('app.name')}}, {{__('frontend.profile.since')}} {{ Auth::user()->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <aside class="axil-dashboard-aside">
                        <nav class="axil-dashboard-nav">
                            <div class="nav nav-tabs" role="tablist">
                                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>{{__('frontend.profile.dashboard')}}</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>{{__('frontend.profile.orders.title')}}</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>{{__('frontend.profile.account')}}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link"><a class="nav-item nav-link" style="text-decoration: none !important; border-bottom:none;"><i class="fal fa-sign-out"></i>{{__('frontend.user.logout')}}</a></button>
                                </form>
                            </div>
                        </nav>
                    </aside>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                            <div class="axil-dashboard-overview">
                                <p>{{__('frontend.profile.dashboard-intro')}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                            <div class="axil-dashboard-order">
                                @livewire('show-client-orders')
                            </div>
                        </div>


                        <div class="tab-pane fade" id="nav-account" role="tabpanel">
                            <div class="col-12">
                                <div class="axil-dashboard-account">
                                    <form class="account-details-form">
                                        @livewire('show-client-password-reset-form')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Area  -->


@endsection

