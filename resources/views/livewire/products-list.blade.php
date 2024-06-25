
<div class="axil-shop-area axil-section-gap bg-color-white" >
    <div class="container">
        <div class="row">

            @if (isset($alias))
                <div wire:ignore class="col-lg-3">
                    <div class="axil-shop-sidebar">
                        <div class="d-lg-none">
                            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                        </div>

                        <form wire:submit.prevent="applyFilter(Object.fromEntries(new FormData($event.target)))">
                            <div class="toggle-list product-price-range active">
                                <h6 class="title">{{__('frontend.price')}}</h6>
                                <div class="shop-submenu pt-3">



                                    <div id="slider-range-livewire"></div>
                                    <div class="flex-center mt--20">
                                        <span class="input-range pe-2">{{__('frontend.price')}}: </span>
                                        <input type="text" id="amount" class="amount-range" readonly>
                                    </div>
                                    <input id="filter-price-min" type="hidden" name="filter-price-min" wire:model.defer="filterMin">
                                    <input id="filter-price-max" type="hidden" name="filter-price-max" wire:model.defer="filterMax">

                                </div>
                            </div>


                            @foreach ($category_attributes as $attribute)
                                <div class="toggle-list product-categories active">
                                    <h6 class="title">{{$attribute['name']}}</h6>
                                    <div class="shop-submenu">
                                        <div class="checkbox-wrapper-29 ms-3">
                                            @foreach ($attribute['options'] as $key=>$option)
                                                <label class="checkbox"><input @if($attribute['type']=="value") value="{{$option}}" @endif  wire:model.defer="filter.{{$attribute['id']}}.{{$key}}"  type="checkbox" class="checkbox__input"  /><span class="checkbox__label"></span>{{$option}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" class="axil-btn btn-bg-primary">{{__('frontend.filter.apply')}}</button>
                            <button wire:click="resetFilter" class="mt-2 axil-btn btn-bg-outline">{{__('frontend.filter.reset')}}</button>
                        </form>
                    </div>
                    <!-- End .axil-shop-sidebar -->
                </div>
            @endif


            <div id="products-loader-holder" class="@if(isset($alias)) col-lg-9 @else col-lg-12 @endif">
                <div id="products-loader-animator" wire:loading wire:loading="$isLoading">
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                @if (isset($alias) && count($products)>0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--40">
                                <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                                    <!-- Start Single Select  -->
                                    <span class="filter-results">Showing z-y of {{count($products)}} results</span>
                                    <select class="single-select">
                                        <option>Short by Latest</option>
                                        <option>Short by Oldest</option>
                                        <option>Short by Name</option>
                                        <option>Short by Price</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if(count($products)>0)
                    <div  class="row row--15">
                        @foreach ($products as $product)
                            <div class="col-xl-3 col-sm-6">
                                <div class="axil-product product-style-one mb--30">
                                    <div class="thumbnail">
                                        <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">
                                            <img style="@if(isset($alias)) height:224px !important; @endif" src="/storage/products/{{$product->image}}" onerror="this.src='/assets/img/default-product.png';" alt="Product Image">
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

                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                @if(is_array($product->variations) && count($product->variations)>0)
                                                    <li class="select-option"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{__('frontend.select-variations')}}</a></li>
                                                @else
                                                    <li class="select-option"><a href="javascript:void(0)" wire:click="fastAddProductToCart('{{$product->id}}')">{{__('frontend.add-to-cart')}}</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{$product->title}}</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">{{number_format($product->price - ($product->price * ($product->discount / 100)), 2)}} €</span>
                                                @if ($product->discount > 0)
                                                    <span class="price old-price"><small>{{number_format($product->price, 2)}} €</small></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div  class="row row--15">
                        <div class="col-12">
                            <p>{{__('frontend.products-list.nothingfound')}}</p>
                        </div>
                    </div>
                @endif

                @if ($showLoadMoreButton)
                    <div class="text-center py-4" wire:loading.remove>
                        <a wire:click="addMoreProducts" href="javascript:void(0)" class="axil-btn btn-bg-lighter btn-load-more">{{__('frontend.products-list.load-more')}}..</a>
                    </div>
                @endif

            </div>


        </div>
    </div>
    <!-- End .container -->




    @if (isset($alias))
        @push('scripts')
        <script>
            $( document ).ready(function() {
                $('#slider-range-livewire').slider({
                    range: true,
                    min: @this.filterMin,
                    max: @this.filterMax,
                    values: [0, @this.filterMax],
                    slide: function(event, ui) {
                        $('#amount').val(ui.values[0]+'€' + ' - ' + ui.values[1] + '€');
                        $('#filter-price-min').val(ui.values[0]);
                        $('#filter-price-max').val(ui.values[1]);
                    }
                });
                let sliderMin = $('#slider-range-livewire').slider('values', 0);
                let sliderMax = $('#slider-range-livewire').slider('values', 1);
                $('#amount').val(sliderMin + '€' +' - ' + sliderMax + '€');
                $('#filter-price-min').val(sliderMin);
                $('#filter-price-max').val(sliderMax);
            });
        </script>
        @endpush
    @endif

</div>
