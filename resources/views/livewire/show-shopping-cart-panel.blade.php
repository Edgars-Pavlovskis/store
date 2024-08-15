
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">{{__('frontend.Shopping list')}}</h2>
            <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>

        </div>
        <div class="cart-body">
            <ul class="cart-item-list">
                @foreach ($shoppingCart as $key => $cart)
                    <li class="cart-item">
                        <div class="item-img">
                            <a target="blank" href="{{ route('frontend-product-show', ['alias'=>$cart['code']]) }}"><img src="/storage/products/{{$cart['image']}}" onerror="this.src='/assets/img/default-product.png';" alt="Product image"></a>
                            <button wire:click="removeItemFromCart('{{$cart['key']}}')" class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <h3 class="item-title"><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$cart['code']]) }}">{{$cart['title']}}</a></h3>
                            <div class="item-price">{{number_format($cart['price'], 2)}} <span class="currency-symbol">€</span></div>
                            <div class="pro-qty item-quantity">
                                <p><b>x {{$cart['addCount']}}</b></p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount">{{number_format($total, 2)}} <span class="currency-symbol">€</span></span>
            </h3>
            <div class="group-btn">
                <a href="javascript:void(0)" wire:click="cleanShoppingCart" class="axil-btn btn-bg-primary viewcart-btn"><i class="fa-solid fa-eraser me-2"></i>{{__('frontend.popover.Clear list')}}</a>
                <a href="/cart" class="axil-btn btn-bg-secondary checkout-btn"><i class="fa-solid fa-basket-shopping me-2"></i>{{__('frontend.Shopping cart')}}</a>
            </div>
        </div>
    </div>



