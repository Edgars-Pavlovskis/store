<div class="col-lg-5 mb--40">
    @section('title', $product->title)
    @section('meta_description', $product->description??'')
    @section('og_title', $product->title)
    @section('og_description', $product->description??'')
    @section('og_type', 'product')
    @section('og_image', '/storage/products/{{$product->image}}')


    <div class="single-product-content">
        <div class="inner">
            <h2 class="product-title">{{$product->title}}</h2>

            @if (($minPrice > 0 && $maxPrice > 0) || $minPrice != $maxPrice)
                @if(isset($variationMatch['price']) && $variationMatch['price'] > 0)
                    @if ($product->discount == 0 && isset($clientDiscounts[$product->parent]))
                        <div class="product-price" style="color:rgb(132, 144, 91)">{{number_format($variationMatch['price'] - ($variationMatch['price'] * ($clientDiscounts[$product->parent] / 100)), 2)}} €</div>
                    @else
                        <span class="new-price">{{number_format($variationMatch['price'] - ($variationMatch['price'] * ($product->discount / 100)), 2)}} €</span>
                    @endif
                    @if ($product->discount > 0)
                        <span class="old-price">{{number_format($variationMatch['price'], 2)}} €</span>
                    @endif
                @else
                    <div class="product-price">{{number_format($minPrice, 2)}} € - {{number_format($maxPrice, 2)}} €</div>
                @endif
            @else

                <div class="price-amount price-offer-amount">
                    @if ($product->discount == 0 && isset($clientDiscounts[$product->parent]))
                        <span class="price current-price" style="color:rgb(132, 144, 91)">{{number_format($product->price - ($product->price * ($clientDiscounts[$product->parent] / 100)), 2)}} €</span>
                    @else
                        <span class="price current-price">{{number_format($product->price - ($product->price * ($product->discount / 100)), 2)}} €</span>
                    @endif
                    @if ($product->discount > 0)
                        <span class="price old-price"><small>{{number_format($product->price, 2)}} €</small></span>
                    @endif
                </div>

            @endif

            <p class="description">{{$product->description??''}}</p>

            @if (isset($product->inner_code) && strlen($product->inner_code)>0)
                <p class="description"><small><b>{{__('admin.products.input-inner-code')}}:</b> {{$product->inner_code}}</small></p>
            @endif


            @if(false && isset($variationMatch['id']))
                <small><i class="fa-solid fa-triangle-exclamation me-2"></i> {{$variationMatch['name']}}</small>
            @endif
            <div class="product-variations-wrapper ">

                <!-- Start Product Variation  -->

                @foreach ($allAttributes as $attribute)
                    @if(isset($variationsFilter[$attribute['id']]))
                        @if(isset($selected[$attribute['id']]))
                            @if ($attribute['type']=="value")
                                <span>{{$attribute['name']}}: <b>{{$selected[$attribute['id']]}}</b></span><a wire:click="resetVariation({{$attribute['id']}})" href="javascript:void(0)"><i class="fa-regular fa-circle-xmark ms-2"></i></a><br>
                            @else
                                <span>{{$attribute['name']}}: <b>{{$attribute['options'][$selected[$attribute['id']]]}}</b></span><a wire:click="resetVariation({{$attribute['id']}})" href="javascript:void(0)"><i class="fa-regular fa-circle-xmark ms-2"></i></a><br>
                            @endif
                        @else
                            <select class="mb-2" wire:model="selected.{{$attribute['id']}}" wire:change="variationSelect({{$attribute['id']}})">
                                <option value="">{{$attribute['name']}}</option>
                                @if ($attribute['type']=="value")
                                    @foreach ($attributesAsValues[$attribute['id']] as $option)
                                        @if (in_array($option, $variationsFilter[$attribute['id']]))
                                            <option value="{{$option}}">{{$option}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($attribute['options'] as $key=>$option)
                                        @if (in_array($key, $variationsFilter[$attribute['id']]))
                                            <option value="{{$key}}">{{$option}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        @endif
                    @endif
                @endforeach


                <!-- End Product Variation  -->
            </div>
            @if (count($selected)>0)
                <a class="text-danger" href="javascript:void(0)" wire:click="resetVariations"><i class="fa-solid fa-arrows-rotate me-2"></i>{{__('frontend.variations.reset')}}</a>
            @endif


            @if($product->active)
                <!-- Start Product Action Wrapper  -->
                <div class="product-action-wrapper d-flex-center mt-5">
                    <!-- Start Quentity Action  -->
                    <div  class="pro-qty"><span wire:click="addItemCountDec" class="dec qtybtn">-</span><input type="text" wire:model.blur="addItemCount"><span wire:click="addItemCountInc" class="inc qtybtn">+</span></div>
                    <!-- End Quentity Action  -->

                    <!-- Start Product Action  -->
                    <ul class="product-action d-flex-center mb--0">
                        <li class="add-to-cart"><a href="javascript:void(0)" wire:click="addToCard" class="axil-btn @if(isset($variationMatch['id']) || count($variations)==0) btn-bg-primary @else btn-bg-disabled @endif">{{__('frontend.add-to-cart')}}</a></li>
                    </ul>
                    <!-- End Product Action  -->
                </div>
                <!-- End Product Action Wrapper  -->
            @else
                <div class="alert alert-warning" role="alert">
                    {{__('frontend.product.notawailable')}}
              </div>
            @endif

        </div>
    </div>
</div>
