<div class="header-search-wrap">
    <div class="card-header">
        <form wire:submit.prevent="search">
            <div class="input-group">
                <input type="search" class="form-control" wire:model.defer="query" placeholder="{{__('frontend.search-write-something')}}">
                <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="card-body">
        @if($found > 0)
            <div class="search-result-header">
                <h6 class="title">{{__('frontend.found-products')}}: {{$found}}</h6>
            </div>
        @endif
        <div class="psearch-results">

            <div wire:loading wire:target="search" class="w-100 h-100" style="position:absolute; left:0; top:0;display: flex; justify-content: center; align-items: center; background-color:rgba(200,200,200,0.5); z-index:999; visibility: hidden;">
                <i class="fas fa-spinner fa-spin"></i>
            </div>


            @foreach ($products as $product)
                <div class="axil-product-list">
                    <div class="thumbnail">
                        <a href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">
                            <img class="search-products-img" src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Image">
                        </a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-title"><a href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{$product->title}}</a></h6>

                        @if ($product->discount > 0)
                            <span class="badge text-bg-danger">{{__('admin.products.status.discount')}} -{{$product->discount}}%</span>
                        @endif
                        @if ($product->new)
                            <span class="badge text-bg-primary">{{__('admin.products.status.new')}}</span>
                        @endif
                        @if ($product->special)
                            <span class="badge text-bg-success"><i class="fa-solid fa-thumbs-up"></i></span>
                        @endif

                        <div class="product-price-variant">
                            <span class="price current-price">{{number_format($product->price - ($product->price * ($product->discount / 100)), 2)}} €</span>
                            @if ($product->discount > 0)
                                <span class="price old-price"><small>{{number_format($product->price, 2)}} €</small></span>
                            @endif
                        </div>
                        <div class="product-cart">
                            @if(is_array($product->variations) && count($product->variations)>0)
                                <a target="blank" class="cart-btn" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}" ><i class="fal fa-shopping-cart"></i></a>
                            @else
                                <a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product->id}}')" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach


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
