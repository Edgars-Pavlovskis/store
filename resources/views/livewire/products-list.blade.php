
<div class="axil-shop-area axil-section-gap bg-color-white" data-sal="zoom-out" data-sal-delay="300" data-sal-duration="300">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="axil-shop-sidebar">
                    <div class="d-lg-none">
                        <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="toggle-list product-categories active">
                        <h6 class="title">CATEGORIES</h6>
                        <div class="shop-submenu">
                            <div class="checkbox-wrapper-29 ms-3">
                                <label class="checkbox"><input id="eddycheck" type="checkbox" class="checkbox__input"  /><span class="checkbox__label"></span>Intel i3 12300F</label>
                                <label class="checkbox"><input id="eddycheck1" type="checkbox" class="checkbox__input"  /><span class="checkbox__label"></span>Intel i5 13500KF</label>
                                <label class="checkbox"><input id="eddycheck2" type="checkbox" class="checkbox__input"  /><span class="checkbox__label"></span>Intel i7 14700K</label>
                            </div>

                        </div>
                    </div>
                    <div class="toggle-list product-categories product-gender active">
                        <h6 class="title">GENDER</h6>
                        <div class="shop-submenu">
                            <ul>
                                <li class="chosen"><a href="#">Men (40)</a></li>
                                <li><a href="#">Women (56)</a></li>
                                <li><a href="#">Unisex (18)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="toggle-list product-color active">
                        <h6 class="title">COLORS</h6>
                        <div class="shop-submenu">
                            <ul>
                                <li class="chosen"><a href="#" class="color-extra-01"></a></li>
                                <li><a href="#" class="color-extra-02"></a></li>
                                <li><a href="#" class="color-extra-03"></a></li>
                                <li><a href="#" class="color-extra-04"></a></li>
                                <li><a href="#" class="color-extra-05"></a></li>
                                <li><a href="#" class="color-extra-06"></a></li>
                                <li><a href="#" class="color-extra-07"></a></li>
                                <li><a href="#" class="color-extra-08"></a></li>
                                <li><a href="#" class="color-extra-09"></a></li>
                                <li><a href="#" class="color-extra-10"></a></li>
                                <li><a href="#" class="color-extra-11"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="toggle-list product-size active">
                        <h6 class="title">SIZE</h6>
                        <div class="shop-submenu">
                            <ul>
                                <li class="chosen"><a href="#">XS</a></li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                                <li><a href="#">3XL</a></li>
                                <li><a href="#">4XL</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="toggle-list product-price-range active">
                        <h6 class="title">PRICE</h6>
                        <div class="shop-submenu">
                            <ul>
                                <li class="chosen"><a href="#">30</a></li>
                                <li><a href="#">5000</a></li>
                            </ul>
                            <form action="#" class="mt--25">
                                <div id="slider-range"></div>
                                <div class="flex-center mt--20">
                                    <span class="input-range">Price: </span>
                                    <input type="text" id="amount" class="amount-range" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button class="axil-btn btn-bg-primary">All Reset</button>
                </div>
                <!-- End .axil-shop-sidebar -->
            </div>
            <div class="col-lg-9">
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



                <div class="row row--15">

                    @foreach ($products as $product)
                        <div class="col-xl-4 col-sm-6">
                            <div class="axil-product product-style-one mb--30">
                                <div class="thumbnail">
                                    <a href="single-product.html">
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
                                        <h5 class="title"><a href="single-product.html">{{$product->title}}</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">{{$product->price}}€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
                <div class="text-center pt--20">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
