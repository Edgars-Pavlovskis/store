

    @if ($type == "top-slider")
        <div class="slider-box-wrap">
            <div class="slider-activation-one axil-slick-dots">
                @if(count($banners)>0)
                    @foreach ($banners as $banner)
                        <div class="single-slide slick-slide" @if(isset($banner->params['bg-main'])) style="background-size: contain; background-image:url('storage/images/{{$banner->params['bg-main']??''}}')" @endif>
                            <div class="main-slider-content">
                                <span class="subtitle"><i class="{{$banner->params['icon-class']??''}}" me-2></i> {{$banner->params['icon-text'][App()->currentLocale()??config('shop.languages.default')]??''}}</span>
                                <h1 class="title">{!!$banner->params['main-text'][App()->currentLocale()??config('shop.languages.default')]??''!!}</h1>
                                <div class="shop-btn">
                                    <a href="{{$banner->params['url']}}" class="axil-btn">{{$banner->params['url-text'][App()->currentLocale()??config('shop.languages.default')]??''}} <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="main-slider-thumb">
                                <img src="storage/images/{{$banner->params['image-main']??''}}" alt="banner image">
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="single-slide slick-slide">
                        <div class="main-slider-content">
                            <span class="subtitle"><i class="fa-solid fa-triangle-exclamation" me-2></i> {{__('banners.no-banner')}}</span>
                            <h1 class="title">{{$type}}</h1>
                            <div class="shop-btn">
                                <a href="javascript:void(0)" class="axil-btn">#<i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="main-slider-thumb">
                            <img src="/assets/img/default-product.png" alt="banner image">
                        </div>
                    </div>


                @endif


            </div>
        </div>
    @endif


    @if ($type == "top-product")
        @if(count($banners)>0)
            <div class="slider-product-box">
                <div class="product-thumb">
                    <a href="{{route('frontend-product-show',['alias'=>$banner->params['code']??'not-found'])}}">
                        <img src="storage/products/{{$banner->params['image']??''}}" alt="Product image" onerror="this.src='/assets/img/default-product.png';" >
                    </a>
                </div>
                <h6 class="title"><a href="{{route('frontend-product-show',['alias'=>$banner->params['code']??'not-found'])}}">{{$banner->params['title']??''}}</a></h6>

                <div class="axil-product">
                    <div class="product-content m-0">
                        <div class="product-price-variant">
                            @if ($banner->params['discount'] > 0)
                                <span class="price old-price"><small>{{number_format($banner->params['price'], 2)}} €</small></span>
                            @endif
                            <span class="price current-price">{{number_format($banner->params['price'] - ($banner->params['price'] * ($banner->params['discount'] / 100)), 2)}} €</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="slider-product-box">
                <div class="product-thumb">
                    <a href="javascript:void(0)">
                        <img src="/assets/img/default-product.png" alt="Product image" >
                    </a>
                </div>
                <h6 class="title"><a href="javascript:void(0)">{{$type}}</a></h6>

                <div class="axil-product">
                    <div class="product-content m-0">
                        <div class="product-price-variant">
                            <span class="price"><small>{{__('banners.no-banner')}}</small></span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif





    @if ($type == "counter")
        @if(isset($banner->id))
            <div class="axil-poster-countdown">
                <div class="container">
                    <div class="poster-countdown-wrap bg-lighter" @if(isset($banner->params['bg-main'])) style="background-size: contain; background-image:url('storage/images/{{$banner->params['bg-main']??''}}')" @endif>
                        <div class="row">
                            <div class="col-xl-5 col-lg-6">
                                <div class="poster-countdown-content">
                                    <div class="section-title-wrapper">
                                        <span class="title-highlighter highlighter-secondary"> <i class="{{$banner->params['icon-class']??''}}"></i> {{$banner->params['icon-text'][App()->currentLocale()??config('shop.languages.default')]??''}}</span>
                                        <h2 class="title">{!!$banner->params['main-text'][App()->currentLocale()??config('shop.languages.default')]??''!!}</h2>
                                    </div>
                                    <div class="poster-countdown countdown mb--40" date_end="{{$banner->date_end->format('Y/m/d') }}"></div>
                                    <a href="{{$banner->params['url']}}" class="axil-btn btn-bg-primary">{{$banner->params['url-text'][App()->currentLocale()??config('shop.languages.default')]??''}} </a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="poster-countdown-thumbnail">
                                    <img src="storage/images/{{$banner->params['image-main']??'2000/10/01'}}" alt="Banner image">
                                    <div class="music-singnal">
                                        <div class="item-circle circle-1"></div>
                                        <div class="item-circle circle-2"></div>
                                        <div class="item-circle circle-3"></div>
                                        <div class="item-circle circle-4"></div>
                                        <div class="item-circle circle-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="axil-poster-countdown">
                <div class="container">

                </div>
            </div>
        @endif
    @endif



