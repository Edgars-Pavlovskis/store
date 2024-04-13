@section('header')
<header class="header axil-header header-style-5">
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-dropdown">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Latviešu
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="#">Help</a></li>
                            <li><a href="sign-up.html">Join Us</a></li>
                            <li><a href="sign-in.html">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for...." autocomplete="off">
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
                                            <a href="{{ route('frontend-catalog-show', ['alias'=>$category->alias]) }}" class="nav-link has-megamenu">
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
                            <ul class="mainmenu">
                                <li class="menu-item-has-children">
                                    <a href="#">Home</a>
                                    <ul class="axil-submenu">
                                        <li><a href="index-1.html">Home - Electronics</a></li>
                                        <li><a href="index-2.html">Home - NFT</a></li>
                                        <li><a href="index-3.html">Home - Fashion</a></li>
                                        <li><a href="index-4.html">Home - Jewellery</a></li>
                                        <li><a href="index-5.html">Home - Furniture</a></li>
                                        <li><a href="index-7.html">Home - Multipurpose</a></li>
                                        <li><a href="https://new.axilthemes.com/demo/template/etrade-rtl/">RTL Version</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="axil-submenu">
                                        <li><a href="shop-sidebar.html">Shop With Sidebar</a></li>
                                        <li><a href="shop.html">Shop no Sidebar</a></li>
                                        <li><a href="single-product.html">Product Variation 1</a></li>
                                        <li><a href="single-product-2.html">Product Variation 2</a></li>
                                        <li><a href="single-product-3.html">Product Variation 3</a></li>
                                        <li><a href="single-product-4.html">Product Variation 4</a></li>
                                        <li><a href="single-product-5.html">Product Variation 5</a></li>
                                        <li><a href="single-product-6.html">Product Variation 6</a></li>
                                        <li><a href="single-product-7.html">Product Variation 7</a></li>
                                        <li><a href="single-product-8.html">Product Variation 8</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="axil-submenu">
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="my-account.html">Account</a></li>
                                        <li><a href="sign-up.html">Sign Up</a></li>
                                        <li><a href="sign-in.html">Sign In</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                        <li><a href="reset-password.html">Reset Password</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Blog</a>
                                    <ul class="axil-submenu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-details.html">Standard Post</a></li>
                                        <li><a href="blog-gallery.html">Gallery Post</a></li>
                                        <li><a href="blog-video.html">Video Post</a></li>
                                        <li><a href="blog-audio.html">Audio Post</a></li>
                                        <li><a href="blog-quote.html">Quote Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
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
    <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
        <div class="container">
            <div class="slider-offset-left">
                <div class="row row--20">
                    <div class="col-lg-9">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-badge-percent"></i> Mega Deal</span>
                                        <h1 class="title">Up to 60% off Sale</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-9.png" alt="Product">
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-fire"></i> Hot Deal</span>
                                        <h1 class="title">Up to 60% off Voucher</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-8.png" alt="Product">
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="far fa-mobile"></i> Smartphone</span>
                                        <h1 class="title">Up to 60% off Voucher</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-7.png" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="slider-product-box">
                            <div class="product-thumb">
                                <a href="single-product.html">
                                    <img src="assets/images/product/product-41.png" alt="Product">
                                </a>
                            </div>
                            <h6 class="title"><a href="single-product.html">Stylish Leather Bag</a></h6>
                            <span class="price">$29.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
