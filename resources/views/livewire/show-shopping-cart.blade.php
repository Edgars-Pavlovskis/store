<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            <div class="product-table-heading">
                <h4 class="title"><i class="fa-solid fa-basket-shopping me-3"></i>{{__('frontend.Shopping cart')}}</h4>
                <a wire:click="cleanShoppingCart" href="javascript:void(0)" class="cart-clear"><i class="fa-solid fa-eraser me-2"></i>{{__('frontend.cart.clear')}}</a>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail text-center"><i class="fa-regular fa-image"></i></th>
                            <th scope="col" class="product-title">{{__('frontend.cart.product')}}</th>
                            <th scope="col" class="product-price">{{__('frontend.cart.price')}}</th>
                            <th scope="col" class="product-quantity">{{__('frontend.cart.count')}}</th>
                            <th scope="col" class="product-subtotal">{{__('frontend.cart.total')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shoppingCart as $index => $cart)
                            <tr>
                                <td class="product-remove"><a wire:click="removeItemFromCart('{{$cart['key']}}')" href="javascript:void(0)" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="javascript:void(0)"><img src="/storage/products/{{$cart['image']}}" onerror="this.src='/assets/img/default-product.png';"  alt="Product image"></a></td>
                                <td class="product-title">
                                    <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$cart['code']]) }}">{{$cart['title']}}</a>
                                    <br>
                                    @if (count($cart['variation'])>0)
                                        @foreach ($cart['variation'] as $variation)
                                            <small class="text-secondary"><b>{{$variation['name']}}</b>: {{$variation['value']}}</small>
                                        @endforeach
                                    @endif
                                    @if (isset($cart['discount']) && $cart['discount']>0)
                                        <small class="text-danger"><b>{{__('admin.products.status.discount')}}</b>: -{{$cart['discount']}}%</small>
                                    @endif

                                </td>
                                <td class="product-price" data-title="{{__('frontend.cart.price')}}">
                                    {{number_format($cart['price'], 2)}} €
                                </td>
                                <td class="product-quantity" data-title="{{__('frontend.cart.count')}}">
                                    <div  class="pro-qty"><span wire:click="addItemCountDec({{$index}})" class="dec qtybtn">-</span><input type="text" wire:model.blur="shoppingCart.{{ $index }}.addCount"><span wire:click="addItemCountInc({{$index}})" class="inc qtybtn">+</span></div>
                                </td>
                                <td class="product-subtotal" data-title="{{__('frontend.cart.total')}}">{{number_format($cart['price'] * intval($cart['addCount']), 2)}} €</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>

                @if(count($coupons??[])>0)
                    <div class="mb-4">
                        @foreach ($coupons??[] as $coupon => $data)
                            <span class="badge {{config('coupons.list.'.$coupon.'.badge-class', 'text-bg-secondary')}}">{{$coupon}}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="cart-update-btn-area">
                <div class="input-group product-cupon">
                    <input placeholder="{{__('frontend.cart.enter-code')}}" type="text" wire:model.blur="couponCode">
                    <div class="product-cupon-btn">
                        <button type="button" wire:click="applyCode" class="axil-btn btn-outline">{{__('frontend.cart.apply-code')}}</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--20">
                        <h5 class="title mb--20">{{__('frontend.cart.info')}}</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-subtotal">
                                        <td>{{__('frontend.cart.total-without-tax')}}</td>
                                        <td>{{number_format($total-($total*0.21), 2)}} €</td>
                                    </tr>
                                    <!--
                                    <tr class="order-shipping">
                                        <td>Shipping</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" id="radio1" name="shipping" checked>
                                                <label for="radio1">Free Shippping</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio2" name="shipping">
                                                <label for="radio2">Local: $35.00</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio3" name="shipping">
                                                <label for="radio3">Flat rate: $12.00</label>
                                            </div>
                                        </td>
                                    </tr>
                                    -->

                                    <tr class="order-tax">
                                        <td>{{__('frontend.cart.total-tax')}}</td>
                                        <td>{{number_format($total*0.21, 2)}} €</td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>{{__('frontend.cart.total-with-tax')}}</td>
                                        <td class="order-total-amount">{{number_format($total, 2)}} €</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('checkout-show')}}" class="axil-btn btn-bg-primary checkout-btn">{{__('frontend.cart.checkout')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
