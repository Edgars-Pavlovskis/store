
<div class="axil-shop-area axil-section-gap bg-color-white" >
    <div class="container">
        <div class="row">
            <div wire:ignore class="col-lg-3">
                <div class="axil-shop-sidebar">
                    <div class="d-lg-none">
                        <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                    </div>

                    <form wire:submit.prevent="applyFilter(Object.fromEntries(new FormData($event.target)))">
                        <div class="toggle-list product-price-range active">
                            <h6 class="title">{{__('frontend.price')}}</h6>
                            <div class="shop-submenu pt-3">

                                <!--
                                <ul>
                                    <li class="chosen"><a href="#">30</a></li>
                                    <li><a href="#">5000</a></li>
                                </ul>
                                -->

                                <div id="slider-range-livewire"></div>
                                <div class="flex-center mt--20">
                                    <span class="input-range pe-2">{{__('frontend.price')}}: </span>
                                    <input type="text" id="amount" class="amount-range" readonly>
                                </div>
                                <input id="filter-price-min" type="hidden" name="filter-price-min" wire:model="filterMin">
                                <input id="filter-price-max" type="hidden" name="filter-price-max" wire:model="filterMax">

                            </div>
                        </div>


                        @foreach ($category_attributes as $attribute)
                            <div class="toggle-list product-categories active">
                                <h6 class="title">{{$attribute->name}}</h6>
                                <div class="shop-submenu">
                                    <div class="checkbox-wrapper-29 ms-3">
                                        @foreach ($attribute->options as $key=>$option)
                                            <label class="checkbox"><input wire:model.defer="filter.{{$attribute->id}}.{{$key}}"  type="checkbox" class="checkbox__input"  /><span class="checkbox__label"></span>Intel i3 12300F</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="axil-btn btn-bg-primary">Apply filter</button>
                        <button class="mt-2 axil-btn btn-bg-outline">All Reset</button>
                    </form>
                </div>
                <!-- End .axil-shop-sidebar -->
            </div>
            <div id="products-loader-holder" class="col-lg-9">
                <div id="products-loader-animator" wire:loading wire:target="applyFilter">
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top mb--40">
                            <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                                <!-- Start Single Select  -->
                                <span class="filter-results">Showing 1-12 of 84 results</span>
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
                <!-- End .row -->



                <div  class="row row--15">

                    @foreach ($products as $product)
                        <div class="col-xl-4 col-sm-6">
                            <div class="axil-product product-style-one mb--30">
                                <div class="thumbnail">
                                    <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">
                                        <img src="/storage/products/{{$product->image}}" alt="Product Image">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">

                                            <li class="select-option"><a href="javascript:void(0)">{{__('frontend.add-to-cart')}}</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$product->code]) }}">{{$product->title}}</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{number_format($product->price, 2)}}€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center pt--20 mt-5" wire:loading.remove>
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->

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


</div>
