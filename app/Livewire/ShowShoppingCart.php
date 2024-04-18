<?php

namespace App\Livewire;

use Livewire\Component;

class ShowShoppingCart extends Component
{
    public $shoppingCart, $total;
    protected $listeners = ['updateShoppingCart'];

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
    }

    public function updateShoppingCart()
    {
        $this->shoppingCart = session()->get('shopping_cart', []);
        //dd($this->shoppingCart);
        if(count($this->shoppingCart) == 0) return redirect()->route('frontend-index-root');
        $this->updateCount();
    }

    public function updateCount()
    {
        $this->total = array_reduce($this->shoppingCart, function($carry, $product) {
            return $carry + ($product['price'] * intval($product['addCount']));
        }, 0);
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
    }

    public function cleanShoppingCart()
    {
        session()->put('shopping_cart', []);
        $this->dispatch('updateShoppingCart');
    }

    public function addItemCountDec($index)
    {
        if(isset($this->shoppingCart[$index])){
            if($this->shoppingCart[$index]['addCount'] > 1) $this->shoppingCart[$index]['addCount']--;
            session()->put('shopping_cart', $this->shoppingCart);
            $this->dispatch('updateShoppingCart');
        }
    }
    public function addItemCountInc($index)
    {
        if(isset($this->shoppingCart[$index])){
            $this->shoppingCart[$index]['addCount']++;
            session()->put('shopping_cart', $this->shoppingCart);
            $this->dispatch('updateShoppingCart');
        }
    }


    public function render()
    {
        return view('livewire.show-shopping-cart');
    }
}
