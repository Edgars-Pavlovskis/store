<div class="header-search-wrap search-notify-modal">
    <div class="card-header">
        <form wire:submit.prevent="search">
            <div class="input-group">
                <input id="products-search-input-txt" type="search" class="form-control" wire:model.defer="query" placeholder="{{__('frontend.search-write-something')}}">
                <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="card-body">
        @if(isset($found))
            <div class="search-result-header">
                <h6 class="title">{{__('frontend.found-products')}}: {{$found}}</h6>
            </div>
        @endif





        <div class="psearch-results">

            <div id="search-loader-holder" >
                <div id="search-loader-animator" wire:loading wire:loading="$isLoading">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </div>


            <div class="row row--15">
                @foreach ($products as $product)
                    <div wire:ignore class="@mobile col-12 @endmobile @tablet col-6 @endtablet @desktop col-xl-3 col-sm-6 @enddesktop">
                        <div class="axil-product product-style-one mb--30">
                            <div class="thumbnail">
                                <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">
                                    <img style="@if(isset($alias)) @handheld height:150px !important; @elsehandheld height:224px !important; @endhandheld @endif @handheld object-fit: contain; @endhandheld" src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Image">
                                </a>

                                <div class="label-block label-right">
                                    @if ($product->discount > 0)
                                        <div class="product-badget">{{__('admin.products.status.discount')}} -{{$product->discount}}%</div><br>
                                    @endif
                                    @if ($product->new)
                                        <div class="product-badget bg-primary">{{__('admin.products.status.new')}}</div><br>
                                    @endif
                                    @if ($product->special)
                                        <div class="product-badget bg-success"><i class="fa-solid fa-thumbs-up"></i></div>
                                    @endif
                                </div>

                                @desktop
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        @if(is_array($product->variations) && count($product->variations)>0)
                                            <li class="select-option"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{__('frontend.select-variations')}}</a></li>
                                        @else
                                            <li class="select-option"><a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product->id}}')">{{__('frontend.add-to-cart')}}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                @enddesktop

                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{$product->title}}</a></h5>
                                    <div class="product-price-variant">
                                        @if (isset($alias) && $product->discount == 0 && isset($clientDiscounts[$alias]))
                                            <span class="price current-price" style="color:rgb(132, 144, 91)">{{number_format($product->price - ($product->price * ($clientDiscounts[$alias] / 100)), 2)}} €</span>
                                        @else
                                            <span class="price current-price">{{number_format($product->price - ($product->price * ($product->discount / 100)), 2)}} €</span>
                                        @endif

                                        @if ($product->discount > 0)
                                            <span class="price old-price"><small>{{number_format($product->price, 2)}} €</small></span>
                                        @endif

                                        @handheld
                                            <ul class="cart-action">
                                                @if(is_array($product->variations) && count($product->variations)>0)
                                                    <li class="select-option w-100"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{__('frontend.select-variations')}}</a></li>
                                                @else
                                                    <li class="select-option w-100"><a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product->id}}')">{{__('frontend.add-to-cart')}}</a></li>
                                                @endif
                                            </ul>
                                        @endhandheld
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>








            @if ($showMoreButton)
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="javascript:void(0)" wire:click="loadMore" class="axil-btn btn-bg-lighter btn-load-more px-2 py-3">{{__('frontend.load-more')}}</a>
                    </div>
                </div>
            @endif


        </div>
    </div>


</div>
