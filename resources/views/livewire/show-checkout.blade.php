<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">{{__('frontend.checkout.billing-details')}}</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{__('frontend.checkout.name')}} <span>*</span></label>
                                    <input type="text" id="first-name" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{__('frontend.checkout.surname')}} <span>*</span></label>
                                    <input type="text" id="last-name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.company')}}</label>
                            <input type="text" id="company-name">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.country')}} <span>*</span></label>
                            <input type="text" id="company-name">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.street')}} <span>*</span></label>
                            <input type="text" id="address1" class="mb--15" placeholder="{{__('frontend.checkout.street-info')}}">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.city')}} <span>*</span></label>
                            <input type="text" id="town">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.zip')}} <span>*</span></label>
                            <input type="text" id="zipcode">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.phone')}} <span>*</span></label>
                            <input type="tel" id="phone">
                        </div>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.email')}} <span>*</span></label>
                            <input type="email" id="email">
                        </div>

                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fa-solid fa-map-location-dot"></i> {{__('frontend.checkout.delivery-address')}} <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.checkout.delivery-address-info')}} <i class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="toggle-open">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{__('frontend.checkout.name')}} <span>*</span></label>
                                                <input type="text" id="first-name" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{__('frontend.checkout.surname')}} <span>*</span></label>
                                                <input type="text" id="last-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.company')}}</label>
                                        <input type="text" id="company-name">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.country')}} <span>*</span></label>
                                        <input type="text" id="company-name">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.street')}} <span>*</span></label>
                                        <input type="text" id="address1" class="mb--15" placeholder="{{__('frontend.checkout.street-info')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.city')}} <span>*</span></label>
                                        <input type="text" id="town">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.zip')}} <span>*</span></label>
                                        <input type="text" id="zipcode">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('frontend.checkout.phone')}} <span>*</span></label>
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4 class="title mb--40">{{__('frontend.checkout.additional-info')}}</h4>
                        <div class="form-group">
                            <label>{{__('frontend.checkout.additional-note')}}</label>
                            <textarea id="notes" rows="2" placeholder="{{__('frontend.checkout.additional-note-descr')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="order-product">
                                        <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                        <td>$117.00</td>
                                    </tr>
                                    <tr class="order-product">
                                        <td>Commodo Blown Lamp <span class="quantity">x1</span></td>
                                        <td>$198.00</td>
                                    </tr>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>$117.00</td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="shipping-amount">
                                                <span class="title">Shipping Method</span>
                                                <span class="amount">$35.00</span>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio1" name="shipping" checked>
                                                <label for="radio1">Free Shippping</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio2" name="shipping">
                                                <label for="radio2">Local</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" id="radio3" name="shipping">
                                                <label for="radio3">Flat rate</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">$323.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio4" name="payment">
                                    <label for="radio4">Direct bank transfer</label>
                                </div>
                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                            </div>
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio5" name="payment">
                                    <label for="radio5">Cash on delivery</label>
                                </div>
                                <p>Pay with cash upon delivery.</p>
                            </div>
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input type="radio" id="radio6" name="payment" checked>
                                    <label for="radio6">Paypal</label>
                                    <img src="./assets/images/others/payment.png" alt="Paypal payment">
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                            </div>
                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
