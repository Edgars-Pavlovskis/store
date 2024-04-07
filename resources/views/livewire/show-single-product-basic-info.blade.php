<div class="col-lg-5 mb--40">
    <div class="single-product-content">
        <div class="inner">
            <h2 class="product-title">{{$product->title}}</h2>
            @if (($minPrice > 0 && $maxPrice > 0) || $minPrice != $maxPrice)
                <span class="price-amount">{{number_format($minPrice, 2)}} € - {{number_format($maxPrice, 2)}} €</span>
            @else
                <span class="price-amount">{{number_format($product->price, 2)}} €</span>
            @endif
            <div class="product-rating">
                <div class="star-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="review-link">
                    <a href="#">(<span>2</span> customer reviews)</a>
                </div>
            </div>
            <ul class="product-meta">
                <li><i class="fal fa-check"></i>In stock</li>
                <li><i class="fal fa-check"></i>Free delivery available</li>
                <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
            </ul>
            <p class="description">{{$product->description}}</p>

            @if(isset($variationMatch['id']))

            <small><i class="fa-solid fa-triangle-exclamation me-2"></i> {{$variationMatch['name']}}</small>
            @endif
            <div class="product-variations-wrapper mb-5">

                <!-- Start Product Variation  -->

                @foreach ($allAttributes as $attribute)
                    @if(isset($variationsFilter[$attribute['id']]))
                        <select class="mb-2" wire:model="selected.{{$attribute['id']}}" wire:change="variationSelect({{$attribute['id']}})">
                            <option value="">{{$attribute['name']}}</option>
                            @foreach ($attribute['options'] as $key=>$option)
                                @if (in_array($key, $variationsFilter[$attribute['id']]))
                                    <option value="{{$key}}">{{$option}}</option>
                                @endif
                            @endforeach
                        </select>

                    @endif
                @endforeach

                @if (count($selected)>0)
                    <a class="text-danger" href="javascript:void(0)" wire:click="resetVariations"><i class="fa-solid fa-arrows-rotate me-2"></i>{{__('frontend.variations.reset')}}</a>
                @endif
                <!-- End Product Variation  -->
            </div>

            <!-- Start Product Action Wrapper  -->
            <div class="product-action-wrapper d-flex-center">
                <!-- Start Quentity Action  -->

                <div  class="pro-qty"><span wire:click="addItemCountDec" class="dec qtybtn">-</span><input type="text" wire:model.blur="addItemCount"><span wire:click="addItemCountInc" class="inc qtybtn">+</span></div>

                <!-- End Quentity Action  -->

                <!-- Start Product Action  -->
                <ul class="product-action d-flex-center mb--0">
                    <li class="add-to-cart"><a href="javascript:void(0)" class="axil-btn @if(isset($variationMatch['id'])) btn-bg-primary @else btn-bg-disabled @endif">{{__('frontend.add-to-cart')}}</a></li>
                </ul>
                <!-- End Product Action  -->

            </div>
            <!-- End Product Action Wrapper  -->
        </div>
    </div>
</div>