<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            <div class="product-table-heading">
                <h4 class="title">Your Cart</h4>
                <a wire:click="cleanShoppingCart" href="javascript:void(0)" class="cart-clear">Clear Shoping Cart</a>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Product</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">Price</th>
                            <th scope="col" class="product-quantity">Quantity</th>
                            <th scope="col" class="product-subtotal">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shoppingCart as $index => $cart)
                            <tr>
                                <td class="product-remove"><a wire:click="removeItemFromCart('{{$cart['key']}}')" href="javascript:void(0)" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="javascript:void(0)"><img src="/storage/products/{{$cart['image']}}" alt="Product image"></a></td>
                                <td class="product-title"><a href="{{ route('frontend-product-show', ['alias'=>$cart['code']]) }}">{{$cart['title']}}</a><br><small class="text-secondary">Hello</small></td>
                                <td class="product-price" data-title="Price">{{number_format($cart['price'], 2)}} €</td>
                                <td class="product-quantity" data-title="Qty">
                                    <div  class="pro-qty"><span wire:click="addItemCountDec({{$index}})" class="dec qtybtn">-</span><input type="text" wire:model.blur="shoppingCart.{{ $index }}.addCount"><span wire:click="addItemCountInc({{$index}})" class="inc qtybtn">+</span></div>
                                </td>
                                <td class="product-subtotal" data-title="Subtotal">{{number_format($cart['price'] * intval($cart['addCount']), 2)}} €</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="cart-update-btn-area">
                <div class="input-group product-cupon">
                    <input placeholder="Enter coupon code" type="text">
                    <div class="product-cupon-btn">
                        <button type="submit" class="axil-btn btn-outline">Apply</button>
                    </div>
                </div>
                <div class="update-btn">
                    <a href="#" class="axil-btn btn-outline">Update Cart</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Order Summary</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>{{number_format($total, 2)}} €</td>
                                    </tr>
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
                                    <tr class="order-tax">
                                        <td>State Tax</td>
                                        <td>$8.00</td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">$125.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>