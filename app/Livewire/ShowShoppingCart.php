<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Discount;

class ShowShoppingCart extends Component
{
    public $shoppingCart, $total;
    protected $listeners = ['updateShoppingCart'];
    public $couponCode;
    public $coupons = [];

    public function mount()
    {
        $this->updateShoppingCart();
    }



    public function updatedShoppingCart($value, $index)
    {
        foreach($this->shoppingCart as $index => $cart)
        {
            $cart['addCount'] = intval($cart['addCount']);
            if($cart['addCount'] < 1) $this->shoppingCart[$index]['addCount'] = 1;
        }
        session()->put('shopping_cart', $this->shoppingCart);
        $this->dispatch('updateShoppingCart');
        if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
    }

    public function updateShoppingCart()
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        $this->coupons = session()->get('coupons', []);
        //dd($this->shoppingCart);
        if(count($this->shoppingCart) == 0){
            session()->put('coupons', []);
            return redirect()->route('frontend-index-root');
        }
        $this->updateCount();
    }

    public function updateCount()
    {
        $this->total = array_reduce($this->shoppingCart, function($carry, $product) {
            return $carry + ($product['price'] * intval($product['addCount']));
        }, 0);
    }


    public function applyCode()
    {
        if(strlen(trim($this->couponCode))==0) return false;
        $currentDate = Carbon::now();
        $config = Discount::whereCode(trim($this->couponCode))->first();
        if(!isset($config->title)) {
            $this->alert('error', __('frontend.checkout.coupon-not-valid'));
            return false;
        }
        if ($currentDate->between(Carbon::parse($config->date_start), Carbon::parse($config->date_end))) {
            $discount = $config->params['discount']??0;

            foreach($this->shoppingCart as &$cart) {
                $parent = $cart['parent'];
                if(isset($config->params['ignored'])) {
                    if(!in_array($parent, $config->params['ignored'])) {
                        if($cart['discount'] < $discount) {
                            $cart['discount'] = $discount;
                            $cart['price'] = $cart['fullprice'] - ($cart['fullprice'] * ($discount / 100));
                        }
                    }
                } else if(isset($config->params['category'])) {
                    if(in_array($parent, $config->params['category'])) {
                        if($cart['discount'] < $discount) {
                            $cart['discount'] = $discount;
                            $cart['price'] = $cart['fullprice'] - ($cart['fullprice'] * ($discount / 100));
                        }
                    }
                }
            }
            $this->alert('success', __('frontend.checkout.coupon-ok'));
            if(!isset($this->coupons[$this->couponCode])) $this->coupons[$this->couponCode] = ['title'=>$config->title??''];
            session()->put('coupons', $this->coupons);
            session()->put('shopping_cart', $this->shoppingCart);
            if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
            $this->updateCount();
        } else {
            $this->alert('error', __('frontend.checkout.coupon-not-valid'));
        }
        $this->couponCode = '';
    }

    public function removeItemFromCart($key)
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        foreach($this->shoppingCart as $index => $cart)
        {
            if($cart['key'] == $key){
                unset($this->shoppingCart[$index]);
                break;
            }
        }
        session()->put('shopping_cart', $this->shoppingCart);
        $this->dispatch('updateShoppingCart');
        if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
    }

    public function cleanShoppingCart()
    {
        session()->put('shopping_cart', []);
        session()->put('coupons', []);
        $this->dispatch('updateShoppingCart');
        if (auth()->check()) { auth()->user()->saveShoppingCart([]); }
    }

    public function addItemCountDec($index)
    {
        if(isset($this->shoppingCart[$index])){
            if($this->shoppingCart[$index]['addCount'] > 1) $this->shoppingCart[$index]['addCount']--;
            session()->put('shopping_cart', $this->shoppingCart);
            $this->dispatch('updateShoppingCart');
            if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
        }
    }
    public function addItemCountInc($index)
    {
        if(isset($this->shoppingCart[$index])){
            $this->shoppingCart[$index]['addCount']++;
            session()->put('shopping_cart', $this->shoppingCart);
            $this->dispatch('updateShoppingCart');
            if (auth()->check()) { auth()->user()->saveShoppingCart($this->shoppingCart); }
        }
    }


    public function render()
    {
        return view('livewire.show-shopping-cart');
    }
}
