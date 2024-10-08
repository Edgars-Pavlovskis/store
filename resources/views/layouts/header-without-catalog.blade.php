@section('header')
    <header class="header axil-header header-style-5">
        @include('layouts.header-black')
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="/" class="logo logo-dark">
                            <img src="{{ asset('assets/img/alba-red.png') }}" alt="Site Logo">
                        </a>
                        <a href="/" class="logo logo-light">
                            <img src="{{ asset('assets/img/alba-long.png') }}" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="/" class="logo">
                                    <img src="{{ asset('assets/img/alba-red.png') }}" alt="Site Logo">
                                </a>
                            </div>

                            @include('layouts.mainmenu')

                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="{{__('frontend.search-placeholder')}}" autocomplete="off">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </li>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>

                            @livewire('show-shopping-cart-trigger')

                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    @if(Auth::user())
                                        <span class="title">{{__('frontend.user.greeting')}}, <b>{{ Auth::user()->name }}</b></span>
                                        <ul>
                                            @if(Auth::user()->hasVerifiedEmail())
                                                <li>
                                                    <a href="{{route('pages-profile')}}">{{__('frontend.user.profile')}}</a>
                                                </li>
                                            @else
                                                <p><small>{{__('frontend.user.confirm-email-address')}}</small></p>
                                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                    @csrf
                                                    <button type="submit" class="btn w-100 btn-alt-primary">
                                                      <i class="fa-solid fa-share me-1 opacity-50"></i> {{__('frontend.user.resend-email-confirmation')}}
                                                    </button>
                                                </form>
                                            @endauth

                                        </ul>
                                        <div class="login-btn">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="axil-btn btn-bg-primary">{{__('frontend.user.logout')}}</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="login-btn">
                                            <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">{{__('frontend.user.login')}}</a>
                                        </div>
                                        <div class="reg-footer text-center">{{__('frontend.user.no-profile')}} <a href="{{ route('register') }}" class="btn-link">{{__('frontend.user.register')}}</a></div>
                                    @endif

                                </div>
                            </li>

                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         -->
    </header>
@endsection
