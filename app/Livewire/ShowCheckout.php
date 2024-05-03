<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Orders;

class ShowCheckout extends Component
{
    public $shoppingCart, $total;
    public $checkout = [];
    public $jsonParcelStationsData;
    public $parcelDeliverySelected = false;
    public $selectedParcelStation;

    public function mount()
    {
        $this->updateShoppingCart();

         // Load your JSON data here
        $this->jsonParcelStationsData = file_get_contents(storage_path('app/public/dpd/lockers.json'));

        //session()->put('checkout', []);
        //$this->checkout = session()->get('checkout', []);

        /*
        $this->checkout['rules'] = null;
        session()->put('checkout', $this->checkout);
        */
    }

    public function updateShoppingCart()
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        if(count($this->shoppingCart) == 0) return redirect()->route('frontend-index-root');
        $this->updateCount();
    }

    public function updateCount()
    {
        $this->total = array_reduce($this->shoppingCart, function($carry, $product) {
            return $carry + ($product['price'] * intval($product['addCount']));
        }, 0);
    }

    public function deliveryPrice()
    {
        return $checkout['deliveryPrice'] ?? 0;
    }

    public function deliveryAliasChanged()
    {
        $deliveryData = config('shop.frontend.delivery-options.'.$this->checkout['deliveryAlias']);
        $price = $deliveryData['price'] ?? 0;
        if(isset($deliveryData['freeontotal']) && is_numeric($deliveryData['freeontotal']) && $this->total >= $deliveryData['freeontotal']) $price = 0;
        $this->checkout['deliveryPrice'] = $price;
        if($this->checkout['deliveryAlias'] == "delivery-parcel") $this->parcelDeliverySelected = true; else $this->parcelDeliverySelected = false;
    }

    public function submitCheckoutForm()
    {
        try {
            $this->validate(
                [
                    'checkout.name' => 'required|string|max:255',
                    'checkout.surname' => 'required|string|max:255',
                    'checkout.street' => 'required|string|max:255',
                    'checkout.city' => 'required|string|max:255',
                    'checkout.zip' => 'required|string|max:255',
                    'checkout.country' => 'required|string|max:255',
                    'checkout.phone' => 'required|string|max:255',
                    'checkout.email' => 'required|email|max:255',
                    'checkout.delivery.name' => 'string|max:255',
                    'checkout.delivery.surname' => 'string|max:255',
                    'checkout.delivery.street' => 'string|max:255',
                    'checkout.delivery.city' => 'string|max:255',
                    'checkout.delivery.zip' => 'string|max:255',
                    'checkout.delivery.country' => 'string|max:255',
                    'checkout.delivery.email' => 'string|max:255',
                    'checkout.company.name' => 'string|max:255',
                    'checkout.company.regno' => 'string|max:255',
                    'checkout.company.bank' => 'string|max:255',
                    'checkout.company.account' => 'string|max:255',
                    'checkout.comments' => 'string|max:500',
                    'checkout.deliveryAlias' => 'required',
                    'checkout.rules' => 'required',
                ],
                [
                    'required' => __('frontend.checkout.validation.required'),
                    'max' => __('frontend.checkout.validation.max'),
                    'checkout.deliveryAlias.required' => __('frontend.checkout.validation.delivery'),
                    'checkout.rules.required' => __('frontend.checkout.validation.rules'),
                    'email' => __('frontend.checkout.validation.email'),
                ]
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->alert('error', $e->validator->errors()->first());
            throw $e;
        }

        if (!$this->selectedParcelStation || empty($this->selectedParcelStation)) {
            // If it's not set or empty, initialize Livewire validation error for the field "delivery"
            $this->addError('checkout.deliveryAlias', __('frontend.checkout.validation.parcel-location'));
            $this->alert('error', __('frontend.checkout.validation.parcel-location'));
            return;
        }


        if(!isset($this->checkout['delivery'])) $this->checkout['delivery'] = [];
        if(!isset($this->checkout['company'])) $this->checkout['company'] = [];

        $this->checkout['parcelAddress'] = $this->selectedParcelStation;
        $this->checkout['total'] = $this->total;
        $this->checkout['cart'] = $this->shoppingCart;
        unset($this->checkout['rules']);
        //session()->put('checkout', $this->checkout);

        $order = Orders::create($this->checkout);
        session()->put('checkout-complete', $order->id);
        session()->put('shopping_cart', []);
        //session()->put('checkout', []);
        return redirect()->route('checkout-complete');

        //dd($this->checkout);
    }

    public function render()
    {
        return view('livewire.show-checkout',[
            'deliveryPrice' => $this->checkout['deliveryPrice'] ?? 0
        ]);
    }



}
