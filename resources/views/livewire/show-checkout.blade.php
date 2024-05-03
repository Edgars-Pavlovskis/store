<div class="axil-checkout-area axil-section-gap">
    <style>
/* --------------------- Created By InCoder --------------------- */


.customInputContainer {
  width: 100%;
  display: flex;
  margin-top: 1rem;
  margin-bottom: 2rem;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  border:1px solid silver;
}

.customInputContainer .customInput {
  margin: 0 1rem;
  cursor: pointer;
  user-select: none;
  font-size: 1.16rem;
  justify-content: space-between;
  padding: 0.6rem 1rem 0.6rem 0.6rem;
}

.customInputContainer .customInput i {
  transition: transform 0.3s ease-in-out;
}

.customInputContainer.show .customInput i {
  transform: rotate(90deg);
}

.customInputContainer :is(.customInput, .options) {
  width: 100%;
  display: flex;
  color: #202020;
  background: #fff;
  align-items: center;
  border-radius: 0.3rem;
}

.customInputContainer .options {
  display: none;
  padding: 0.6rem;
  font-size: 1.1rem;
  justify-content: start;
  flex-direction: column;
  margin: 0.8rem 1rem 0rem 1rem;
  transition: background-color 0.1s ease-in-out;
}

.customInputContainer.show .options {
  display: block;
}

.customInputContainer.show .options ul li {
    font-size: 1.3rem;
}

.customInputContainer .options :is(.searchInput, ul) {
  width: 100%;
  max-height: 20rem;
  overflow-y: scroll;
  position: relative;
}

.customInputContainer .options ul::-webkit-scrollbar {
  width: 6px;
  position: relative;
}

.customInputContainer .options ul::-webkit-scrollbar-track{
    width: 2px;
    border-radius: .2rem;
    background: rgb(0 0 0 / 10%)
}

.customInputContainer .options ul::-webkit-scrollbar-thumb{
    border-radius: .2rem;
    background: rgb(0 0 0 / 30%);
}

.customInputContainer .options .searchInput {
  display: flex;
  padding: 0 0.4rem;
  overflow-y: auto;
  align-items: center;
  border-radius: 0.4rem;
  color: rgb(0 0 0 / 50%);
  border: 2px solid rgb(0 0 0 / 30%);
}

.customInputContainer .options .searchInput.focus {
  border: 2px solid rgb(245 44 17 / 70%);
}

.customInputContainer .options .searchInput input[type="text"] {
  border: 0;
  width: 100%;
  outline: none;
  height: 2.5rem;
  font-size: 1.3rem;
  padding: 0 0.4rem;
  border-radius: 0.4rem;
}

.customInputContainer .options .searchInput input[type="text"]::placeholder {
  font-size: 1.3rem;
  color: rgb(0 0 0 / 50%);
}

.customInputContainer .options ul {
  margin: 0.5rem 0;
}

.customInputContainer .options ul li {
    cursor: pointer;
    list-style: none;
    padding: 0.4rem 0.4rem;
    border-bottom: 1px solid rgb(204 204 204 / 50%);
}

.customInputContainer .options ul li.selected {
    background: rgb(245 44 17 / 50%);
}

.customInputContainer .options ul li.selected:hover {
    background: rgb(245 44 17 / 50%);
}

.customInputContainer .options ul li:last-child {
  border: 0;
}

.customInputContainer .options ul li:hover {
  background: rgb(245 44 17 / 20%);
}
    </style>
    <div class="container">
        <form wire:submit.prevent="submitCheckoutForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">{{__('frontend.checkout.billing-details')}}</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.name')class="text-danger"@enderror>{{__('frontend.checkout.name')}} <span>*</span></label>
                                    <input type="text" wire:model.defer="checkout.name" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.surname')class="text-danger"@enderror>{{__('frontend.checkout.surname')}} <span>*</span></label>
                                    <input type="text" wire:model.defer="checkout.surname">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label @error('checkout.street')class="text-danger"@enderror>{{__('frontend.checkout.street')}} <span>*</span></label>
                            <input type="text" class="mb--15" wire:model.defer="checkout.street" placeholder="{{__('frontend.checkout.street-info')}}">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.city')class="text-danger"@enderror>{{__('frontend.checkout.city')}} <span>*</span></label>
                                    <input type="text" wire:model.defer="checkout.city">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.zip')class="text-danger"@enderror>{{__('frontend.checkout.zip')}} <span>*</span></label>
                                    <input type="text" wire:model.defer="checkout.zip">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label @error('checkout.country')class="text-danger"@enderror>{{__('frontend.checkout.country')}} <span>*</span></label>
                            <input type="text" wire:model.defer="checkout.country">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.phone')class="text-danger"@enderror>{{__('frontend.checkout.phone')}} <span>*</span></label>
                                    <input type="text" wire:model.defer="checkout.phone" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label @error('checkout.email')class="text-danger"@enderror>{{__('frontend.checkout.email')}} <span>*</span></label>
                                    <input type="email" wire:model.defer="checkout.email">
                                </div>
                            </div>
                        </div>

                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar @if($errors->has('checkout.delivery.*') || count($checkout['delivery'] ?? [])>0) active @enderror"><i class="fa-solid fa-map-location-dot"></i> {{__('frontend.checkout.delivery-address')}} <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.checkout.delivery-address-info')}} <i class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="toggle-open" @if($errors->has('checkout.delivery.*') || count($checkout['delivery'] ?? [])>0) style="display: block;" @enderror>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.delivery.name')class="text-danger"@enderror>{{__('frontend.checkout.name')}} </label>
                                                <input type="text" wire:model.defer="checkout.delivery.name" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.delivery.surname')class="text-danger"@enderror>{{__('frontend.checkout.surname')}} </label>
                                                <input type="text" wire:model.defer="checkout.delivery.surname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label @error('checkout.delivery.street')class="text-danger"@enderror>{{__('frontend.checkout.street')}} </label>
                                        <input type="text" id="address1" class="mb--15" wire:model.defer="checkout.delivery.street" placeholder="{{__('frontend.checkout.street-info')}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.delivery.city')class="text-danger"@enderror>{{__('frontend.checkout.city')}} </label>
                                                <input type="text" wire:model.defer="checkout.delivery.city">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.delivery.zip')class="text-danger"@enderror>{{__('frontend.checkout.zip')}} </label>
                                                <input type="text" wire:model.defer="checkout.delivery.zip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label @error('checkout.delivery.country')class="text-danger"@enderror>{{__('frontend.checkout.country')}} </label>
                                        <input type="text" wire:model.defer="checkout.delivery.country">
                                    </div>
                                    <div class="form-group">
                                        <label @error('checkout.delivery.phone')class="text-danger"@enderror>{{__('frontend.checkout.phone')}} </label>
                                        <input type="tel" wire:model.defer="checkout.delivery.phone">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar @if($errors->has('checkout.company.*') || count($checkout['company'] ?? [])>0) active @enderror"><i class="fa-solid fa-map-location-dot"></i> {{__('frontend.checkout.company')}} <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.checkout.company-info')}} <i class="fas fa-angle-down"></i></a></div>
                                <div class="toggle-open" @if($errors->has('checkout.company.*') || count($checkout['company'] ?? [])>0) style="display: block;" @enderror>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.company.name')class="text-danger"@enderror>{{__('frontend.checkout.company-name')}}</label>
                                                <input type="text" wire:model.defer="checkout.company.name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.company.regno')class="text-danger"@enderror>{{__('frontend.checkout.company-regno')}}</label>
                                                <input type="text" wire:model.defer="checkout.company.regno">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.company.bank')class="text-danger"@enderror>{{__('frontend.checkout.company-bank')}}</label>
                                                <input type="text" wire:model.defer="checkout.company.bank">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label @error('checkout.company.account')class="text-danger"@enderror>{{__('frontend.checkout.company-bank-account')}}</label>
                                                <input type="text" wire:model.defer="checkout.company.account">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <h4 class="title mb--40">{{__('frontend.checkout.additional-info')}}</h4>
                        <div class="form-group">
                            <label @error('checkout.comments')class="text-danger"@enderror>{{__('frontend.checkout.additional-note')}}</label>
                            <textarea id="notes" rows="2" wire:model.defer="checkout.comments" placeholder="{{__('frontend.checkout.additional-note-descr')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">{{__('frontend.cart.info')}}</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>{{__('frontend.cart.product')}}</th>
                                        <th>{{__('frontend.cart.total')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shoppingCart as $index => $cart)
                                        <tr class="order-product">
                                            <td><a target="blank" href="{{ route('frontend-product-show', ['alias'=>$cart['code']]) }}">{{$cart['title']}}</a> <span class="quantity">x{{$cart['addCount']}}</span></td>
                                            <td>{{number_format($cart['price'] * intval($cart['addCount']), 2)}} €</td>
                                        </tr>
                                    @endforeach

                                    <tr class="order-product">
                                        <td><small>Piegādes maksa</small></td>
                                        <td><small>@if ($deliveryPrice > 0) {{number_format($deliveryPrice, 2)}} € @else - @endif</small></td>
                                    </tr>

                                    <tr class="order-subtotal">
                                        <td>{{__('frontend.cart.total-sum')}}</td>
                                        <td>{{number_format($total + $deliveryPrice, 2)}} €</td>
                                    </tr>

                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <div class="shipping-amount">
                                                <span class="title @error('checkout.deliveryAlias') text-danger @enderror">{{__('frontend.checkout.delivery-option')}} <span class="text-danger">*</span></span>
                                                <span class="amount"></span>
                                            </div>
                                            @foreach (config('shop.frontend.delivery-options') as $index => $delivery)
                                                <div class="input-group">
                                                    <input type="radio" id="delivery-{{$index}}" wire:model="checkout.deliveryAlias" wire:change="deliveryAliasChanged" value="{{$index}}"> <label for="delivery-{{$index}}">{{$delivery['title'][app()->getLocale()] ?? 'Piegādes veids (bez nosaukuma)'}}&nbsp;
                                                        @if (isset($delivery['price']))
                                                            @if (isset($delivery['freeontotal']) && is_numeric($delivery['freeontotal']) && $total >= $delivery['freeontotal'])
                                                                (0.00 €)
                                                            @else
                                                                ({{number_format($delivery['price'], 2)}} €)
                                                            @endif
                                                        @endif
                                                    </label>
                                                </div>
                                                @if ($index == "delivery-parcel")
                                                <div @if(!$parcelDeliverySelected) style="display:none;" @endif>
                                                    <div wire:ignore class="customInputContainer">
                                                        <div class="customInput">
                                                            <div class="selectedData">Izvēlieties pakomātu</div>
                                                            <i class="fa-solid fa-angle-right"></i>
                                                        </div>
                                                        <div class="options">
                                                            <div class="searchInput">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                                <input type="text" id="searchInput" autocomplete="off" placeholder="{{__('frontend.search-city')}}">
                                                            </div>
                                                            <ul>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>

                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>{{__('frontend.cart.total-pay')}}</td>
                                        <td class="order-total-amount">{{number_format($total + $deliveryPrice, 2)}} €</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="payment-type-1" checked>
                                    <label for="payment-type-1">{{__('frontend.checkout.pay-by-tranfer')}}</label>
                                </div>
                                <p>{{__('frontend.checkout.pay-by-tranfer-info')}}</p>
                            </div>
                        </div>

                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div class="input-group">
                                    <input id="checkoutRulesAgree" type="radio" value="1" wire:model.defer="checkout.rules">
                                    <label for="checkoutRulesAgree" @error('checkout.rules')class="text-danger"@enderror><small>Es esmu iepazinies(-usies) ar sadaļu <a href="javascript:void(0)" target="blank"><u>Internetveikala lietošanas noteikumi</u></a> un piekrītu visiem tajā izklāstītajiem noteikumiem.</small></label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn">{{__('frontend.checkout.make-order')}}</button>
                    </div>
                </div>
            </div>
        </form>


        <div>
            <!-- Pass JSON data to JavaScript -->
            <div id="jsonParcelStationsData" style="display: none;">{{ $jsonParcelStationsData }}</div>
        </div>
    </div>

    <script>
        window.addEventListener('click', (e) => {
            if (document.querySelector('.searchInput').contains(e.target)) {
                document.querySelector('.searchInput').classList.add('focus')
            } else {
                document.querySelector('.searchInput').classList.remove('focus')
            }
        })
        function updateData(data) {
                let selectedCountry = data.innerText
                selectedData.innerText = selectedCountry
                @this.set('selectedParcelStation', selectedCountry, true)

                for (const li of document.querySelectorAll("li.selected")) {
                    li.classList.remove("selected");
                }
                data.classList.add('selected')
                customInputContainer.classList.toggle('show')
                console.log(selectedCountry);
        }

        function normalizeString(string) {
            return string.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }

        document.addEventListener("DOMContentLoaded", function(event) {
            // --------------------- Created By InCoder ---------------------
            let customInput = document.querySelector('.customInput')
            selectedData = document.querySelector('.selectedData')
            searchInput = document.querySelector('.searchInput input')
            ul = document.querySelector('.options ul')
            customInputContainer = document.querySelector('.customInputContainer')

            var parcelLocations = JSON.parse(document.getElementById('jsonParcelStationsData').textContent);

            customInput.addEventListener('click', () => {
                customInputContainer.classList.toggle('show')
            })

            let parcelLocationsLength = parcelLocations.length

            for (let i = 0; i < parcelLocationsLength; i++) {
                let location = parcelLocations[i]
                const li = document.createElement("li");
                const locationName = document.createTextNode(location);
                li.appendChild(locationName);
                ul.appendChild(li);
            }


            ul.querySelectorAll('li').forEach(li => {
                li.addEventListener('click', (e) => {
                    let selectdItem = e.target.innerText
                    selectedData.innerText = selectdItem
                    @this.set('selectedParcelStation', selectdItem, true)

                    for (const li of document.querySelectorAll("li.selected")) {
                        li.classList.remove("selected");
                    }
                    e.target.classList.add('selected')
                    customInputContainer.classList.toggle('show')
                })
            });



            searchInput.addEventListener('keyup', (e) => {
                let searchedVal = searchInput.value.toLowerCase()
                let searched_country = []

                searched_country = parcelLocations.filter(data => {
                    normalizedData = normalizeString(data);
                    if(normalizeString(data).toLowerCase().startsWith(normalizeString(searchedVal).toLowerCase())) {
                        return data
                    }

                }).map(data => {
                    return `<li onClick="updateData(this)">${data}</li>`
                }).join('')
                ul.innerHTML = searched_country ? searched_country : "<p class='m-0 mt-2'>Nekas nav atrasts...</p>"
            })
        });

    </script>
</div>
