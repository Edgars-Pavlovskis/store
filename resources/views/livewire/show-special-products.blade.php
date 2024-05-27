<div wire:ignore class="axil-best-seller-product-area bg-color-white axil-section-gap pt--0 mt-5">
    <div class="container">
        <div class="product-area pb--50">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> {{__('frontend.check-this-too')}}</span>
                <h3 class="title">{{__('frontend.discounts-and-specials')}}</h3>
            </div>
            <div class="new-arrivals-product-activation-2 slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">

                @foreach ($products as $product)
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-three">
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

                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        @if(is_array($product['variations']) && count($product['variations'])>0)
                                            <li class="select-option"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product['code']]) }}">{{__('frontend.select-variations')}}</a></li>
                                        @else
                                            <li class="select-option"><a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product['id']}}')">{{__('frontend.add-to-cart')}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product['code']]) }}">{{$product['title']}}</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">{{number_format($product['price'] - ($product['price'] * ($product['discount'] / 100)), 2)}} €</span>
                                        @if ($product['discount'] > 0)
                                            <span class="price old-price"><small>{{number_format($product['price'], 2)}} €</small></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
