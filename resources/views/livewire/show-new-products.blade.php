
<!-- Start New Arrivals Product Area  -->
<div wire:ignore class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--50">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> {{__('frontend.check-this-too')}}</span>
            <h3 class="title">{{__('frontend.new-products')}}</h3>
        </div>
        <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">

            @foreach ($products as $product)
                <div class="slick-single-layout">
                    <div class="axil-product product-style-two has-color-pick">
                        <div class="thumbnail">
                            <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product['code']]) }}">
                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="/storage/products/{{$product['image']}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Image">
                            </a>
                            <div class="label-block label-right">
                                @if ($product['discount'] > 0)
                                    <div class="product-badget">{{__('admin.products.status.discount')}} -{{$product['discount']}}%</div><br>
                                @endif
                                @if ($product['new'])
                                    <div class="product-badget bg-primary">{{__('admin.products.status.new')}}</div><br>
                                @endif
                                @if ($product['special'])
                                    <div class="product-badget bg-success"><i class="fa-solid fa-thumbs-up"></i></div>
                                @endif
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product['code']]) }}">{{$product['title']}}</a></h5>
                                <div class="product-price-variant">
                                    @if ($product['discount'] == 0 && isset($clientDiscounts[$product['parent']]))
                                        <span class="price current-price" style="color:rgb(132, 144, 91)">{{number_format($product['price'] - ($product['price'] * ($clientDiscounts[$product['parent']] / 100)), 2)}} €</span>
                                    @else
                                        <span class="price current-price">{{number_format($product['price'] - ($product['price'] * ($product['discount'] / 100)), 2)}} €</span>
                                    @endif

                                    @if ($product['discount'] > 0)
                                        <span class="price old-price"><small>{{number_format($product['price'], 2)}} €</small></span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action justify-content-center">
                                    @if(is_array($product['variations']) && count($product['variations'])>0)
                                        <li class="select-option"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product['code']]) }}">{{__('frontend.select-variations')}}</a></li>
                                    @else
                                        <li class="select-option"><a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product['id']}}')">{{__('frontend.add-to-cart')}}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End New Arrivals Product Area  -->
