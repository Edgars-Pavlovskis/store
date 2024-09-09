@section('header')
<header class="header axil-header header-style-5">
    @include('layouts.header-black')
</header>
    <header class="header axil-header header-style-2 header-style-6">

        <!-- Start Header Top Area  -->
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-4 col-5">
                        <div class="header-brand">
                            <a href="/" class="logo logo-dark">
                                <img src="{{ asset('assets/img/alba-red.png') }}" alt="Site Logo">
                            </a>
                            <a href="/" class="logo logo-light">
                                <img src="{{ asset('assets/img/alba-long.png') }}" alt="Site Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8 col-7">
                        <div class="header-top-dropdown dropdown-box-style">
                            <div class="axil-search mx-0">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="{{__('frontend.search-placeholder')}}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area  -->

        <!-- Start Mainmenu Area  -->
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">
                        <aside class="header-department">
                            <button class="header-department-text department-title">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">{{__('frontend.product-catalog')}}</span>
                            </button>
                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>
                                <ul class="nav-menu-list">

                                    @foreach($categories as $category)
                                        <li>
                                            <a href="
                                                @mobile
                                                    @if($category->children->isNotEmpty())
                                                        #
                                                    @else
                                                        {{ route('frontend-catalog-show', ['alias'=>$category->alias]) }}
                                                    @endif
                                                @elsemobile
                                                    {{ route('frontend-catalog-show', ['alias'=>$category->alias]) }}
                                                @endmobile
                                            " class="nav-link @if($category->children->isNotEmpty()) has-megamenu @endif">
                                                <span class="menu-icon"><img src="/storage/categories/{{$category->image}}" alt="category-image"></span>
                                                <span class="menu-text">{{$category->title}}</span>
                                            </a>
                                            @if($category->children->isNotEmpty())
                                                <div class="department-megamenu">
                                                    <div class="department-megamenu-wrap">
                                                        <div class="department-submenu-wrap">
                                                            @foreach($category->children as $subCategory)
                                                                <div class="department-submenu">
                                                                    <a href="{{ route('frontend-catalog-show', ['alias'=>$subCategory->alias]) }}"> <h3 class="submenu-heading">{{$subCategory->title}}</h3></a>
                                                                    @if($subCategory->children->isNotEmpty())
                                                                        <ul>
                                                                            @foreach($subCategory->children as $subCategoryChildren)
                                                                                <li><a href="{{ route('frontend-catalog-show', ['alias'=>$subCategoryChildren->alias]) }}">{{$subCategoryChildren->title}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach

                                </ul>
                            </nav>
                        </aside>
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
                            <li class="axil-search d-sm-none d-block">
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
        <!-- End Mainmenu Area  -->
    </header>
@endsection


@section('slider')
    @livewire('show-banner',['type' => 'top-image-slider', 'limit' => 5])
@endsection
